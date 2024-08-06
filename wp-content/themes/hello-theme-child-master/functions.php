<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */
if (!session_id()) {
        session_start();
    }

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );

add_action( 'wp_enqueue_scripts', 'cxc_enqueue_my_styles_scripts' );

function cxc_enqueue_my_styles_scripts() {

	/* Enqueue google font & bootstrap css */
	wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css' );
	wp_enqueue_style( 'hero-slide.css', get_stylesheet_directory_uri() . '/css/hero-slide.css' );

	/* Enqueue bootstrap & custom script */
	wp_enqueue_script( 'bootstrap-script', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'heroslide-script', get_stylesheet_directory_uri() . '/js/heroslide.js', array('jquery'), '1.0.0', true );

	/* Localize a registered custom-script with Ajax URL for a JavaScript variable. */
	wp_localize_script( 'custom-script', 'myAjax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );
}

//include 'cxc-widget-actions.php';

//-----------------------------------------------------
// Include Some File
//-----------------------------------------------------
include 'Elements/product-iso.php';

add_shortcode('product_percentage', 'product_percentage_function');
function product_percentage_function() {
	ob_start();

global $product; 
 $stock = $product->get_stock_status();
 $product_type = $product->get_type();
 $sale_price  = 0;
 $regular_price = 0;
 if($product_type == 'variable'){
  $product_variations = $product->get_available_variations();
  foreach ($product_variations as $kay => $value){
   if($value['display_price'] < $value['display_regular_price']){
    $sale_price = $value['display_price'];
    $regular_price = $value['display_regular_price'];
   }
  }
  if($regular_price > $sale_price && !empty($sale_price)) {
   $product_sale = intval(((intval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
   if ($product_sale > 5 ) {
   echo '<span class="onsale"> <span class="sale-icon" aria-hidden="true" data-icon="&#xe0da"></span> ' . esc_html($product_sale) . '%</span>';
   }
  }
 }else{  
  $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
  $sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
  if($regular_price > 5 && !empty($sale_price)) {
   $product_sale = intval(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
   echo '<span class="onsale"> <span class="sale-icon" aria-hidden="true" data-icon="&#xe0da"></span> ' . esc_html($product_sale) . '%</span>';
  }
 }

	return ob_get_clean();
}

add_shortcode('product_upsell', 'product_upsell_function');
function product_upsell_function() {
ob_start();
global $product;
    $product_id = $product->is_type('variation') ? $product->get_parent_id() : $product->get_id();

 $product = wc_get_product($product_id);
    $upsell_ids = $product->get_upsell_ids();

    foreach ($upsell_ids as $upsell_id) {
        $upsell_product = wc_get_product($upsell_id);

        if ($upsell_product) {
            $upsell_name = $upsell_product->get_name();
            $upsell_price = $upsell_product->get_price();
			echo '<span class="subscription-upsell-price">';
			echo '<span class="upsell-price-txt"> '.wc_price($upsell_price).' </span>';
			echo '<span class="upsell-name-txt"> '.$upsell_name.' </span>';
			echo '</span>';
        }
    }

return ob_get_clean();
}

add_shortcode('add_to_cart_url_dsavsdv', 'custom_add_to_cart_url');
function custom_add_to_cart_url() {
ob_start();
global $product;
    $product_id = $product->is_type('variation') ? $product->get_parent_id() : $product->get_id();
	
    $upsell_ids = get_post_meta($product_id, '_upsell_ids', true);

    if (!empty($upsell_ids)) {

        $main_product_id = $product_id;
        $product_ids = array($main_product_id);
        $product_ids = array_merge($product_ids, $upsell_ids);
        $product_name = $product->get_name();
       echo '<a class="subscription-custom-btn" href="'.site_url() . '/cart/?add-to-cart=' . implode(',', $product_ids).'"> Buy '.$product_name.' </a>';
    }

	return ob_get_clean();
}

function webroom_add_multiple_products_to_cart( $url = false ) {
        
// Make sure WC is installed, and add-to-cart qauery arg exists, and contains at least one comma.

        if ( ! class_exists( 'WC_Form_Handler' ) || empty( $_REQUEST['add-to-cart'] ) || false === strpos( $_REQUEST['add-to-cart'], ',' ) ) {
                return;
        }

        
// Remove WooCommerce's hook, as it's useless (doesn't handle multiple products).

        remove_action( 'wp_loaded', array( 'WC_Form_Handler', 'add_to_cart_action' ), 20 );

        $product_ids = explode( ',', $_REQUEST['add-to-cart'] );
        $count       = count( $product_ids );
        $number      = 0;

        foreach ( $product_ids as $id_and_quantity ) {
                
// Check for quantities defined in curie notation (<product_id>:<product_quantity>)

                
                $id_and_quantity = explode( ':', $id_and_quantity );
                $product_id = $id_and_quantity[0];

                $_REQUEST['quantity'] = ! empty( $id_and_quantity[1] ) ? absint( $id_and_quantity[1] ) : 1;

                if ( ++$number === $count ) {
                        
// Ok, final item, let's send it back to woocommerce's add_to_cart_action method for handling.

                        $_REQUEST['add-to-cart'] = $product_id;

                        return WC_Form_Handler::add_to_cart_action( $url );
                }

                $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $product_id ) );
                $was_added_to_cart = false;
                $adding_to_cart    = wc_get_product( $product_id );

                if ( ! $adding_to_cart ) {
                        continue;
                }

                $add_to_cart_handler = apply_filters( 'woocommerce_add_to_cart_handler', $adding_to_cart->get_type(), $adding_to_cart );

                
// Variable product handling

                if ( 'variable' === $add_to_cart_handler ) {
                        woo_hack_invoke_private_method( 'WC_Form_Handler', 'add_to_cart_handler_variable', $product_id );

                
// Grouped Products

                } elseif ( 'grouped' === $add_to_cart_handler ) {
                        woo_hack_invoke_private_method( 'WC_Form_Handler', 'add_to_cart_handler_grouped', $product_id );

                
// Custom Handler

                } elseif ( has_action( 'woocommerce_add_to_cart_handler_' . $add_to_cart_handler ) ){
                        do_action( 'woocommerce_add_to_cart_handler_' . $add_to_cart_handler, $url );

                
// Simple Products

                } else {
                        woo_hack_invoke_private_method( 'WC_Form_Handler', 'add_to_cart_handler_simple', $product_id );
                }
        }
}

// Fire before the WC_Form_Handler::add_to_cart_action callback.

add_action( 'wp_loaded', 'webroom_add_multiple_products_to_cart', 15 );


/**
 * Invoke class private method
 *
 * @since   0.1.0
 *
 * @param   string $class_name
 * @param   string $methodName
 *
 * @return  mixed
 */

function woo_hack_invoke_private_method( $class_name, $methodName ) {
        if ( version_compare( phpversion(), '5.3', '<' ) ) {
                throw new Exception( 'PHP version does not support ReflectionClass::setAccessible()', __LINE__ );
        }

        $args = func_get_args();
        unset( $args[0], $args[1] );
        $reflection = new ReflectionClass( $class_name );
        $method = $reflection->getMethod( $methodName );
        $method->setAccessible( true );

        
//$args = array_merge( array( $class_name ), $args );

        $args = array_merge( array( $reflection ), $args );
        return call_user_func_array( array( $method, 'invoke' ), $args );
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' ); 
function woocommerce_add_to_cart_button_text_single() {
    return __( 'Add to bag only', 'woocommerce' ); 
}

add_action( 'woocommerce_before_shop_loop', 'show_production_variations_on_shop_page' );
function show_production_variations_on_shop_page() {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_add_to_cart', 30 );
}

add_shortcode('category_swatches', 'category_swatches_function');
function category_swatches_function() {
ob_start();
global $product;
if ( $product->is_type( 'variable' ) ) {
    $default_attributes = $product->get_default_attributes();
 
  
    woocommerce_variable_add_to_cart( $product, $default_attributes, array(), true );
} else {
    woocommerce_simple_add_to_cart();
}
return ob_get_clean();
}


add_shortcode('webby_login', 'webby_login_function');

function webby_login_function(){
        ob_start();
?>
<a href="https://portal.feelme.com/signup" class="header-login-button">
<?php
if(is_user_logged_in()){
 ?> <span>My Account</span> <?php
} else {
        ?> <span>Login</span> <?php
}
?>

<i aria-hidden="true" class="far fa-user"></i>
</a>
<?php
        return ob_get_clean();
}

add_filter( 'woocommerce_get_checkout_url', 'my_change_checkout_url', 30 );

function my_change_checkout_url( $url ) {
        global $woocommerce;
        
    $items = $woocommerce->cart->get_cart();
 if(!empty($items)){
        //$url = "https://feelme-test.chargebee.com/hosted_pages/checkout?";
        //$key = 0;
        $yourCartArray= array();
        foreach($items as $item => $values) { 
                $product =  wc_get_product( $values['product_id']);
            //$product_id = $_product->get_id();
            //$qty = $values['quantity']; 
                if( $product->is_type( 'simple' ) ){
                $price_id = get_field('item_price_id', $values['product_id']);
                } else {
                        $price_id = get_post_meta( $values['variation_id'], 'period', true );
                }
                $yourCartArray[] = array('id' => $price_id);
            //$url .= 'subscription_items[item_price_id]['.$key.']='.$price_id.'&subscription_items[quantity]['.$key.']='.$qty.'&';
            //$key++;
        }
        $data = json_encode($yourCartArray);
        $encodedData = urlencode($data);
        $currentPath = get_woocommerce_currency();

        // Check if the path URL contains 'currency=EUR'
        if (strpos($currentPath, 'EUR') !== false) {
            // Replace 'USD' with 'EUR' in the encoded data
                $encodedData = str_replace('USD', 'EUR', $encodedData);
        }

        $url = "https://portal.feelme.com/signup?cart=" . $encodedData;
}
   return $url;
}


add_action( 'woocommerce_variation_options_pricing', 'bbloomer_add_custom_field_to_variations', 10, 3 );
 
function bbloomer_add_custom_field_to_variations( $loop, $variation_data, $variation ) {
   woocommerce_wp_text_input( array(
'id' => 'period[' . $loop . ']',
'class' => 'short',
'label' => __( 'Period', 'woocommerce' ),
'value' => get_post_meta( $variation->ID, 'period', true )
   ) );
}
 
// -----------------------------------------
// 2. Save custom field on product variation save
 
add_action( 'woocommerce_save_product_variation', 'bbloomer_save_custom_field_variations', 10, 2 );
 
function bbloomer_save_custom_field_variations( $variation_id, $i ) {
   $custom_field = $_POST['period'][$i];
   if ( isset( $custom_field ) ) update_post_meta( $variation_id, 'period', esc_attr( $custom_field ) );
}
 
// -----------------------------------------
// 3. Store custom field value into variation data
 
add_filter( 'woocommerce_available_variation', 'bbloomer_add_custom_field_variation_data' );
 
function bbloomer_add_custom_field_variation_data( $variations ) {
   $variations['period'] = '<div class="woocommerce_custom_field">Custom Field: <span>' . get_post_meta( $variations[ 'variation_id' ], 'period', true ) . '</span></div>';
   return $variations;
}


add_filter( 'woocommerce_add_to_cart_validation', 'bbloomer_only_one_in_cart', 9999 );
function bbloomer_only_one_in_cart( $passed ) {
   wc_empty_cart();
   return $passed;
}

// add_filter( 'woocommerce_is_purchasable', 'disable_add_to_cart_if_product_is_in_cart', 10, 2 );
// function disable_add_to_cart_if_product_is_in_cart ( $is_purchasable, $product ){
//     // Loop through cart items checking if the product is already in cart
//     foreach ( WC()->cart->get_cart() as $cart_item ){
//         if( $cart_item['data']->get_id() == $product->get_id() ) {
//             return false;
//         }
//     }
//     return $is_purchasable;
// }

// add_filter( 'woocommerce_product_single_add_to_cart_text', 'already_in_cart_single_product' );
// function already_in_cart_single_product( $label) {
//    foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
//       $product = $values['data'];
//       if( get_the_ID() == $product->get_id() ) {
//          $label = __('Product already in Cart', 'woocommerce');
//       }else{
//         $label = __('Product already in Cart', 'woocommerce');
//       }
//    } 
//    return $label;
// }

add_filter( 'woocommerce_product_single_add_to_cart_text', 'already_in_cart_single_product' );

function already_in_cart_single_product( $label ) {
   global $product;

   // Check if the product is in the cart
   if ( WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product->get_id() ) ) ) {
      // Product is already in the cart, so disable the button
      $label = __('Product already in Cart', 'woocommerce');
   }

   return $label;
}

add_action( 'wp_footer', 'already_in_cart_single_product_check_script' );

function already_in_cart_single_product_check_script() {
   global $product;

   // Check if the product is in the cart
   if ( is_product() && WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product->get_id() ) ) ) {
        ?>
        <script>
                jQuery(document).ready(function(){
                        setTimeout(function(){
                        if( jQuery('.cart .e-atc-qty-button-holder > .single_add_to_cart_button').length > 0 ){
                                jQuery('.cart .e-atc-qty-button-holder > .single_add_to_cart_button').attr('disabled', true);
                        }
                        },110);
                });
        </script>
        <?php
   }

}

add_action( 'woocommerce_after_add_to_cart_button', 'woo_show_some_text_2', 20 );
 
function woo_show_some_text_2() {
        global $product;
        if ( WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product->get_id() ) ) ) {
    echo '<a href="'.wc_get_cart_url().'" class="elementor-button elementor-button--view-cart elementor-size-md prod-view-cart-btn">
			<span class="elementor-button-text">View cart</span>
        </a>';
        }
}




// add_shortcode('buy_now_url', 'custom_buy_now_url');

function custom_buy_now_url() {
ob_start();
global $product;
$product_id = $product->is_type('variation') ? $product->get_parent_id() : $product->get_id();
    if ($product->is_purchasable()) {
        if ($product->is_type('simple')) {
            $price_id = get_field('item_price_id', $product_id);
        } else {
        // get_post_meta( $variations[ 'variation_id' ], 'period', true );
        $currentPath = get_woocommerce_currency();
        $variations = $product->get_available_variations();
        if(!empty($variations)) {
                $webby_variations = array();
                foreach($variations as $variation){
                        $variation_id = $variation['variation_id'];
                        $price_id = get_post_meta($variation['variation_id'], 'period', true);
                        if (strpos($currentPath, 'EUR') !== false) {
                                $price_id = str_replace('USD', 'EUR', $price_id);
                        }
                        //  $cartArray = array('id' => $price_id);
                        // $data = json_encode($cartArray);
                        $cartArray = '[{"id":"' . $price_id . '"}]';
                        $encodedData = urlencode($cartArray);
                        // $encodedData = urlencode($data);
                        if(!empty($_SESSION['click_id'])) {
                                $encodedData = urlencode($cartArray)."&ref=".$_SESSION['click_id'];
                        }
                        if(!empty($_SESSION['ref_id'])) {
                                $encodedData = urlencode($cartArray)."&ref=".$_SESSION['ref_id'];
                        }
                
                        $url = "https://portal.feelme.com/signup?cart=" .$encodedData ;
                        $webby_variations[$variation['variation_id']] = $url;
                }
        }
        ?>
        <script>
                jQuery(document).ready(function($){
                var webby_variations = $.parseJSON('<?php echo json_encode($webby_variations); ?>');
                        $( 'input.variation_id' ).change( function(){
                                if( '' != $(this).val() ) {
                                        var var_id = $(this).val();
                                        var new_link = webby_variations[var_id];
                                        $('#price-id').attr('href', new_link);
                                }
                        });
                })
        </script>
        <?php
            $variation_id = $variations[1]['variation_id'];
            $price_id = get_post_meta($variation_id, 'period', true);
        }  
     
        $currentPath = get_woocommerce_currency();
        
        if (strpos($currentPath, 'EUR') !== false) {
                $price_id = str_replace('USD', 'EUR', $price_id);
        }

        // [{ id: "device-plan-EUR-Every-6-months" }];
        // $cartArray = array('id' => '['.$price_id.']');
        $cartArray = '[{"id":"' . $price_id . '"}]';
        // $data = json_encode($cartArray);
        $encodedData = urlencode($cartArray);
        
        if(!empty($_SESSION['click_id'])) {
                $encodedData = urlencode($cartArray)."&ref=".$_SESSION['click_id'];
        }
        if(!empty($_SESSION['ref_id'])) {
                $encodedData = urlencode($cartArray)."&ref=".$_SESSION['ref_id'];
        }
        
        $url = "https://portal.feelme.com/signup?cart=" .$encodedData ;

        echo '<a id="price-id" class="elementor-button elementor-button--view-cart elementor-size-md prod-view-cart-btn" href="'.$url.'"> Buy now </a>';
    } else {
        echo '<p id="price-id" class="elementor-button elementor-button--view-cart elementor-size-md prod-view-cart-btn">Product is not purchasable<p>';
    }
    return ob_get_clean();
}

// Display the minimum price for variable products
add_filter('woocommerce_variable_sale_price_html', 'woosuite_custom_variable_product_price', 10, 2 );
add_filter('woocommerce_variable_price_html', 'woosuite_custom_variable_product_price', 10, 2 );

function woosuite_custom_variable_product_price( $price, $product ) {
    // Check if it's a variable product
    if ( $product->is_type('variable') ) {
        // Get all variations for the product
        $variations = $product->get_available_variations();

        // Loop through variations to find the minimum price
        $min_price = null;
        foreach ( $variations as $variation ) {
            $variation_price = floatval($variation['display_price']);

            // Set the initial minimum price or update it if a lower price is found
            if ( $min_price === null || $variation_price < $min_price ) {
                $min_price = $variation_price;
            }
        }

        // Display the minimum price
        if ( $min_price !== null ) {
            $price = wc_price($min_price);
        }
    }

    return $price;
}


function set_click_id() {
        if(isset($_REQUEST['clickid'])) {
                $_SESSION['click_id'] = $_REQUEST['clickid'];
        }
}
add_action('init', 'set_click_id', 11);

function set_ref_id() {
        if(isset($_REQUEST['ref'])) {
                $_SESSION['ref_id'] = $_REQUEST['ref'];
        //        print_r($_SESSION);
        }
}
add_action('init', 'set_ref_id', 11);

function register_my_session()
{
  if( !session_id() )
  {
    session_start();
  }
}

add_action('init', 'register_my_session');


// rading time
function reading_time() {
$post_id = get_the_ID();
$content = get_post_field( 'post_content', $post_id );
$word_count = str_word_count( strip_tags( $content ) );
$readingtime = ceil($word_count / 260);
if ($readingtime == 1) {
$timer = " min read";
} else {
$timer = " min read";
}
$totalreadingtime = $readingtime . $timer;
return $totalreadingtime;
}
add_shortcode('wpbread', 'reading_time');


// Shortcode to output custom PHP in Elementor
function wpc_elementor_shortcode( $atts ) {
ob_start();
$post_count = $GLOBALS['wp_query']->found_posts;
echo   $post_count . " articles";
return ob_get_clean();
}
add_shortcode( 'my_elementor_php_output', 'wpc_elementor_shortcode');

add_shortcode('product_percentage_mk', 'product_percentage_function_mk');
function product_percentage_function_mk(){
ob_start(); 
global $product;
if ($product && is_a($product, 'WC_Product')) {
$id = $product->get_id(); // Get the product ID
$is_on_sale = $product->is_on_sale(); // find product on sale or not
if ($is_on_sale) {
        if ( $product->is_type( 'simple' ) ) {
                $regular_price_mk =   $product->get_regular_price();
                $sale_price_mk =  $product->get_sale_price();
                $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
        }else{
                $max_percentage = 0;
                foreach ( $product->get_children() as $child_id ) {
                        $variation = wc_get_product( $child_id );
                        $price = $variation->get_regular_price();
                        $sale = $variation->get_sale_price();
                        if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
                        if ( $percentage > $max_percentage ) {
                                $max_percentage = $percentage;
                        }
                } 
        } 
        if ( $max_percentage > 0 ) echo "SAVE " . round($max_percentage) ."%" ;
}
} else {
        echo 'Product not found or not a valid product.';
}

return ob_get_clean();
}

// function for passing ref
add_shortcode('change_acf_value', 'change_acf_value_function');
// function change_acf_value_function(){
//         ob_start(); 
//         global $product;
//         $productId = $product->get_id();
//         if ($product && is_a($product, 'WC_Product')) {
//         if ( $product->is_type( 'simple' ) ) {
//                 echo 'this is work'. '<br>';
//                 $postMeta = wc_get_product( $productId );
//                 echo $postMeta;
//                 if(!empty($_SESSION['ref_id'])) {
//                         echo "&ref=".$_SESSION['ref_id'];
//                         $GetacfValu = get_field('product_link', $productId);
//                         $updateFild =  update_field( 'product_link', $GetacfValu."&ref=".$_SESSION['ref_id'], $productId );
//                         print_r ($updateFild);
//                 }
//         }
//         } else {
//                 echo 'Product not found or not a valid product.';
//         }
//         return ob_get_clean();
// }
function change_acf_value_function(){
ob_start(); 
global $product;
if ($product && is_a($product, 'WC_Product')) {
        $productId = $product->get_id();
        if ($product->is_type('simple')) {
                // $postMeta = wc_get_product( $productId );
                // echo $postMeta;
                $currentPath = get_woocommerce_currency();
        if (!empty($_SESSION['ref_id'])) {
                
                // product link----------------------------------
                $productLinkAcf = get_field('product_link', $productId);// Get the current value of the ACF field
                if (strpos($productLinkAcf, '&customer[cf_customer_fields]=') !== false) {
                $productLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $productLinkAcf);// Remove everything after (and including) &ref
                }// Check if the ACF field already contains &ref
                $productLinkNewAcf = $productLinkAcf . "&customer[cf_customer_fields]=" . $_SESSION['ref_id'];// Append the new &ref parameter
                if (strpos($currentPath, 'EUR') !== false) {
                        $productLinkNewAcf = str_replace('USD', 'EUR', $productLinkNewAcf);
                }else{
                        $productLinkNewAcf = str_replace('EUR', 'USD', $productLinkNewAcf);
                }
                update_field('product_link',$productLinkNewAcf, $productId);// Update the ACF field with the new value


                // subscription link---------------------------------------------
                $subscriptionLinkAcf = get_field('subscription_link', $productId);
                if (strpos($subscriptionLinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $subscriptionLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $subscriptionLinkAcf);
                }
                $subscriptionLinkNewAcf = $subscriptionLinkAcf . "&customer[cf_customer_fields]=" . $_SESSION['ref_id'];
                if (strpos($currentPath, 'EUR') !== false) {
                        $subscriptionLinkNewAcf = str_replace('USD', 'EUR', $subscriptionLinkNewAcf);
                }else{
                        $subscriptionLinkNewAcf = str_replace('EUR', 'USD', $subscriptionLinkNewAcf);
                }
                update_field('subscription_link',$subscriptionLinkNewAcf, $productId);


                  // monthly link----------------------------------------
                $monthlyLinkAcf = get_field('monthly', $productId);
                if (strpos($monthlyLinkAcf,'customer[cf_customer_fields]') !== false) {
                        $monthlyLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $monthlyLinkAcf);
                }
                $monthlyLinkNewAcf = $monthlyLinkAcf . "&customer[cf_customer_fields]=" . $_SESSION['ref_id'];
                if (strpos($currentPath, 'EUR') !== false) {
                        $monthlyLinkNewAcf = str_replace('USD', 'EUR', $monthlyLinkNewAcf);
                }else{
                        $monthlyLinkNewAcf = str_replace('EUR', 'USD', $monthlyLinkNewAcf);
                }
                update_field('monthly',$monthlyLinkNewAcf, $productId);


                 // 6 monthly----------------------------
                $monthly6LinkAcf = get_field('6_monthly', $productId);
                if (strpos($monthly6LinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $monthly6LinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $monthly6LinkAcf);
                }
                $monthly6LinkNewAcf = $monthly6LinkAcf . "&customer[cf_customer_fields]=" . $_SESSION['ref_id'];
                if (strpos($currentPath, 'EUR') !== false) {
                        $monthly6LinkNewAcf = str_replace('USD', 'EUR', $monthly6LinkNewAcf);
                }else{
                        $monthly6LinkNewAcf = str_replace('EUR', 'USD', $monthly6LinkNewAcf);
                }
                update_field('6_monthly',$monthly6LinkNewAcf, $productId);


                // Yearly link------------------------------
                $yearlyLinkAcf = get_field('yearly', $productId);
                if (strpos($yearlyLinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $yearlyLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $yearlyLinkAcf);
                }
                $yearlyLinkNewAcf = $yearlyLinkAcf . "&customer[cf_customer_fields]=" . $_SESSION['ref_id'];
                if (strpos($currentPath, 'EUR') !== false) {
                        $yearlyLinkNewAcf = str_replace('USD', 'EUR', $yearlyLinkNewAcf);
                }else{
                        $yearlyLinkNewAcf = str_replace('EUR', 'USD', $yearlyLinkNewAcf);
                }
                update_field('yearly',$yearlyLinkNewAcf, $productId);

                 // Lifetime link----------------------------------
                $lifetimeLinkAcf = get_field('lifetime', $productId);
                if (strpos($lifetimeLinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $lifetimeLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $lifetimeLinkAcf);
                }
                $lifetimeLinkNewAcf = $lifetimeLinkAcf . "&customer[cf_customer_fields]=" . $_SESSION['ref_id'];
                if (strpos($currentPath, 'EUR') !== false) {
                        $lifetimeLinkNewAcf = str_replace('USD', 'EUR', $lifetimeLinkNewAcf);
                }else{
                        $lifetimeLinkNewAcf = str_replace('EUR', 'USD', $lifetimeLinkNewAcf);
                }
                update_field('lifetime',$lifetimeLinkNewAcf, $productId);

                // subscription page link--------------------------------
                $subscriptionpageLinkAcf = get_field('subscription_cta_link', $productId);
                if (strpos($subscriptionpageLinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $subscriptionpageLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $subscriptionpageLinkAcf);
                }
                $subscriptionpageLinkNewAcf = $subscriptionpageLinkAcf . "&customer[cf_customer_fields]=" . $_SESSION['ref_id'];
                if (strpos($currentPath, 'EUR') !== false) {
                        $subscriptionpageLinkNewAcf = str_replace('USD', 'EUR', $subscriptionpageLinkNewAcf);
                }else{
                        $subscriptionpageLinkNewAcf = str_replace('EUR', 'USD', $subscriptionpageLinkNewAcf);
                }
                update_field('subscription_cta_link',$subscriptionpageLinkNewAcf, $productId);


        } else {
                // product link--------------------------
                $productLinkAcf = get_field('product_link', $productId);
                if (strpos($productLinkAcf, '&customer[cf_customer_fields]=') !== false) {
                $productLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $productLinkAcf);
                }
                $productLinkNewAcf = $productLinkAcf;
                if (strpos($currentPath, 'EUR') !== false) {
                        $productLinkNewAcf = str_replace('USD', 'EUR', $productLinkNewAcf);
                }else{
                        $productLinkNewAcf = str_replace('EUR', 'USD', $productLinkNewAcf);
                }
                update_field('product_link', $productLinkNewAcf, $productId);

                // subscription link-------------------------------
                $subscriptionLinkAcf = get_field('subscription_link', $productId);
                if (strpos($subscriptionLinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $subscriptionLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $subscriptionLinkAcf);
                }
                $subscriptionLinkNewAcf = $subscriptionLinkAcf;
                if (strpos($currentPath, 'EUR') !== false) {
                        $subscriptionLinkNewAcf = str_replace('USD', 'EUR', $subscriptionLinkNewAcf);
                }else{
                        $subscriptionLinkNewAcf = str_replace('EUR', 'USD', $subscriptionLinkNewAcf);
                }
                update_field('subscription_link',$subscriptionLinkNewAcf, $productId);


                // monthly link-------------------------------
                $monthlyLinkAcf = get_field('monthly', $productId);
                if (strpos($monthlyLinkAcf,'customer[cf_customer_fields]') !== false) {
                        $monthlyLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $monthlyLinkAcf);
                }
                $monthlyLinkNewAcf = $monthlyLinkAcf;
                if (strpos($currentPath, 'EUR') !== false) {
                        $monthlyLinkNewAcf = str_replace('USD', 'EUR', $monthlyLinkNewAcf);
                }else{
                        $monthlyLinkNewAcf = str_replace('EUR', 'USD', $monthlyLinkNewAcf);
                }
                update_field('monthly',$monthlyLinkNewAcf, $productId);


                // 6 monthly------------------------------
                $monthly6LinkAcf = get_field('6_monthly', $productId);
                if (strpos($monthly6LinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $monthly6LinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $monthly6LinkAcf);
                }
                $monthly6LinkNewAcf = $monthly6LinkAcf;
                if (strpos($currentPath, 'EUR') !== false) {
                        $monthly6LinkNewAcf = str_replace('USD', 'EUR', $monthly6LinkNewAcf);
                }else{
                        $monthly6LinkNewAcf = str_replace('EUR', 'USD', $monthly6LinkNewAcf);
                }
                update_field('6_monthly',$monthly6LinkNewAcf, $productId);


                // Yearly link-----------------------------------
                $yearlyLinkAcf = get_field('yearly', $productId);
                if (strpos($yearlyLinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $yearlyLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $yearlyLinkAcf);
                }
                $yearlyLinkNewAcf = $yearlyLinkAcf;
                if (strpos($currentPath, 'EUR') !== false) {
                        $yearlyLinkNewAcf = str_replace('USD', 'EUR', $yearlyLinkNewAcf);
                }else{
                        $yearlyLinkNewAcf = str_replace('EUR', 'USD', $yearlyLinkNewAcf);
                }
                update_field('yearly',$yearlyLinkNewAcf, $productId);

                // Lifetime link----------------------------
                $lifetimeLinkAcf = get_field('lifetime', $productId);
                if (strpos($lifetimeLinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $lifetimeLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $lifetimeLinkAcf);
                }
                $lifetimeLinkNewAcf = $lifetimeLinkAcf;
                if (strpos($currentPath, 'EUR') !== false) {
                        $lifetimeLinkNewAcf = str_replace('USD', 'EUR', $lifetimeLinkNewAcf);
                }else{
                        $lifetimeLinkNewAcf = str_replace('EUR', 'USD', $lifetimeLinkNewAcf);
                }
                update_field('lifetime',$lifetimeLinkNewAcf, $productId);

                // subscription page link----------------------------
                $subscriptionpageLinkAcf = get_field('subscription_cta_link', $productId);
                if (strpos($subscriptionpageLinkAcf, 'customer[cf_customer_fields]') !== false) {
                        $subscriptionpageLinkAcf = preg_replace('/&customer\[cf_customer_fields\]=.*$/', '', $subscriptionpageLinkAcf);
                }
                $subscriptionpageLinkNewAcf = $subscriptionpageLinkAcf;
                if (strpos($currentPath, 'EUR') !== false) {
                        $subscriptionpageLinkNewAcf = str_replace('USD', 'EUR', $subscriptionpageLinkNewAcf);
                }else{
                        $subscriptionpageLinkNewAcf = str_replace('EUR', 'USD', $subscriptionpageLinkNewAcf);
                }
                update_field('subscription_cta_link',$subscriptionpageLinkNewAcf, $productId);
        }
        }
} else {
        echo 'Product not found or not a valid product.';
}
return ob_get_clean();
}

// restrict rest api

if( ! is_user_logged_in() ) {
        remove_action('rest_api_init', 'create_initial_rest_routes', 99);
}

// remove_action('rest_api_init', 'create_initial_rest_routes', 99);


// currency symbol change
// add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
// function change_existing_currency_symbol( $currency_symbol, $currency ) {
//      switch( $currency ) {
//           case 'USD': $currency_symbol = '$/€'; break;
//      }
//      return $currency_symbol;
// }


// code snippet code

add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
if ( is_product_category() ){
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        if ( $image ) {
                echo '<img src="' . $image . '" alt="' . $cat->name . '" />';
        }
}
}

add_shortcode('variant_title','variant_title_function');
function variant_title_function() {
ob_start();
global $product;
$productName = $product->get_name();	
if ( $product->is_type( 'variable' ) ) {
  echo $productName. ' COLOUR :';
}
return ob_get_clean();
}
