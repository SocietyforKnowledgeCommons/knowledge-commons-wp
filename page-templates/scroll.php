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
			<?php
                $parent_id = $post->ID;
                $pages = get_pages( array('child_of' =>  $parent_id) );
				foreach ($pages as $page_data) {
					$title = $page_data->post_title;
					$slug = $page_data->post_name;
					$pageid = $page_data->ID;
                    $content = apply_filters('the_content', $page_data->post_content);
                    $title = $page_data->post_title;

                    echo "<div class='scroll-page' id='$pageid'><a name='$slug'></a>";
                    echo "<h2>$title</h2>";
                    echo $content;
                    echo "</div>";
                }

			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
