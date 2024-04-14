<?php
/**
 * Plugin Name: Simple Flashcard deck
 * Plugin URI:
 * Description: A simple plugin to create interactive flash cards with customizable colors and a navigable deck.
 * Version: 1.2
 * Author: Charan Gudla
 * Author URI: https://charangudla.com
 */
 
 function simple_flashcard_enqueue_scripts() {
     wp_enqueue_style('simple-flashcard-style', plugin_dir_url(__FILE__) . 'flashcard-style.css');
     wp_enqueue_script('simple-flashcard-script', plugin_dir_url(__FILE__) . 'flashcard-script.js', array('jquery'), null, true);
     wp_enqueue_script('simple-flashcard-deck-script', plugin_dir_url(__FILE__) . 'flashcard-deck-script.js', array('jquery'), null, true);
 }
 add_action('wp_enqueue_scripts', 'simple_flashcard_enqueue_scripts');
 
 function flashcard_deck_shortcode($atts, $content = null) {
     static $deck_id = 0;
     $deck_id++;
     $GLOBALS['flashcard_count'] = 0; // Reset flashcard count for each deck
 
     $content = do_shortcode(shortcode_unautop($content));
 
     ob_start();
     ?>
     <div class="flashcard-deck" id="flashcard-deck-<?php echo $deck_id; ?>">
         <div class="flashcard-controls">
             <button class="flashcard-prev" data-deck-id="<?php echo $deck_id; ?>">&laquo; Previous</button>
             <button class="flashcard-next" data-deck-id="<?php echo $deck_id; ?>">Next &raquo;</button>
         </div>
         <div class="flashcard-wrapper">
             <?php echo $content; ?>
         </div>
     </div>
     <?php
     return ob_get_clean();
 }
 add_shortcode('flashcard_deck', 'flashcard_deck_shortcode');
 
 function simple_flashcard_shortcode($atts) {
     $GLOBALS['flashcard_count']++;
     $flashcard_number = $GLOBALS['flashcard_count'];
 
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
                 <div class="flashcard-number">Card #<?php echo $flashcard_number; ?></div>
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
 