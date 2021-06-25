
<?php
/**
 * Plugin Name: GPS Application System
 * Plugin URI:
 * Description: Updated application and recruitment system for paper delivery.
 * Version: 1.0
 * Author: Sean Smith
 * Author URI: http://despace.design
 */


//MARKET SUMMARY

add_shortcode('gps-form', 'gps_app');

function gps_app() {

  return '
    
    <div id="app-container">
      <header id="delivery-masthead">
        <div id="site-brand">Gannett Carriers</div>
        <ul>
          <li><a href="#">What we offer</a></li>
          <li><a href="#">How it works</a></li>
          <li><a href="#">FAQs</a></li>
        </ul>
      </header>
      <h1 id="apply-now">Apply to be a carrier</h1>
      <div id="zip-module">
        <p>Enter your zip code to begin your application.</p>
        <div>
          <input type="text" name="zip" id="enter-zip">
          <button id="start-app">Continue</button>
        </div>  
      </div>
      
    </div>

    <div id="apply-cta"><a href="#apply-now">Apply Now</a></div>

    <script type="text/javascript" src="' . plugin_dir_url( __FILE__ ) . 'js/gps-app.js"></script>
  ';
}

function gps_app_style() {
        /** Enqueue Style Sheets */
        wp_enqueue_style( 'gps-app-style', plugin_dir_url( __FILE__ ) . '/css/gps-app.css', array(), '0.1', 'screen' );
}

add_action( 'wp_enqueue_scripts', 'gps_app_style' );
