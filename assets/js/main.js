document.addEventListener("DOMContentLoaded", function () {
    var reduceMotionQuery = window.matchMedia("(prefers-reduced-motion: reduce)");
    var reduceMotion = reduceMotionQuery.matches;

    function updateMotionPreference(event) {
        reduceMotion = event.matches;

        if (reduceMotion) {
            document.querySelectorAll(".reveal").forEach(function (element) {
                element.classList.add("is-visible");
            });
        }

        if (typeof setClientsMarquee === "function") {
            setClientsMarquee();
        }

        if (typeof setHeroServicesAutoAdvance === "function") {
            setHeroServicesAutoAdvance();
        }
    }

    if (reduceMotionQuery.addEventListener) {
        reduceMotionQuery.addEventListener("change", updateMotionPreference);
    } else if (reduceMotionQuery.addListener) {
        reduceMotionQuery.addListener(updateMotionPreference);
    }

    var revealItems = document.querySelectorAll(".reveal");

    if (revealItems.length) {
        if (reduceMotion || !("IntersectionObserver" in window)) {
            revealItems.forEach(function (element) {
                element.classList.add("is-visible");
            });
        } else {
            var revealObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                });
            }, {
                rootMargin: "0px 0px -10% 0px",
                threshold: 0.12
            });

            revealItems.forEach(function (element) {
                revealObserver.observe(element);
            });
        }
    }

    var siteHeader = document.querySelector(".site-header");

    function setHeaderScrollState() {
        if (!siteHeader) {
            return;
        }

        siteHeader.classList.toggle("is-scrolled", window.scrollY > 24);
    }

    setHeaderScrollState();
    window.addEventListener("scroll", setHeaderScrollState, { passive: true });

    document.querySelectorAll(".footer-subscribe").forEach(function (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
        });
    });

    document.querySelectorAll("[data-contact-form]").forEach(function (form) {
        var statusEl = form.querySelector("[data-contact-status]");
        var submitButton = form.querySelector(".landing-footer__submit");
        var submitLabel = submitButton ? submitButton.querySelector("span") : null;
        var defaultSubmitText = submitLabel ? submitLabel.textContent : "";

        function setStatus(type, message) {
            if (!statusEl) {
                return;
            }

            statusEl.hidden = false;
            statusEl.textContent = message || "";
            statusEl.classList.remove("is-success", "is-error", "is-loading", "is-visible");
            statusEl.classList.add("is-visible", "is-" + type);
        }

        function clearStatus() {
            if (!statusEl) {
                return;
            }

            statusEl.hidden = true;
            statusEl.textContent = "";
            statusEl.classList.remove("is-success", "is-error", "is-loading", "is-visible");
        }

        function setLoading(isLoading) {
            form.classList.toggle("is-submitting", isLoading);

            if (submitButton) {
                submitButton.disabled = isLoading;
                submitButton.setAttribute("aria-busy", isLoading ? "true" : "false");
            }

            if (submitLabel) {
                submitLabel.textContent = isLoading && window.evomarketContact ? window.evomarketContact.messages.loading : defaultSubmitText;
            }
        }

        function clearFieldErrors() {
            Array.prototype.slice.call(form.elements).forEach(function (field) {
                if (field.name) {
                    field.removeAttribute("aria-invalid");
                }
            });
        }

        function markFieldErrors(fields) {
            (fields || []).forEach(function (fieldName) {
                var field = form.elements[fieldName];

                if (field) {
                    field.setAttribute("aria-invalid", "true");
                }
            });
        }

        form.addEventListener("submit", function (event) {
            if (!window.fetch || !window.FormData || !window.evomarketContact) {
                return;
            }

            event.preventDefault();
            clearStatus();
            clearFieldErrors();
            setStatus("loading", window.evomarketContact.messages.loading);
            setLoading(true);

            window.fetch(window.evomarketContact.ajaxUrl, {
                method: "POST",
                credentials: "same-origin",
                body: new FormData(form)
            })
                .then(function (response) {
                    return response.json().catch(function () {
                        return {
                            success: false,
                            data: {
                                message: window.evomarketContact.messages.error,
                                fields: []
                            }
                        };
                    });
                })
                .then(function (payload) {
                    var data = payload && payload.data ? payload.data : {};

                    if (!payload || !payload.success) {
                        markFieldErrors(data.fields || []);
                        setStatus("error", data.message || window.evomarketContact.messages.error);
                        return;
                    }

                    form.reset();
                    setStatus("success", data.message || "");
                })
                .catch(function () {
                    setStatus("error", window.evomarketContact.messages.error);
                })
                .finally(function () {
                    setLoading(false);
                });
        });
    });
    var menuToggle = document.querySelector(".site-header__menu-toggle");
    var navLinks = document.querySelectorAll(".site-header__menu a");
    var navTargets = Array.prototype.slice.call(navLinks).map(function (link) {
        var href = link.getAttribute("href") || "";

        if (href.charAt(0) !== "#") {
            return null;
        }

        var target = document.querySelector(href);

        return target ? {
            link: link,
            target: target
        } : null;
    }).filter(Boolean);

    if (menuToggle) {
        menuToggle.addEventListener("click", function () {
            var isOpen = document.body.classList.toggle("site-nav-open");
            menuToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
        });

        navLinks.forEach(function (link) {
            link.addEventListener("click", function () {
                document.body.classList.remove("site-nav-open");
                menuToggle.setAttribute("aria-expanded", "false");
            });
        });
    }

    var heroServices = document.querySelector(".hero-services");
    var heroServicesMobileQuery = window.matchMedia("(max-width: 560px)");
    var heroServicesTimer = null;
    var heroServicesIndex = 0;
    var heroServicesStopped = false;
    var heroServicesResizeTimer = null;

    function getHeroServiceCards() {
        if (!heroServices) {
            return [];
        }

        return Array.prototype.slice.call(heroServices.querySelectorAll(".service-card")).sort(function (cardA, cardB) {
            var orderA = parseInt(window.getComputedStyle(cardA).order, 10) || 0;
            var orderB = parseInt(window.getComputedStyle(cardB).order, 10) || 0;

            if (orderA === orderB) {
                return Array.prototype.indexOf.call(heroServices.children, cardA) - Array.prototype.indexOf.call(heroServices.children, cardB);
            }

            return orderA - orderB;
        });
    }

    function getHeroServiceOffset(card) {
        return card.offsetLeft - heroServices.offsetLeft - parseFloat(window.getComputedStyle(heroServices).paddingLeft || "0");
    }

    function clearHeroServicesTimer() {
        window.clearTimeout(heroServicesTimer);
        heroServicesTimer = null;
    }

    function stopHeroServicesAutoAdvance() {
        heroServicesStopped = true;
        clearHeroServicesTimer();
    }

    function scheduleHeroServicesAutoAdvance() {
        clearHeroServicesTimer();

        if (!heroServices || !heroServicesMobileQuery.matches || reduceMotion || heroServicesStopped) {
            return;
        }

        var cards = getHeroServiceCards();

        if (heroServicesIndex >= cards.length - 1) {
            return;
        }

        heroServicesTimer = window.setTimeout(function () {
            cards = getHeroServiceCards();
            heroServicesIndex += 1;

            if (!cards[heroServicesIndex]) {
                clearHeroServicesTimer();
                return;
            }

            heroServices.scrollTo({
                left: getHeroServiceOffset(cards[heroServicesIndex]),
                behavior: "smooth"
            });

            scheduleHeroServicesAutoAdvance();
        }, 2000);
    }

    function setHeroServicesAutoAdvance() {
        clearHeroServicesTimer();

        if (!heroServices || !heroServicesMobileQuery.matches || reduceMotion || heroServicesStopped) {
            return;
        }

        heroServicesIndex = 0;
        heroServices.scrollLeft = 0;
        scheduleHeroServicesAutoAdvance();
    }

    if (heroServices) {
        ["touchstart", "pointerdown", "wheel"].forEach(function (eventName) {
            heroServices.addEventListener(eventName, stopHeroServicesAutoAdvance, { passive: true });
        });

        setHeroServicesAutoAdvance();
    }

    if (navTargets.length && "IntersectionObserver" in window) {
        var activeSectionObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }

                navLinks.forEach(function (link) {
                    link.classList.remove("is-active");
                });

                navTargets.some(function (item) {
                    if (item.target === entry.target) {
                        item.link.classList.add("is-active");
                        return true;
                    }

                    return false;
                });
            });
        }, {
            rootMargin: "-28% 0px -58% 0px",
            threshold: 0
        });

        navTargets.forEach(function (item) {
            activeSectionObserver.observe(item.target);
        });
    }

    var clientsStrip = document.querySelector(".clients-strip");
    var clientsTrack = clientsStrip ? clientsStrip.querySelector(".clients-strip__track") : null;
    var marqueeResizeTimer;
    var marqueeFrame;
    var marqueeOffset = 0;
    var marqueeLastTime = 0;
    var originalClientItems = clientsTrack ? Array.prototype.slice.call(clientsTrack.children) : [];

    function getClientsMarqueeGap() {
        if (!clientsTrack) {
            return 0;
        }

        var styles = window.getComputedStyle(clientsTrack);
        return parseFloat(styles.columnGap || styles.gap || "0") || 0;
    }

    function resetClientsTrack() {
        if (!clientsTrack) {
            return;
        }

        originalClientItems.forEach(function (item) {
            clientsTrack.appendChild(item);
        });

        clientsTrack.querySelectorAll(".clients-strip__item--clone").forEach(function (clone) {
            clone.remove();
        });
    }

    function fillClientsMarqueeTrack() {
        if (!clientsStrip || !clientsTrack) {
            return;
        }

        var targetWidth = Math.max(clientsStrip.clientWidth * 4, 1400);

        while (clientsTrack.scrollWidth < targetWidth) {
            originalClientItems.forEach(function (item) {
                var clone = item.cloneNode(true);
                clone.classList.add("clients-strip__item--clone");
                clone.setAttribute("aria-hidden", "true");
                clientsTrack.appendChild(clone);
            });
        }
    }

    function stepClientsMarquee(timestamp) {
        if (!clientsStrip || !clientsTrack || reduceMotion) {
            return;
        }

        if (!marqueeLastTime) {
            marqueeLastTime = timestamp;
        }

        var elapsed = Math.min(timestamp - marqueeLastTime, 32);
        var speed = 0.045;
        var gap = getClientsMarqueeGap();
        var firstItem = clientsTrack.firstElementChild;

        marqueeLastTime = timestamp;
        marqueeOffset -= elapsed * speed;

        while (firstItem && -marqueeOffset >= firstItem.getBoundingClientRect().width + gap) {
            marqueeOffset += firstItem.getBoundingClientRect().width + gap;
            clientsTrack.appendChild(firstItem);
            firstItem = clientsTrack.firstElementChild;
        }

        clientsTrack.style.transform = "translate3d(" + marqueeOffset + "px, 0, 0)";
        marqueeFrame = window.requestAnimationFrame(stepClientsMarquee);
    }

    function setClientsMarquee() {
        if (!clientsStrip || !clientsTrack) {
            return;
        }

        window.cancelAnimationFrame(marqueeFrame);
        marqueeFrame = null;
        marqueeLastTime = 0;

        if (!reduceMotion) {
            resetClientsTrack();
            fillClientsMarqueeTrack();
            marqueeOffset = 0;
            clientsTrack.style.transform = "translate3d(0, 0, 0)";
            clientsStrip.classList.add("is-marquee-ready");
            marqueeFrame = window.requestAnimationFrame(stepClientsMarquee);
            return;
        }

        resetClientsTrack();
        clientsTrack.style.transform = "";
        clientsStrip.classList.remove("is-marquee-ready");
    }

    setClientsMarquee();

    window.addEventListener("resize", function () {
        window.clearTimeout(marqueeResizeTimer);
        marqueeResizeTimer = window.setTimeout(setClientsMarquee, 120);
        window.clearTimeout(heroServicesResizeTimer);
        heroServicesResizeTimer = window.setTimeout(setHeroServicesAutoAdvance, 120);
    });

    var worksModal = document.querySelector("#works-project-modal");
    var projectTriggers = document.querySelectorAll(".project-card__trigger");

    if (worksModal && projectTriggers.length) {
        var dialog = worksModal.querySelector(".works-modal__dialog");
        var closeTargets = worksModal.querySelectorAll("[data-modal-close]");
        var titleEl = worksModal.querySelector("#works-modal-title");
        var descriptionEl = worksModal.querySelector("#works-modal-description");
        var subtitleEl = worksModal.querySelector("[data-modal-subtitle]");
        var highlightsEl = worksModal.querySelector("[data-modal-highlights]");
        var specialSectionEl = worksModal.querySelector("[data-modal-special-section]");
        var specialTitleEl = worksModal.querySelector("[data-modal-special-title]");
        var specialCardsEl = worksModal.querySelector("[data-modal-special-cards]");
        var featuresEl = worksModal.querySelector("[data-modal-features]");
        var techTagsEl = worksModal.querySelector("[data-modal-tech-tags]");
        var trackEl = worksModal.querySelector("[data-modal-track]");
        var controlsEl = worksModal.querySelector("[data-modal-controls]");
        var dotsEl = worksModal.querySelector("[data-modal-dots]");
        var prevButton = worksModal.querySelector("[data-modal-prev]");
        var nextButton = worksModal.querySelector("[data-modal-next]");
        var activeIndex = 0;
        var totalSlides = 0;
        var triggerEl = null;
        var touchStartX = null;
        var touchMoveX = null;
        var closeTimer = null;

        function updateSliderPosition() {
            trackEl.style.transform = "translate3d(" + activeIndex * -100 + "%, 0, 0)";
            dotsEl.querySelectorAll(".works-modal__dot").forEach(function (dot, index) {
                dot.classList.toggle("is-active", index === activeIndex);
            });
        }

        function setControlsVisibility() {
            var hideControls = totalSlides <= 1;
            controlsEl.hidden = hideControls;
            dotsEl.hidden = hideControls;
        }

        function renderSlides(images) {
            if (!images.length) {
                images = [{ src: "", alt: "" }];
            }

            trackEl.innerHTML = "";
            dotsEl.innerHTML = "";

            images.forEach(function (image, index) {
                var slide = document.createElement("div");
                slide.className = "works-modal__slide";

                var img = document.createElement("img");
                img.src = image.src || "";
                img.alt = image.alt || "";
                img.className = image.fit === "contain" ? "works-modal__image works-modal__image--contain" : "works-modal__image";
                slide.appendChild(img);
                trackEl.appendChild(slide);

                var dot = document.createElement("button");
                dot.type = "button";
                dot.className = "works-modal__dot";
                dot.setAttribute("aria-label", "Go to image " + (index + 1));
                dot.addEventListener("click", function () {
                    activeIndex = index;
                    updateSliderPosition();
                });
                dotsEl.appendChild(dot);
            });

            totalSlides = images.length;
            activeIndex = 0;
            setControlsVisibility();
            updateSliderPosition();
        }

        function appendTextItem(parent, className, text, tagName) {
            var item = document.createElement(tagName || "div");
            item.className = className;
            item.textContent = text || "";
            parent.appendChild(item);
            return item;
        }

        function renderHighlights(highlights) {
            highlightsEl.innerHTML = "";

            (highlights || []).forEach(function (highlight) {
                var card = document.createElement("article");
                card.className = "works-modal__highlight-card";

                appendTextItem(card, "works-modal__highlight-marker", "", "span");
                appendTextItem(card, "works-modal__highlight-title", highlight.title, "h4");
                appendTextItem(card, "works-modal__highlight-text", highlight.text, "p");
                highlightsEl.appendChild(card);
            });

            highlightsEl.hidden = !highlightsEl.children.length;
        }

        function renderSpecialCards(title, cards) {
            specialTitleEl.textContent = title || "";
            specialCardsEl.innerHTML = "";

            (cards || []).forEach(function (cardData) {
                var card = document.createElement("article");
                card.className = "works-modal__special-card";

                appendTextItem(card, "works-modal__special-title", cardData.title, "h5");
                appendTextItem(card, "works-modal__special-text", cardData.text, "p");
                specialCardsEl.appendChild(card);
            });

            specialSectionEl.hidden = !specialCardsEl.children.length;
        }

        function renderFeatures(features) {
            featuresEl.innerHTML = "";

            (features || []).forEach(function (feature) {
                appendTextItem(featuresEl, "works-modal__feature", feature, "li");
            });

            if (featuresEl.parentElement) {
                featuresEl.parentElement.hidden = !featuresEl.children.length;
            }
        }

        function renderTechTags(tags) {
            techTagsEl.innerHTML = "";

            (tags || []).forEach(function (tag) {
                appendTextItem(techTagsEl, "works-modal__tag", tag, "span");
            });

            techTagsEl.hidden = !techTagsEl.children.length;
        }

        function closeModal() {
            worksModal.classList.remove("is-open");
            document.body.classList.remove("works-modal-open");

            window.clearTimeout(closeTimer);
            closeTimer = window.setTimeout(function () {
                worksModal.hidden = true;

                if (triggerEl) {
                    triggerEl.focus();
                }
            }, reduceMotion ? 0 : 220);
        }

        function openModal(payload, sourceTrigger) {
            window.clearTimeout(closeTimer);
            titleEl.textContent = payload.title || "";
            subtitleEl.textContent = payload.subtitle || "";
            descriptionEl.textContent = payload.intro || payload.description || "";
            renderHighlights(payload.highlights || []);
            renderSpecialCards(payload.specialTitle || "", payload.specialCards || []);
            renderFeatures(payload.features || []);
            renderTechTags(payload.techTags || []);
            renderSlides(payload.images || []);
            triggerEl = sourceTrigger;

            worksModal.hidden = false;
            window.requestAnimationFrame(function () {
                worksModal.classList.add("is-open");
            });
            document.body.classList.add("works-modal-open");
            dialog.focus();
        }

        projectTriggers.forEach(function (cardTrigger) {
            cardTrigger.addEventListener("click", function () {
                var rawData = cardTrigger.getAttribute("data-project");
                if (!rawData) {
                    return;
                }

                try {
                    var payload = JSON.parse(rawData);
                    openModal(payload, cardTrigger);
                } catch (error) {
                    // Invalid payload should not break other interactions.
                }
            });
        });

        closeTargets.forEach(function (target) {
            target.addEventListener("click", closeModal);
        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape" && !worksModal.hidden) {
                closeModal();
            }
        });

        prevButton.addEventListener("click", function () {
            if (totalSlides <= 1) {
                return;
            }

            activeIndex = (activeIndex - 1 + totalSlides) % totalSlides;
            updateSliderPosition();
        });

        nextButton.addEventListener("click", function () {
            if (totalSlides <= 1) {
                return;
            }

            activeIndex = (activeIndex + 1) % totalSlides;
            updateSliderPosition();
        });

        trackEl.addEventListener("pointerdown", function (event) {
            touchStartX = event.clientX;
            touchMoveX = event.clientX;
        });

        trackEl.addEventListener("pointermove", function (event) {
            if (touchStartX === null) {
                return;
            }

            touchMoveX = event.clientX;
        });

        trackEl.addEventListener("pointerup", function () {
            if (touchStartX === null || touchMoveX === null || totalSlides <= 1) {
                touchStartX = null;
                touchMoveX = null;
                return;
            }

            var delta = touchMoveX - touchStartX;

            if (Math.abs(delta) > 36) {
                if (delta < 0) {
                    activeIndex = (activeIndex + 1) % totalSlides;
                } else {
                    activeIndex = (activeIndex - 1 + totalSlides) % totalSlides;
                }

                updateSliderPosition();
            }

            touchStartX = null;
            touchMoveX = null;
        });

        trackEl.addEventListener("pointercancel", function () {
            touchStartX = null;
            touchMoveX = null;
        });
    }
});
