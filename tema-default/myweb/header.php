<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php 
	$titulo = '';
	$descricao = get_field('descricao', 'option');
	$imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
	$page = get_page_by_path('sobre-mim');
	$imagem = get_field('imagem_perfil',$page->ID);
	$url = get_home_url();

	if(is_category()){ 
		$category= get_queried_object(); //print_r($category);
		$infoCategoria = get_the_category($category->term_id); //print_r($infoCategoria);
		$titulo = $infoCategoria[0]->name.' - ';
		$descricao = $infoCategoria[0]->description;
		//$imagem = '';
		$url = $url.'/'.$infoCategoria[0]->slug;
	}

	if(is_page()){
		if(!is_home()){
			$titulo = get_the_title().' - ';
			if(get_field('descrição') != ''){
				$descricao = get_field('descrição');
			}
			if($imgPage[0] != ''){
				$imagem = $imgPage[0];	
			}			
			$url = get_the_permalink();
		}
	}

	if(is_single()){
		$titulo = get_the_title().' - ';
		if(get_field('descrição') != ''){
			$descricao = get_field('descrição');
		}
		if($imgPage[0] != ''){
			$imagem = $imgPage[0];	
		}			
		$url = get_the_permalink();
	}

	$titulo = $titulo.get_bloginfo('name'); 
	$autor = get_bloginfo('name');
?>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="<?php echo $descricao; ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="<?php echo $autor; ?>" />
<meta name="language" content="pt-br" />
<meta name="title" content="<?php echo $titulo; ?>" />

<!-- SOCIAL META -->
<meta itemprop="name" content="<?php echo $titulo; ?>" />
<meta itemprop="description" content="<?php echo $descricao; ?>" />
<meta itemprop="image" content="<?php echo $imagem; ?>" />

<html itemscope itemtype="<?php echo $url; ?>" />
<link rel="image_src" href="<?php echo $imagem; ?>" />
<link rel="canonical" href="<?php echo $url; ?>" />

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<meta property="fb:admins" content="<?php echo $autor; ?>" />
<meta property="fb:app_id" content="1205127349523474" /> 

<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $url; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:description" content="<?php echo $descricao; ?>" />
<meta name="twitter:image" content="<?php echo $imagem; ?>" />
<!-- SOCIAL META -->

<title><?php echo $titulo; ?></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

<?php if(is_singular('produto')){ ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css" type="text/css" media="screen" />
<?php } ?>

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){
		/* MAPA GOOGLE */
		jQuery('.mapa-google').click(function () {
		    jQuery('.mapa-google').css("pointer-events", "auto");
		});
		jQuery('.mapa-google').mouseleave(function() {
		  	jQuery('.mapa-google').css("pointer-events", "none"); 
		});

		/* SETA */
		jQuery(".seta").click(function(){
			var scroll = jQuery(this).attr('rel');
		    jQuery("html, body").animate({ scrollTop: jQuery(scroll).offset().top }, 1000);
		});

		/* OPEN/CLOSE MENU */
		/*jQuery('.menu-mobile').click(function(){
			if(jQuery(this).hasClass('active')){
				jQuery(this).removeClass('active');
				jQuery('.nav').css('left','100vw');
				jQuery('.region').css('left','100vw');
				jQuery('.info-tel').css('left','100vw');
			}else{
				jQuery(this).addClass('active');
				jQuery('.nav').css('left','0vw');
				jQuery('.region').css('left','0vw');
				jQuery('.info-tel').css('left','0vw');
			}
		});

		jQuery('.nav a').click(function(){
			if(jQuery('.menu-mobile').hasClass('active')){
				jQuery('.menu-mobile').removeClass('active');
				jQuery('.nav').css('left','100vw');
				jQuery('.region').css('left','100vw');
				jQuery('.info-tel').css('left','100vw');
			}
		});*/

		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});	

	/*jQuery(window).resize(function(){
		jQuery('.menu-mobile').removeClass('active');
		jQuery('.nav').css('left','100vw');
		jQuery('.region').css('left','100vw');
		jQuery('.info-tel').css('left','100vw');
		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});*/
</script>

</head>
<body <?php body_class(); ?>>

	<header class="header">
		<div class="container">

			<h1>
				<a href="<?php echo get_home_url(); ?>" title="<?php bloginfo('name'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>">
				</a>
			</h1>

			<div class="box-menu">
				<a href="javascript:" class="menu-mobile"><span><em>X</em></span></a>

				<nav class="nav">
					<ul class="menu-principal">
						<li class="<?php if((is_post_type_archive('lojas')) or (is_post_type_archive('produto')) or (is_tax('categoria_produto')) or (is_singular('produto'))){ echo 'active'; } ?>">
							<a href="<?php echo get_home_url(); ?>/produto" title="PRODUTOS" class="">PRODUTOS</a>
						</li>

						<li class="<?php if((is_page('simulador-cores')) or (is_page('calculadora-consumo'))){ echo 'active'; } ?>">
							<a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="SIMULADORES">SIMULADORES</a>
							<ul class="submenu">
								<li><a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="SIMULADOR DE CORES" class="<?php if(is_page('simulador-cores')){ echo 'active'; } ?>">SIMULADOR<br>DE CORES</a></li>		
								<li><a href="<?php echo get_permalink(get_page_by_path('calculadora-consumo')); ?>" title="CALCULADORA DE CONSUMO" class="<?php if(is_page('calculadora-consumo')){ echo 'active'; } ?>">CALCULADORA<br>DE CONSUMO</a></li>	
							</ul>
						</li>

						<li class="<?php if((is_page('empresa'))){ echo 'active'; } ?>">
							<a href="<?php echo get_permalink(get_page_by_path('empresa')); ?>" title="EMPRESA">EMPRESA</a>
							<ul class="submenu">
								<li><a href="<?php echo get_home_url(); ?>/matriz_filiais" title="MATRIZ E UNIDADES" class="<?php if(is_post_type_archive('matriz_filiais')){ echo 'active'; } ?>">MATRIZ E<br>UNIDADES</a></li>		
								<li><a href="<?php echo get_permalink(get_page_by_path('trabalhe-conosco')); ?>" title="TRABALHE CONOSCO" class="<?php if(is_page('trabalhe-conosco')){ echo 'active'; } ?>">TRABALHE<br>CONOSCO</a></li>		
								<li><a href="<?php echo get_permalink(get_page_by_path('empresa')); ?>#premios" title="PRÊMIOS" class="">PRÊMIOS</a></li>				
								<li><a href="<?php echo get_permalink(get_page_by_path('empresa')); ?>#ideologia-corporativa" title="IDEOLOGIA CORPORATIVA" class="">IDEOLOGIA<br>CORPORATIVA</a></li>
							</ul>
						</li>
						<li class="<?php if((is_post_type_archive('matriz_filiais')) or (is_page('trabalhe-conosco')) or (is_page('fale-conosco'))){ echo 'active'; } ?>">
							<a href="javascript:" title="CONTATO">CONTATO</a>
							<ul class="submenu">
								<li><a href="<?php echo get_home_url(); ?>/matriz_filiais" title="MATRIZ E UNIDADES" class="<?php if(is_post_type_archive('matriz_filiais')){ echo 'active'; } ?>">MATRIZ E<br>UNIDADES</a></li>		
								<li><a href="<?php echo get_permalink(get_page_by_path('fale-conosco')); ?>" title="FALE CONOSCO" class="<?php if(is_page('fale-conosco')){ echo 'active'; } ?>">FALE<br>CONOSCO</a></li>		
								<li><a href="<?php echo get_permalink(get_page_by_path('trabalhe-conosco')); ?>" title="TRABALHE CONOSCO" class="<?php if(is_page('trabalhe-conosco')){ echo 'active'; } ?>">TRABALHE<br>CONOSCO</a></li>
							</ul>
						</li>
						<li class="<?php if((is_category('release')) or (is_category('na-midia')) or (is_page('downloads')) or (is_singular('post'))){ echo 'active'; } ?>">
							<a href="javascript:" title="MÍDIA">MÍDIA</a>
							<ul class="submenu">
								<li><a href="<?php echo get_home_url(); ?>/midia/release" title="RELEASES" class="<?php if(is_category('release')){ echo 'active'; } ?>">RELEASES</a></li>		
								<li><a href="<?php echo get_home_url(); ?>/midia/na-midia" title="NA MÍDIA" class="<?php if(is_category('na-midia')){ echo 'active'; } ?>">NA MÍDIA</a></li>		
								<li><a href="<?php echo get_permalink(get_page_by_path('downloads')); ?>" title="DOWNLOAD" class="<?php if(is_page('downloads')){ echo 'active'; } ?>">DOWNLOAD</a></li>				
							</ul>
						</li>
					</ul>
				</nav>

			</div>

		</div>
	</header>