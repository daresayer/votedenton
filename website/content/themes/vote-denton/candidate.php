<?php
/**
 * Post Template
 *
 * This is the default post template.  It is used when a more specific template can't be found to display
 * singular views of the 'post' post type.
 *
 * @package Vote Denton
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // vote_denton_before_content ?>

	<div id="content">

		<?php do_atomic( 'open_content' ); // vote_denton_open_content ?>

		<div class="hfeed">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // vote_denton_before_entry ?>

					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
						
						<div class="container">

							<?php do_atomic( 'open_entry' ); // vote_denton_open_entry ?>
	
							<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
							
							<ul class="nav nav-tabs nav-stacked">
							<?php
							if( get_field( 'website' ) ) { echo '<li><a href="' . get_field('website') . '">Website</a></li>'; }
							if( get_field( 'facebook' ) ) { echo '<li><a href="' . get_field('facebook') . '">Facebook</a></li>'; }
							if( get_field( 'twitter_username' ) ) { echo '<li><a href="' . get_field('twitter_username') . '">Twitter</a></li>'; }
							if( get_field( 'city_of_denton_page' ) ) { echo '<li><a href="' . get_field('city_of_denton_page') . '">City of Denton Website</a></li>'; }
							?>
							</ul>

							<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'thumbnail', 'image_class' => 'pull-right' ) ); ?>
	
							<div class="entry-content">
								<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'enterprise' ) ); ?>
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'enterprise' ), 'after' => '</p>' ) ); ?>
							</div><!-- .entry-content -->
	
							<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms taxonomy="post_tag" before="| Tagged "]', 'enterprise' ) . '</div>' ); ?>
	
							<?php do_atomic( 'close_entry' ); // vote_denton_close_entry ?>
							
						</div>

					</div><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // vote_denton_after_entry ?>

					<?php get_sidebar( 'after-singular' ); // Loads the sidebar-after-singular.php template. ?>

					<?php do_atomic( 'after_singular' ); // vote_denton_after_singular ?>

					<?php comments_template( '/comments.php', true ); // Loads the comments.php template. ?>

				<?php endwhile; ?>

			<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // vote_denton_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // vote_denton_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>