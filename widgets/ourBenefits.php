<?php

class Elementor_ourBenefits extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'ourBenefits';
    }

    public function get_title()
    {
        return esc_html__('Benefits List', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-apps';
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
            'description',
            [
                'label' => esc_html__('Description', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('URL', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'urlText',
            [
                'label' => esc_html__('Text For URL', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image For Background', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'blocksBenefits',
            [
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'repeater_field',
            [
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'subtitle',
                        'label' => esc_html__('Subtitle', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
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
        $background_image = !empty($settings['image']['url']) ? $settings['image']['url'] : 'none';
?>


        <style>
            .BlocksWithBackground {
                padding: 75px 150px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 75px;
                background-size: cover;
                background-color: #F5F5F5;
                <?php if ($background_image !== 'none') : ?>background-image: url(<?php echo $background_image; ?>);
                <?php endif; ?>
            }

            .BlocksWithBackground .blocks {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                justify-content: center;
                gap: 25px;
                flex-wrap: wrap;
            }

            .BlocksWithBackground .block {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 10px;
                max-width: 300px;
            }

            .BlocksWithBackground .block * {
                text-align: center;
                color: #006;
            }

            @media screen and (max-width: 600px) {
                .BlocksWithBackground {
                    padding: 25px 15px;
                    gap: 15px;
                }

                .BlocksWithBackground .blocks {
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
            }
        </style>

        <div class="pageWidthFG">
            <div class="greyBg BlocksWithBackground wow fadeInUp pageWidthFG">
                <div class="textContainerCentered">
                <?php if (!empty($settings['upperTitle'])): ?>
                <p class="upperTitle">
                    <?php echo $settings['upperTitle']; ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($settings['title'])): ?>
                <h2>
                    <?php echo $settings['title']; ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($settings['subtitle'])): ?>
                <h4 class="subtitle">
                    <?php echo $settings['subtitle']; ?>
                </h4>
            <?php endif; ?>

            <?php if (!empty($settings['description'])): ?>
                <p class="regularText">
                    <?php echo $settings['description']; ?>
                </p>
            <?php endif; ?>
                </div>
                <div class="blocks">
                    <?php
                    foreach ($settings['repeater_field'] as $item) :
                    ?>
                        <div class="block">
                            <h2><?php echo $item['title']; ?></h2>
                            <p class="regularText"><?php echo $item['subtitle']; ?></p>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <a href="<?php echo $settings['url']; ?>" class="bluelink"><?php echo $settings['urlText']; ?></a>
            </div>
        </div>

<?php
    }
}
