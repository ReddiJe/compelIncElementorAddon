<?php


class Elementor_review extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'review';
    }

    public function get_title()
    {
        return esc_html__('Review Slider', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-review';
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
            'section',
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
            'commentSection',
            [
                'label' => esc_html__('Comments', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'comments',
            [
                'label' => esc_html__('Accommodation', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => esc_html__('Name', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'spaceholder' => esc_html__('Write Name', ''),
                    ],
                    [
                        'name' => 'date',
                        'label' => esc_html__('Date', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::DATE_TIME,
                    ],
                    [
                        'name' => 'text',
                        'label' => esc_html__('Text', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'link',
                        'label' => esc_html__('Source URL', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::URL,
                    ],
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Avatar', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'label_block' => true,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
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
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $accommodations = $settings['comments'];
        $unique_id = 'splide-' . uniqid();

?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

        <style>
            .reviewContainer .reviewInner {
                display: flex;
                justify-content: center;
                align-items: start;
                gap: 25px;
                width: 100%;
                padding: 25px;
            }

            .reviewContainer .reviewInner img {
                height: 100px;
                width: 100px;
                border-radius: 50px;
                object-fit: cover;
            }

            .reviewContainer .reviewInnerText {
                display: flex;
                justify-content: start;
                align-items: start;
                flex-direction: column;
                gap: 25px;
                max-width: 800px;
            }

            .reviewContainer .reviewText {
                font-size: 1.25rem;
                text-align: left;
            }

            .reviewContainer .nameCompanyDate a {
                color: var(--blue);
            }

            .reviewContainer .splide__arrow svg {
                fill: var(--blue) !important;
            }

            .reviewContainer .splide__arrow--prev {
                left: 4em;
            }

            .reviewContainer .splide__arrow--next {
                right: 4em;
            }

            .reviewContainer a {
                text-decoration: underline !important;
            }

            .reviewContainer .reviewText {
                font-size: 0.9rem;
                margin: 0px 10px;
                justify-content: center;
                text-align: left;
            }

            .reviewContainer .splide__arrow--prev {
                left: 0.5em;
                top: 70%;
            }

            .reviewContainer .splide__arrow--next {
                right: 0.5em;
                top: 70%;
            }

            .reviewContainer .upperTitle {
                text-align: center;
            }

            .reviewContainer .subtitle {
                text-align: center;
            }

            .reviewContainer .textInner h2 {
                text-align: center;
            }

            @media screen and (min-width: 1600px) {
                @media (min-width: 1600px) {
                    .accommodationsContainer {
                        padding: 25px 10%;
                    }
                }
            }

            @media screen and (max-width: 600px) {
                .nameCompanyDate {
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                }

                .textInner h2 {
                    font-size: 23px;
                }

                .subtitle {
                    font-size: 15px;
                }

                .name {
                    text-align: center;
                    justify-content: center;
                }

                .date {
                    margin-left: 50px;
                    margin-bottom: 10px;
                    text-align: center;
                    justify-content: center;
                }

                .reviewInner {
                    gap: 10px;
                    padding: 10px;
                    text-align: center;
                    justify-content: center;
                }

                .reviewInner img {
                    display: none;
                }

                .reviewInnerText {
                    gap: 10px;
                    max-width: 70%;
                }

                .nameCompanyDate {
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                }
            }
        </style>

        <div class="pageWidthFG reviewContainer">
            <div class="pageWidth greyBg">
                <div class="textInner">
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

                <section id="<?php echo esc_attr($unique_id); ?>" class="splide" aria-labelledby="carousel-heading">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach ($accommodations as $accommodation) { ?>
                                <li class="splide__slide">
                                    <div class="reviewInner">
                                        <img src="<?php echo $accommodation['image']['url']; ?>" alt="">
                                        <div class="reviewInnerText">
                                            <div class="nameCompanyDate">
                                                <p class="name"><b><?php echo esc_html($accommodation['name']); ?></b></p>
                                                <p class="date"><?php echo esc_html($accommodation['date']); ?></p>
                                                <?php if (!empty($accommodation['link']['url'])): ?>
                                                    <a href="<?php echo esc_html($accommodation['link']['url']); ?>">Source</a>
                                                <?php endif; ?>
                                                
                                            </div>
                                            <p class="reviewText">
                                                <?php echo esc_html($accommodation['text']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                </section>
            </div>
        </div>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var splide = new Splide('#<?php echo esc_js($unique_id); ?>', {
                    rewind: true,
                });
                splide.mount();
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

<?php
    }
}
