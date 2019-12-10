<?php get_header(); ?>

<?php $post_object = get_sub_field('existing_sidebar'); ?>


	<?php if( $post_object ):

	// override $post
	$post = $post_object;
	setup_postdata( $post );

	echo $post->ID;

	?>

	yo in the sidebar sinfle

	<?php if( have_rows('sidebar_block') ):

		while ( have_rows('sidebar_block') ) : the_row(); ?>

			<?php if(get_row_layout() == "subpage_listing"): ?>

				<?php include "modules/sidebar-subpage-listing.php"; ?>

			<?php elseif(get_row_layout() == "latest_posts"): ?>

				<?php include "modules/sidebar-latest-posts.php"; ?>

			<?php elseif(get_row_layout() == "featured_page"): ?>

				<?php include "modules/sidebar-featured-page.php"; ?>

			<?php elseif(get_row_layout() == "related_links"): ?>

				<?php include "modules/sidebar-related-links.php"; ?>

			<?php elseif(get_row_layout() == "object_display"): ?>

				<?php include "modules/sidebar-featured-object.php"; ?>

			<?php elseif(get_row_layout() == "object_search"): ?>

				<?php include "modules/sidebar-search-object.php"; ?>

			<?php endif; ?>

		<?php endwhile; ?>

	<?php endif; ?>


	<?php wp_reset_postdata(); ?>

	<?php endif; ?>
	<?php get_footer(); ?>
