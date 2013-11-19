<?php
/**
 * Template Name: Full Width Scroll Page
 *
 * @package WordPress
 */

get_header(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/sub-menu.js"></script>
<div id="main-content" class="main-content">
<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() )
		get_template_part( 'featured-content' );
?>
<?php
    $parent_id = $post->ID;
    $pages = get_pages( array('child_of' =>  $parent_id,
                              'sort_order' => 'ASC',
                              'sort_column' => 'menu_order') );
    echo "<div id='sub-nav' class='center'>\n";
    echo "<ul>\n";
              foreach ($pages as $page_data) {
                $title = $page_data->post_title;
                $slug = $page_data->post_name;
                echo   "<li><a id='nav_$slug' href='#$slug'>$title</a></li>\n";
                }
                
    echo "</ul>\n";
    echo "</div>\n";
?>
	<div id="primary" class="content-area scrollable-content">
		<div id="content" class="site-content" role="main">
			
            <?php    
                
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

                    echo "<a name='$slug' class='child-page'></a><div class='scroll-page' id='$pageid' >";
                    echo "<article class='page type-page status-publish hentry no-post-thumbnail'>";
                    echo "<header class=\"entry-header\"><h1 class='entry-title'>$title</h1></header>";
                    echo "<div class='entry-content'>";
                    echo $content;

                    echo "</div>";
                    echo "</article>";
                    if($title == 'Discuss')
                        comments_template();
                
                    echo "</div>";
                }
                

			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
