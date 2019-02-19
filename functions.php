<?php
/**
 * REMOVE AFTER USE
 */
function mostrar($var, $die = false){
	echo '<pre>';
	var_dump( $var );
	echo '</pre>';
	if( $die ) die;
}

/**
 * DEFINITIONS 
 */



define( 'SITEURL', esc_url( home_url() ) );
define( 'STYLESHEET_URL', esc_url( get_template_directory_uri() ) );

/**
 * INCLUDES 
 */
require_once 'includes/wp_bootstrap_navwalker.php';
require_once 'includes/eev_helper_functions.php';

/**
 * SUPPORTS 
 */
add_theme_support( 'automatic-feed-links' );
add_theme_support( 
	'html5', 
	array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) 
);
add_theme_support( 'post-formats', array( 'quote', 'status', 'video', 'image', 'audio' ) );
add_theme_support( "title-tag" );
add_theme_support( 'post-thumbnails' );

/**
 * REGISTER MENUS
 */
if (function_exists('register_nav_menus')) {
	register_nav_menus( array(
		'main_nav' => __( 'Menu Superior', 'eev' ),
		'footer_nav' => __( 'Menu Footer', 'eev' ),
	) );
};

/**
 * REGISTER SIDEBARS
 */
function enelvigia_widgets_init(){
	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'eev' ),
		'id'            => 'inner_sidebar',
		'description'   => __( 'Lateral de las seccione internas.', 'eev' ),
		'before_widget' => '<div id="%1$s" class="widget inner_sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="inner_sidebar_widget_title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'enelvigia_widgets_init' );

/**
 * EXCERPT LENGTH CONTROL
 */
function theme_slug_excerpt_length( $length ) {
        if ( is_admin() ) {
                return $length;
        }
        return 15;
}
add_filter( 'excerpt_length', 'theme_slug_excerpt_length', 999 );

/* REMOVE EMOJIS SUPPORT FOR SITE -> 12/02/2019 -> JOSE RODRIGUEZ */
/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'generator');


//function add_login_logout_link($items, $args) {
//mostrar($items);
//mostrar($args, true);
//return $items;
//}
//add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
// wp_get_nav_menu_items

function add_login_logout_link($items, $menu, $args) {
mostrar($args['include'], true);
return $args;
}
//add_filter('wp_get_nav_menu_items', 'add_login_logout_link', 10, 3);

add_action('pre_get_posts', 'filter_press_tax');
function filter_press_tax( $query ){
	//mostrar($query, true);
//	if( $query->is_home() ):
//		$query->set('posts_per_page', 10);
//		return;
//	endif;
//	if( $query->is_category() || $query->is_search() ):
//		$query->set('posts_per_page', 20);
//		return;
//	endif;
}


function eev_similar_links($content){
	if ( is_single() ){
		$categories = wp_get_post_categories( get_the_ID() );	
		foreach ( $categories as $c ){
			$cat = get_category( $c );
			if( 'destacados' != $cat->slug ){
				$cat_name = $cat->slug;
			}
		}
		$args = array(
			'post__not_in' => array( get_the_ID() ),
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => array( $cat_name )
				)
			),
			//'category_name ' => $cat_name,
		);
		$alt_posts = new WP_Query( $args );
		if ( $alt_posts->have_posts() ){
			
			$i = 0;
			$new_content = '';

			$new_content .= '<div class="internal-linking-list-placeholder">';
			$new_content .= '<h2>También le puede interesar:</h2>';
			$new_content .= '<ol class="internal-linking-list">';
			while ( $alt_posts->have_posts() && $i < 3 ){
				$alt_posts->the_post();
				$new_content .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
				$i++;
			}
			wp_reset_postdata();
			$new_content .= '</ol>';
			$new_content .= '</div>';

			$new_content .= $content;
			return $new_content;
		}
	}else{
		return $content;
	}
}
add_filter('the_content', 'eev_similar_links');

function show_posts_from_cat($postid, $count){
	$categories = wp_get_post_categories( $postid );	
	foreach ( $categories as $c ){
		$cat = get_category( $c );
		if( 'destacados' != $cat->slug ){
			$cat_name = $cat->slug;
			$cat_title = $cat->name;
		}
	}
	$args = array(
		'post__not_in' => array( $postid ),
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => array( $cat_name )
			)
		),
		//'category_name ' => $cat_name,
	);
	$alt_posts = new WP_Query( $args );
	if ( $alt_posts->have_posts() ){
			
		$i = 0;
		$new_content = '';

		$new_content .= '<div class="internal-linking-list-placeholder">';
		$new_content .= '<h4>Más sobre ' . $cat_title . '</h4>';
		$new_content .= '<ul class="internal-linking-list">';
		while ( $alt_posts->have_posts() && $i < 3 ){
			$alt_posts->the_post();
			$new_content .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
			$i++;
		}
		wp_reset_postdata();
		$new_content .= '</ul>';
		$new_content .= '</div>';

		$new_content .= $content;
		return $new_content;
	}
}

/**
 * USER CONTROL ACCESS
 */
function custom_blockusers_init() {
  if ( 
	  is_user_logged_in() && 
	  is_admin() && 
	  !current_user_can( 'administrator' ) &&
	  !current_user_can( 'editor' ) &&
	  !current_user_can( 'author' ) &&
	  !current_user_can( 'contributor' )
  ) {
    wp_redirect( home_url() );
    exit;
  }
}
add_action( 'init', 'custom_blockusers_init' ); // Hook into 'init'


/**
 * REGISTRATION FORM FIXES
 */
//1. Add a new form element...
add_action( 'register_form', 'myplugin_register_form' );
function myplugin_register_form() {

$first_name = ( ! empty( $_POST['first_name'] ) ) ? sanitize_text_field( $_POST['first_name'] ) : '';
$last_name = ( ! empty( $_POST['last_name'] ) ) ? sanitize_text_field( $_POST['last_name'] ) : '';

	?>
	<p>
		<label for="first_name"><?php _e( 'Nombre', 'mydomain' ) ?><br />
			<input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(  $first_name  ); ?>" size="25" /></label>
	</p>
	<p>
		<label for="first_name"><?php _e( 'Apellido', 'mydomain' ) ?><br />
			<input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(  $last_name  ); ?>" size="25" /></label>
	</p>
	<?php
}

//2. Add validation. In this case, we make sure first_name is required.
add_filter( 'registration_errors', 'myplugin_registration_errors', 10, 3 );
function myplugin_registration_errors( $errors, $sanitized_user_login, $user_email ) {

	if ( empty( $_POST['first_name'] ) || ! empty( $_POST['first_name'] ) && trim( $_POST['first_name'] ) == '' ) {
	$errors->add( 'first_name_error', sprintf('<strong>%s</strong>: %s',__( 'ERROR', 'mydomain' ),__( 'You must include a first name.', 'mydomain' ) ) );

	}

	return $errors;
}
//3. Finally, save our extra registration user meta.
add_action( 'user_register', 'myplugin_user_register' );
function myplugin_user_register( $user_id ) {
	if ( ! empty( $_POST['first_name'] ) ) {
		update_user_meta( $user_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
	}
}
function change_login_headerurl( $login_header_url ){
	$login_header_url = SITEURL;
	return $login_header_url;
}
add_filter('login_headerurl', 'change_login_headerurl');
function change_login_headertitle( $login_header_title ){
	$login_header_title = get_bloginfo( 'name' );
	return $login_header_title;
}
add_filter('login_headertitle', 'change_login_headertitle');
function add_classes_to_wordpress_form( $classes ){
	$classes[] = 'eev-wordpress-body-form';
	return $classes;
}
add_filter('login_body_class', 'add_classes_to_wordpress_form', 10, 2);
function add_styles_to_wordpress_forms(){
	?>
<style>
	.eev-wordpress-body-form{
		background: linear-gradient(
          rgba(255, 255, 255, .1), 
          rgba(0, 0, 0, 1)
        ), url(<?php echo STYLESHEET_URL ?>/img/eev-wordpress-forms-bkg.jpeg);
		background-size: cover;
		background-attachment: fixed;
		background-position: left top;
	}
	.eev-wordpress-body-form.login #nav a,
	.eev-wordpress-body-form.login #backtoblog a{
		color: white;
	}
	.eev-wordpress-body-form.login h1 a{
		background-image: url(<?php echo STYLESHEET_URL ?>/img/apple-touch-icon-114x114.png);
		background-blend-mode:soft-light;
		
	}
	.login .eev-message-box {
		margin-top: 20px;
		margin-left: 0;
		padding: 26px 24px 46px;
		font-weight: 400;
		overflow: hidden;
		background: #fff;
		box-shadow: 0 1px 3px rgba(0,0,0,.13);
	}
	.aviso{
		color: darkorange;
	}
	.eev-message-box-container{
		max-width: 1080px;
		margin: auto;
		font-size: 16px;
	}
	.eev-wordpress-form-footer{
		background: #1d1d1d;
		color: gray;
		text-align: center;
		padding: 26px 24px 46px;
	}
</style>
	<?php
}
add_action('login_header', 'add_styles_to_wordpress_forms');
function eev_add_message_box(){
	?>
<div class="eev-message-box">
	<div class="eev-message-box-container">
		<p><strong class="aviso">Aviso!</strong> <strong>Noticias EnElVigia</strong> es un portal de noticias esta comprometido con la seguridad de sus datos, si en algún momento usted desea finalizar la suscripción en nuestro portal le pedimos que nos envie un correo a <a href="mailto:salirme@enelvigia.com.ve">salirme@enelvigia.com.ve</a> y eliminaremos su suscripción en el corto plazo.</p>
	</div>
</div>
<div class="eev-wordpress-form-footer">
	<p>enElVigia.com.ve, Noticias de El Vigía Mérida, Zona Panamericana y Zona Sur del Lago. &copy; 2015 - <?php echo date('Y') ?> / Rif. V-15020763-7</p>
</div>
	<?php
}
add_action('login_footer', 'eev_add_message_box');

function eev_show_cat_list($the_post_id = ''){
	$post_categories = wp_get_post_categories( $the_post_id );
	$cat_list = '';
	$cat_list .= '<ul class="archive-post-cat-list list-inline">';
	foreach ( $post_categories as $c ){
		$cat = get_category( $c );
		if( 'destacados' != $cat->slug ){
			$cat_id = get_cat_ID( $cat->name );
			$cat_list .= '<li><a class="' . $cat->slug . '" href="'.get_category_link($cat_id).'">'.$cat->name.'</a></li>';
		}
	}
	$cat_list .= '</ul>';
	return $cat_list;
}