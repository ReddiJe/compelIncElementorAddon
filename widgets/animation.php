<?php

class Elementor_animation extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'animation';
    }

    public function get_title()
    {
        return esc_html__('Animation', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-animation';
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
            'image',
            [
                'label' => esc_html__('Choose Content', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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




        $this->end_controls_section();

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <style>
            .animationContainerOut {
                width: 100%;
                height: calc(100vh - 84px);
                transition: all linear 300ms;
                overflow: hidden;
            }

            .animationContainer {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            video.animatedInitialisation {
                width: 100%;
                opacity: 1;
                height: auto;

            }
        </style>
        <div class="animationContainerOut pageWidthFG" id="video">
            <div class="animationContainer greyBg">
            <video id="myVideo" autoplay playsinline muted loop class="animatedInitialisation pageWidthFG" preload="auto">
                    <source src="https://compelinc.ca/wp-content/uploads/2024/06/WhiteBg-1.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let video = document.getElementById('video');

                setTimeout(function () {
                    video.style.height = '0';
                    video.style.padding = '0px 15px';
                }, 12800);
            });
        </script>

        <?php
    }
}
