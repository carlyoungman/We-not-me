<?php
if (! defined('ABSPATH')) : exit; endif;
$select_hero_type = get_sub_field('hero_select');
switch ($select_hero_type) {
    case 'Image':
            image();
        break;
    case 'Slider':
            slider();
        break;
    case 'Video':
            video();
        break;
  default:
}
