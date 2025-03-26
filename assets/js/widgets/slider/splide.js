window.addEventListener('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/emu_slider.default', function ($scope) {

        const id = $scope[0]?.dataset?.id;
        const selector = `[data-id="${id}"] .splide`;

        const mountSplide = () => {
			
            const splideElement = document.querySelector(selector + ' .splide__list > .splide__slide:first-child');

            // Verifica se o elemento já foi inicializado
            if (splideElement) {

			const emuSplide = new Splide(selector);
			emuSplide.mount();
		
            }
		
        };

        // Tenta montar o slider imediatamente, sem o observer
        mountSplide();
    });
});
