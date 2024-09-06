<?php

class Elementor_blocksWithIcons extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'blocksWithIcons';
    }

    public function get_title()
    {
        return esc_html__('Blocks With Icons', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-button';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['hello', 'world'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'titleSection',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'upperTitle',
            [
                'label' => esc_html__('Upper Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'regularText',
            [
                'label' => esc_html__('Regular Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'blocksWithIcons',
            [
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'repeater_field',
            [
                'label' => esc_html__('Product', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Icon', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'pdf_file',
                        'label' => esc_html__('Choose PDF File', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'media_type' => 'application/pdf',
                        'default' => [
                            'url' => '',
                        ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Content Tab End

        // Style Tab Start

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_section();

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <style>
            .blocksWithIconsContainer {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
            }

            .blocksWithIconsContainer h2,
            .blocksWithIconsContainer p {
                text-align: center;
                max-width: 800px;
            }

            .blocksWithIconsContainer .iconsContainer {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 25px;
                padding-top: 25px;
                max-width: 100%;
            }

            .blocksWithIconsContainer .iconsContainer .blockWithIcon {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 10px;
                width: 450px;
                max-width: 100%;
                cursor: pointer;
            }

            .blocksWithIconsContainer .iconsContainer .blockWithIcon img {
                max-width: 100%;
                max-height: 400px;
                object-fit: contain;
            }

            .blocksWithIconsContainer .iconsContainer .blockWithIcon * {
                text-align: center;
            }

            .blocksWithIconsContainer .iconsContainer h4 {
                color: var(--blue, #006);
                font-size: 24px;
                font-weight: 500;
                text-decoration: underline;
            }
        </style>

        <div class="pageWidthFG">
            <div class="greyBg blocksWithIconsContainer">
                <h2>
                    <?php echo $settings['title']; ?>
                </h2>
                <p class="regularText">
                    <?php echo $settings['regularText']; ?>
                </p>
                <div class="iconsContainer">
                    <?php foreach ($settings['repeater_field'] as $item) { ?>
                        <a class="blockWithIcon" href="<?php echo $item['pdf_file']['url']; ?>" download>
                            <img src="<?php echo $item['image']['url']; ?>" alt="">
                            <h4>
                                <?php echo $item['title']; ?>
                            </h4>
                            <p>
                                <?php echo $item['description']; ?>
                            </p>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

<?php
    }
}
