<?php 
the_post();
$thumb_id = get_post_thumbnail_id( get_the_ID() );
$thumb_file = wp_get_attachment_image_src( $thumb_id, 'full' );
?>
<style>
	.eev-single-article{
		font-size: 16px;
		line-height: 1.8;
	}
	.eev-post-title{
		
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
</style>
<div class="container">

	<?php do_action( 'top_single_page' ) ?>

	<div class="row">
		<article class="eev-single-article">
			<div id="article_container" class="col-md-8 col-lg-9">
			
				<?php do_action( 'before_single_title' ) ?>
				
				<div class="row">
					<div class="col-xs-12">
						<?php echo eev_show_cat_list( get_the_ID() ) ?>
						<?php echo the_title('<h1 class="post-title eev-post-title">', '</h1>'); ?>
						<?php if ( has_excerpt() ){ ?>
						<div class="the-post-excerpt">
							<?php echo get_the_excerpt(); ?>
						</div>
						<?php } ?>
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
					<div class="col-xs-12">
						<?php the_content(); ?>
					</div>
				</div>
				<?php }else{ ?>
				<div class="row">
					<div class="col-xs-12">
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
				
					do_action( 'bottom_single_sidebar' );
				
				?>
			</div>
		</aside>
	</div>

	<?php do_action( 'bottom_single_page' ) ?>
	
</div>
		 
		
		
		