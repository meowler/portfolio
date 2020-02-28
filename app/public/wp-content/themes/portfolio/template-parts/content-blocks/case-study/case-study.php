<?php

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<div class="banner" style="background:url(<?php the_post_thumbnail_url(); ?>;"></div>
		
		<section class="intro-container lt-container">
			<div class="content-wrapper">
				<header class="entry-header has-text-align-center<?php echo esc_attr( $entry_header_classes ); ?>">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				<div class="post-content">
					<?php echo the_field('intro'); ?>

					<?php
					$GroupOrPostSlug = 'cs_intro';
					//or insert the ID of your fields Group.
					$groupID='';



					global $wpdb;
					if (empty($groupID))
					{$groupID = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name =  '$GroupOrPostSlug' ");}
					if (empty($groupID))
					{$groupID = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title =  '$GroupOrPostSlug' ");}

					$custom_field_keys = get_post_custom_keys($groupID);
					foreach ( $custom_field_keys as $key => $fieldkey )
					{
						if (stristr($fieldkey,'field_'))
						{
							//echo $key . " => " . $fieldkey . "<br />";
							//echo $field['label'] . ': ' . $field['value'];
							//echo $fieldkey . "<br />";
							$field = get_field_object($fieldkey, $groupID);
							echo $field['label'];

						}
					}
					?>
				</div>
			</div>
		</section>
		
		<div class="content-wrapper">
			<div class="post-content">

				<?php
				if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
					the_excerpt();
				} else {
					the_content( __( 'Continue reading', 'twentytwenty' ) );
				}
				?>

			</div><!-- .entry-content -->
		</div><!-- .content-wrapper -->
		<div class="lt-container">	
		</div>
		

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article><!-- .post -->
