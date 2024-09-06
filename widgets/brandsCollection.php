<?php

class Elementor_brandsCollection extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'brandsCollection';
    }

    public function get_title()
    {
        return esc_html__('Your Brand Collection', 'elementor-addon');
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

        $this->end_controls_section();

        $this->start_controls_section(
            'blocksSection',
            [
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'repeater_field',
            [
                'label' => esc_html__('Block', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'textdomain'),
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
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                    ],
                    [
                        'name' => 'url',
                        'label' => esc_html__('URL', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__('https://your-link.com', 'elementor-addon'),
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
            .brandCollection{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 25px;
            }

            .brandCollection .upperTitle {
                color: var(--blue, #006);
                text-align: center;
                font-size: 18px;
                font-weight: 300;
            }

            .brandCollection .text{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
            }
            .brandCollection .title {
                color: var(--black, #2c2d2c);
                text-align: center;
                font-size: 36px;
                font-weight: 700;
            }

            .brandCollection .regularText {
                color: var(--black, #2c2d2c);
                text-align: center;
                font-size: 18px;
                font-weight: 400;
                max-width: 800px;
            }

            .brandCollection .blocks {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 25px;
            }

            .brandCollection .block {
                display: flex;
                flex-direction: column;
                gap: 8px;
                background-color: #f5f5f5;
                border-radius: 20px;
                overflow: hidden;
            }

            .brandCollection .block .titleText {
                color: var(--black, #2c2d2c);
                text-align: center;
                font-size: 20px;
                font-weight: 600;
            }

            .brandCollection .block li {
                color: var(--black, #2c2d2c);
                font-size: 13px;
                font-weight: 400;
                padding-left: 10px;
            }

            .brandCollection .block img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                max-width: 100%;
            }

            @media only screen and (max-width: 600px) {
                .brandCollection .blocks {
                    grid-template-columns: repeat(1, minmax(0, 1fr));
                    gap: 25px;
                    padding: 20px;
                }

                .brandCollection .blocks li {
                    padding-bottom: 10px;
                }
            }
        </style>

        <div class="brandCollection pageWidthFG">
            <div class="text">
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
                    <a href="<?php echo esc_url( $item['url']['url'] ); ?>" class="block">
                        <img src="<?php echo $item['image']['url']; ?>" alt="" />
                        <h2 class="titleText"><?php echo $item['title']; ?></h2>
                        <p class="regularText"><?php echo $item['description']; ?></p>
                </a>
                <?php
                endforeach;
                ?>
            </div>
        </div>

<?php
    }
}
