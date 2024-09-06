<?php

class Elementor_nonStandartImages extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nonStandartImages';
    }

    public function get_title()
    {
        return esc_html__('Non Standard Images', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-image-box';
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

        $this->end_controls_section();

        $this->start_controls_section(
            'image_section_1',
            [
                'label' => esc_html__('Image 1', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image_1',
            [
                'label' => esc_html__('Choose Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'description_1',
            [
                'label' => esc_html__('Description', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'top_number_1',
            [
                'label' => esc_html__('Top Number', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'left_number_1',
            [
                'label' => esc_html__('Left Number', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'z_index_1',
            [
                'label' => esc_html__('Z-Index', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'image_section_2',
            [
                'label' => esc_html__('Image 2', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image_2',
            [
                'label' => esc_html__('Choose Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'description_2',
            [
                'label' => esc_html__('Description', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'top_number_2',
            [
                'label' => esc_html__('Top Number', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'left_number_2',
            [
                'label' => esc_html__('Left Number', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'z_index_2',
            [
                'label' => esc_html__('Z-Index', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'image_section_3',
            [
                'label' => esc_html__('Image 3', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image_3',
            [
                'label' => esc_html__('Choose Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'description_3',
            [
                'label' => esc_html__('Description', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'top_number_3',
            [
                'label' => esc_html__('Top Number', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'left_number_3',
            [
                'label' => esc_html__('Left Number', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'z_index_3',
            [
                'label' => esc_html__('Z-Index', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
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
            .nonStandardImages {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 25px;
                padding: 50px 25px;
            }

            .nonStandardImagesContainer {
                position: relative;
                height: 550px;
                width: 100%;
                max-width: 1360px;
            }

            .nonStandardImagesContainer .nonStandard {
                position: absolute;
                display: flex;
                height: 360px;
                width: 540px;
                padding: 10px;
                background-size: cover;
                font-size: 14px;
            }

            .image1 {
                justify-content: start;
                align-items: end;
                z-index: 1;
                top: 125px;
                left: 0;
            }

            .image2 {
                justify-content: end;
                align-items: start;
                z-index: 2;
                top: 0;
                left: 50%;
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%)
            }

            .image3 {
                justify-content: end;
                align-items: end;
                z-index: 3;
                top: 75px;
                right: 0;
            }

            @media screen and (max-width: 600px) {
                .nonStandardImages {
                    gap: 15px;
                    padding: 15px;
                }

                .nonStandardImagesContainer {
                    height: 560px;
                    width: 100%;
                }

                .nonStandardImagesContainer .nonStandard {
                    position: absolute;
                    display: flex;
                    height: 220px;
                    width: 330px;
                    padding: 7px;
                    font-size: 12px;
                }

                .image1 {
                    justify-content: end;
                    align-items: start;
                    top: 0;
                    left: -15px;
                }

                .image2 {
                    justify-content: end;
                    align-items: start;
                    top: 30%;
                    right: -15px;
                    left: auto;
                    -webkit-transform: translateX(0);
                    transform: translateX(0);
                }

                .image3 {
                    justify-content: end;
                    align-items: end;
                    top: 60%;
                    left: -15px;
                }
            }
        </style>

        <div class="pageWidthFG">
            <div class="greyBg nonStandardImages wow fadeInUp pageWidthFG">
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
                <div class="nonStandardImagesContainer">
                    <div class="nonStandard image1" style="top: <?php echo $settings['top_number_1']; ?>%; left: <?php echo $settings['left_number_1']; ?>%; z-index: <?php echo $settings['z_index_1']; ?>; background-image: url(<?php echo esc_url($settings['image_1']['url']); ?>);"><?php echo esc_html($settings['description_1']); ?></div>
                    <div class="nonStandard image2" style="top: <?php echo $settings['top_number_2']; ?>%; left: <?php echo $settings['left_number_2']; ?>%; z-index: <?php echo $settings['z_index_2']; ?>; background-image: url(<?php echo esc_url($settings['image_2']['url']); ?>);"><?php echo esc_html($settings['description_2']); ?></div>
                    <div class="nonStandard image3" style="top: <?php echo $settings['top_number_3']; ?>%; left: <?php echo $settings['left_number_3']; ?>%; z-index: <?php echo $settings['z_index_3']; ?>; background-image: url(<?php echo esc_url($settings['image_3']['url']); ?>);"><?php echo esc_html($settings['description_3']); ?></div>
                </div>
                <a href="<?php echo $settings['url']; ?>" class="bluelink"><?php echo $settings['urlText']; ?></a>
            </div>
        </div>

<?php
    }
}
