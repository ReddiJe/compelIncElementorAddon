<?php

class Elementor_switchSideImage extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'switchSideImage';
    }

    public function get_title()
    {
        return esc_html__('Switch Side Image', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-featured-image';
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
            'textSide',
            [
                'label' => esc_html__('Text Settings', 'elementor-addon'),
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
            'textForButton',
            [
                'label' => esc_html__('Text For Button', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('insert text for button', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('URL to embed', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-addon'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'imageSide',
            [
                'label' => esc_html__('Image Settings', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'switch_position',
            [
                'label' => esc_html__('Switch Image Position', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Right', 'elementor-addon'),
                'label_off' => esc_html__('Left', 'elementor-addon'),
                'default' => 'left',
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
            .imageWithText {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 25px;
                padding: 0;
            }

            .informationBlock {
                display: flex;
                flex-direction: column;
                justify-content: start;
                align-items: start;
                gap: 15px;
            }

            .imageWithText img {
                width: 100%;
                max-width: 49%;
                object-fit: cover;
            }

            .imageWithText img.left {
                display: none;
            }

            .imageWithText.left img.left {
                display: block;
            }

            .imageWithText.left img.right {
                display: none;
            }

            .imageWithText.right .informationBlock {
                padding-left: 25px;
            }

            .rightImage .leftImageInner {
                display: none;
            }

            .leftImage .rightImageInner {
                display: none;
            }

            .imageWithText .informationBlock {
                display: flex;
                flex-direction: column;
                justify-content: start;
                align-items: start;
                width: 100%;
                min-width: 49%;
                padding-right: 15px;
                padding-top: 10px;
                gap: 15px;
            }

            .blueButton {
                background-color: #000066;
                color: #ffffff;
                padding: 10px 30px;
            }

            @media screen and (max-width: 600px) {
                .imageWithText {
                    flex-direction: column;
                }

                .imageWithText img {
                    max-width: 100%;
                }

                .imageWithText .informationBlock {
                    max-width: 100%;
                    padding: 10px;
                    display: flex;
                    flex-direction: column;
                    justify-content: start;
                    align-items: start;
                    gap: 10px;
                }
            }
        </style>

        <div class="pageWidthFG">
            <div class="greyBg imageWithText <?php if ('yes' === $settings['switch_position']) {
                                                    echo 'right';
                                                } else {
                                                    echo 'left';
                                                } ?> wow fadeInUp pageWidthFG">
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="left">
                <div class="informationBlock">
                    <?php if (!empty($settings['upperTitle'])) : ?>
                        <p class="upperTitle">
                            <?php echo $settings['upperTitle']; ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($settings['title'])) : ?>
                        <h2>
                            <?php echo $settings['title']; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['subtitle'])) : ?>
                        <h4 class="subtitle">
                            <?php echo $settings['subtitle']; ?>
                        </h4>
                    <?php endif; ?>

                    <?php if (!empty($settings['description'])) : ?>
                        <p class="regularText">
                            <?php echo $settings['description']; ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($settings['url'] != "") {
                    ?>
                        <a class="blueButton" href="<?php echo esc_url($settings['url']); ?>">
                            <?php echo esc_html($settings['textForButton']); ?>
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="right">
            </div>
        </div>
<?php
    }
}
