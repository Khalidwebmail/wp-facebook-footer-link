<?php

/**
 * Plugin Name:       Facebook footer link
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Show author's facebook link bottom of blog with this plugin.
 * Version:           1.0.0
 * Author:            Khalid Ahmed
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       facebook-footer-link
 */


if( ! defined("ABSPATH")){
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';
 
/**
 * Plugin Class name
 */

final class Facebook_Footer_Link {
    
    /**
     * Plugin version
     */
    const version = "1.0";

    private function __construct()
    {
        $this->define_constants();

        register_activation_hook( __FILE__, [$this, 'activate']);
        add_action('plugins_loaded', [$this, 'init_plugin']);
    }
    
    /**
     * initialize singleton instance
     *
     * @return \Facebook_Footer_Link
     */
    public static function init()
    {
        static $instance  = false;

        if(! $instance) {
            $instance = new self();
        }

        return $instance;
    }
    
    /**
     * define required plugins constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('WD_FFL_VERSION', self::version);
        define("WD_FFL_FILE", __FILE__);
        define("WD_FFL_PATH", __DIR__);
        define("WD_FFL_URL", plugins_url('', WD_FFL_FILE));
        // define("WD_FFL_ASSETS", WD_FFL_URL . '/assets');
    }
        
    /**
     * initialize the plugin
     *
     * @return void
     */

    public function init_plugin()
    {
        
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() 
    {
        $installed = get_option( 'wd_ffl_installed' );
        if( ! $installed ) {
            update_option( 'wd_ffl_installed', time() );
        }
        update_option( 'wd_ffl_installed', WD_FFL_VERSION );
    }
}

/**
 * iniitalize the main plugin
 *
 * @return \Facebook_Footer_Link
 */
function Facebook_Footer_Link()
{
    return Facebook_Footer_Link::init();
}

/**
 * Kick of plugin
 */
Facebook_Footer_Link();