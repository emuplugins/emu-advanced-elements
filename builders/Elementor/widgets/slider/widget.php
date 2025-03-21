<?php

class EmuSliderElementor extends \Elementor\Widget_Base {


        // WIDGET INFO
        public function get_name(): string {
            return 'emu_slider';
        }
    
        public function get_title(): string {
            return esc_html__( 'Emu Slider', 'elementor-addon' );
        }
    
        public function get_icon(): string {
            return 'eicon-code';
        }
    
        public function get_categories(): array {
            return [ 'emu-advanced-elements' ];
        }
    
        public function get_keywords(): array {
            return [ 'emu', 'slider', 'banner' ];
        }

        // ENQUEUE SCRIPTS AND STYLES

        public function get_script_depends(): array {
            return ['splidePackage', 'splideStarter', 'elementor-frontend'  ];
        }

        public function get_style_depends(): array {
            return [ 'emuSplideStyle', 'splideCSS' ];
        }

        // CONTROLS
    
        protected function register_controls(): void {
    
            $this->start_controls_section(
                'content_section',
                [
                    'label' => esc_html__( 'Content', 'textdomain' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
    

            
            $this->start_controls_tabs(
                'breakpointSizes'
            );

            $this->start_controls_tab(
                'breakpointSizes_desktop_tab',
                [
                    'label' => esc_html__( 'Desktop', 'textdomain' ),
                ]
            );
            
            $this->add_control(
                'breakpointSizes_desktop',
                [
                    'label' => esc_html__( 'Desktop breakpoint', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 1,
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'breakpointSizes_tablet_tab',
                [
                    'label' => esc_html__( 'Tablet', 'textdomain' ),
                ]
            );

            $this->add_control(
                'breakpointSizes_tablet',
                [
                    'label' => esc_html__( 'Tablet breakpoint', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'breakpointSizes_mobile_tab',
                [
                    'label' => esc_html__( 'Mobile', 'textdomain' ),
                ]
            );
            
            $this->add_control(
                'breakpointSizes_mobile',
                [
                    'label' => esc_html__( 'Mobile breakpoint', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                ]
            );
            
            $this->end_controls_tab();

            $this->end_controls_tabs();

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'bg_color',
            [
                'label' => esc_html__( 'Background', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => '--bg-color: {{VALUE}}'
                ],
            ]
            );

            // <IMAGE TABS

            $repeater->start_controls_tabs(
                'bg_img'
            );

            $repeater->start_controls_tab(
                'bg_desktop_tab',
                [
                    'label' => esc_html__( 'Desktop', 'textdomain' ),
                ]
            );
            
            $repeater->add_control(
            'bg_desktop',
                [
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'dynamic' => [
                    'active' => true,
                    ],
                ],
            );

            $repeater->end_controls_tab();

            $repeater->start_controls_tab(
                'bg_tablet_tab',
                [
                    'label' => esc_html__( 'Tablet', 'textdomain' ),
                ]
            );

            $repeater->add_control(
            'bg_tablet',
                [
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'dynamic' => [
                    'active' => true,
                    ],
                ]
            );
            $repeater->end_controls_tab();

            $repeater->start_controls_tab(
                'bg_mobile_tab',
                [
                    'label' => esc_html__( 'Mobile', 'textdomain' ),
                ]
            );
            
            $repeater->add_control(
            'bg_mobile',
                [
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'dynamic' => [
                    'active' => true,
                    ],
                ]
            );
            
            $repeater->end_controls_tab();

            $repeater->end_controls_tabs();

            // IMAGE TABS>

            $repeater->start_controls_tabs(
                'repeater_contents'
            );

            $repeater->start_controls_tab(
                'repeater_general',
                [
                    'label' => esc_html__( 'General', 'textdomain' ),
                ]
            );

            $repeater->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'List Title' , 'textdomain' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'link',
                [
                    'label' => esc_html__( 'Link', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'label_block' => true,
                    ]
                );
                
            $repeater->add_control(
                'button_text',
                [
                    'label' => esc_html__( 'Button Text', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Click Here!' , 'textdomain' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'button_link',
                [
                    'label' => esc_html__( 'Button Link', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'label_block' => true,
                ]
            );

            $repeater->end_controls_tab();

            $repeater->start_controls_tab(
                'repeater_content',
                [
                    'label' => esc_html__( 'Content', 'textdomain' ),
                ]
            );

            $repeater->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'List Content' , 'textdomain' ),
                'show_label' => false,
                ]
            );

            $repeater->end_controls_tab();

            $repeater->end_controls_tabs();

            
                
    
            $this->add_control(
                'list',
                [
                    'label' => esc_html__( 'Slider List', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'title' => esc_html__( 'Title #1', 'textdomain' ),
                            'content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
                        ],
                        [
                            'title' => esc_html__( 'Title #2', 'textdomain' ),
                            'content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );
    
            $this->end_controls_section();
            // configurações do slider


            $this->start_controls_section(
                'slider_options',
                [
                    'label' => esc_html__( 'Slider options', 'textdomain' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
            'slider_type',
            [
                'label' => esc_html__( 'Type', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'loop',
				'options' => [
					'loop' => esc_html__( 'Loop', 'textdomain' ),
					'slide'  => esc_html__( 'Slide', 'textdomain' ),
					'fade' => esc_html__( 'Fade', 'textdomain' ),
				]
            ]
            );
            $this->add_control(
            'rewind',
            [
                'label' => esc_html__( 'Rewind', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'false',
				'options' => [
					'true' => esc_html__( 'Yes', 'textdomain' ),
					'false'  => esc_html__( 'No', 'textdomain' ),
				]
            ]
            );
            $this->add_control(
            'drag',
            [
                'label' => esc_html__( 'Draggable', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'false',
				'options' => [
					'true' => esc_html__( 'Yes', 'textdomain' ),
					'false'  => esc_html__( 'No', 'textdomain' ),
				]
            ]
            );
            $this->add_control(
            'gap',
            [
                'label' => esc_html__( 'Space between', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                    'default' => 0,
            ]
            );
            $this->add_control(
            'arrows',
            [
                'label' => esc_html__( 'Display Arrows', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
				'options' => [
					'true' => esc_html__( 'Yes', 'textdomain' ),
					'false'  => esc_html__( 'No', 'textdomain' ),
				]
            ]
            );
            $this->add_control(
            'pagination',
            [
                'label' => esc_html__( 'Display dots', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
				'options' => [
					'true' => esc_html__( 'Yes', 'textdomain' ),
					'false'  => esc_html__( 'No', 'textdomain' ),
				]
            ]
            );
            $this->add_control(
            'autoplay',
            [
                'label' => esc_html__( 'Autoplay', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
				'options' => [
					'true' => esc_html__( 'Yes', 'textdomain' ),
					'false'  => esc_html__( 'No', 'textdomain' ),
				]
            ]
            );

            $this->add_control(
                'interval',
                [
                    'label' => esc_html__( 'Interval', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 100,
                    'max' => 10000,
                    'step' => 500,
                    'default' => 3000,
                ]
            );

            $this->start_controls_tabs(
                'per_page'
            );

            $this->start_controls_tab(
                'per_page_desktop_tab',
                [
                    'label' => esc_html__( 'Desktop', 'textdomain' ),
                ]
            );
            
            $this->add_control(
                'per_page_desktop',
                [
                    'label' => esc_html__( 'Items to show', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 1,
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'per_page_tablet_tab',
                [
                    'label' => esc_html__( 'Tablet', 'textdomain' ),
                ]
            );

            $this->add_control(
                'per_page_tablet',
                [
                    'label' => esc_html__( 'Items to show', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'per_page_mobile_tab',
                [
                    'label' => esc_html__( 'Mobile', 'textdomain' ),
                ]
            );
            
            $this->add_control(
                'per_page_mobile',
                [
                    'label' => esc_html__( 'Items to show', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                ]
            );
            
            $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->end_controls_section();




            // estilos

            $this->start_controls_section(
                'style_section',
                [
                    'label' => esc_html__( 'General', 'textdomain' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->start_controls_tabs(
                'styles_tabs'
            );

            // <TITULO

            $this->start_controls_tab(
                'title_styles',
                [
                    'label' => esc_html__( 'Title', 'textdomain' ),
                ]
            );

            $this->add_control(
                'title_align',
                [
                    'label' => esc_html__( 'Alignment', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'textdomain' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'textdomain' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'textdomain' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-content-title' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'selector' => '{{WRAPPER}} .emu-splide-content-title',
                ]
            );

            $this->add_control(
                'title_color',
            [
                'label' => esc_html__( 'Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .emu-splide-content-title' => 'color: {{VALUE}}'
                ],
            ]
            );

            $this->add_responsive_control(
                'title_margin',
                [
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'label' => esc_html__( 'Margin', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-content-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_tab();

            // TITULO>

            // <CONTEUDO

            $this->start_controls_tab(
                'content_styles',
                [
                    'label' => esc_html__( 'Content', 'textdomain' ),
                ]
            );

            $this->add_control(
                'content_align',
                [
                    'label' => esc_html__( 'Alignment', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'textdomain' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'textdomain' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'textdomain' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-html-wrapper' => 'text-align: {{VALUE}};',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'selector' => '{{WRAPPER}} .emu-splide-html-wrapper',
                ]
            );

            $this->add_control(
                'content_color',
            [
                'label' => esc_html__( 'Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .emu-splide-html-wrapper' => 'color: {{VALUE}}'
                ],
            ]
            );

            $this->add_responsive_control(
                'content_margin',
                [
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'label' => esc_html__( 'Margin', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-html-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_tab();

            // CONTEUDO>

            // <BOTAO

            $this->start_controls_tab(
                'button_styles',
                [
                    'label' => esc_html__( 'Button', 'textdomain' ),
                ]
            );

            $this->add_responsive_control(
                'button_align',
                [
                    'label' => esc_html__( 'Alignment', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'start' => [
                            'title' => esc_html__( 'Left', 'textdomain' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'textdomain' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'end' => [
                            'title' => esc_html__( 'Right', 'textdomain' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-button' => 'align-self: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'selector' => '{{WRAPPER}} .emu-splide-button',
                ]
            );

            $this->add_control(
                'button_color',
            [
                'label' => esc_html__( 'Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .emu-splide-button' => 'color: {{VALUE}}'
                ],
            ]
            );

            $this->add_control(
                'button_background',
            [
                'label' => esc_html__( 'Background Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .emu-splide-button' => 'background-color: {{VALUE}}'
                ],
            ]
            );

            $this->add_responsive_control(
                'button_padding',
                [
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'label' => esc_html__( 'Padding', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'button_margin',
                [
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'label' => esc_html__( 'Margin', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .emu-splide-button',
                ]
            );

            $this->add_responsive_control(
                'button_border_radius',
                [
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'label' => esc_html__( 'Border Radius', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_tab();

            // BOTAO>

            $this->end_controls_tabs();

            $this->end_controls_section();

            // SLIDER

            $this->start_controls_section(
                'slider_styles',
                [
                    'label' => esc_html__( 'Slider', 'textdomain' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );


            $this->add_responsive_control(
                'slider_padding',
                [
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'label' => esc_html__( 'padding', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'slider_width',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Width', 'textdomain' ),
                    'range' => [
                        'px' => [
                            'min' => 300,
                            'max' => 1920,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-wrapper' => '--content-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'slider_height',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'heigth', 'textdomain' ),
                    'range' => [
                        'px' => [
                            'min' => 300,
                            'max' => 1920,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-wrapper' => '--content-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // SLIDER

            // Arrows

            $this->start_controls_section(
                'arrow_styles',
                [
                    'label' => esc_html__( 'Arrows', 'textdomain' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'arrows_position',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Position', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
                    'range' => [
                        'px'=> [
                            'min' => -100,
                            'max' => 450,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-wrapper .splide__arrow' => 'top: calc({{SIZE}}{{UNIT}} + var(--slide-padding));',
                    ],
                ]
            );
            $this->add_responsive_control(
                'arrows_space',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Space between', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
                    'range' => [
                        'px'=> [
                            'min' => -100,
                            'max' => 450,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-wrapper .splide__arrows' => 'width: calc({{SIZE}}{{UNIT}} + 80px);',
                    ],
                ]
            );
            $this->add_responsive_control(
                'arrows_size',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Arrows size', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
                    'range' => [
                        'px'=> [
                            'min' => 10,
                            'max' => 40,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-wrapper .splide__arrow' => 'font-size:{{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'arrow_color',
            [
                'label' => esc_html__( 'Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .splide__arrow svg' => 'fill: {{VALUE}}'
                ],
            ]
            );

            $this->add_control(
                'arrow_background',
            [
                'label' => esc_html__( 'Background Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .splide__arrow' => 'background-color: {{VALUE}}'
                ],
            ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'arrows_border',
                    'selector' => '{{WRAPPER}} .splide__arrow',
                ]
            );

            $this->add_responsive_control(
                'arrows_border_radius',
                [
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'label' => esc_html__( 'Border Radius', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .splide__arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->end_controls_section();
            
            // Pagination

            $this->start_controls_section(
                'pagination_styles',
                [
                    'label' => esc_html__( 'Pagination', 'textdomain' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'pagination_position',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Position', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
                    'range' => [
                        'px'=> [
                            'min' => -100,
                            'max' => 450,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-wrapper .splide__pagination' => 'bottom:{{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'pagination_space',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Space between', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
                    'range' => [
                        'px'=> [
                            'min' => -100,
                            'max' => 450,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-wrapper .splide__pagination' => 'gap: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'pagination_size',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Pagination size', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'vh', 'vw', 'custom' ],
                    'range' => [
                        'px'=> [
                            'min' => 10,
                            'max' => 40,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .emu-splide-wrapper .splide__pagination__page' => 'width:{{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'pagination_color',
            [
                'label' => esc_html__( 'Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .splide__pagination__page' => 'background-color: {{VALUE}}'
                ],
            ]
            );

            $this->add_control(
                'pagination_active_color',
            [
                'label' => esc_html__( 'Active Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .splide__pagination__page.is-active' => 'background-color: {{VALUE}}'
                ],
            ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'arrows_border',
                    'selector' => '{{WRAPPER}} .splide__arrow',
                ]
            );

            $this->add_responsive_control(
                'arrows_border_radius',
                [
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'label' => esc_html__( 'Border Radius', 'textdomain' ),
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .splide__arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->end_controls_section();
            



    
        }

        // RENDER
    
        protected function render(): void {
            $settings = $this->get_settings_for_display();
            $slides = $settings['list'];

                if ($settings) : ?> 
                    <!-- Vamos montar o slider -->
                    <div class="emu-splide-wrapper">
                        <div class="splide" data-splide='<?php
                            // Definindo o array de configurações
                            $splide_config = array();

                            // Verificando e adicionando as configurações definidas
                            if (isset($settings['slider_type'])) $splide_config['type'] = $settings['slider_type'];
                            if (isset($settings['rewind'])) $splide_config['rewind'] = $settings['rewind'];
                            if (isset($settings['gap'])) $splide_config['gap'] = $settings['gap'];
                            if (isset($settings['autoplay'])) $splide_config['autoplay'] = $settings['autoplay'];
                            if (isset($settings['interval'])) $splide_config['interval'] = $settings['interval'];
                            if (isset($settings['pagination'])) $splide_config['pagination'] = $settings['pagination'];
                            if (isset($settings['arrows'])) $splide_config['arrows'] = $settings['arrows'];
                            if (isset($settings['drag'])) $splide_config['drag'] = $settings['drag'];

                            // Definindo os breakpoints
                            $splide_config['breakpoints'] = array();

                            // Verificando e configurando os breakpoints
                            if (isset($settings['breakpointSizes_mobile']) && $settings['breakpointSizes_mobile'] > 0 && $settings['breakpointSizes_mobile'] !== null) {
                                $splide_config['breakpoints'][$settings['breakpointSizes_mobile']] = array(
                                    'perPage' => isset($settings['per_page_mobile_items']) ? $settings['per_page_mobile_items'] : null
                                );
                            }
                            if (isset($settings['breakpointSizes_tablet']) && $settings['breakpointSizes_tablet'] > 0 && $settings['breakpointSizes_tablet'] !== null) {
                                $splide_config['breakpoints'][$settings['breakpointSizes_tablet']] = array(
                                    'perPage' => isset($settings['per_page_tablet_items']) ? $settings['per_page_tablet_items'] : null
                                );
                            }

                            // Garantindo que o desktop tenha um valor padrão de 1, caso não seja definido
                            $desktop_breakpoint = isset($settings['breakpointSizes_desktop']) ? $settings['breakpointSizes_desktop'] : 1;
                            $splide_config['breakpoints'][$desktop_breakpoint] = array(
                                'perPage' => isset($settings['per_page_desktop_items']) ? $settings['per_page_desktop_items'] : 1
                            );

                            // Gerando o JSON
                            echo json_encode($splide_config, JSON_FORCE_OBJECT);
                        ?>'>
            
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php foreach ($slides as $slide) : ?>
                                    <li class="splide__slide">
                                        <div class="emu-slide-content-wrapper <?php echo 'elementor-repeater-item-' . esc_attr($slide['_id']); ?>">
        
                                            <picture>
                                                <?php if (!empty($slide['bg_mobile']['url'])): ?>
                                                    <source media="(max-width: 767px)" srcset="<?= $slide['bg_mobile']['url']; ?>">
                                                <?php endif; ?>
        
                                                <?php if (!empty($slide['bg_tablet']['url'])): ?>
                                                    <source media="(max-width: 1024px)" srcset="<?= $slide['bg_tablet']['url']; ?>">
                                                <?php endif; ?>
        
                                                <?php if (!empty($slide['bg_desktop']['url'])): ?>
                                                    <img src="<?= $slide['bg_desktop']['url']; ?>" alt="Imagem do Slide">
                                                <?php endif; ?>
                                            </picture>
        
                                            <?php
                                            // Verificando se o link está definido
                                            if (!empty($slide['link'])) {

                                            // Gerar o HTML do link
                                            echo '<a href="' . $slide['url'] . '" class="slide-link"';

                                            // Adicionar o atributo target se 'is_external' for verdadeiro
                                            if ($slide['is_external']) {
                                                echo ' target="_blank"';
                                            }

                                            // Adicionar o atributo rel se 'nofollow' for verdadeiro
                                            if ($slide['nofollow']) {
                                                echo ' rel="nofollow"';
                                            }

                                            echo '></a>';
                                            }
                                            ?>
        
                                            <div class="emu-splide-content">
                                                <?php
                                                if (!empty($slide['title'])) {
                                                    echo '<h2 class="emu-splide-content-title">' . $slide['title'] . '</h2>';
                                                }
                                                if (!empty($slide['content'])) {
                                                    echo '<div class="emu-splide-html-wrapper">' . $slide['content'] . '</div>';
                                                }
                                                if (!empty($slide['button_text'])) {
                                                    echo '<a href="' . $slide['button_link'] . '" class="emu-splide-button">' . $slide['button_text'] . '</a>';
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
        
            <?php endif;
        }
        
    
        protected function content_template(): void {
            ?>
            <# if ( settings.list && settings.list.length ) { #>
                <div class="emu-splide-wrapper">
                    <div class="splide" data-splide='{
                        "type": "loop",
                        "perPage": 1,
                        "autoplay": false,
                        "interval": 3000,
                        "pagination": true,
                        "arrows": true,
                        "autoHeight": true,
                        "drag": false
                    }'>
                        <div class="splide__track">
                            <ul class="splide__list">
                                <# _.each( settings.list, function( slide ) { #>
                                    <li class="splide__slide">
                                        <div class="emu-slide-content-wrapper elementor-repeater-item-{{ slide._id }}">
        
                                            <picture>
                                                <# if ( slide.bg_mobile && slide.bg_mobile.url ) { #>
                                                    <source media="(max-width: 767px)" srcset="{{{ slide.bg_mobile.url }}}">
                                                <# } #>
        
                                                <# if ( slide.bg_tablet && slide.bg_tablet.url ) { #>
                                                    <source media="(max-width: 1024px)" srcset="{{{ slide.bg_tablet.url }}}">
                                                <# } #>
        
                                                <# if ( slide.bg_desktop && slide.bg_desktop.url ) { #>
                                                    <img src="{{{ slide.bg_desktop.url }}}" alt="Imagem do Slide">
                                                <# } #>
                                            </picture>
        
                                            <# if (slide.link) { #>
                                            <a href="{{{ slide.url }}}" class="slide-link"
                                                <# if (slide.is_external) { #> target="_blank" <# } #>
                                                <# if (slide.nofollow) { #> rel="nofollow" <# } #>
                                            ></a>
                                        <# } #>

        
                                            <div class="emu-splide-content">
                                                <# if ( slide.title ) { #>
                                                    <h2 class="emu-splide-content-title">{{{ slide.title }}}</h2>
                                                <# } #>
        
                                                <# if ( slide.content ) { #>
                                                    <div class="emu-splide-html-wrapper">{{{ slide.content }}}</div>
                                                <# } #>
        
                                                <# if ( slide.button_text && slide.button_link ) { #>
                                                    <a href="{{{ slide.button_link }}}" class="emu-splide-button">{{{ slide.button_text }}}</a>
                                                <# } #>
                                            </div>
                                        </div>
                                    </li>
                                <# }); #>
                            </ul>
                        </div>
                    </div>
                </div>
            <# } #>
            <?php
        }
        
        
    }