<style>
	.hero-section h1{
		margin-top: 80px;
		margin-bottom: 40px;
	}
	.archive-pagination{
		background: #eee;
		margin: 10px 0;
	}
	.archive-pagination .screen-reader-text{
		display: none;
	}
	.archive-pagination .pagination{
		margin: 10px 0;
	}
	.archive-post-image{
		margin: 7px 0;
    	margin-bottom: 18px;
	}
	.post-title-link{
		text-decoration: none;
	}
	.post-title-link,
	.post-title-link:hover{
		color: inherit;
	}
	.post-title{
		font-size: 22px;
	}
	.archive-post-excerpt{
		font-size: 14px;
	}
</style>
<div class="hero-section">
	<div class="container">
		<?php if ( is_category() ){ ?>
		<div class="row">
			<div class="col-xs-12">
				<h1>Noticias sobre <?php echo single_cat_title(); ?></h1>
				<?php the_archive_description( '<p class="taxonomy-description">', '</p>' );  ?>
			</div>
		</div>
		<?php } ?>
		<?php if ( is_search() ){ global $wp_query; ?>
		<div class="row">
			<div class="col-xs-12 col-md-9">
				<h1>Busca por: <?php echo esc_html( get_search_query( false ) ); ?>. <small>Hay <?php echo $wp_query->found_posts; ?> resultados.</small></h1>

				<form action="<?php echo home_url() ?>" role="form">
					<div class="input-group">
						<input name="s" type="text" class="form-control" placeholder="Buscar" required>
						<span class="input-group-btn">
							<button class="btn btn-default">Buscar</button>
						</span>
					</div><!-- /input-group -->
				</form>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-lg-9">
			<?php
				echo '<div class="row">';
				echo '<div class="col-xs-12 archive-pagination">';
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Anterior', 'eev' ),
					'next_text'          => __( 'Siguiente', 'eev' ),
					//'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'P.', 'eev' ) . ' </span>',
					'screen_reader_text' => ' ',
					'mid_size' => 2
				) );
				echo '</div>'; // END COL CONTENT
				echo '</div>'; // END ROW
				while( have_posts() ){
					
					the_post();
					
					
					
					echo '<article>';
					echo '<div class="row row-article">';
					echo '<div class="col-md-3">';
					echo '<a href="' . get_the_permalink() . '">';
					echo the_post_thumbnail('thumbnail', array( 'class' => 'lazyload archive-post-image img-rounded', 'alt' => get_the_title() ) ); 
					echo '</a>';
					echo '<p><small>' . get_the_date() . '</small></p>';
					echo '</div>'; // END COL THUMBNAIL
					echo '<div class="col-md-9">';
					//echo $cat_list;
					echo eev_show_cat_list( get_the_ID() );
					echo the_title('<a class="post-title-link" href="' . get_the_permalink() . '"><h2 class="post-title">', '</h2></a>');
					echo '<p class="archive-post-excerpt">' . get_the_excerpt() . '</p>';
					echo '</div>'; // END COL CONTENT
					echo '</div>'; // END ROW
					echo '</article>';
				}
				echo '<div class="row">';
				echo '<div class="col-xs-12 archive-pagination">';
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Anterior', 'eev' ),
					'next_text'          => __( 'Siguiente', 'eev' ),
					//'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Página', 'eev' ) . ' </span>',
					'screen_reader_text' => ' ',
					'mid_size' => 2
				) );
				echo '</div>'; // END COL CONTENT
				echo '</div>'; // END ROW
			?>
		</div>
		<div class="col-md-4 col-lg-3">
			<?php 
				if ( is_active_sidebar( 'inner_sidebar' ) )
					dynamic_sidebar( 'inner_sidebar' ); 
			?>
		</div>
	</div>
</div>




