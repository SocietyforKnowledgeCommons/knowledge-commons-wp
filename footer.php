<?php
/**
 * The template for displaying the footer
 * Modified from TwentyTwelve
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
			This website is powered by <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( '%s', 'twentytwelve' ), 'WordPress.' ); ?></a>
Theme by <a href="https://github.com/SocietyforKnowledgeCommons/knowledge-commons-wp" title="Knowledge Commons Theme">Society for Knowledge Commons</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>