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
				<h2 class="title-p"> <?php  the_title(); ?> </h2>
			</a>
			<div class="post-meta">
				<div class="post-meta-content">
					<span><?php _e('Published By','tru-students') ?>: <?php echo get_the_author(); ?></span>						
					<?php if(get_post_meta( get_the_ID(), 'tru_students_name', true )): ?>
						<span class="post-student-name"><?php _e('Name: ', 'tru-students'); echo esc_attr( get_post_meta( get_the_ID(), 'tru_students_name', true ) ); ?></span>
					<?php endif; ?>
					<?php if(get_post_meta( get_the_ID(), 'tru_students_dob', true )): ?>
						</br><span class="post-student-dob"><?php _e('DOB: ', 'tru-students'); echo esc_attr( get_post_meta( get_the_ID(), 'tru_students_dob', true ) ); ?></span>
					<?php endif; ?>
					<?php if(get_post_meta( get_the_ID(), 'tru_students_roll_no', true )): ?>
						</br><span class="post-student-roll-no"><?php _e('Roll No.: ', 'tru-students'); echo esc_attr( get_post_meta( get_the_ID(), 'tru_students_roll_no', true ) ); ?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="post-content"><p><?php the_excerpt();?></p>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->