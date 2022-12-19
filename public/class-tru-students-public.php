<?php
namespace Tru_Students\Students_Public\Tru_Students_Public;
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://example.com
 * @since      1.0.0
 *
 * @package    Tru_Students
 * @subpackage Tru_Students/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tru_Students
 * @subpackage Tru_Students/public
 * @author     Shalini Bhardwaj <test@abc.com>
 */
class Tru_Students_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode('tru-student', array($this,'tru_student_shortcode_callback'));
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tru-students-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tru-students-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'tru_ajax_object',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'posts_per_page' => TRU_PER_PAGE
			)
		);

	}
	/**
	 * Summary of tru_student_shortcode_callback
	 * @return void
	 */
	public function tru_student_shortcode_callback(){
		$args = array(
			'posts_per_page' => '-1',
			'post_type' => 'tru-students',
			'status'	=> 'publish'
		);
		ob_start();
		include plugin_dir_path( __FILE__ ) . 'partials/cat-filter-form.php';
		$query = new \WP_Query( $args );
	
		if( $query->have_posts() ) : ?>
			<div class="container students-list">
				<?php while( $query->have_posts() ): $query->the_post();
					include plugin_dir_path( __FILE__ ) . 'partials/tru-student-content.php';
				endwhile;
			wp_reset_postdata(); ?>
			</div><?php
		else :
			echo 'No posts found';
		endif;		
		$content = ob_get_clean();
		return $content;
	}

	public function tru_class_filter()
	{
		$args = array(
			'posts_per_page' => '-1',
			'post_type' => 'tru-students',
			'status'	=> 'publish'
		);
		if(isset($_POST['cat_id'])){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'class',
					'field' => 'id',
					'terms' => $_POST['cat_id']
				)
			);
		}
		$query = new \WP_Query( $args );	
		if( $query->have_posts() ) : 
			while( $query->have_posts() ): $query->the_post();
				include plugin_dir_path( __FILE__ ) . 'partials/tru-student-content.php';
			endwhile;
			wp_reset_postdata();
		else :
			echo 'No posts found';
		endif;
		die();
	}

}
