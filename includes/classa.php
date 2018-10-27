<?php

class Areaexpress_settings {
    public function __construct() {
        // Hook into the admin menu
        add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
    }
    public function create_plugin_settings_page() {
        // Add the menu item and page
        $page_title = 'Areaexpress Settings';
        $menu_title = 'Areaexpress';
        $capability = 'manage_options';
        $slug = 'areaexpress';
        $callback = array( $this, 'plugin_settings_page_content' );
        $icon = 'dashicons-admin-plugins';
        $position = 100;
        add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
    }
    public function plugin_settings_page_content() {
        if( $_POST['updated'] === 'true' ){
            $this->handle_form();
        } ?>
        <div class="wrap">
            <h2>Areaexpress Settings</h2>
            <form method="POST">
                <input type="hidden" name="updated" value="true" />
                <?php wp_nonce_field( 'settings_update', 'settings_form' ); ?>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th><label for="token">Areaexpress Api Token</label></th>
                            <td><input name="token" id="token" type="text" value="<?php echo get_option('settings_token'); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th><label for="storename">Store Name</label></th>
                            <td><input name="storename" id="storename" type="text" value="<?php echo get_option('storex_name'); ?>" class="regular-text" /></td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save">
                </p>
            </form>
        </div> <?php
    }



public function question($url){
    // The actual curl request.
    $curl_timeout = 5;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $curl_timeout);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $res = curl_exec($curl);
    curl_close($curl);

    return $res;

    // $data = json_decode($res, true);
     //return $data['price'];

    /*$data = jsonp_decode($res, true);
    if($data['code'] == 1){
      //echo "add";
        return true;
    }
    else{
      // echo $data['code'];
  //  echo $data['msg'];
  return false;
  
    }
   */

}



    public function verify($token){
        $respo = $this->question("https://api.areaexpress.ng/v1/verifytoken.php?token=$token");
        if($respo == 1){
            return true;
        }
        else{
            return false;
        }

    }
    public function handle_form() {
        if( ! isset( $_POST['settings_form'] ) || ! wp_verify_nonce( $_POST['settings_form'], 'settings_update' ) ){ ?>
           <div class="error">
               <p>Sorry, your nonce was not correct. Please try again.</p>
           </div> <?php
           exit;
        } else {
            $valid_usernames = array( 'admin', 'matthew' );
            $valid_emails = array( 'email@domain.com', 'anotheremail@domain.com' );
            $token = sanitize_text_field( $_POST['token'] );
            $storename = sanitize_text_field( $_POST['storename'] );
            $a = 1;
            $b = 1;
            if($this->verify($token)){
                update_option( 'settings_token', $token );
                update_option( 'storex_name', $storename ); ?>
                <div class="updated">
                    <p>Your account was linked succesfully!</p>
                </div> <?php
            } else { ?>
                <div class="error">
                    <p>Your token is invalid. Please sign in to your account and copy your Api key</p>
                </div> <?php
            }
        }
    }
}
new Areaexpress_settings();