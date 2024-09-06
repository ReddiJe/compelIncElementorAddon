<?php

class Elementor_colorsTemplate extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'colorsTemplate';
    }

    public function get_title()
    {
        return esc_html__('Template for colors', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-global-colors';
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
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'repeater_field',
            [
                'label' => esc_html__('Colors', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ]
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
            .colorsContainer {
                display: flex;
                flex-direction: column;
                gap: 25px;
            }

            .colorsContainer .imageContainer {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 15px;
            }

            .colorsContainer .imageContainer img {
                width: 250px;
                height: 250px;
                object-fit: cover;
                border-radius: 5px;
            }

            @media screen and (max-width: 600px) {
                .richText h2 {
                    text-align: center;
                }

                .colorsContainer .imageContainer {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    align-items: center;
                    gap: 15px;
                }
            }
        </style>

        <div class="pageWidthFG">
            <div class="greyBg colorsContainer richText pageWidth">
                <h2><?php echo $settings['title']; ?></h2>
                <div class="imageContainer">
                    <?php foreach ($settings['repeater_field'] as $item) : ?>
                        <img src="<?php echo $item['image']['url']; ?>" alt="" />
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php
    }
}
