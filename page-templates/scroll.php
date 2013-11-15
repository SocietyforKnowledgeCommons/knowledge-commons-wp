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

                echo "<ul id=\"single-page-nav-bar\">";
                    foreach ($pages as $page_data) {
                        echo "<li class='single-page-nav-bar-item'><a href='#$page_data->post_name'>";
                        echo $page_data->post_title;
                        echo "</a></li>\n";
                    }
                echo "</ul>";


                echo "<article class='page type-page status-publish hentry no-post-thumbnail'>\n";
                echo "<header class=\"entry-header\"><h1 class='entry-title'>";
                echo $post->post_title;
                echo "</h1></header>\n";
                echo "<div class='entry-content'>";
                echo $post->post_content;
                echo "</div>\n";
                echo "</article>\n";


				foreach ($pages as $page_data) {
					$title = $page_data->post_title;
					$slug = $page_data->post_name;
					$pageid = $page_data->ID;
                    $content = apply_filters('the_content', $page_data->post_content);
                    $title = $page_data->post_title;

                    echo "<div class='scroll-page' id='$pageid'><a name='$slug'></a>";
                    echo "<article class='page type-page status-publish hentry no-post-thumbnail'>";
                    echo "<header class=\"entry-header\"><h1 class='entry-title'>$title</h1></header>";
                    echo "<div class='entry-content'>";
                    echo $content;
                    echo "</div>";
                    echo "</article>";
                    echo "</div>";
                }

			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
