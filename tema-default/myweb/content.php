<article class="post">
	<header>
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
		if($imagem[0]){ ?>
			<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="img-release">
		<?php }	?>
		<h2><?php the_title(); ?></h2>
		<div class="date"><?php the_date(); ?></div>
	</header>

	<p><?php the_content(); ?></p>
</article>