document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".landing-form, .footer-subscribe").forEach(function (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
        });
    });

    var menuToggle = document.querySelector(".site-header__menu-toggle");
    var navLinks = document.querySelectorAll(".site-header__menu a");

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

    var clientsStrip = document.querySelector(".clients-strip");
    var clientsTrack = clientsStrip ? clientsStrip.querySelector(".clients-strip__track") : null;
    var mobileQuery = window.matchMedia("(max-width: 560px)");
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
        if (!clientsStrip || !clientsTrack || !mobileQuery.matches) {
            return;
        }

        if (!marqueeLastTime) {
            marqueeLastTime = timestamp;
        }

        var elapsed = Math.min(timestamp - marqueeLastTime, 32);
        var speed = 0.04;
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

        if (mobileQuery.matches) {
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

    if (clientsTrack) {
        clientsTrack.querySelectorAll("img").forEach(function (image) {
            if (!image.complete) {
                image.addEventListener("load", setClientsMarquee, { once: true });
            }
        });
    }

    if (mobileQuery.addEventListener) {
        mobileQuery.addEventListener("change", setClientsMarquee);
    } else if (mobileQuery.addListener) {
        mobileQuery.addListener(setClientsMarquee);
    }

    window.addEventListener("resize", function () {
        window.clearTimeout(marqueeResizeTimer);
        marqueeResizeTimer = window.setTimeout(setClientsMarquee, 120);
    });

    var worksModal = document.querySelector("#works-project-modal");
    var projectTriggers = document.querySelectorAll(".project-card__trigger");

    if (worksModal && projectTriggers.length) {
        var dialog = worksModal.querySelector(".works-modal__dialog");
        var closeTargets = worksModal.querySelectorAll("[data-modal-close]");
        var titleEl = worksModal.querySelector("#works-modal-title");
        var descriptionEl = worksModal.querySelector("#works-modal-description");
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

        function closeModal() {
            worksModal.classList.remove("is-open");
            worksModal.hidden = true;
            document.body.classList.remove("works-modal-open");

            if (triggerEl) {
                triggerEl.focus();
            }
        }

        function openModal(payload, sourceTrigger) {
            titleEl.textContent = payload.title || "";
            descriptionEl.textContent = payload.description || "";
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
