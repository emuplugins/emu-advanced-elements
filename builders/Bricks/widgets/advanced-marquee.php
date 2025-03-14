<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Emu_Marquee_Widget extends \Bricks\Element {
    // Element properties
    public $category     = 'Emu Advanced Elements'; // Use predefined element category 'general'
    public $name         = 'emu-marquee'; // Make sure to prefix your elements
    public $icon         = 'ti-layout-slider'; // Themify icon font class
    public $css_selector = '.emu-marquee-wrapper'; // Default CSS selector

    // Return localised element label
    public function get_label() {
        return esc_html__( 'Emu Marquee', 'bricks' );
    }

    // Set builder control groups
    public function set_control_groups() {
        $this->control_groups['settings'] = [
            'title' => esc_html__( 'Settings', 'bricks' ),
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

        $this->controls['width'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Width', 'bricks' ),
            'type' => 'number',
            'default' => 300,
			'unit' => 'px',
			'css' => [
        [
          'property' => '--item-width',
        ],
      ],
		'inline' => true,
        ];

        $this->controls['height'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Height', 'bricks' ),
            'type' => 'number',
            'default' => 100,
			'unit' => 'px',
			'css' => [
        [
          'property' => '--item-height',
        ],
      ],
		'inline' => true,
        ];

		$this->controls['gap'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Space Between', 'bricks' ),
            'type' => 'number',
            'default' => 20,
			'unit' => 'px',
			'css' => [
        [
          'property' => '--item-gap',
        ],
      ],
		'inline' => true,
        ];

        $this->controls['duration'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Duration (seconds)', 'bricks' ),
            'type' => 'number',
            'default' => 90,
			'unit' => 's',
			'css' => [
        [
          'property' => '--animation-duration',
        ],
      ],
		'inline' => true,
        ];

		 $this->controls['border_radius'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Border Radius', 'bricks' ),
            'type' => 'number',
            'default' => 0,
			 'unit' => 'px',
			'css' => [
        [
          'property' => '--border-radius',
        ],
      ],
		'inline' => true,
        ];

        $this->controls['object_fit'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Object Fit', 'bricks' ),
            'type' => 'select',
            'options' => [
                'cover' => esc_html__( 'Cover', 'bricks' ),
                'contain' => esc_html__( 'Contain', 'bricks' ),
                'fill' => esc_html__( 'Fill', 'bricks' ),
            ],
            'default' => 'cover',
        ];

        $this->controls['direction'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Direction', 'bricks' ),
            'type' => 'select',
            'options' => [
                'left' => esc_html__( 'Left', 'bricks' ),
                'right' => esc_html__( 'Right', 'bricks' ),
            ],
            'default' => 'left',
        ];
        $this->controls['split-slider'] = [
            'tab' => 'content',
            'group' => 'settings',
            'label' => esc_html__( 'Split Slider', 'bricks' ),
            'type' => 'select',
            'options' => [
                'True' => esc_html__( 'true' , 'bricks' ),
                'False' => esc_html__( 'false', 'bricks' ),
            ],
            'default' => 'false',
        ];
    }

    // Render element HTML
    public function render() {

		if (isset($this->settings['images']['images'])) {
			
			$images2 = $this->settings['images']['images'];

			if (is_array($images2)) {

				$full_images = array_column($images2, 'full');
				$full_images_string = implode(', ', $full_images); // Junta os valores separados por vírgula

			} else {

				$full_images_string = $images2;

			}
		}elseif (isset($this->settings['images']) && is_array($this->settings['images'])) {
			
				var_dump($this->settings['images']);
			
				$images2 = $this->settings['images'];

				$full_images = array_column($images2, 'full');
				$full_images_string = implode(', ', $full_images); // Junta os valores separados por vírgula

			} else {

				$full_images_string = '';

			}

		
        $root_classes[] = 'emu-marquee-wrapper';

        // Add 'class' attribute to element root tag
        $this->set_attribute( '_root', 'class', $root_classes );

        // Render element HTML
        echo "<div {$this->render_attributes( '_root' )}>";
        echo do_shortcode('[emu_marquee 
                            images="' . esc_attr($full_images_string) . '" 
                            width="' . esc_attr($this->settings['width']) . '" 
                            height="' . esc_attr($this->settings['height']) . '" 
                            gap="' . esc_attr($this->settings['gap']) . '" 
                            duration="' . esc_attr($this->settings['duration']) . '" 
                            border_radius="' . esc_attr($this->settings['border_radius']) . '" 
                            object_fit="' . esc_attr($this->settings['object_fit']) . '" 
                            direction="' . esc_attr($this->settings['direction']) . '" 
                            split="' . esc_attr($this->settings['split-slider']) . '"]');
                            
        echo '</div>';
;
    }
}