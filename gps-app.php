<?php
/**
 * Plugin Name: GPS Application System (this one)
 * Plugin URI:
 * Description: Updated application and recruitment system for paper delivery.
 * Version: 1.0
 * Author: Sean Smith
 * Author URI: http://despace.design
 */

add_shortcode('gps-app-header', 'gps_app_header');

function gps_app_header() {
  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');

  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  $logo = $image[0];    

  return '
    
  <header id="delivery-masthead">
    <img class="site-brand" src="' . $logo .'" />
    <div id="burger">
      <div class="burger-line"></div>
      <div class="burger-line"></div>
      <div class="burger-line"></div>
    </div>
    <ul id="gps-menu">
    <div class="close">&times;</div>
    <li><a href="#how-it-works">How it works</a></li>
      <li><a href="#what-we-offer">What we offer</a></li>
      <li><a href="#faq">FAQs</a></li>
      <li><a href="' . get_home_url() . '/delivery-routes">Available Routes</a></li>
    </ul>
  </header>

  <div class="hero-image" style="background-image:linear-gradient(rgba(0, 0, 0, 0.7),rgba(255,255, 255, 1)),url(' . $featured_img_url . ');">
    <div class="hero-text"></div>
  </div>

  <div id="apply-cta"><a href="#zip-module">Apply Now</a></div>
  <script type="text/javascript" src="' . plugin_dir_url( __FILE__ ) . 'js/gps-app.js"></script>
  ';
}

add_shortcode('place-form', 'form_module');

function form_module() {
  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');

  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  $logo = $image[0];
  return '
  <div id="form-module">
    <h2>Apply Now</h2>
    <div id="zip-module">
      <p>Enter your zip code to begin your application.</p>
      <div>
        <input type="text" name="zip" id="enter-zip">
        <button id="start-app">Continue</button>
      </div>
    </div>
    

    <div id="form-here"></div>
  </div>

  <footer id="gps-footer">
  <div class="footer-text">
  <img class="site-brand" src="' . $logo .'" /><p>&copy; Gannett Co., Inc.'. date("Y") .' . All Rights Reserved.</p>
  <p><a href="' . get_home_url() . '/terms-of-use">Terms of use</a> | <a href="' . get_home_url() . '/cookie-policy">Cookie policy</a> | <a href="'. get_privacy_policy_url() . '">Privacy policy</a> | <a href="' . get_home_url() . '/ccpa">Your California privacy rights/privacy policy</a></p>
  <!-- <p><a href="' . get_home_url().'/cookie-policy">Do Not Sell My Personal Information/Cookie Settings</a></p>-->
  <!-- OneTrust Cookies Settings button start -->
  <button id="ot-sdk-btn" class="ot-sdk-show-settings">Cookie Settings</button>
  <!-- OneTrust Cookies Settings button end -->

  <!-- OneTrust Cookies Consent Notice start for gannett.com -->
  <script src="https://cdn.cookielaw.org/scripttemplates/otSDKStub.js"  type="text/javascript" charset="UTF-8" data-domain-script="623faaab-060d-4c8e-b1c5-1479d671de86" ></script>
  <script type="text/javascript">
  function OptanonWrapper() { }
  </script>
  <!-- OneTrust Cookies Consent Notice end for gannett.com -->

  </div>
    
   
  </footer>
  
  ';
}

add_shortcode('available-routes', 'available_routes');

function available_routes() {
  return '
    <div id="available-routes">
      <h3>Available Routes</h3>
      <div id="returned-routes"></div>
    </div>
    <script type="text/javascript" src="' . plugin_dir_url( __FILE__ ) . 'js/routes.js"></script>

  ';
}

function gps_app_style() {
        /** Enqueue Style Sheets */
        wp_enqueue_style( 'gps-app-style', plugin_dir_url( __FILE__ ) . '/css/gps-app.css', array(), '0.1', 'screen' );
}

add_action( 'wp_enqueue_scripts', 'gps_app_style' );
