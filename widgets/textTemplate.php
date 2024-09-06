<?php

class Elementor_textTemplate extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'textTemplate';
    }

    public function get_title()
    {
        return esc_html__('Text Template', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-text';
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
            'wholeText',
            [
                'label' => esc_html__('Information', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
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
            .aboutUsContainer .textContainer {
                padding: 20px;
            }

            .aboutUsContainer .textContainer .link {
                color: var(--blue, #006);
                text-decoration-line: underline;
            }

            .aboutUsContainer .textContainer .h4 {
                padding-bottom: 10px;
            }

            .aboutUsContainer li {
                padding-left: 25px;
            }

            .aboutUsContainer a {
                display: flex;
                justify-content: center;
                padding-left: 25px;
            }

            @media only screen and (max-width: 600px) {
                .aboutUsContainer .textContainer {
                    padding: 15px;
                }

                .aboutUsContainer .textContainer {
                    justify-content: center;
                }
            }
        </style>

        <div class="pageWidthFG">
            <div class="greyBg aboutUsContainer">
                <div class="textContainer">
                    <p class="text">
                        <p><?php echo $settings['wholeText']; ?></p>
                    </p>
                </div>
            </div>
        </div>


<?php
    }
}
