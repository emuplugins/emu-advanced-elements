<?php
use Bricks\Helpers;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Emu_Gallery_Lightbox extends \Bricks\Element {

    // Element properties
    public $category     = 'Emu Advanced Elements'; // Use predefined element category 'general'
    public $name         = 'emu-gallery-lightbox'; // Make sure to prefix your elements
    public $icon         = 'ti-layout-slider'; // Themify icon font class
    public $scripts      = ['emuGalleryLightbox', 'emuSplide'];
    public $css_selector = '.emu-gallery-lightbox'; // Default CSS selector

    // Return localised element label
    public function get_label() {
        return esc_html__( 'Emu Gallery Lightbox', 'bricks' );
    }
    
    // Set builder control groups
    public function set_control_groups() {
        $this->control_groups['settings'] = [
            'title' => esc_html__( 'Settings', 'bricks' ),
            'tab' => 'content',
        ];

        $this->control_groups['lightbox'] = [
            'title' => esc_html__( 'Lightbox', 'bricks' ),
            'tab' => 'content',
        ];

        $this->control_groups['pagination'] = [
            'title' => esc_html__( 'Pagination', 'bricks' ),
            'tab' => 'content',
        ];
    }

    // Set builder controls
    public function set_controls() {

        
        $this->controls['images'] = [
            'tab' => 'content',
            'group' => 'settings',
            'rerender' => true,
            'label' => esc_html__( 'Images', 'bricks' ),
            'type' => 'image-gallery',
            'default' => '',
            'exclude'  => [
                'size',
            ],
        ];
        
        // SETTINGS
        $swiper_controls = self::get_swiper_controls();

        $this->controls['slidesToShow']                 = $swiper_controls['slidesToShow'];
        // $this->controls['slidesToScroll']               = $swiper_controls['slidesToScroll'];
        // $this->controls['gutter']                       = $swiper_controls['gutter'];

        $this->controls['height']                       = $swiper_controls['height'];
        $this->controls['height']['label']              = esc_html__( 'Images height', 'bricks' );
        $this->controls['height']['placeholder']        = '400px';
        $this->controls['height']['css'][0]['property'] = 'height';
        $this->controls['height']['css'][0]['selector'] = '.emu-lightbox-gallery,.splide__list, .splide__track';
        $this->controls['height']['default'] = 400;

        // $this->controls['effect']                       = $swiper_controls['effect'];
        // $this->controls['swiperLoop']                   = $swiper_controls['swiperLoop'];
        // $this->controls['speed']                        = $swiper_controls['speed'];
        // $this->controls['pauseOnHover']                 = $swiper_controls['pauseOnHover'];
        // $this->controls['autoplaySpeed']                = $swiper_controls['autoplaySpeed'];

        $this->controls['gap'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Space Between', 'bricks' ),
            'type' => 'slider',
            'units' => false,
            'default' => '20',
        ];

        $this->controls['type'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Type', 'bricks' ),
            'type' => 'select',
            'options' => [
                'loop' => esc_html__( 'Loop', 'bricks' ),
                'slide' => esc_html__( 'Slide', 'bricks' ),
            ],
            'default' => 'loop',
        ];


        $this->controls['ImageObjectFit'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Image size', 'bricks' ),
            'type' => 'select',
            'css'      => [
				[
					'property' => 'object-fit',
					'selector' => '.slide-image',
				],
			],
            'options' => [
                'cover' => esc_html__( 'Cover', 'bricks' ),
                'contain' => esc_html__( 'Contain', 'bricks' ),
                'stretch' => esc_html__( 'Strech', 'bricks' ),
            ],
            'default' => 'cover',
        ];

        $this->controls['imageBorderRadius'] = [
            'tab'     => 'content',
			'group'   => 'settings',
			'label'    => esc_html__( 'Image border Radius', 'bricks' ),
			'type'     => 'number',
			'units'    => true,
			'css'      => [
				[
					'property' => 'border-radius',
					'selector' => '.splide__slide',
				],
			],
            'default' => '10px'
		];

        $this->controls['autoplay']                     = $swiper_controls['autoplay'];

        // pagination

        $this->controls['arrowsBackgroundColor'] = [
			'tab'   => 'content',
			'group' => 'pagination',
			'label' => esc_html__( 'Arrows background', 'bricks' ),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'background-color',
					'selector' => '.splide__arrow',
				]
			],
		];

        $this->controls['arrowsColor'] = [
			'tab'   => 'content',
			'group' => 'pagination',
			'label' => esc_html__( 'Arrows Color', 'bricks' ),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'fill',
					'selector' => '.splide__arrow svg',
				]
			],
		];

        $this->controls['PagBulletsColor'] = [
			'tab'   => 'content',
			'group' => 'pagination',
			'label' => esc_html__( 'Bullets Color', 'bricks' ),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'background',
					'selector' => '.splide__pagination__page',
				]
			],
		];

        $this->controls['PagBulletsColorActive'] = [
			'tab'   => 'content',
			'group' => 'pagination',
			'label' => esc_html__( 'Active Bullets Color', 'bricks' ),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'background',
					'selector' => '.splide__pagination__page.is-active',
				]
			],
		];

        $this->controls['arrowsPositionY'] = [
            'tab' => 'content',
            'group' => 'pagination',
            'label' => esc_html__( 'Arrows offset', 'bricks' ),
            'type' => 'slider',
            'css' => [
              [
                'property' => 'top',
                'selector' => '.splide__arrow',
              ],
            ],
            'units' => [
              '%' => [
                'min' => 1,
                'max' => 200,
                'step' => 1,
              ],
            ],
            'default' => '50%',
        ];

        $this->controls['paginationPositionY'] = [
            'tab' => 'content',
            'group' => 'pagination',
            'label' => esc_html__( 'Pagination offset', 'bricks' ),
            'type' => 'slider',
            'css' => [
              [
                'property' => 'bottom',
                'selector' => '.splide__pagination',
              ],
            ],
            'units' => [
              'em' => [
                'min' => -10,
                'max' => 10,
                'step' => 0.1,
              ],
            ],
            'default' => '.5em',
        ];

        $this->controls['paginationWidth'] = [
            'tab' => 'content',
            'group' => 'pagination',
            'label' => esc_html__( 'Pagination bullets width', 'bricks' ),
            'type' => 'slider',
            'css' => [
              [
                'property' => 'height',
                'selector' => '.splide__pagination__page',
              ],
            ],
            'units' => [
              'px' => [
                'min' => 7,
                'max' => 50,
                'step' => 0.1,
              ],
            ],
            'default' => '7px',
        ];

        // Lightbox

        $this->controls['lightboxArrowsBackgroundColor'] = [
			'tab'   => 'content',
			'group' => 'lightbox',
			'label' => esc_html__( 'Arrows Background', 'bricks' ),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'background',
					'selector' => '.emu-lightbox-container .lightbox-btn',
				]
			],
		];

        $this->controls['lightboxArrowsColor'] = [
			'tab'   => 'content',
			'group' => 'lightbox',
			'label' => esc_html__( 'Arrows Color', 'bricks' ),
			'type'  => 'color',
			'css'   => [
				[
					'property' => 'fill',
					'selector' => '.emu-lightbox-container .lightbox-btn',
				]
			],
		];

        $this->controls['arrowsLightboxWidth'] = [
            'tab'     => 'content',
			'group'   => 'lightbox',
			'label'    => esc_html__( 'Arrows width', 'bricks' ),
			'type'     => 'number',
			'units'    => true,
			'css'      => [
				[
					'property' => 'width',
					'selector' => '.lightbox-btns svg',
				],
			],
            'default' => '30px',
            'placeholder' => '30px'
		];

        $this->controls['lightArrowsboxPadding'] = [
            'tab'     => 'content',
			'group'   => 'lightbox',
			'label'    => esc_html__( 'Arrows Padding', 'bricks' ),
			'type'     => 'number',
			'units'    => true,
			'css'      => [
				[
					'property' => 'padding',
					'selector' => '.lightbox-btns svg',
				],
			],
            'default' => '0px',
            'placeholder' => '0px'
		];

        $this->controls['lightboxArrowsBorderRadius'] = [
            'tab'     => 'content',
			'group'   => 'lightbox',
			'label'    => esc_html__( 'Arrows border radius', 'bricks' ),
			'type'     => 'number',
			'units'    => true,
			'css'      => [
				[
					'property' => 'border-radius',
					'selector' => '.lightbox-btn',
				],
			],
            'default' => '50%',
            'placeholder' => '50%'
		];

        $this->controls['imageWidth'] = [
            'tab'     => 'content',
			'group'   => 'lightbox',
			'label'    => esc_html__( 'Image width', 'bricks' ),
			'type'     => 'number',
			'units'    => true,
			'css'      => [
				[
					'property' => 'width',
					'selector' => '.lightbox-image',
				],
			],
		];

        $this->controls['imageHeight'] = [
            'tab'     => 'content',
			'group'   => 'lightbox',
			'label'    => esc_html__( 'Image height', 'bricks' ),
			'type'     => 'number',
			'units'    => true,
			'css'      => [
				[
					'property' => 'height',
					'selector' => '.lightbox-image',
				],
			],
		];


        $this->controls['lightboxImageBorderRadius'] = [
            'tab'     => 'content',
			'group'   => 'lightbox',
			'label'    => esc_html__( 'Image border Radius', 'bricks' ),
			'type'     => 'number',
			'units'    => true,
			'css'      => [
				[
					'property' => 'border-radius',
					'selector' => '.lightbox-image',
				],
			],
            'default' => '10px',
		];

        $this->controls['lightboxImageObjectFit'] = [
            'tab' => 'content',
            'group' => 'lightbox',
            'label' => esc_html__( 'Type', 'bricks' ),
            'type' => 'select',
            'css'      => [
				[
					'property' => 'object-fit',
					'selector' => '.lightbox-image',
				],
			],
            'options' => [
                'cover' => esc_html__( 'Cover', 'bricks' ),
                'contain' => esc_html__( 'Contain', 'bricks' ),
                'stretch' => esc_html__( 'Strech', 'bricks' ),
            ],
            'default' => 'cover',
        ];



    }

    public function enqueue_scripts()
    {

        wp_enqueue_script(
            'emuSplide', // Handle do script
            'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js', // Caminho do script
            '', // Dependências (se houver)
            '', // Versão
            true // Carregar no footer
        );
        wp_enqueue_script(
            'emuGalleryLightbox', // Handle do script
            PLUGIN_URL . 'assets/js/emu-gallery-lightbox.js', // Caminho do script
            '', // Dependências (se houver)
            '', // Versão
            true // Carregar no footer
        );
    }

    // Render element HTML
    public function render() {

    // Gerar as opções de breakpoint
    $breakpoint_options = Helpers::generate_swiper_breakpoint_data_options( $this->settings );

    // Verificar se há breakpoints e aplicar as opções
    if ( count( $breakpoint_options ) > 1 ) {
        // Remover 'slidesToShow' do array de opções
        unset( $this->settings['slidesToShow'] );
        // Adicionar as opções de breakpoints
        $this->settings['breakpoints'] = json_encode($breakpoint_options);
    }

    // Lógica para tratar as imagens
    if (isset($this->settings['images']['images'])) {

        $images2 = $this->settings['images']['images'];

        if (is_array($images2)) {
            $full_images = array_column($images2, 'full');
            $full_images_string = implode(', ', $full_images); // Junta os valores separados por vírgula

        } else {
            $full_images_string = $images2;
        }

    } elseif (isset($this->settings['images']) && is_array($this->settings['images'])) {

        var_dump($this->settings['images']);

        $images2 = $this->settings['images'];

        $full_images = array_column($images2, 'full');
        $full_images_string = implode(', ', $full_images); // Junta os valores separados por vírgula

    } else {
        $full_images_string = '';
    }

    // Adiciona a classe ao elemento root
    $this->set_attribute( '_root', 'class', 'emu-gallery-lightbox' );

    // Renderiza o HTML do elemento
    echo "<div {$this->render_attributes( '_root' )}>" ;

    // Renderiza o shortcode com os parâmetros necessários
    echo do_shortcode('[emu_gallery_lightbox images="' .
        esc_attr($full_images_string) .
        '" type="' . esc_attr($this->settings['type'] ?? 'loop') .
        '" perpage="' . esc_attr($this->settings['slidesToShow'] ?? '4') .
        '" autoplay="' . esc_attr($this->settings['autoplay'] ?? 'true') .
        '" gap="' . esc_attr(isset($this->settings['gap']) ? $this->settings['gap'] . 'px' : '20px') . 
        '" breakpoints="' . esc_attr($this->settings['breakpoints'] ?? '') . '" ]');

    echo '</div>';
}



}