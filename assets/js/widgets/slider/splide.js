window.addEventListener('elementor/frontend/init', function () {

    elementorFrontend.hooks.addAction('frontend/element_ready/emu_slider.default', 
        async function ($scope) {;

            const id = $scope[0]?.dataset?.id;
            const selector = `[data-id="${id}"] .splide`;

            // Função para montar o Splide
            const mountSplide = () => {

                const splideElement = document.querySelector(selector + ' .splide__list > .splide__slide:first-child');

                if (splideElement) {
                    const emuSplide = new Splide(selector);
                    emuSplide.mount();
                    observer.disconnect(); // Para de observar após o elemento ser encontrado
                }
            };

            // Observa mudanças no DOM
            const observer = new MutationObserver(mountSplide);
            observer.observe(document.body, { childList: true, subtree: true });

            // Tenta montar imediatamente, caso o elemento já esteja presente
            mountSplide();
            
        });
        
});