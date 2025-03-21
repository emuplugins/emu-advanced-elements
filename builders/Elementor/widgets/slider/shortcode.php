<?php

$slides = [
    [
    'bg-color' => '#608c99',
    'bg-img' => 'https://4kwallpapers.com/images/walls/thumbs_3t/9602.jpg',
    // 'link' => 'https://4kwallpapers.com/images/walls/thumbs_3t/9602.jpg',
    'content' => 
        [
            'title' => 'Slide 1',
            'html' => '<p>Descrição breve sobre este slide.</p>',
            'button' => [
                'text' => 'CLIQUE!',
                'link' => '#',
            ]
        ],
    ],
    [
    ],
    [
    'bg-color' => '#608c99',
    ],
];

?>

<div class="emu-splide-wrapper">

    <div class="splide" id="emu-splide">
        <div class="splide__track">
            <ul class="splide__list">

                <?php foreach($slides as $slide) : ?>

                    
                <li class="splide__slide">

                    <div class="emu-slide-content-wrapper" 
                    
                    style="<?php
                    
                    if (isset($slide['bg-color'])){
                        echo '--bg-color:' . $slide['bg-color'] . ';';
                    }
                    ?>"
                    >

                        <?php
                        
                        if (isset($slide['bg-img'])){
                            echo '<img 
                        src="' . $slide['bg-img'] . '"
                        >'; 
                        }
                        ?>
                        <?php
                        
                        if (isset($slide['link'])){
                            echo '<a 
                        href="' . $slide['link'] . '"
                        class="slide-link"></a>'; 
                        }
                        ?>

                        <div class="emu-splide-content">


                        <?php
                        
                        if (isset($slide['content'])){

                            if (isset($slide['content']['title'])){
                                
                                echo '<h2 class="emu-splide-content-title">' . $slide['content']['title'] . '</h2>';

                            }
                            if (isset($slide['content']['html'])){
                                
                                echo '<div class="emu-splide-html-wrapper">' . $slide['content']['html'] . '</div>';

                            }
                            if (isset($slide['content']['button'])){
                                
                                echo '<a href="' .  $slide['content']['button']['link'] .'" class="emu-splide-button">' . $slide['content']['button']['text'] . '</a>';

                            }
                            

                        }


                        ?>

                        </div>
                    </div>

                </li>

                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>