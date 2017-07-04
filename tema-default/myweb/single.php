<?php get_header(); ?>

<section class="box-container">
	<div class="container">
		<h2><?php the_category(); ?></h2>

		<div class="conteudo">

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'content', get_post_format() ); ?>
				
				<?php /*the_post_navigation( array(
					'prev_text' => '<span class="prev"><i class="fa fa-long-arrow-left"></i> %title</span>',
					'next_text' => '<span class="next">%title <i class="fa fa-long-arrow-right"></i></span>',
				)); */?>

			<?php endwhile; ?>

		</div>

	</div>
</section>

<?php get_footer(); ?>