<?php
namespace Tru_Students\Admin\Tru_Students_Admin;
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://example.com
 * @since      1.0.0
 *
 * @package    Tru_Students
 * @subpackage Tru_Students/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tru_Students
 * @subpackage Tru_Students/admin
 * @author     Shalini Bhardwaj <test@abc.com>
 */
class Tru_Students_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

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
		 * defined in Tru_Students_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tru_Students_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tru-students-admin.css', array(), $this->version, 'all' );

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
		 * defined in Tru_Students_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tru_Students_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tru-students-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
     * Register meta boxes.
     */
    public function tru_register_meta_boxes() {
        add_meta_box( 'tru-1', __( 'Custom Fields', 'tru-students' ), array( $this, 'tru_display_callback' ), 'tru-students' );
    }    

    /**
     * Meta box display callback.
     *
     * @param WP_Post $post Current post object.
     */
    public function tru_display_callback( $post ) {
        include plugin_dir_path( __FILE__ ) . 'partials/meta-box-form.php';
    }

	/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID
	 */
	public function tru_students_save_meta_box( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}
		$fields = [
			'tru_students_name',
			'tru_students_roll_no',
			'tru_students_dob',
		];
		foreach ( $fields as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
			}
		}
	}

}
