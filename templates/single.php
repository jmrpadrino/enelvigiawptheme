<?php 
the_post();
$thumb_id = get_post_thumbnail_id( get_the_ID() );
$thumb_file = wp_get_attachment_image_src( $thumb_id, 'full' );
?>
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<style>
	.eev-single-article{
		font-size: 16px;
		line-height: 1.8;
	}
	.article-text{
		font-size: 21px;
	}
	.single-share-buttons .fa{
		font-size: 22px;
	}
	.eev-post-image{
		margin-bottom: 36px;
	}
	.eev-post-image.full-size{
		margin-top: 36px;
	}
	.eev-post-image.medium-size{
		margin-right: 36px;
		float: left;
	}
	.the-post-excerpt{
		margin-bottom: 18px;
		font-style: italic;
		padding-bottom: 18px;
		border-bottom: 1px solid lightgray;
	}
	.eev-single-article .single-body p{
		margin: 0 0 30px;
	}
	.eev-single-article .single-body blockquote{
		font-style: italic;
		background: whitesmoke;
		border-left: 5px solid #8c8c8c;
	}
	.dark-mode .eev-single-article .single-body blockquote{
		color: #333333;
	}
	.eev-single-article .single-body blockquote p{
		margin: 0;
	}
	.internal-linking-list-placeholder{
		display: table;
		background: #e8e8e8;
		padding: 20px;
		margin-bottom: 18px;
	}
	.internal-linking-list-placeholder h2{
		font-size: 16px;
		margin: 0px;
		margin-bottom: 12px;
		color: red;
	}
	.internal-linking-list-placeholder .internal-linking-list{
		font-size: 14px;
		padding-left: 16px;
	}
	#fb-share-icon{
		cursor: pointer;
	}
	.fa-facebook{
		color: #3b5998;
	}
	.fa-twitter{
		color: #1da1f2;
	}
	.fa-whatsapp{
		color: #25d366;
	}
	.lower-sidebar{
		margin-top: 36px;
	}
</style>
<div class="container">

	<?php do_action( 'top_single_page' ) ?>

	<div class="row">
		<article class="eev-single-article">
			<div id="article_container" class="col-md-8 col-lg-9">
			
				<?php do_action( 'before_single_title' ) ?>
				
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-8"><?php echo eev_show_cat_list( get_the_ID() ) ?></div>
						</div>
						<?php echo the_title('<h1 class="post-title eev-post-title">', '</h1>'); ?>
						<div class="the-post-excerpt">
						<?php if ( has_excerpt() ){ ?>
							<?php echo get_the_excerpt(); ?>
						<?php } ?>
							<div class="text-right single-share-buttons">
								<strong>Comparte</strong>&nbsp;&nbsp;&nbsp;&nbsp;
								<?php if ( wp_is_mobile() ){ ?>
								<a href="whatsapp://send?text=<?php echo get_the_title(); ?> - <?php echo get_the_permalink(); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
								<?php }else{ ?>
								<a target="_blank" href="https://web.whatsapp.com/send?text=*<?php echo get_the_title(); ?>* - _<?php echo trim(get_the_excerpt()); ?>_ - <?php echo get_the_permalink(); ?>" data-original-title="whatsapp" rel="tooltip" data-placement="left" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
								<?php } ?>
								<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>"><span id="fb-share-icon" class="fa fa-facebook"></span></a>
								<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>%20-%20<?php echo wp_get_shortlink(); ?> "><span id="fb-share-icon" class="fa fa-twitter"></span></a>
							</div>
						</div>
					</div>
				</div>
				
				<?php do_action( 'after_single_title' ) ?>
				
				<?php if ( 
						$thumb_file[1] > $thumb_file[2] &&
						$thumb_file[1] > 850
				){ ?>
				<div class="row">
					<div class="col-xs-12">
						<?php 
				  			$args_thumb = array(
								'large',
								array(
									'class' => 'img-responsive eev-post-image full-size', 
									'alt' => get_the_title()
								)
							);
				  			$args_thumb = apply_filters ('single_thumb_big', $args_thumb ); 
				  
				  			echo the_post_thumbnail($args_thumb[0], $args_thumb[1]); 
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 article-text">
						<?php the_content(); ?>
					</div>
				</div>
				<?php }else{ ?>
				<div class="row">
					<div class="col-xs-12 article-text">
						<?php 
				  			$args_thumb = array(
								'medium', 
								array( 
									'class' => 'img-responsive eev-post-image medium-size', 
									'alt' => get_the_title() 
								) 
							);
				  			$args_thumb = apply_filters ('single_thumb_small', $args_thumb ); 
				  
				  			echo the_post_thumbnail($args_thumb[0], $args_thumb[1]); 
							
							the_content(); 
						?>
					</div>
				</div>
				<?php } ?>
			</div>
		</article>
		<aside id="main_sidebar">
			<div class="col-md-4 col-lg-3">
				<?php 
				
					do_action( 'top_single_sidebar' );
				
					if ( is_active_sidebar( 'inner_sidebar' ) )
						dynamic_sidebar( 'inner_sidebar' ); 
					if ( is_active_sidebar( 'lower_sidebar' ) ){
						echo '<div id="sticky_sidebar" class="lower-sidebar">';
						dynamic_sidebar( 'lower_sidebar' ); 
						echo '</div>';
					}
				
					do_action( 'bottom_single_sidebar' );
				
				?>
			</div>
		</aside>
	</div>

	<?php do_action( 'bottom_single_page' ) ?>
	
</div>
		 
		
		
		