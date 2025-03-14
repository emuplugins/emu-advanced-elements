<?php

function emu_gallery_lightbox($images, $data){

// exemplo de uso

// $images =
// [
//     '/assets/img-1.png',
//     '/assets/img-2.png',
//     '/assets/img-3.png',
// ]
// $data = 
// [
//     'type' => 'loop',
//     'perPage' => 4,
//     'autoplay' => true,
//     'interval' => 3000,
//     'arrows' => true,
//     'pagination' => true,
//     'autoHeight' => true,
//     'drag' => false,
// ];


?>

<!-- splide css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css">

<div class="emu-lightbox-gallery">

    <div class="splide" id="emu-lightbox-gallery"  data-splide='<?php
    
    
// Processamento dos breakpoints
$breakpoints = [];
if (!empty($data['breakpoints'])) {
    $data = str_replace('slidesPerView', 'perPage', $data);
    $processed = json_decode(html_entity_decode($data['breakpoints']), true);
    if (is_string($processed)) {
        $processed = json_decode($processed, true);
    }
    
    
    
    $breakpoints = $processed;
}

// $breakpoints =  json_decode('{"992":{"perPage":4},"479":{"perPage":2}}', true);

// Construção do JSON final
$json_data = [
    "type"        => $data['type'],
    "autoplay"    => filter_var($data['autoplay'], FILTER_VALIDATE_BOOL),
    "interval"    => (int) $data['interval'],
    "arrows"      => filter_var($data['arrows'], FILTER_VALIDATE_BOOL),
    "pagination"  => filter_var($data['pagination'], FILTER_VALIDATE_BOOL),
    "autoHeight"  => filter_var($data['autoHeight'], FILTER_VALIDATE_BOOL),
    "drag"        => filter_var($data['drag'], FILTER_VALIDATE_BOOL),
    "gap"         => $data['gap'] ?? '',
    "move"        => 1,
    "mediaQuery" => 'min',
    "breakpoints" => $breakpoints
];

// Adiciona perPage apenas se não houver breakpoints
if (empty($breakpoints) && isset($data['perpage'])) {
    $json_data['perPage'] = (int) $data['perpage'];
}

echo json_encode($json_data, JSON_UNESCAPED_SLASHES);

    ?>'>


 
        <div class="splide__track">

            <ul class="splide__list">
                <?php foreach ($images as $image) : ?>
                    <li class="splide__slide">
                        <img src="<?php echo $image; ?>" alt="Imagem do slide" class="slide-image lightbox-enabled" data-imagesrc="<?php echo $image; ?>">
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>

    </div>
        
    <div class="emu-lightbox-container">
    
        <div class="lightbox-image-wrapper">
            <img src="" alt="" class="lightbox-image">
        </div>
        <div class="lightbox-btns">

            <button class="lightbox-btn left" id="left"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 185.343 185.343" xml:space="preserve" fill=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path  d="M51.707,185.343c-2.741,0-5.493-1.044-7.593-3.149c-4.194-4.194-4.194-10.981,0-15.175 l74.352-74.347L44.114,18.32c-4.194-4.194-4.194-10.987,0-15.175c4.194-4.194,10.987-4.194,15.18,0l81.934,81.934 c4.194,4.194,4.194,10.987,0,15.175l-81.934,81.939C57.201,184.293,54.454,185.343,51.707,185.343z"></path> </g> </g> </g></svg></button>


            <button class="lightbox-btn right" id="right"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 185.343 185.343" xml:space="preserve" fill=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M51.707,185.343c-2.741,0-5.493-1.044-7.593-3.149c-4.194-4.194-4.194-10.981,0-15.175 l74.352-74.347L44.114,18.32c-4.194-4.194-4.194-10.987,0-15.175c4.194-4.194,10.987-4.194,15.18,0l81.934,81.934 c4.194,4.194,4.194,10.987,0,15.175l-81.934,81.939C57.201,184.293,54.454,185.343,51.707,185.343z"></path> </g> </g> </g></svg></button>


        </div>
        
    </div>
    
</div>


<style>
    .emu-lightbox-gallery .slide-image {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        transition:all.2s
    }
    .emu-lightbox-gallery .splide{
        max-width: 100%;
    }
    .emu-lightbox-gallery .splide__slide{
        overflow: hidden;
        cursor: pointer;
        height: auto;
    }
    .emu-lightbox-gallery .slide-image:hover{
        transform: scale(1.05)
    }
    .emu-lightbox-gallery .emu-lightbox-gallery{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 500px;
    }

    .emu-lightbox-container{
        position: fixed !important;
        width: 100vw;
        height: 100vh;
        z-index: 99999;
        background-color: rgba(0, 0, 0, 0.51);
        display: none;
        justify-content: center;
        align-items: center;
        top: 0;
    }
    
        .emu-lightbox-gallery .splide__arrow{
            width:2em;
            height: auto;
            aspect-ratio: 1!important;
            font-size:20px;
    
        }
        .emu-lightbox-gallery .splide__pagination__page{
            aspect-ratio: 1;
            width:auto;
            opacity: 1!important;
        }
    .lightbox-image{
        width: 70vw;
        object-fit: cover;
        aspect-ratio: 21/14;
        border-radius: 10px;
    }

    .lightbox-image-wrapper{

        display: flex;
        justify-content: center;
        align-items: center;
        
    }

    .emu-lightbox-container.active{
        display: flex!important;
    }

    .lightbox-btns{
        position:absolute;
        width:100%;
        padding:10px;
        display: flex;
        justify-content: space-between;

    }

    .lightbox-btns button{
        padding: 0.4em 0.8em;
        border:none;
        aspect-ratio: 1;
        cursor:pointer
    }

    .lightbox-btn {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .lightbox-btns svg {
        width:30px;
        aspect-ratio: 1;
        
    }
    .lightbox-btns .left{
    transform: scaleX(-1);
    }

    body{
        display: flex;
        position: relative;
    }
    * {
        margin:0;
        box-sizing: border-box;
    }
</style>
<?php


}