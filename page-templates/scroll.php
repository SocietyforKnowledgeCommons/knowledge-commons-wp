<?php
/**
 * Template Name: Full Width Scroll Page
 *
 * @package WordPress
 */

get_header(); ?>

<div id="main-content" class="main-content">
<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() )
		get_template_part( 'featured-content' );
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			This is page ID: <?php the_ID(); ?><br />
			<?php
				$parent_id = the_ID();
				echo $parent_id;
				$pages = get_pages( array('child_of' => 64) );
				foreach ($pages as $page_data) {
					$title = $page_data->post_title;
					$slug = $page_data->post_name;
					$pageid = $page_data->ID;

                    echo "<div class='scroll-page' id='$pageid'><a name='$slug'></a>";
                    echo "<h2>$title</h2>";
                    echo "</div>";
                }

			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
