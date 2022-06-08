window.addEventListener("load", function () {
    HSBsValidation.init('.js-validate', {
        onSubmit: data => {
            data.event.preventDefault()
            alert('Submited')
        }
    })
    HSCore.components.HSTomSelect.init('[data-hs-tom-select-options]');
    HSCore.components.HSMask.init('[data-hs-mask-options]');
    new HSTogglePassword('[data-hs-toggle-password-options]');
    new HSQuantityCounter('.js-quantity-counter');

    new HSSideNav('.js-navbar-vertical-aside').init();
    new HSFormSearch('.js-form-search');
    HSBsDropdown.init();
    new HsNavScroller('.js-nav-scroller');
    new HSStickyBlock('.js-sticky-block', {
        targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ? '#header' : null
    });
    
});