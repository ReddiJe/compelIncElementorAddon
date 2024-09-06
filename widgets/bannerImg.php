<?php

class Elementor_bannerImg extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'bannerImg';
    }

    public function get_title()
    {
        return esc_html__('Banner Section', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-banner';
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
                'label' => esc_html__('Banner', 'elementor-addon'),
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
            'title',
            [
                'label' => esc_html__('Text On The Banner', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
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
            .headerCollectionContainer {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 15px;
                height: 150px;
                block-size: cover;
                background-position: center center;
                position: relative;
            }

            .headerCollectionContainer h1 {
                padding: 15px;
                background: rgba(0, 0, 0, 0.5);
                color: #fff;
                max-width: 100%;
                text-align: center;
            }

            .headerCollectionContainer .arrow{
            position: absolute;
            top: 25px;
            left: 25px;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

            @media screen and (max-width: 600px) {
                .headerCollectionContainer {
                    padding: 15px 0;
                }

                .headerCollectionContainer .arrow{
            top: 15px;
            left: 15px;
            height: 30px;
            width: 30px;
        }

        .headerCollectionContainer .arrow .svg{
            height: 15px;
            width: 15px;
        }
            }
        </style>
        <div class="pageWidthFG">
            <div class="headerCollectionContainer pageWidth" style="background-image: url(<?php echo $settings['image']['url']; ?>);">
                <h1><?php echo $settings['title']; ?></h1>
                <span class="arrow" name="action" onclick="history.back()" type="submit" value="Cancel">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.598246 8.02997C0.457796 7.88934 0.378906 7.69872 0.378906 7.49997C0.378906 7.30122 0.457796 7.11059 0.598246 6.96997L6.59825 0.969968C6.66691 0.896281 6.74971 0.837179 6.84171 0.796187C6.93371 0.755196 7.03302 0.733154 7.13372 0.731378C7.23443 0.729601 7.33446 0.748125 7.42784 0.785846C7.52123 0.823567 7.60607 0.879712 7.67728 0.950931C7.7485 1.02215 7.80465 1.10698 7.84237 1.20037C7.88009 1.29376 7.89862 1.39379 7.89684 1.49449C7.89506 1.59519 7.87302 1.69451 7.83203 1.78651C7.79104 1.87851 7.73193 1.96131 7.65825 2.02997L2.93825 6.74997L17.1282 6.74997C17.3272 6.74997 17.5179 6.82899 17.6586 6.96964C17.7992 7.11029 17.8782 7.30106 17.8782 7.49997C17.8782 7.69888 17.7992 7.88965 17.6586 8.0303C17.5179 8.17095 17.3272 8.24997 17.1282 8.24997L2.93825 8.24997L7.65825 12.97C7.73193 13.0386 7.79104 13.1214 7.83203 13.2134C7.87302 13.3054 7.89506 13.4047 7.89684 13.5054C7.89861 13.6061 7.88009 13.7062 7.84237 13.7996C7.80465 13.893 7.7485 13.9778 7.67728 14.049C7.60607 14.1202 7.52123 14.1764 7.42784 14.2141C7.33446 14.2518 7.23443 14.2703 7.13372 14.2686C7.03302 14.2668 6.93371 14.2447 6.84171 14.2037C6.74971 14.1628 6.66691 14.1037 6.59825 14.03L0.598246 8.02997Z" fill="black"/>
                  </svg>
            </span>
            </div>
        </div>

<?php
    }
}
