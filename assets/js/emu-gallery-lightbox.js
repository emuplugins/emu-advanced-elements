// nome do splide e funcao pause ou play
function splideAutoplay(s, p) {
    if (p == 'pause'){
        s.Components.Autoplay.pause();
    }
    
    if (p == 'play'){
        s.Components.Autoplay.play();
    }
};

document.addEventListener('DOMContentLoaded', function () {

    const emuSplide = new Splide('#emu-lightbox-gallery', {
    }).mount();
    

    // query selectors
    const lightboxEnabled = document.querySelectorAll('.lightbox-enabled');
    const lightboxArray = Array.from(lightboxEnabled);
    const lastImage = lightboxArray.length - 1;
    const lightboxContainer = document.querySelector('.emu-lightbox-container');
    const lightboxImage = document.querySelector('.lightbox-image');
    
    const lightboxBtnsWrapper = document.querySelector('.lightbox-btns')
    const lightboxBtns = document.querySelectorAll('.lightbox-btn');
    const lightboxBtnRight = document.querySelector('#right');
    const lightboxBtnLeft = document.querySelector('#left');

    let activeImage;

    // functions
    const showLightbox = () => {
        lightboxContainer.classList.add('active');
        splideAutoplay(emuSplide, 'pause')
    };

    const hideLightbox = () => {
        lightboxContainer.classList.remove('active');
        splideAutoplay(emuSplide, 'play')
    };

    const setActiveImage = (image) => {
        if (!image) return; // Evita erro caso image seja undefined
        lightboxImage.src = image.dataset.imagesrc;
        activeImage = lightboxArray.indexOf(image);
    };

    const transitionSlidesLeft = () => {
        lightboxBtnLeft.focus();
        activeImage === 0
            ? setActiveImage(lightboxArray[lastImage])
            : setActiveImage(lightboxArray[activeImage - 1]);
    };

    const transitionSlidesRight = () => {
        lightboxBtnRight.focus();
        activeImage === lastImage
            ? setActiveImage(lightboxArray[0])
            : setActiveImage(lightboxArray[activeImage + 1]);
    };

    const transitionSlideHandler = (moveItem) => {
        if (moveItem === 'left') {
            transitionSlidesLeft();
        } else if (moveItem === 'right') {
            transitionSlidesRight();
        }
    };

    // event listeners
    lightboxEnabled.forEach(image => {
        image.addEventListener('click', () => {
            showLightbox();
            setActiveImage(image);
        });
    });

    lightboxContainer.addEventListener('click', () => {
        hideLightbox();
    });

    lightboxBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            transitionSlideHandler(e.currentTarget.id);
        });
    });

    lightboxImage.addEventListener('click', (e) =>{
        e.stopPropagation();
    })
    lightboxBtnsWrapper.addEventListener('click', (e) =>{
        e.stopPropagation();
    })
});