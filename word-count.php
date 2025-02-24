<?php 
/**
 * Plugin Name: Word Count
 * Plugin URI: https://tanvir-word-count.com
 * Description: Count word from any wordpress post
 * Version: 1.0.0
 * Author: Md Tanvirul Islam
 * Author URI: tnavir.github
 * License: GPLv2 or later 
 * Text Domain: word-count
 * Domain Path: /languages/
 */

 /**
  * Run after the plugin is activated
  */
  function wordcount_activation_hook(){}
  register_activation_hook(__FILE__, "wordcount_activation_hook");

  /**
   * Run after the plugin is deactivated
   */
  function wrodcount_deactivation_hook(){
      
  }  
  register_deactivation_hook(__FILE__, "wrodcount_deactivation_hook");

  /**
   * Text domain
   */
function wordcount_load_textdomain(){
    load_plugin_textdomain('word-count', false, dirname(__FILE__ . "/languages/"));
}
   add_action("plugins_loaded", "wordcount_load_textdomain");


   function wordcount_count_words(  $content    ){

        $strip_content  = strip_tags($content);
        $wordn          = str_word_count($strip_content);
        $label          = __("Toal Number Of Word", "word-count");
        $label          = apply_filters('wordcount_heading', $label);
        $tag            = apply_filters('wordcount_tag', 'h2');
        $content        .= sprintf('<%s>%s: %s</%s>',$tag, $label, $wordn, $tag);

        return  $content;
   }
   add_filter( 'the_content', 'wordcount_count_words' );


   function wordcount_reading_time( $content ) { 

    $strip_content    = strip_tags( $content );
    $wordn            = str_word_count( $strip_content );
    // $wordn             = 900; 
    $reading_minute   = floor( $wordn / 200 );
    $reading_seconds  = floor( $wordn % 200 / ( 200 / 60 ) );
    $is_visible       = apply_filters('wordcount_display_reading_time', 1);

    if( $is_visible ){
        $label          = __("Toal Rading time", "word-count");
        $label          = apply_filters('wordcount_readingtime_heading', $label);
        $tag            = apply_filters('wordcount_readingtime_tag', 'h2');

        $content        .= sprintf('<%s>%s: %s minutes %s seconds</%s>',$tag, $label, $reading_minute, $reading_seconds, $tag);
    }

    return $content;
   }
   add_filter( 'the_content', 'wordcount_reading_time' );