<a id="scrollUp" href="javascript:void(0);" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" aria-label="{{ __('Back to Top') }}">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M18 15l-6-6-6 6"/>
    </svg>
</a>

<style>
#scrollUp {
    position: fixed !important;
    bottom: 30px !important;
    right: 30px !important;
    width: 46px !important;
    height: 46px !important;
    border-radius: 50% !important;
    background-color: var(--bs-neutral-900, #18181b) !important;
    color: var(--bs-brand-2, var(--bs-primary, #70f46d)) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    z-index: 9999 !important;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.25) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    cursor: pointer !important;
    opacity: 0;
    visibility: hidden;
    transform: translateY(15px) scale(0.9);
    transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1), 
                visibility 0.3s cubic-bezier(0.4, 0, 0.2, 1), 
                transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                background-color 0.25s ease,
                color 0.25s ease !important;
    text-decoration: none !important;
}

#scrollUp.show-scroll {
    opacity: 1 !important;
    visibility: visible !important;
    transform: translateY(0) scale(1) !important;
}

#scrollUp:hover {
    background-color: var(--bs-brand-2, var(--bs-primary, #70f46d)) !important;
    color: var(--bs-button-text, #ffffff) !important;
    transform: translateY(-4px) scale(1.05) !important;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35) !important;
}

#scrollUp svg {
    display: block !important;
    stroke: currentColor !important;
    transition: stroke 0.25s ease !important;
}
</style>

<script>
(function() {
    function checkScrollTop() {
        var scrollBtn = document.getElementById('scrollUp');
        if (!scrollBtn) return;
        if (window.pageYOffset > 250 || document.documentElement.scrollTop > 250) {
            scrollBtn.classList.add('show-scroll');
        } else {
            scrollBtn.classList.remove('show-scroll');
        }
    }

    window.addEventListener('scroll', checkScrollTop, { passive: true });
    document.addEventListener('DOMContentLoaded', checkScrollTop);
})();
</script>
