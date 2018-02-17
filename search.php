<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gloriousbalance
 */

get_header(); ?>

<?php
if ( have_posts() ) : ?>

	<header class="page-header">
		<h1 class="page-title"><?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'gloriousbalance' ), '<span>' . get_search_query() . '</span>' );
		?></h1>
	</header><!-- .page-header -->

<?php else :

	get_template_part( 'template-parts/content', 'none');
	return;

 endif; ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content' );

			endwhile;

			the_posts_pagination( array(
				'prev_text' => gloriousbalance_get_svg( array( 'icon' => 'arrow-left' ) ) . __( 'Newer', 'gloriousbalance' ),
				'next_text' => __( 'Older', 'gloriousbalance' ) . gloriousbalance_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'gloriousbalance' ) .'</span>',
			) );


		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
