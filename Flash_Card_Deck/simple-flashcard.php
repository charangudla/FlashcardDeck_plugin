<?php
/**
 * Plugin Name: Simple Flashcard
 * Plugin URI: http://example.com/simple-flashcard
 * Description: A simple plugin to create interactive flash cards with customizable colors and a navigable deck.
 * Version: 1.2
 * Author: Your Name
 * Author URI: http://example.com
 */

function simple_flashcard_enqueue_scripts() {
    wp_enqueue_style('simple-flashcard-style', plugin_dir_url(__FILE__) . 'flashcard-style.css');
    wp_enqueue_script('simple-flashcard-script', plugin_dir_url(__FILE__) . 'flashcard-script.js', array('jquery'), null, true);
    wp_enqueue_script('simple-flashcard-deck-script', plugin_dir_url(__FILE__) . 'flashcard-deck-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'simple_flashcard_enqueue_scripts');

function simple_flashcard_shortcode($atts) {
    $atts = shortcode_atts(array(
        'question' => 'Question?',
        'answer' => 'Answer.',
        'front_color' => '#fff',
        'back_color' => '#007bff',
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

function flashcard_deck_shortcode($atts, $content = null) {
    $content = do_shortcode(shortcode_unautop($content)); // Process nested shortcodes

    ob_start();
    ?>
    <div class="flashcard-deck">
        <div class="flashcard-controls">
            <button class="flashcard-prev">&laquo; Previous</button>
            <button class="flashcard-next">Next &raquo;</button>
        </div>
        <div class="flashcard-wrapper">
            <?php echo $content; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('flashcard_deck', 'flashcard_deck_shortcode');
