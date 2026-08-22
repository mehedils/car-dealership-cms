const $ = window.jQuery;
import Swiper from 'swiper/bundle';

$(function () {
    initSwiper();
    initSlickGallery();
    initDatepickers();
    initCounters();
    initVideoPopups();
    initStickyHeader();
    initMobileMenu();
    initOffcanvas();
    initBackToTop();
    initQuantity();
    initPriceRange();
    initAutoSubmit();

    if (window.WOW) new window.WOW({ live: false }).init();
});

function initSwiper() {
    document.querySelectorAll('.swiper-container').forEach((el) => {
        const classes = el.className;
        let options = {
            spaceBetween: 30,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false },
            navigation: { nextEl: null, prevEl: null },
            breakpoints: {
                1199: { slidesPerView: 3 },
                800: { slidesPerView: 2 },
                400: { slidesPerView: 1 },
            },
        };

        if (classes.includes('swiper-group-animate')) {
            options.slidesPerView = 'auto';
            options.speed = 1000;
            options.spaceBetween = 24;
            options.breakpoints = {
                1199: { slidesPerView: 'auto' },
                600: { slidesPerView: 'auto' },
                575: { slidesPerView: 1 },
                350: { slidesPerView: 1 },
            };
        } else if (classes.includes('swiper-group-1')) {
            options.slidesPerView = 1;
            options.spaceBetween = 50;
            options.pagination = { el: '.swiper-pagination-group-1', clickable: true };
            options.autoplay.delay = 100000;
        } else if (classes.includes('swiper-group-2')) {
            options.slidesPerView = 2;
            options.breakpoints = {
                1199: { slidesPerView: 2 },
                800: { slidesPerView: 1 },
                400: { slidesPerView: 1 },
            };
        } else if (classes.includes('swiper-group-4')) {
            options.slidesPerView = 4;
            options.slidesPerGroup = 2;
            options.breakpoints = {
                1199: { slidesPerView: 4 },
                800: { slidesPerView: 3 },
                500: { slidesPerView: 2 },
                350: { slidesPerView: 1 },
            };
        } else {
            options.slidesPerView = 3;
            options.slidesPerGroup = 1;
        }

        const scope = el.closest('section') || document;
        const nextEl = scope.querySelector('.swiper-button-next, .swiper-button-next-animate');
        const prevEl = scope.querySelector('.swiper-button-prev, .swiper-button-prev-animate');
        if (nextEl) options.navigation.nextEl = nextEl;
        if (prevEl) options.navigation.prevEl = prevEl;

        new Swiper(el, options);
    });
}

function initSlickGallery() {
    if (!$('.banner-activities-detail').length) return;

    $('.banner-activities-detail').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: false,
        asNavFor: '.slider-nav-thumbnails-activities-detail',
        prevArrow: '<button type="button" class="slick-prev slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M7.99992 3.33325L3.33325 7.99992M3.33325 7.99992L7.99992 12.6666M3.33325 7.99992H12.6666" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
        nextArrow: '<button type="button" class="slick-next slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M7.99992 12.6666L12.6666 7.99992L7.99992 3.33325M12.6666 7.99992L3.33325 7.99992" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
    });

    $('.slider-nav-thumbnails-activities-detail').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.banner-activities-detail',
        dots: false,
        focusOnSelect: true,
        vertical: false,
        infinite: true,
        arrows: false,
        responsive: [
            { breakpoint: 1200, settings: { slidesToShow: 5 } },
            { breakpoint: 1024, settings: { slidesToShow: 4 } },
            { breakpoint: 700, settings: { slidesToShow: 3 } },
            { breakpoint: 480, settings: { slidesToShow: 2 } },
        ],
    });
}

function initDatepickers() {
    $('.datepicker-input').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
    });
}

function initCounters() {
    const counters = document.querySelectorAll('.count[data-count]');
    if (!counters.length) return;

    const animate = (el) => {
        const target = parseInt(el.getAttribute('data-count'), 10) || 0;
        const duration = 1800;
        const start = performance.now();
        const step = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            el.textContent = Math.floor(progress * target);
            if (progress < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animate(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.4 }
    );

    counters.forEach((el) => observer.observe(el));
}

function initVideoPopups() {
    $('.popup-youtube').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });
}

function initStickyHeader() {
    const header = document.querySelector('.header');
    if (!header) return;
    const onScroll = () => {
        header.classList.toggle('stick', window.scrollY > 100);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

function initMobileMenu() {
    const $menu = $('.mobile-header-active');
    const $body = $('body');

    $(document).on('click', '.burger-icon, #btn-mobile-menu, #btn-mobile-menu-close, .btn-close-mobile-menu', function (e) {
        e.preventDefault();
        const isOpen = $menu.hasClass('sidebar-visible');
        if ($(this).is('#btn-mobile-menu-close, .btn-close-mobile-menu') || isOpen) {
            $menu.removeClass('sidebar-visible');
            $body.removeClass('mobile-menu-active');
            $('.body-overlay-1').remove();
        } else {
            $menu.addClass('sidebar-visible');
            $body.addClass('mobile-menu-active');
            if (!$('.body-overlay-1').length) {
                $body.append('<div class="body-overlay-1"></div>');
            }
        }
    });

    $(document).on('click', '.body-overlay-1', function () {
        $menu.removeClass('sidebar-visible');
        $body.removeClass('mobile-menu-active');
        $(this).remove();
    });

    $('.mobile-menu .menu-expand').on('click', function (e) {
        e.preventDefault();
        const $li = $(this).closest('li');
        const $sub = $li.find('> .sub-menu');
        $sub.stop().slideToggle(250);
        $li.toggleClass('active');
    });
}

function initOffcanvas() {
    const $canvas = $('.sidebar-canvas-wrapper');
    const $body = $('body');

    $('.burger-icon-2').on('click', function () {
        const isOpen = $canvas.hasClass('sidebar-canvas-visible');
        $canvas.toggleClass('sidebar-canvas-visible', !isOpen);
        $body.toggleClass('canvas-menu-active', !isOpen);
        if (isOpen) $('.body-overlay-1').remove();
        else $body.append('<div class="body-overlay-1"></div>');
    });

    $('.close-canvas').on('click', function () {
        $canvas.removeClass('sidebar-canvas-visible');
        $body.removeClass('canvas-menu-active');
        $('.body-overlay-1').remove();
    });
}

function initBackToTop() {
    const $btn = $('#scrollUp');
    if (!$btn.length) return;
    const onScroll = () => {
        if (window.scrollY > 200) {
            $btn.addClass('show-scroll');
        } else {
            $btn.removeClass('show-scroll');
        }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    $btn.on('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    onScroll();
}

function initQuantity() {
    $('.detail-qty').each(function () {
        const $input = $(this).find('.qty-val');
        const min = parseInt($input.data('min') || 1, 10);
        const max = parseInt($input.data('max') || 999, 10);

        $(this).find('.qty-down').on('click', function (e) {
            e.preventDefault();
            let val = parseInt($input.val(), 10) || min;
            if (val > min) $input.val(val - 1).trigger('change');
        });

        $(this).find('.qty-up').on('click', function (e) {
            e.preventDefault();
            let val = parseInt($input.val(), 10) || min;
            if (val < max) $input.val(val + 1).trigger('change');
        });
    });
}

function initPriceRange() {
    $('.price-range-slider').each(function () {
        const $slider = $(this);
        const $container = $slider.closest('.block-filter, .box-collapse, .box-filters-sidebar');
        const $min = $slider.find('input[data-role="min"]');
        const $max = $slider.find('input[data-role="max"]');
        const $minLabel = $container.find('.price-min-value');
        const $maxLabel = $container.find('.price-max-value');
        const $trackActive = $slider.find('.price-range-track-active');
        const $form = $slider.closest('form');
        const step = parseInt($min.attr('step') || 10, 10);
        const hardMin = parseInt($min.attr('min') || 0, 10);
        const hardMax = parseInt($max.attr('max') || 500, 10);

        const sync = () => {
            let minVal = parseInt($min.val(), 10) || hardMin;
            let maxVal = parseInt($max.val(), 10) || hardMax;
            if (minVal > maxVal - step) minVal = maxVal - step;
            if (maxVal < minVal + step) maxVal = minVal + step;
            $min.val(minVal);
            $max.val(maxVal);
            $minLabel.text(minVal);
            $maxLabel.text(maxVal);

            if ($trackActive.length && hardMax > hardMin) {
                const pMin = Math.max(0, Math.min(100, ((minVal - hardMin) / (hardMax - hardMin)) * 100));
                const pMax = Math.max(0, Math.min(100, ((maxVal - hardMin) / (hardMax - hardMin)) * 100));
                $trackActive.css({
                    left: pMin + '%',
                    width: (pMax - pMin) + '%'
                });
            }
        };

        $min.on('input', () => {
            if (parseInt($min.val(), 10) > parseInt($max.val(), 10)) {
                $max.val(parseInt($min.val(), 10));
            }
            sync();
        });
        $max.on('input', () => {
            if (parseInt($max.val(), 10) < parseInt($min.val(), 10)) {
                $min.val(parseInt($max.val(), 10));
            }
            sync();
        });
        $min.add($max).on('change', () => {
            sync();
            if ($form.length) $form.submit();
        });
        sync();
    });
}

function initAutoSubmit() {
    $('form[data-auto-submit] select, form[data-auto-submit] input[type="checkbox"], form[data-auto-submit] input[type="radio"]').on('change', function () {
        $(this).closest('form').submit();
    });
}
