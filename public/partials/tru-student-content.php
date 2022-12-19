<?php
/**
 * Template part for displaying page content in post.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tru-students
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4'); ?>>
	<div class="post-container">
		<div class="post-thumbnail category_post_thumbb">
			<?php the_post_thumbnail(); ?>
			<a href="<?php the_permalink(); ?>" class="post-overlay">
				<div class="post-overlay-content">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</a>			
		</div>
		<div class="post-content-container">
			<a href="<?php the_permalink(); ?>" class="post-title">
				<h2 class="TitleHeight"> <?php  the_title(); ?> </h2>
			</a>
			<div class="post-meta">
				<div class="post-meta-content">
					<span class="post-auhor-date">
						<span><?php _e('Published By','tru-students') ?>: <?php echo get_the_author(); ?></span>						
					</span>
					<span class="placeholder-post-read-later"></span>
				</div>
			</div>
			<div class="post-content"><p><?php the_excerpt();?></p>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->