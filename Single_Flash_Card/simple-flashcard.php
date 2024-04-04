<?php
/**
 * Plugin Name: Simple Flashcard
 * Plugin URI: 
 * Description: A simple plugin to create interactive flash cards with customizable colors.
 * Version: 1.1
 * Author: Charan Gudla
 * Author URI: https://charangudla.com/
 */

function simple_flashcard_enqueue_scripts() {
    wp_enqueue_style('simple-flashcard-style', plugin_dir_url(__FILE__) . 'flashcard-style.css');
    wp_enqueue_script('simple-flashcard-script', plugin_dir_url(__FILE__) . 'flashcard-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'simple_flashcard_enqueue_scripts');

function simple_flashcard_shortcode($atts) {
    $atts = shortcode_atts(array(
        'question' => 'Question?',
        'answer' => 'Answer.',
        'front_color' => '#fff', // Default color for the front of the flashcard
        'back_color' => '#007bff', // Default color for the back of the flashcard
    ), $atts);

    ob_start();
    ?>
    <div class="flashcard">
        <div class="flashcard-inner">
            <div class="flashcard-front" style="background-color: <?php echo esc_attr($atts['front_color']); ?>;">
                <?php echo esc_html($atts['question']); ?>
            </div>
            <div class="flashcard-back" style="background-color: <?php echo esc_attr($atts['back_color']); ?>; color: white;">
                <?php echo esc_html($atts['answer']); ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('simple_flashcard', 'simple_flashcard_shortcode');
