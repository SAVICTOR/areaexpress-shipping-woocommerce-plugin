<?php
 
/**
 * Plugin Name: Areaexpress 
 * Plugin URI: https://areaexpress.ng
 * Description: Integrates Areaexpress with your website to handle all your order, Just add your api key and fund your areaexpress wallet. Change order status to ship via Areaexpress to send delivery request to Areaexpress. It's seamless delivery, on demand.
 * Version: 1.0.0
 * Author: SAVICTOR
 * Author URI: https://www.savictor.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * Text Domain: areaexpress
 */

/*
Areaexpress is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Areaexpress is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Areaexpress. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html.
*/
 
if ( ! defined( 'WPINC' ) ) {
 
    die;
 
}


 
/*
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {



require plugin_dir_path(__FILE__) . 'includes/classa.php';

require plugin_dir_path(__FILE__) . 'includes/cities.php';
 
    function areaexpress_shipping_method() {
        if ( ! class_exists( 'areaexpress_Shipping_Method' ) ) {
            class areaexpress_Shipping_Method extends WC_Shipping_Method {
                /**
                 * Constructor for the shipping  class
                 *
                 * @access public
                 * @return void
                 */


                public function __construct() {
                    $this->id                 = 'areaexpress'; 
                    $this->method_title       = __( 'Areaexpress Shipping', 'areaexpress' );  
                    $this->method_description = __( 'Custom Shipping Method for Areaexpress', 'areaexpress' ); 
                   // $this->book_url = 'https://api.areaexpress.ng/v1/book.php'; // Areaexpress book 
                    $this->rate_url = 'https://api.areaexpress.ng/v1/getrate.php'; // Areaexpress link to get rates
                   // $this->additem_url = 'http://api.areaexpress.ng/v1/additem.php'; // Areaexpress link to add order items
                    // Availability & Countries
                    $this->availability = 'including';
                    $this->countries = array(
            'AF',//AFGHANISTAN
            'AL',//ALBANIA
            'DZ',//ALGERIA
            'AD',//Andorra
            'AO',//Angola
            'AI',//Anguilla
            'AG',//Antigua and Barbuda
            'AR',//Argentina
            'AM',//Antigua and Barbuda
            'AW',//Aruba
            'AU',//Australia
            'AT',//
            'AZ',//
            'BS',//
            'BH',//
            'BD',//
            'BB',//
            'BY',//
            'BE',//
            'BZ',//
            'BJ',//
            'BM',//
            'BT',//
            'BO',//
            'BQ',//
            'BA',//
            'BW',//
            'BR',//
            'BN',//
            'BG',//
            'BF',//
            'BI',//
            'KH',//
            'CM',//
            'CA',//
            'CV',//
            'KY',//
            'CF',//
            'TD',//
            'CL',//
            'CN',//
            'CO',//
            'KM',//
            'CG',//
            'CD',//
            'CK',//
            'CR',//
            'CI',//
            'HR',//
            'CU',//
            'CW',//
            'CY',//
            'DK',//
            'DJ',//
            'DM',//
            'DO',//
            'EC',//
            'EG',//
            'SV',//
            'ER',//
            'EE',//
            'ET',//
            'FK',//
            'FO',//
            'FJ',//
            'FI',//
            'FR',//
            'GF',//
            'GA',//
            'GM',//
            'GE',//
            'DE',//
            'GH',//
            'GI',//
            'GR',//
            'GL',//
            'GD',//
            'GP',//
            'GT',//
            'CG',//
            'GN',//
            'GW',//
            'GY',//
            'HT',//
            'HN',//
            'HK',//
            'HU',//
            'IS',//
            'IN',//
            'ID',//
            'IR',//
            'IQ',//
            'IE',//
            'IL',//
            'IT',//
            'JM',//
            'JP',//
            'JE',//
            'JO',//
            'KZ',//
            'KE',//
            'KI',//
            'KR',//
            'KP',//
            'KW',//
            'KG',//
            'LA',//
            'LV',//
            'LB',//
            'LS',//
            'LR',//
            'LY',//
            'LI',//
            'LT',//
            'LU',//
            'MO',//
            'MK',//
            'MG',//
            'MW',//
            'MY',//
            'MV',//
            'ML',//
            'MT',//
            'MH',//
            'MQ',//
            'MR',//
            'MU',//
            'YT',//
            'MX',//
            'FM',//
            'MD',//
            'MC',//
            'MN',//
            'ME',//
            'MS',//
            'MA',//
            'MZ',//
            'MM',//
            'NA',//
            'NR',//
            'NP',//
            'NC',//
            'NZ',//
            'NI',//
            'NE',//
            'NU',//
            'NO',//
            'OM',//
            'PK',//
            'PA',//
            'PG',//
            'PY',//
            'PE',//
            'PL',//
            'PT',//
            'QA',//
            'RE',//
            'RO',//
            'RW',//
            'SH',//
            'WS',//
            'SM',//
            'ST',//
            'SA',//
            'SN',//
            'RS',//
            'SC',//
            'SL',//
            'SG',//
            'SK',//
            'SI',//
            'SB',//
            'SO',//
            'ZA',//
            'SS',//
            'ES',//
            'LK',//
            'SD',//
            'KN',//
            'LC',//
            'MF',//
            'VC',//
            'SD',//
            'SR',//
            'SZ',//
            'SE',//
            'CH',//
            'SY',//
            'TW',//
            'TJ',//
            'TZ',// 
            'TH',//
            'CZ',//
            'NL',//
            'PH',//
            'RU',//
            'TG',// 
            'TO',//
            'TT',//
            'TN',//
            'TR',//
            'TC',//
            'TV',//
            'UG',//
            'UA',//
            'AE',//
            'GB',//
            'US',//
            'UY',//
            'UZ',//
            'VU',//
            'VE',//
            'VN',//
            'VG',//
            'YE',//
            'ZM',//
            'ZW',// 
            'NG'       
             );
 
                    $this->init();
 
                    $this->enabled = isset( $this->settings['enabled'] ) ? $this->settings['enabled'] : 'yes';
                    $this->title = isset( $this->settings['title'] ) ? $this->settings['title'] : __( 'Areaexpress Shipping', 'areaexpress' );
                }
 
                /**
                 * Init your settings
                 *
                 * @access public
                 * @return void
                 */
                function init() {
                    // Load the settings API
                    $this->init_form_fields(); 
                    $this->init_settings(); 
                     
                  
 
                    // Save settings in admin if you have any defined
                    add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );

            

                }


 
                /**
                 * Define settings field for this shipping
                 * @return void 
                 */
                function init_form_fields() { 
 
                    $this->form_fields = array(
 
                     'enabled' => array(
                          'title' => __( 'Enable', 'areaexpress' ),
                          'type' => 'checkbox',
                          'description' => __( 'Enable this shipping.', 'areaexpress' ),
                          'default' => 'yes'
                          ),
 
                     'title' => array(
                        'title' => __( 'Title', 'areaexpress' ),
                          'type' => 'text',
                          'description' => __( 'Title to be display on site', 'areaexpress' ),
                          'default' => __( 'Areaexpress Shipping', 'areaexpress' )
                          ),
 
                     'weight' => array(
                        'title' => __( 'Weight (kg)', 'areaexpress' ),
                          'type' => 'number',
                          'description' => __( 'Maximum allowed weight', 'areaexpress' ),
                          'default' => 100
                          ),
 
                     );
 
                }





 
                /**
                 * This function is used to calculate the shipping cost. Within this function we can check for weights, dimensions and other parameters.
                 *Then send request via WP_remote_post. Dont use curl in wordpress.
                 *
                 * @access public
                 * @param mixed $package
                 * @return void
                 */
                public function calculate_shipping( $package ) {
                    
                    $weight = 0;
                    $cost = 0;
                    $country = $package["destination"]["country"];
                    $state =  $package["destination"]["state"];
                    $tocity =  $package["destination"]["city"];
                    $fromcity = WC_Countries::get_base_city();

 
                    foreach ( $package['contents'] as $item_id => $values ) 
                    { 
                        $_product = $values['data']; 
                        $weight = $weight + $_product->get_weight() * $values['quantity']; 
                    }
 
                    $weight = wc_get_weight( $weight, 'kg' );
 
                    
 
                    if($weight < 1){

                     $appweight = '1';

                   }

                   else{
                   
                   $appweight = $weight;

                   }
 

                   $fromstate = WC_Countries::get_base_state();


                   $body = array(
            'fromstate'        => $fromstate,
            'fromcity'      => $fromcity,
            'tocity'   => $tocity,
            'tocountry' => $country,
            'tostate'  => $state,
            'kg'       => $appweight
        );


     // No headers for version 1.0 . Headers to be added in version 2.
        $headers = array();

        $args = array(
            'body'      => $body,
            'headers'   => $headers,
            'timeout'   => 90
        );



$request = wp_remote_post( $this->rate_url, $args );

if( ! is_wp_error( $request ) && 200 == wp_remote_retrieve_response_code( $request ) ) {
    $resp = json_decode( wp_remote_retrieve_body( $request ), true );

   $rate = $resp['price'];

/*
To debug request from api.
$fp = fopen('lidn.txt', 'w');
fwrite($fp, $moo);
fclose($fp);
      */


   $cost += $rate;

    }
    // Old curl request . Not allowed in wp.
   //$cost +=  $this->request("http://api.areaexpress.ng/v1/getrate.php?fromstate=$fromstate&&fromcity=$fromcity&&tocity=$tocity&&tocountry=$country&&tostate=$state&&kg=$appweight");


                    $rate = array(
                        'id' => $this->id,
                        'label' => $this->title,
                        'cost' => $cost
                    );
 
                    $this->add_rate( $rate );
                    
                }
            }
        }
    }


 
    add_action( 'woocommerce_shipping_init', 'areaexpress_shipping_method' );
 
    function add_areaexpress_shipping_method( $methods ) {
        $methods[] = 'areaexpress_Shipping_Method';
        return $methods;
    }
 
    add_filter( 'woocommerce_shipping_methods', 'add_areaexpress_shipping_method' );







function register_awaiting_shipment_order_status() {
    register_post_status( 'wc-areaexpress', array(
        'label'                     => _x( 'Ship via Areaexpress', 'Order status', 'woocommerce' ),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Forwaded to Areaexpress <span class="count">(%s)</span>', 'Forwaded to Areaexpress<span class="count">(%s)</span>' )
    ) );
}
add_action( 'init', 'register_awaiting_shipment_order_status' );
// Add to list of WC Order statuses
function add_awaiting_shipment_to_order_statuses( $order_statuses ) {
    $new_order_statuses = array();
    // add new order status after processing
    foreach ( $order_statuses as $key => $status ) {
        $new_order_statuses[ $key ] = $status;
        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-areaexpress'] =  _x( 'Ship via Areaexpress', 'Order status', 'woocommerce' );
        }
    }
    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_awaiting_shipment_to_order_statuses' );





function rename_or_reorder_bulk_actions( $actions ) {
    $actions = array(
        // this is the order in which the actions are displayed; you can switch them
        'mark_processing'      => __( 'Change to processing', 'textdomain' ), // rewrite an existing status
        'mark_areaexpress'        => __( 'Ship via Areaexpress', 'textdomain' ), // adding a new one
        'mark_completed'       => $actions['mark_completed'],
        'remove_personal_data' => $actions['remove_personal_data'],
        'trash'                => $actions['trash'],
    );
    return $actions;
}
add_filter( 'bulk_actions-edit-shop_order', 'rename_or_reorder_bulk_actions', 20 );





// define the woocommerce_order_status_processing callback 
function action_woocommerce_order_status_processing($order_id) { 

  $order = wc_get_order($order_id);
    // make action magic happen here... 
//Found a better way to get order details

  $firstname   = method_exists( $order, 'get_shipping_first_name' ) ? $order->get_shipping_first_name() : $order->shipping_first_name;
  $lastname    = method_exists( $order, 'get_shipping_last_name' ) ? $order->get_shipping_last_name() : $order->shipping_last_name;

  $toname = $firstname.$lastname;

  $tocountry = method_exists( $order, 'get_shipping_country' ) ? $order->get_shipping_country() : $order->shipping_country;

  $tostate = method_exists( $order, 'get_shipping_state' ) ? $order->get_shipping_state() : $order->shipping_state;

  $tocity = method_exists( $order, 'get_shipping_city' ) ? $order->get_shipping_city() : $order->shipping_city;

  $tostreet = method_exists( $order, 'get_shipping_address_1' ) ? $order->get_shipping_address_1() : $order->shipping_address_1;

  $tophone = method_exists( $order, 'get_billing_phone' ) ? $order->get_billing_phone() : $order->billing_phone;

  $toemail = method_exists( $order, 'get_billing_email' ) ? $order->get_billing_email() : $order->billing_email;

  $price = method_exists( $order, 'get_shipping_total' ) ? $order->get_shipping_total() : $order->shipping_total;





/*

$order_data = $order->get_data(); // The Order data
$order_id = $order_data['id'];
$order_parent_id = $order_data['parent_id'];
$order_status = $order_data['status'];
$order_currency = $order_data['currency'];
$order_version = $order_data['version'];
$order_payment_method = $order_data['payment_method'];
$order_payment_method_title = $order_data['payment_method_title'];
$order_payment_method = $order_data['payment_method'];
$order_payment_method = $order_data['payment_method'];

## Creation and modified WC_DateTime Object date string ##

// Using a formated date ( with php date() function as method)
$order_date_created = $order_data['date_created']->date('Y-m-d H:i:s');
$order_date_modified = $order_data['date_modified']->date('Y-m-d H:i:s');

// Using a timestamp ( with php getTimestamp() function as method)
$order_timestamp_created = $order_data['date_created']->getTimestamp();
$order_timestamp_modified = $order_data['date_modified']->getTimestamp();


$order_discount_total = $order_data['discount_total'];
$order_discount_tax = $order_data['discount_tax'];
$order_shipping_total = $order_data['shipping_total'];
$order_shipping_tax = $order_data['shipping_tax'];
$order_total = $order_data['cart_tax'];
$order_total_tax = $order_data['total_tax'];
$order_customer_id = $order_data['customer_id']; // ... and so on


## BILLING INFORMATION:

$order_billing_first_name = $order_data['billing']['first_name'];
$order_billing_last_name = $order_data['billing']['last_name'];
$order_billing_company = $order_data['billing']['company'];
$order_billing_address_1 = $order_data['billing']['address_1'];
$order_billing_address_2 = $order_data['billing']['address_2'];
$order_billing_city = $order_data['billing']['city'];
$order_billing_state = $order_data['billing']['state'];
$order_billing_postcode = $order_data['billing']['postcode'];
$order_billing_country = $order->billing_country;
$order_billing_email = $order_data['billing']['email'];
$order_billing_phone = $order->billing_phone;

## SHIPPING INFORMATION:

$order_shipping_first_name = $order_data['shipping']['first_name'];
$order_shipping_last_name = $order_data['shipping']['last_name'];
$toname = $order_shipping_first_name.$order_shipping_last_name;
$order_shipping_company = $order_data['shipping']['company'];
$order_shipping_address_1 = $order_data['shipping']['address_1'];
$order_shipping_address_2 = $order_data['shipping']['address_2'];
$order_shipping_city = $order_data['shipping']['city'];
$order_shipping_state = $order_data['shipping']['state'];
$order_shipping_postcode = $order_data['shipping']['postcode'];
$order_shipping_country = $order_data['shipping']['country'];


*/

$token =  get_option('settings_token'); //Api token to verify user id on the API
$fromstate = WC_Countries::get_base_state(); //woocommerce store owner state
$fromcity = WC_Countries::get_base_city();  //woocommerce store owner city
$fromstreet = WC_Countries::get_base_address(); // woocommerce store owner street
$fromname = get_option('storex_name'); //Store name as set under areaexpress settings on wp dashbaord.
$siteurl = get_site_url(); // The store url.


//Change curl to wp_remote post
//$testvar = $this->quest("https://api.areaexpress.ng/v1/book.php?token=$token&&tocountry=$order_billing_country&&tostate=$order_shipping_state&&tocity=lop&&tostreet=$order_shipping_address_1&&toname=$toname&&tophone=$order_billing_phone&&toemail=$order_billing_email&&price=$order_shipping_total&&siteurl=$siteurl&&fromstate=$storestate&&fromcity=$storecity&&fromstreet=$storestreet&&fromname=$fromname");

//$newmsg = "Sent to Areaexpress. Track: AREA00$testvar";


                   $body = array(

            'token'        => $token,
            'tocountry'    => $tocountry,
            'tostate'      => $tostate,
            'tocity'       => $tocity,
            'tostreet'     => $tostreet,
            'toname'       => $toname,
            'tophone'      => $tophone,
            'toemail'      => $toemail,
            'price'        => $price,
            'siteurl'      => $siteurl,
            'fromstate'    => $fromstate,
            'fromcity'     => $fromcity,
            'fromstreet'   => $fromstreet,
            'fromname'     => $fromname

                   );


     // No headers for version 1.0 . Headers to be added in version 2.
        $headers = array();

        $args = array(
            'body'      => $body,
            'headers'   => $headers,
            'timeout'   => 90
        );

$book_url = 'https://api.areaexpress.ng/v1/book.php'; 

$request = wp_remote_post( $book_url, $args );



if( ! is_wp_error( $request ) && 200 == wp_remote_retrieve_response_code( $request ) ) {
    $bookid = json_decode( wp_remote_retrieve_body( $request ), true );

  

/*
To debug request from api.
$fp = fopen('lidn.txt', 'w');
fwrite($fp, $bookid);
fclose($fp);
      */


    }

$newmsg = "Sent to Areaexpress. Track: AREA00$bookid";

$message = sprintf( __( 'Order information printed by %s for delivery.', 'my-textdomain' ), wp_get_current_user()->display_name );
  $order->add_order_note( $newmsg );
  // add the flag so this action won't be shown again
  update_post_meta( $order->id, '_wc_order_marked_printed_for_packaging', 'yes' );







// Iterating through each WC_Order_Item_Product objects
foreach ($order->get_items() as $item_key => $item_values):

    ## Using WC_Order_Item methods ##

    // Item ID is directly accessible from the $item_key in the foreach loop or
    $item_id = $item_values->get_id();

    ## Using WC_Order_Item_Product methods ##

    $item_name = $item_values->get_name(); // Name of the product
    $item_type = $item_values->get_type(); // Type of the order item ("line_item")

    $product_id = $item_values->get_product_id(); // the Product id
    $product = $item_values->get_product(); // the WC_Product object

    ## Access Order Items data properties (in an array of values) ##
    $item_data = $item_values->get_data();

    $product_name = $item_data['name'];
    $product_id = $item_data['product_id'];
    $variation_id = $item_data['variation_id'];
    $quantity = $item_data['quantity'];
    $tax_class = $item_data['tax_class'];
    $line_subtotal = $item_data['subtotal'];
    $line_subtotal_tax = $item_data['subtotal_tax'];
    $line_total = $item_data['total'];
    $line_total_tax = $item_data['total_tax'];
    $weight = $item_data['weight'];

 // Get data from The WC_product object using methods (examples)
    $product_type   = $product->get_type();
    $product_sku    = $product->get_sku();
    $product_price  = $product->get_price();
    $stock_quantity = $product->get_stock_quantity();


           $body2 = array(

            'token'        => $token,
            'shipid'       => $bookid,
            'itemweight'   => $weight,
            'itemname'     => $product_name,
            'itemtype'     => $product_type,
                 );


     // No headers for version 1.0 . Headers to be added in version 2.
        $headers2 = array();

        $args2 = array(
            'body'      => $body2,
            'headers'   => $headers2,
            'timeout'   => 90
        );

$additem_url = 'https://api.areaexpress.ng/v1/additem.php'; 
$request2 = wp_remote_post( $additem_url, $args2 );


    //quest("https://api.areaexpress.ng/v1/additem.php?token=$token&&shipid=$testvar&&itemweight=$weight&&itemname=$product_name&&itemtype=$product_type");

   



endforeach;


}; 
         
// add the action 
add_action( 'woocommerce_order_status_areaexpress', 'action_woocommerce_order_status_processing', 10, 1 ); 


  function sample_admin_notice__error() {
    $fromstate =  WC_Countries::get_base_state();
    $fromcountry = WC_Countries::get_base_country();

    if($fromcountry == 'NG'){

                  
  $class = 'notice notice-success';
  $message = __( "<b>Areaexpress</b> - For help/assistance visit our website. <a href =\"https://areaexpress.ng/integrations\">Click here</a>", 'sample-text-domain' );

  printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), $message  ); 
}

else {

    $class = 'notice notice-error';
  $message = __( "<b>Areaexpress Error!</b> Please set your Woocommerce Store Address to a location within Nigeria.", 'sample-text-domain' );

  printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ),  $message  ); 
}




}


         add_action( 'admin_notices', 'sample_admin_notice__error' );

   //     add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );

    ///add_action( 'wp_ajax_store_admin_data', array( $this, 'storeAdminData' ) );      
            
               
   





/**
 * Replace XX with the country code. Instead of YYY, ZZZ use actual  state codes.
 */
function my_cities( $cities ) {
    $cities['NG'] = array(
        'LA' => array(
            'Alimosho',
            'Ajeromi-Ifelodun',
            'Kosofe',
            'Mushin',
            'Oshodi',
            'Isolo',
            'Ojo',
            'Ikorodu',
            'Surulere',
            'Agege',
            'Ifako-Ijaye',
            'Shomolu',
            'Amuwo-Odofin',
            'Lagos-Mainland',
            'Ikeja',
            'Eti-osa',
            'Badagry',
            'Apapa',
            'Lagos-Island',
            'Epe',
            'Ibeju-Leki',
            'Ikota',
            'Ajah',

        )
    );
    return $cities;
}



add_filter( 'wc_city_select_cities', 'my_cities' );














 
    function areaexpress_validate_order( $posted )   {
 
        $packages = WC()->shipping->get_packages();
 
        $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
         
        if( is_array( $chosen_methods ) && in_array( 'areaexpress', $chosen_methods ) ) {
             
            foreach ( $packages as $i => $package ) {
 
                if ( $chosen_methods[ $i ] != "areaexpress" ) {
                             
                    continue;
                             
                }
 
                $areaexpress_Shipping_Method = new areaexpress_Shipping_Method();
                $weightLimit = (int) $areaexpress_Shipping_Method->settings['weight'];
                $weight = 0;
 
                foreach ( $package['contents'] as $item_id => $values ) 
                { 
                    $_product = $values['data']; 
                    $weight = $weight + $_product->get_weight() * $values['quantity']; 
                }
 
                $weight = wc_get_weight( $weight, 'kg' );




              





                
                if( $weight > $weightLimit ) {
 
                        $message = sprintf( __( 'Sorry, %d kg exceeds the maximum weight of %d kg for %s', 'areaexpress' ), $weight, $weightLimit, $areaexpress_Shipping_Method->title );
                             
                        $messageType = "error";
 
                        if( ! wc_has_notice( $message, $messageType ) ) {
                         
                            wc_add_notice( $message, $messageType );
                      
                        }
                }
            }       
        } 
    }
 
    add_action( 'woocommerce_review_order_before_cart_contents', 'areaexpress_validate_order' , 10 );
    add_action( 'woocommerce_after_checkout_validation', 'areaexpress_validate_order' , 10 );
}