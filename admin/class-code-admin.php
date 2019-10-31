<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://mrinalbd.com/
 * @since      1.0.0
 *
 * @package    Code
 * @subpackage Code/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Code
 * @subpackage Code/admin
 * @author     Mrinal Haque <mrinalhaque99@gmail.com>
 */
class Code_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	public function mrinal_information() {
		register_rest_route(
			'mrinal/v1',
			'information',
			array(
				'methods'  => 'GET',
				'callback' => array( $this, 'information_function' ),
			)
		);
	}

	public function information_function() {
		$info        = new stdClass();
		$info->name  = 'Mrinal';
		$info->cover = 'http://localhost/rest/wp-content/uploads/2019/10/africa-1854308_1920.jpg';
		return $info;
	}

	public function mf_menu() {
		$mf_page_name = __( 'Allay', 'code' );
		add_submenu_page( 'options-general.php', $mf_page_name, $mf_page_name, 'manage_options', strtolower( $mf_page_name ), array( &$this, 'mf_menu_callback' ) );
	}

	public function mf_menu_callback() {
		?>
		<h1>Hello allly</h1>
		<?php
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Code_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Code_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/code-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Code_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Code_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/code-admin.js', array( 'jquery' ), $this->version, false );

	}

}
