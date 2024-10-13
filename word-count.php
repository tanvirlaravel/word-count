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


   function wordcount_count_words($content){
       $text = "Hello tnavir " . $content;
    //    return '';
        return  $text;
   }
   add_filter('the_content', 'wordcount_count_words');