<style>
	.first-post-placeholder{
		background: #f5f5f5;
		margin-bottom: 36px;
		padding-top: 80px;
		box-shadow: 0px 2px 17px rgba(14, 14, 14, 0.1);
	}
	.ultimas-noticias .header-small{
		font-size: 20px;
	}
	.ultimas-noticias a,
	.ultimas-noticias a:hover{
		color: inherit;
	}
	.top-post{
		margin-bottom: 36px;
	}
	.row-google-adsense{
		padding: 18px 0;
	}
	.slogan-section{
		background: #f5f5f5;
		padding: 36px 0;
		margin: 36px 0;
	}
	.slogan-section h1{
		font-size: 24px;
		margin: 0;
	}
	.see-more-link{
		display: inline-block;
		margin: 18px 0;
		font-weight: bold;
		text-decoration: underline;
	}
	.see-more-link.top{
		margin-top: 48px;
	}
	.date-small-format{
		font-size: 14px;
		color: rgba(0, 0, 0, 0.4);
	}
	.post-box{
		padding: 24px;
		background: #eaeaea;
		border: 1px solid #cccccc;
		box-shadow: 20px 17px 47px rgba(0, 0, 0, 0.2);
	}
	.img-responsive{
		width: 100%;
	}
</style>
<!-- ultimas noticias -->
	<?php 
		$i = 1;
		while ( have_posts() ){
			the_post();
			if ( $i == 1 ){ //PRIMERA NOTICIA
				$img = 'http://placehold.it/640x480?text=Noticias%20EnElVigia';
				if( has_post_thumbnail() ){
					$img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
				}
	?>
<div class="first-post-placeholder">	
	<div class="container ultimas-noticias top">
		<div class="row top-post">
			<div class="col-md-5">
				<a href="<?php echo get_the_permalink() ?>">
					<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
				</a>
			</div>
			<div class="col-md-7">
				<?php echo eev_show_cat_list(get_the_ID()) ?>
				<a href="<?php echo get_the_permalink() ?>"><h2><?php the_title() ?></h2></a>
				<p><?php echo get_the_excerpt(); ?></p>
				<p class="date-small-format"><i>Publicado por: <?php echo get_the_author() ?> el <?php echo get_the_date() ?></i></p>
				<a class="see-more-link top" href="<?php echo get_the_permalink() ?>">Ver más</a>
			</div>
		</div>
	</div>
</div>
	<?php } ?>
	<?php 
			if ( $i > 1 ){
				$img = 'http://placehold.it/640x480?text=Noticias%20EnElVigia';
				if( has_post_thumbnail() ){
					$thumb_id = get_post_thumbnail_id( get_the_ID() );
					$thumb_file = wp_get_attachment_image_src( $thumb_id, 'full' );
					$image_size = ($thumb_file[2] > $thumb_file[1]) ? 'thumbnail' : 'medium';
					$img = get_the_post_thumbnail_url( get_the_ID(), $image_size );
				}
			}
	?>
	<?php if ( $i == 2 ){ ?>
<div class="container ultimas-noticias">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<a href="<?php echo get_the_permalink() ?>">
						<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
					</a>
					<?php echo eev_show_cat_list(get_the_ID()) ?>
					<a href="<?php echo get_the_permalink() ?>"><h2 class="header-small"><?php the_title() ?></h2></a>
					<p><?php echo get_the_excerpt(); ?></p>
					<p class="date-small-format"><i>Publicado por: <?php echo get_the_author() ?> el <?php echo get_the_date() ?></i></p>
					<a class="see-more-link" href="<?php echo get_the_permalink() ?>">Ver más</a>
				</div>
	<?php } ?>
	<?php if ( $i == 3 ) { ?>
				<div class="col-md-6">
					<a href="<?php echo get_the_permalink() ?>">
						<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
					</a>
					<?php echo eev_show_cat_list(get_the_ID()) ?>
					<a href="<?php echo get_the_permalink() ?>"><h2 class="header-small"><?php the_title() ?></h2></a>
					<p><?php echo get_the_excerpt(); ?></p>
					<p class="date-small-format"><i>Publicado por: <?php echo get_the_author() ?> el <?php echo get_the_date() ?></i></p>
					<a class="see-more-link" href="<?php echo get_the_permalink() ?>">Ver más</a>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if ( $i == 4 ){ ?>
		<div class="col-md-6 post-box">
			<div class="row">
				<div class="col-md-7">
					<?php echo eev_show_cat_list(get_the_ID()) ?>
					<a href="<?php echo get_the_permalink() ?>"><h2 class="header-small"><?php the_title() ?></h2></a>
					<p class="date-small-format"><i>Publicado por: <?php echo get_the_author() ?> el <?php echo get_the_date() ?></i></p>
					
				</div>
				<div class="col-md-5">
					<a href="<?php echo get_the_permalink() ?>">
						<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<hr />
					<?php echo show_posts_from_cat( get_the_ID(), 3) ?>
					<hr />
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-right">
					<img class="img-responsive" alt="titulo de la imagen" src="http://placehold.it/468x60?text=ADS">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="slogan-section">
	<div class="container">
		<div class="row text-center">
			<h1>Somos el primer portal de noticias de El Vigía Mérida, Zona Panamericana y Zona Sur del Lago.</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row row-google-adsense">
		<div class="col-xs-12 text-center">
			<!-- Noticias en el vigia FOLD -->
			<ins class="adsbygoogle"
				 style="display:inline-block;width:728px;height:90px"
				 data-ad-client="ca-pub-3930153357515520"
				 data-ad-slot="7543859434"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
	</div>
</div>
<?php } ?>	
<?php if ( $i == 5 ){ ?>
<div class="container ultimas-noticias bottom">
	<div class="row">
<?php } ?>
<?php if ( $i >= 5 && $i <= 7){ ?>
		<div class="col-md-4">
			<a href="<?php echo get_the_permalink() ?>">
				<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
			</a>
			<?php echo eev_show_cat_list(get_the_ID()) ?>
			<a href="<?php echo get_the_permalink() ?>"><h2 class="header-small"><?php the_title() ?></h2></a>
			<p class="date-small-format"><i>Publicado el 10/10/2019</i></p>
		</div>
<?php } ?>
<?php if ( $i == 7 ) { ?>
	</div>
	<div class="row">
<?php } ?>
<?php if ( $i > 7 && $i < 11 ) { ?>
		<div class="col-md-4">
			<a href="<?php echo get_the_permalink() ?>">
				<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
			</a>
			<?php echo eev_show_cat_list(get_the_ID()) ?>
			<a href="<?php echo get_the_permalink() ?>"><h2 class="header-small"><?php the_title() ?></h2></a>
			<p class="date-small-format"><i>Publicado el 10/10/2019</i></p>
		</div>
<?php } ?>
<?php if ( $i == 10 ){ ?>
	</div>
<?php } ?>
<?php $i++; } //END WHILE ?>
</div>
<!-- FIN ultimas noticias -->
<!-- secciones -->
<div class="container">
	
</div>
<!-- FIN secciones -->


<?php
/*
	while( have_posts() ){
		the_post();
		echo the_post_thumbnail('large', array('class' =>'lazyload')); 
		echo the_title('<a href="' . get_the_permalink() . '"><h2 class="post_title">', '</h2></a>');
		echo get_the_excerpt();
	}