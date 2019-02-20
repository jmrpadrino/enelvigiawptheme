<?php 
$cats = array(
	'ciudad',
	'sucesos',
	'nacionales',
	'internacionales',
	'politica',
	'economia',
	'deportes'
);

if ( is_user_logged_in() ){
	if( get_user_meta( get_current_user_id(), 'eev_user_preferences', true) )
		$cats = get_user_meta( get_current_user_id(), 'eev_user_preferences', true);
}
$last_news_ids = array();
?>
<style>
	.first-post-placeholder{
		background: #f5f5f5;
		margin-bottom: 36px;
		padding-top: 80px;
		box-shadow: 0px 2px 17px rgba(14, 14, 14, 0.1);
	}
	.header-small{
		font-size: 16px;
    	line-height: 1.5;
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
		color: currentColor;
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
	.cat-list-items{
		margin: 0;
	}
	.cat-list-items a{
		color: currentColor;
	}
	.cat-list-items h2{
		margin: 0;
	}
</style>
<!-- ultimas noticias -->
	<?php 
		$i = 1;
		while ( have_posts() ){
			the_post();
			$last_news_ids[] = get_the_ID();
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
					<article>
					<a href="<?php echo get_the_permalink() ?>">
						<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
					</a>
					<?php echo eev_show_cat_list(get_the_ID()) ?>
					<a href="<?php echo get_the_permalink() ?>"><h2 class="header-small"><?php the_title() ?></h2></a>
					<p><?php echo get_the_excerpt(); ?></p>
					<p class="date-small-format"><i>Publicado por: <?php echo get_the_author() ?> el <?php echo get_the_date() ?></i></p>
					<a class="see-more-link" href="<?php echo get_the_permalink() ?>">Ver más</a>
					</article>
				</div>
	<?php } ?>
	<?php if ( $i == 3 ) { ?>
				<div class="col-md-6">
					<article>
					<a href="<?php echo get_the_permalink() ?>">
						<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
					</a>
					<?php echo eev_show_cat_list(get_the_ID()) ?>
					<a href="<?php echo get_the_permalink() ?>"><h2 class="header-small"><?php the_title() ?></h2></a>
					<p><?php echo get_the_excerpt(); ?></p>
					<p class="date-small-format"><i>Publicado por: <?php echo get_the_author() ?> el <?php echo get_the_date() ?></i></p>
					<a class="see-more-link" href="<?php echo get_the_permalink() ?>">Ver más</a>
					</article>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if ( $i == 4 ){ ?>
		<div class="col-md-6 post-box">
			<div class="row">
				<article>
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
				</article>
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
<?php if ( $i >= 5 && $i <= 8){ ?>
		<div class="col-md-3">
			<article>
			<a href="<?php echo get_the_permalink() ?>">
				<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
			</a>
			<?php echo eev_show_cat_list(get_the_ID()) ?>
			<a href="<?php echo get_the_permalink() ?>"><h2 class="header-small"><?php the_title() ?></h2></a>
			<p class="date-small-format"><i>Publicado por: <?php echo get_the_author() ?> el <?php echo get_the_date() ?></i></p>
			</article>
		</div>
<?php } ?>
<?php if ( $i == 8 ) { ?>
	</div>
	<div class="row">
<?php } ?>
<?php if ( $i > 8 && $i <= 12 ) { ?>
		<div class="col-md-3">
			<article>
			<a href="<?php echo get_the_permalink() ?>">
				<img class="img-responsive" alt="<?php the_title() ?>" src="<?php echo $img ?>">
			</a>
			<?php echo eev_show_cat_list(get_the_ID()) ?>
			<a href="<?php echo get_the_permalink() ?>"><h2 class="header-small"><?php the_title() ?></h2></a>
			<p class="date-small-format"><i>Publicado por: <?php echo get_the_author() ?> el <?php echo get_the_date() ?></i></p>
			</article>
		</div>
<?php } ?>
<?php if ( $i == 12 ){ ?>
	</div>
<?php } ?>
<?php $i++; } //END WHILE ?>
</div>
<!-- FIN ultimas noticias -->
<!-- secciones -->
<div class="container">
	<div class="row">
		<div class="col-md-8 col-lg-9">
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
<?php 
	if ($cats){
		foreach( $cats as $group ){
			$args = array(
				'post__not_in' => $last_news_ids,
				'posts_per_page' => 5,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => array( $group )
					)
				),
			);
			$alt_posts = new WP_Query( $args );
			if ( $alt_posts->have_posts() ){
				$cat_object = get_category_by_slug($group);
				echo '<div class="row"><div class="col-xs-12"><hr />';
				echo '<h3>' . $cat_object->name . '</h3>';
				echo (!empty($cat_object->category_description) ? '<p>'.$cat_object->category_description.'</p>' : '' );
				//echo mostrar($cat_object);
				echo '</div></div>';
				echo '<div class="row"><div class="col-xs-12">';
				echo '<ul class="cat-list-items">';
				while( $alt_posts->have_posts() ){
					$alt_posts->the_post();
					echo '<li><a href="'.get_the_permalink().'">';
					the_title('<h2 class="header-small">', '</h2>');
					echo '</a></li>';
				}
				echo '</ul>';
				echo '</div></div>';
				echo '<div class="row"><div class="col-xs-12">';
				echo '<a href="' . get_category_link($cat_object->term_id) . '" class="see-more-link">Ver mas</a>';
				echo '</div></div>';
			}
		}
	}
?>
</div>
		<div class="col-md-4 col-lg-3">
			<div id="sticky_sidebar">
				<?php 

					do_action( 'top_single_sidebar' );

					if ( is_active_sidebar( 'inner_sidebar' ) )
						dynamic_sidebar( 'inner_sidebar' ); 

					do_action( 'bottom_single_sidebar' );

				?>				
			</div>
		</div>
	</div>
</div>
<!-- FIN secciones -->
<?php 