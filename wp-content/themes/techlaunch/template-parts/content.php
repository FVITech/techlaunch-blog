<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TechLaunch
 */
$extraClass='post-single';
if (!is_singular()){
	$extraClass='post-tile';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($extraClass); ?>>
	<?php
		if (has_post_thumbnail()){
			if (is_singular()){
				the_post_thumbnail('full', array('class'=>'post-banner'));
			}
			else{
				$url = get_the_post_thumbnail_url();
				echo '<div class="post-thumbnail" style="background-image:url(' . $url . ')"></div>';
				//the_post_thumbnail('full', array('class'=>'post-thumbnail'));
			}
		}
	?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php techlaunch_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if (is_singular()){
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'techlaunch' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'techlaunch' ),
						'after'  => '</div>',
						) );
			}
		?>
	</div><!-- .entry-content -->

	<!--<footer class="entry-footer">
		<?php techlaunch_entry_footer(); ?>
	</footer> -->   <!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
