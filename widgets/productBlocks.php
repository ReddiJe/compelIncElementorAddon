<?php

class Elementor_productBlocks extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'productBlocks';
    }

    public function get_title()
    {
        return esc_html__('Product Blocks', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-product-add-to-cart';
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
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Type of Product', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'count',
            [
                'label' => esc_html__('Count Of Items', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'productSection',
            [
                'label' => esc_html__('Product Blocks', 'elementor-addon'),
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
                        'label' => esc_html__('Price', 'elementor-addon'),
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
?>

        <style>
            .collectionContainer {
                padding: 15px;
            }

            .collectionContainer .collectionHeading {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 0 25px 0;
            }

            .collectionContainer .collectionGrid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 25px;
                width: 100%;
                max-width: 100%;
            }

            .collectionContainer .collectionGrid .product {
                display: flex;
                justify-content: start;
                align-items: start;
                flex-direction: column;
                gap: 10px;
                width: 100%;
            }

            .collectionContainer .collectionGrid .product * {
                max-width: 100%;
            }

            .collectionContainer .collectionGrid .product h4 {
                font-size: 18px;
                font-weight: 700;
            }

            .collectionContainer .collectionGrid .product p {
                font-size: 14px;
                font-weight: 300;
            }

            .collectionContainer .collectionGrid .product img {
                width: 100%;
                max-width: 100%;
                object-fit: contain;
                height: 100%;
            }

            .collectionContainer .collectionGrid .product.no-text img {
                object-fit: cover;
            }

            .collectionContainer .collectionGrid .product .imgContainer {
                width: 100%;
                height: 250px;
                border-radius: 15px;
                background: #fff;
            }

            @media screen and (min-width: 1600px) {
                .collectionContainer .collectionGrid .product .imgContainer {
                    height: 300px;
                }
            }

            @media screen and (max-width: 600px) {

                .collectionContainer .collectionGrid {
                    grid-template-columns: repeat(2, 1fr);
                    grid-gap: 15px;
                }

                .collectionContainer .collectionGrid .product .imgContainer {
                    height: 150px;
                }

                .collectionContainer .collectionGrid .product {
                    gap: 5px;
                }
            }
        </style>

        <div class="pageWidthFG">
            <div class="collectionContainer greyBg">
                <div class="collectionHeading">
                    <p class="title">
                        <?php echo $settings['title']; ?>
                    </p>
                    <p class="count">
                        <?php echo $settings['count']; ?>
                    </p>
                </div>
               <div class="collectionGrid">
                <?php
                foreach ($settings['repeater_field'] as $item) :
                    $no_text_class = (empty($item['title']) && empty($item['description'])) ? 'no-text' : ''; ?>
                    <div class="product <?php echo $no_text_class; ?>">
                        <div class="imgContainer">
                            <img src="<?php echo $item['image']['url']; ?>" alt="">
                        </div>
                        <?php if (!empty($item['title'])) : ?>
                            <h4><?php echo $item['title']; ?></h4>
                        <?php endif; ?>
                        <?php if (!empty($item['description'])) : ?>
                            <p><?php echo $item['description']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
            </div>
        </div>

<?php
    }
}
