<?php

function evomarket_enqueue_assets() {
    $theme_directory = get_template_directory();
    $theme_uri       = get_template_directory_uri();

    wp_enqueue_style(
        'evomarket-main-style',
        $theme_uri . '/assets/css/main.css',
        array(),
        filemtime($theme_directory . '/assets/css/main.css')
    );

    wp_enqueue_style(
        'evomarket-responsive-style',
        $theme_uri . '/assets/css/responsive.css',
        array('evomarket-main-style'),
        filemtime($theme_directory . '/assets/css/responsive.css')
    );

    wp_enqueue_script(
        'evomarket-main-script',
        $theme_uri . '/assets/js/main.js',
        array(),
        filemtime($theme_directory . '/assets/js/main.js'),
        true
    );

    wp_localize_script(
        'evomarket-main-script',
        'evomarketContact',
        array(
            'ajaxUrl'  => admin_url('admin-ajax.php'),
            'messages' => array(
                'loading' => 'שולחים את ההודעה...',
                'error'   => 'לא הצלחנו לשלוח את ההודעה. בדקו את השדות ונסו שוב.',
            ),
        )
    );
}

add_action('wp_enqueue_scripts', 'evomarket_enqueue_assets');

function evomarket_theme_setup() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'evomarket_theme_setup');

function evomarket_contact_messages() {
    return array(
        'success'        => 'תודה, ההודעה נשלחה בהצלחה. נחזור אליך בהקדם.',
        'validation'     => 'יש להשלים את כל שדות החובה ולנסות שוב.',
        'security'       => 'פג תוקף הטופס. רעננו את העמוד ונסו שוב.',
        'spam'           => 'לא ניתן לשלוח את הטופס כרגע.',
        'rate_limited'   => 'ההודעה כבר נשלחה לפני רגע. נסו שוב בעוד דקה.',
        'mail_failed'    => 'לא הצלחנו לשלוח את ההודעה. נסו שוב מאוחר יותר.',
        'invalid_method' => 'בקשת השליחה אינה תקינה.',
    );
}

function evomarket_get_contact_form_notice() {
    if (empty($_GET['evomarket_contact_status'])) {
        return null;
    }

    $status   = sanitize_key(wp_unslash($_GET['evomarket_contact_status']));
    $messages = evomarket_contact_messages();

    if ('success' === $status) {
        return array(
            'type'    => 'success',
            'message' => $messages['success'],
        );
    }

    return array(
        'type'    => 'error',
        'message' => isset($messages[$status]) ? $messages[$status] : $messages['validation'],
    );
}

function evomarket_contact_redirect($status) {
    $redirect = wp_get_referer();

    if (!$redirect) {
        $redirect = home_url('/');
    }

    $redirect = remove_query_arg('evomarket_contact_status', $redirect);
    $redirect = strtok($redirect, '#');
    $redirect = add_query_arg('evomarket_contact_status', $status, $redirect) . '#contact';

    wp_safe_redirect($redirect);
    exit;
}

function evomarket_contact_client_ip() {
    $ip_keys = array('HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR');

    foreach ($ip_keys as $key) {
        if (empty($_SERVER[$key])) {
            continue;
        }

        $value = sanitize_text_field(wp_unslash($_SERVER[$key]));
        $ip    = trim(explode(',', $value)[0]);

        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return $ip;
        }
    }

    return '0.0.0.0';
}

function evomarket_validate_contact_submission() {
    $messages = evomarket_contact_messages();
    $errors   = array();

    $company_name = isset($_POST['footer_company_name']) ? sanitize_text_field(wp_unslash($_POST['footer_company_name'])) : '';
    $full_name    = isset($_POST['footer_full_name']) ? sanitize_text_field(wp_unslash($_POST['footer_full_name'])) : '';
    $phone        = isset($_POST['footer_phone']) ? sanitize_text_field(wp_unslash($_POST['footer_phone'])) : '';
    $message      = isset($_POST['footer_message']) ? sanitize_textarea_field(wp_unslash($_POST['footer_message'])) : '';
    $terms        = !empty($_POST['footer_terms']);
    $honeypot     = isset($_POST['evomarket_contact_website']) ? trim(sanitize_text_field(wp_unslash($_POST['evomarket_contact_website']))) : '';
    $started_at   = isset($_POST['evomarket_contact_started_at']) ? absint($_POST['evomarket_contact_started_at']) : 0;

    if (!isset($_POST['evomarket_contact_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['evomarket_contact_nonce'])), 'evomarket_contact_submit')) {
        return new WP_Error('security', $messages['security']);
    }

    if ('' !== $honeypot) {
        return new WP_Error('spam', $messages['spam']);
    }

    if (!$started_at || time() - $started_at < 3) {
        return new WP_Error('spam', $messages['spam']);
    }

    $rate_key = 'evomarket_contact_' . md5(evomarket_contact_client_ip());

    if (get_transient($rate_key)) {
        return new WP_Error('rate_limited', $messages['rate_limited']);
    }

    if ('' === $full_name) {
        $errors['footer_full_name'] = true;
    }

    $phone_digits = preg_replace('/\D+/', '', $phone);

    if ('' === $phone || strlen($phone_digits) < 7 || strlen($phone_digits) > 15 || !preg_match('/^[0-9+\-\s().]+$/', $phone)) {
        $errors['footer_phone'] = true;
    }

    if ('' === $message) {
        $errors['footer_message'] = true;
    }

    if (!$terms) {
        $errors['footer_terms'] = true;
    }

    if (!empty($errors)) {
        return new WP_Error('validation', $messages['validation'], array('fields' => array_keys($errors)));
    }

    return array(
        'company_name' => $company_name,
        'full_name'    => $full_name,
        'phone'        => $phone,
        'message'      => $message,
        'rate_key'     => $rate_key,
    );
}

function evomarket_send_contact_email($submission) {
    $recipient = 'bennatan8@gmail.com';
    $subject   = 'New EvoMarket contact form submission';
    $page_url  = isset($_POST['_wp_http_referer']) ? esc_url_raw(wp_unslash($_POST['_wp_http_referer'])) : home_url('/');
    $body      = array(
        'New contact form submission from EvoMarket.',
        '',
        'Company name: ' . ($submission['company_name'] ? $submission['company_name'] : '-'),
        'Full name: ' . $submission['full_name'],
        'Phone: ' . $submission['phone'],
        '',
        'Message:',
        $submission['message'],
        '',
        'Page: ' . $page_url,
        'IP: ' . evomarket_contact_client_ip(),
    );
    $headers   = array('Content-Type: text/plain; charset=UTF-8');

    return wp_mail($recipient, $subject, implode("\n", $body), $headers);
}

function evomarket_handle_contact_submission() {
    $is_ajax  = wp_doing_ajax();
    $messages = evomarket_contact_messages();

    if ('POST' !== $_SERVER['REQUEST_METHOD']) {
        if ($is_ajax) {
            wp_send_json_error(
                array(
                    'message' => $messages['invalid_method'],
                    'fields'  => array(),
                ),
                405
            );
        }

        evomarket_contact_redirect('invalid_method');
    }

    $submission = evomarket_validate_contact_submission();

    if (is_wp_error($submission)) {
        $data = $submission->get_error_data();

        if ($is_ajax) {
            wp_send_json_error(
                array(
                    'message' => $submission->get_error_message(),
                    'fields'  => isset($data['fields']) ? $data['fields'] : array(),
                ),
                'validation' === $submission->get_error_code() ? 422 : 400
            );
        }

        evomarket_contact_redirect($submission->get_error_code());
    }

    if (!evomarket_send_contact_email($submission)) {
        if ($is_ajax) {
            wp_send_json_error(
                array(
                    'message' => $messages['mail_failed'],
                    'fields'  => array(),
                ),
                500
            );
        }

        evomarket_contact_redirect('mail_failed');
    }

    set_transient($submission['rate_key'], 1, MINUTE_IN_SECONDS);

    if ($is_ajax) {
        wp_send_json_success(
            array(
                'message' => $messages['success'],
            )
        );
    }

    evomarket_contact_redirect('success');
}

add_action('admin_post_nopriv_evomarket_contact_submit', 'evomarket_handle_contact_submission');
add_action('admin_post_evomarket_contact_submit', 'evomarket_handle_contact_submission');
add_action('wp_ajax_nopriv_evomarket_contact_submit', 'evomarket_handle_contact_submission');
add_action('wp_ajax_evomarket_contact_submit', 'evomarket_handle_contact_submission');
