<?php 
	$prefs = '';
    if (is_user_logged_in()){
        $prefs = get_user_prefs( get_current_user_id() );
        $user_logged = get_currentuserinfo();
        if (
                current_user_can('administrator') ||
                current_user_can('editor') ||
                current_user_can('author') ||
                current_user_can('colaborator')
        ){
            $user_can = true;
        }
    }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<link rel="dns-prefetch" href="//netdna.bootstrapcdn.com" crossorigin>
		<link rel="dns-prefetch" href="//www.googletagmanager.com" crossorigin>
		<link rel="dns-prefetch" href="//fonts.googleapis.com" crossorigin>
		<title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>
		<?php 
			if ( is_single() ){ 
				global $post;
				$single_post = get_post($post->ID);
		?><script type="application/ld+json">
		{
            "@context": "http://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "<?php echo get_the_permalink( $post->ID ) ?>"
            },
            "headline": "<?php echo get_the_title( $post->ID ) ?>",
			"image": [
                "<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ) ?>"
			],
			"datePublished": "<?php echo $single_post->post_date ?>",
            "dateModified": "<?php echo $single_post->post_modified ?>",
            "author": {
                "@type": "Person",
                "name": "Noticias EnElVigia"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Noticias En El Vigía",
                "logo": {
                    "@type": "ImageObject",
                    "url": "http://www.eluniversal.com/img/default.png"
                }
            },
            "description": "<?php echo $single_post->post_excerpt ?>"
        }
		</script>
		<?php }else{ ?>
		<script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
			"url": "https://enelvigia.com.ve",
			"name": "Noticias En El Vigía",
			"description": "Noticias de El Vigía, Venezuela y el mundo. Avances informativos de &uacute;ltimo minuto sobre: econom&iacute;a, deportes, entretenimiento, sucesos, pol&iacute;tica y m&aacute;s",
			"logo": "http://www.eluniversal.com/img/default.png",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "+58-426-176-26-33",
                "contactType": "customer service",
                "email": "contacto@enelvigia.com.ve",
                "areaServed": "VE",
                "availableLanguage": "Spanish"
            }],
            "sameAs": [
                "https://www.facebook.com/enelvigia",
                "https://twitter.com/enelvigia",
                "https://www.instagram.com/noticiasenelvigia/"
            ]
        }
		</script>
		<!--
		<script type="application/ld+json">
			{
			"@context":"http://schema.org",
			"@type":"ItemList",
			"itemListElement":[
				{
				"@type":"ListItem",
				"position":1,
				"description": "Encuentra noticias de Venezuela y el mundo. Avances informativos de &uacute;ltimo minuto sobre: Econom&iacute;a",
				"url":"http://www.eluniversal.com/economia",
				"name": "El Universal: Econom&iacute;a "
				},
				{
				"@type":"ListItem",
				"position":2,
				"description": "Encuentra noticias de Venezuela y el mundo. Avances informativos de &uacute;ltimo minuto sobre: Caracas",
				"url":"http://www.eluniversal.com/caracas",
				"name": "El Universal: Caracas"
				},
				{
				"@type":"ListItem",
				"position":3,
				"description": "Encuentra noticias de Venezuela y el mundo. Avances informativos de &uacute;ltimo minuto sobre: Deportes",
				"url":"http://www.eluniversal.com/deportes",
				"name": "El Universal: Deportes"
				},
				{
				"@type":"ListItem",
				"position":4,
				"description": "Encuentra noticias de Venezuela y el mundo. Avances informativos de &uacute;ltimo minuto sobre: Opini&oacute;n",
				"url":"http://www.eluniversal.com/opinion",
				"name": "El Universal: Opini&oacute;n"
				},
				{
				"@type":"ListItem",
				"position":5,
				"description": "Encuentra noticias de Venezuela y el mundo. Avances informativos de &uacute;ltimo minuto sobre: Entretenimiento",
				"url":"http://www.eluniversal.com/entretenimiento",
				"name": "El Universal: Entretenimiento"
				},
				{
				"@type":"ListItem",
				"position":6,
				"description": "Encuentra noticias de Venezuela y el mundo. Avances informativos de &uacute;ltimo minuto sobre: Internacionales",
				"url":"http://www.eluniversal.com/internacional",
				"name": "El Universal: Internacionales"
				},
				{
				"@type":"ListItem",
				"position":7,
				"description": "Encuentra noticias de Venezuela y el mundo. Avances informativos de &uacute;ltimo minuto sobre: Sucesos",
				"url":"http://www.eluniversal.com/sucesos",
				"name": "El Universal: Sucesos"
				},
				{
				"@type":"ListItem",
				"position":8,
				"description": "Encuentra noticias de Venezuela y el mundo. Avances informativos de &uacute;ltimo minuto sobre: Pol&iacute;tica",
				"url":"http://www.eluniversal.com/politica",
				"name": "El Universal: Pol&iacute;tica"
				}
			]
			}
		</script>
		-->
		<?php } ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
															  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
					'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
									})(window,document,'script','dataLayer','GTM-MTQBLKH');</script>
		<!-- End Google Tag Manager -->
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			 if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			 n.queue=[];t=b.createElement(e);t.async=!0;
			 t.src=v;s=b.getElementsByTagName(e)[0];
			 s.parentNode.insertBefore(t,s)}(window, document,'script',
											 'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '1867999663525660');
			fbq('track', 'PageView');
			fbq('track', 'ViewContent');
			fbq('track', 'Search');
		</script>
		<noscript><img height="1" width="1" style="display:none"
					   src="https://www.facebook.com/tr?id=1867999663525660&ev=PageView&noscript=1"
					   /></noscript>
		<meta charset="UTF-8">
		<meta http-equiv="refresh" content="<?php echo rand (3,5)?>00">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="title" content="Noticias de El Vigía Mérida, Zona Panamericana y Sur del Lago | enElVigia" />
		<?php if ( is_single() ){ ?>
		<meta name="description" content="<?php get_the_excerpt() ?>" />
		<?php } ?>
		<meta name="robots" content="INDEX,FOLLOW,NOODP" />
		<meta name="googlebot" content="INDEX,FOLLOW" />
		<meta name="author" content="Noticias En El Vigía" />
		<meta name="lang" content="es" />
		<meta name="revisit-after" content="1 days" />
		<meta name="news_keywords" />
		<meta name="wot-verification" content="6b7934559376fd190076"/>
		<meta name="application-name" content="Noticias enElVigia"/>
		<meta name="msapplication-TileColor" content="#333333" />
		<meta name="msapplication-square70x70logo" content="<?php echo STYLESHEET_URL ?>/img/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="<?php echo STYLESHEET_URL ?>/img/mstile-150x150.png" />
		<link href="<?php echo STYLESHEET_URL ?>/img/favicon.ico" rel="shortcut icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo STYLESHEET_URL ?>/img/-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo STYLESHEET_URL ?>/img/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="<?php echo STYLESHEET_URL ?>/img/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="<?php echo STYLESHEET_URL ?>/img/favicon-32x32.png" sizes="32x32" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo STYLESHEET_URL ?>/css/fontello.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display" rel="stylesheet">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({
				google_ad_client: "ca-pub-3930153357515520",
				enable_page_level_ads: true
			});
		</script>
		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:132327,hjsv:5};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
		<?php wp_head() ?>
		<style>
			body{
				font-size: 16px;
				color: #333333;
				font-family: 'Open Sans', sans-serif;
			}
			body:not(.home) .main-container{
				padding: 80px 0;
			}
			.main-container.dark-mode{
				background: #0a0a0a;
				color: #dedede;
			}
			h1,h2,h3,h4,h5,h6{
				font-family: 'Playfair Display', serif;
				font-weight: 700;
			}
			.eev-config-btn{
				cursor: pointer;
				color: orange;
				font-size: 18px;
			}
			.eev-config-btn:hover{
				color: darkorange;
			}
			.form-control{
				border: none;
    			border-bottom: 1px solid #ccc;
				border-radius: 0;
				box-shadow: none;
			}
			.eev-site-title{
				font-family: 'Playfair Display', serif;
				color: black;
				font-weight: 900;
			}
			.navbar-brand,
			.navbar-brand:hover{
				padding: 10px 15px;
				color: currentColor;
			}
			.navbar-brand img{
				display: inline-block;
			}
			.eev-site-date{
				font-size: 14px;
				padding-top: 16px;
				color: lightslategray;
			}
			.navbar-eev{
				background: white;
				box-shadow: 0px 2px 17px rgba(14, 14, 14, 0.1);
				border: none;
			}
			.eev-main-nav{
				text-transform: uppercase;
				font-size: 12px;
				font-weight: 700;
				color: #141414;
			}
			.eev-main-nav>li>a{
				border-bottom: 3px solid transparent;
				color: #333333;
			}
			.eev-main-nav>li.active a,
			.eev-main-nav>li>a:hover{
				background: transparent;
				border-bottom: 3px solid currentColor;
			}
            .hi-to-user{
                font-size: 12px;
                display: inline-block;
                margin-bottom: 12px;
            }
			.archive-post-cat-list a{
				border-bottom: 2px solid currentColor;
				font-size: 12px;
				padding-bottom: 2px;
				font-weight: 900;
				text-transform: uppercase;
			}
			.archive-post-cat-list a,
			.archive-post-cat-list a:hover{
				text-decoration: none;
			}
			.ciudad{
				color: darkgreen !important;
			}
			.regionales{
				color: forestgreen !important;
			}
			.nacionales{
				color: saddlebrown !important;	
			}
			.politica{
				color: dodgerblue !important;
			}
			.economia{
				color: purple !important;
			}
			.widget_recent_entries{
				margin: 18px 0;
			}
			.widget_recent_entries a{
				color: currentColor;
				text-decoration: none;
				font-size: 14px;
				padding: 12px;
				display: block;
			}
			.widget_recent_entries ul{
				list-style: none;
				margin: 0;
				padding: 0;
			}
			.widget_recent_entries ul li{
				border-bottom: 1px solid lightgray;
				border-left: 3px solid transparent;
			}
			.widget_recent_entries ul li:hover{
				background: #e8e8e8;
				font-weight: bold;
				border-left: 3px solid #838383;
			}
			.ordering-category-list-placeholder{
				background: #f9f9f9;
				padding: 20px;
			}
			.ordering-category-list{
				list-style: none;
				margin: 0;
				padding: 0;
			}
			.ordering-category-list li{
				padding: 5px 10px;
				border: 1px solid #d4d4d4;
				background: #f1f1f1;
				margin: 3px 0;
			}
			/*
			.ordering-category-list:not(.disabled) li{
				cursor: grab;
			}
			*/
			.ordering-category-list li .form-group,
			.ordering-category-list li .form-group label{
				margin: 0;
			}
			.ui-state-highlight{
				padding: 5px 10px;
				border: 1px dashed gray;
				background: #4d4d4d;
				min-height: 34px;
			}
			.modal-user-link{
				font-size: 14px;
				display: inline-block;
				margin-top: 6px;
			}
			.modal-user-link.logout{
				color: red;
			}
			.modal-user-link.login{
				color: green;
			}
			.modal-user-link.logout{
			}
			.footer{
				background: #F5F5F5;
				font-size: 14px;
			}
			.footer .fa{
				font-size: 24px;
				color: dimgray;
			}
			.footer-atencion{
				margin: 36px 0;
			}
			.footer-slogan{
				margin: 18px 0;
				font-weight: bold;
				font-style: italic;
			}
		</style>
	</head>
	<body <?php body_class() ?>>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTQBLKH"
						  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<header id="header" class="header">
			<nav class="navbar navbar-eev navbar-fixed-top">
				<div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#eev_top_menu" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand eev-site-title" href="<?php echo SITEURL ?>"><img src="<?php echo STYLESHEET_URL ?>/img/favicon-32x32.png" alt="Noticias En El Vigia - Logo"> Noticias En El Vigía</a> <span class="navbar-brand eev-site-date hidden-xs"><?php echo date('d-m-Y H:m') ?></span>
                            </div>
                            <div id="eev_top_menu" class="collapse navbar-collapse">
                                <form class="navbar-form navbar-right" action="<?php echo SITEURL ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Buscar" name="s" required>
                                    </div>
                                    <button type="submit" class="btn btn-default">Buscar</button>
                                    <span id="eev_config_btn" class="eev-config-btn" data-toggle="modal" data-target="#preferencias-del-usuario" title="Ajuste sus preferencias"><i class="fa fa-cog"></i></span>
                                </form>
                                <?php
                                    wp_nav_menu( array(
                                        'menu_class'        => 'nav navbar-nav navbar-right eev-main-nav',
                                        'menu_id'           => 'eev_top_menu_list',
                                        'theme_location'    => 'main_nav',
                                        'depth'             => 2,
            //							'container'         => 'div',
            //							'container_class'   => 'collapse navbar-collapse',
            //							'container_id'      => 'eev_top_menu',
                                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                        'walker'            => new wp_bootstrap_navwalker())
                                    );

                               ?>
                            </div>
                        </div>
					</div>
					<?php if ( $user_logged ){ ?>
					<div class="row">
					    <div class="col-xs-12 text-right">
					        <span class="hi-to-user">Hola!, <?php echo $user_logged->display_name ?><?php echo ($user_can) ? ' <a href="' . get_admin_url() . '">Ir al Escritorio</a>' : '' ?> </span>
					    </div>
					</div>
					<?php } ?>
				</div>
			</nav>
		</header>
		<div id="main-container" class="main-container <?php echo (in_array('modo_noche', $prefs ))  ? 'dark-mode' : '' ?>">
		<?php
			if ( have_posts() ){

				if ( is_home() ){
					get_template_part('templates/home');
				} elseif ( is_single() ){
					get_template_part('templates/single');
				} elseif ( is_page() ){
					get_template_part('templates/page');
				} else {
					get_template_part('templates/archive');
				}
				
			}
		?>
		</div>
		<footer>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer-search">
                                <h2>Buscar</h2>
                                <form class="footer-search-form" action="<?php  echo esc_url( home_url() ); ?>" method="get">
                                    <div class="input-group">
                                        <input name="s" type="text" class="form-control" placeholder="Escriba aqui lo que quiere buscar">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default">Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </form>
                                <p class="footer-slogan text-center">Es casi imposible llevar la antorcha de la verdad a trav&eacute;s de una multitud sin quemarle la barba a alguien. <br/><span class="slogan-autor">Georg Ch. Lichtenberg</span></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="footer-widgets">
                            <div class="col-md-3 text-center"><?php dynamic_sidebar( 'footer1' ); ?></div>
                            <div class="col-md-3 text-center"><?php dynamic_sidebar( 'footer2' ); ?></div>
                            <div class="col-md-3 text-center"><?php dynamic_sidebar( 'footer3' ); ?></div>
                            <div class="col-md-3 text-center"><?php dynamic_sidebar( 'footer4' ); ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Contacto</h3>
                            <address>
                                <p><strong>Direcci&oacute;n:</strong> Urbanizaci&oacute;n La Trinidad, av. ppal. #27, El Vig&iacute;a, estado M&eacute;rida. CP 5145</p>
                            </address>
                            <p><strong>Tel&eacute;fono:</strong> 0426 1762633</p>
                            <p><strong>Email:</strong> <a href="<?php echo home_url('contacto'); ?>">contacto@enelvigia.com.ve</a></p>
                        </div>
                        <div class="col-md-3">
                            <h3>Noticias enElVigia</h3>
                            <ul class="footer-list">
                                <li>
                                    <a href="<?php echo home_url('nosotros'); ?>" title="Nosotros">Nosotros</a>
                                </li>
                                <li>
                                    <a href="<?php echo home_url('mision'); ?>" title="Misi&oacute;n">Misi&oacute;n</a>
                                </li>
                                <li>
                                    <a href="<?php echo home_url('vision'); ?>" title="Visi&oacute;n">Visi&oacute;n</a>
                                </li>
                                <li>
                                    <a href="<?php echo home_url('compromiso'); ?>" title="Compromiso">Compromiso</a>
                                </li>
                            </ul>
                            <!--h2>Legal</h2>
                            <ul class="footer-list">
                                <li>
                                    <a href="<?php echo home_url('aviso-legal'); ?>" title="Aviso Legal">Aviso Legal</a>
                                </li>
                                <li>
                                    <a href="<?php echo home_url('politica-de-privacidad'); ?>" title="Pol&iacute;tica de Privacidad">Pol&iacute;tica de Privacidad</a>
                                </li>
                                <li>
                                    <a href="<?php echo home_url('politica-de-cookies'); ?>" title="Pol&iacute;tica de Cookies">Pol&iacute;tica de Cookies</a>
                                </li>
                            </ul-->
                        </div>
                        <div class="col-md-3">
                           	<h3>Redes Sociales</h3>
                            <ul class="footer-socials list-inline">
                                <li><a href="http://www.facebook.com/enelvigia" title="Facebook enElVigia"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://www.twitter.com/enelvigia" title="Twitter enElVigia"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/noticiasenelvigia/" title="Twitter enElVigia"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://chat.whatsapp.com/AauCJomZhcr24WzfxNePHK" title="Grupo de WhatsApp enElVigia"><i class="fa fa-whatsapp"></i></a></li>
                                <!--li><a href="#" title="LinkedIn enElVigia"><i class="icon icon-linkedin"></i></a></li-->
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center footer-atencion">
                            <p><strong>ATENCIÓN:</strong> TODOS LOS CONTENIDOS PUBLICADOS EN ESTE SITE SON PROPIEDAD DE SUS RESPECTIVOS DUEÑOS, ENELVIGIA.COM.VE NO SE HACE RESPONSABLE POR LOS CONTENIDOS DE TERCEROS. CADA NOTICIA ESTÁ ASOCIADA AL MEDIO DE ORIGEN. LOS AVISOS DE GOOGLE SON PROPIEDAD DE GOOGLE Y EN NINGÚN MOMENTO GUARDAN RELACION CON LA LÍNEA EDITORIAL DEL PORTAL ENELVIGIA.COM.VE</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="copyright">enElVigia.com.ve, Noticias de El Vigía Mérida, Zona Panamericana y Zona Sur del Lago. &copy; 2015 - <?php echo date('Y') ?> / Rif. V-15020763-7 - Desarrollado por <a href="<?php echo esc_url('http://jmrpadrino.com.ve'); ?>" target="_blank" class="webmaster">Jose Manuel Rodr&iacute;guez</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
		<!-- Modal -->
		<div class="modal fade" id="preferencias-del-usuario" tabindex="-1" role="dialog" aria-labelledby="preferencias-del-usuario">
			<div class="modal-dialog modal-lg" role="document">
				<form id="user_preferences-form" role="form" method="post">
				<input type="hidden" name="user_id" value="<?php echo ( is_user_logged_in() ) ? get_current_user_id() : 'guest' ?>">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php if ( is_user_logged_in() ){ $logged_user = get_currentuserinfo();  ?>
						<h4 class="modal-title" id="myModalLabel">Bienvenido! <?php echo $logged_user->display_name ?>, ajuste sus preferencias de visualización</h4>
						<?php }else{ ?>
						<h4 class="modal-title" id="myModalLabel">Ajuste sus preferencias de visualización</h4>
						<?php } ?>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-5">
								<h4>Portada</h4>
								<p>Marque y ordene las secciones que desea mostrar en su portada</p>
								<div class="ordering-category-list-placeholder">
									<ul class="ordering-category-list disabled">
										<li>
											<div class="form-group">
												<input id="show_un" type="checkbox" name="show_un" checked disabled>
												<label for="show_un">Mostrar sección Últimas Noticias</label>
											</div>
										</li>
									</ul>
									<ul class="ordering-category-list">
										<li class="ui-state-default">
											<div class="form-group">
												<input id="ciudad" type="checkbox" name="ciudad" <?php 
													echo (!is_user_logged_in()) ? 'checked' : ( is_user_logged_in() && in_array('ciudad', $prefs )) ? 'checked' : '';
												?>
												<?php echo (!is_user_logged_in()) ? 'disabled' : '' ?>>
												<label for="el-vigia">Mostrar sección El Vigía</label>
											</div>
										</li>
										<li class="ui-state-default">
											<div class="form-group">
												<input id="nacionales" type="checkbox" name="nacionales" <?php 
													echo (!is_user_logged_in()) ? 'checked' : ( is_user_logged_in() && in_array('nacionales', $prefs )) ? 'checked' : '';
												?>
												<?php echo (!is_user_logged_in()) ? 'disabled' : '' ?>>
												<label for="nacionales">Mostrar sección Nacionales</label>
											</div>
										</li>
										<li class="ui-state-default">
											<div class="form-group">
												<input id="internacionales" type="checkbox" name="internacionales" <?php 
													echo (!is_user_logged_in()) ? 'checked' : ( is_user_logged_in() && in_array('internacionales', $prefs )) ? 'checked' : '';
												?>
												<?php echo (!is_user_logged_in()) ? 'disabled' : '' ?>>
												<label for="internacionales">Mostrar sección Internacionales</label>
											</div>
										</li>
										<li class="ui-state-default">
											<div class="form-group">
												<input id="politica" type="checkbox" name="politica" <?php 
													echo (!is_user_logged_in()) ? 'checked' : ( is_user_logged_in() && in_array('politica', $prefs )) ? 'checked' : '';
												?>
												<?php echo (!is_user_logged_in()) ? 'disabled' : '' ?>>
												<label for="politica">Mostrar sección Política</label>
											</div>
										</li>
										<li class="ui-state-default">
											<div class="form-group">
												<input id="economia" type="checkbox" name="economia" <?php 
													echo (!is_user_logged_in()) ? 'checked' : ( is_user_logged_in() && in_array('economia', $prefs )) ? 'checked' : '';
												?>
												<?php echo (!is_user_logged_in()) ? 'disabled' : '' ?> >
												<label for="economia">Mostrar sección Economía</label>
											</div>
										</li>
										<li class="ui-state-default">
											<div class="form-group">
												<input id="sucesos" type="checkbox" name="sucesos" <?php 
													echo (!is_user_logged_in()) ? 'checked' : ( is_user_logged_in() && in_array('sucesos', $prefs )) ? 'checked' : '';
												?>
												<?php echo (!is_user_logged_in()) ? 'disabled' : '' ?>>
												<label for="sucesos">Mostrar sección Sucesos</label>
											</div>
										</li>
										<li class="ui-state-default">
											<div class="form-group">
												<input id="deportes" type="checkbox" name="deportes" <?php 
													echo (!is_user_logged_in()) ? 'checked' : ( is_user_logged_in() && in_array('deportes', $prefs )) ? 'checked' : '';
												?>
												<?php echo (!is_user_logged_in()) ? 'disabled' : '' ?>>
												<label for="deportes">Mostrar sección Deportes</label>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-7">
								<h4>Modo Enfoque</h4>
								<p>Active el modo enfoque para ocultar la barra lateral y tener una mejor visibilidad del contenido.</p>
								<div class="form-group">
									<input id="modo_enfoque" type="checkbox" name="modo_enfoque" <?php echo (is_user_logged_in() && in_array('modo_enfoque', $prefs ))  ? 'checked' : '';?>>
									<label for="modo_enfoque">Activar</label>
								</div>
								<h4>Modo Nocturno</h4>
								<p>Active el modo nocturno para cambiar el color. Especial para aquellos que pasan muchas horas frente a la pantalla.</p>
								<div class="form-group">
									<input id="modo_noche" type="checkbox" name="modo_noche" <?php echo (is_user_logged_in()  && in_array('modo_noche', $prefs ))  ? 'checked' : '';?>>
									<label for="modo_noche">Activar</label>
								</div>
								<div class="alert alert-info alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>Importante!</strong> Si usted no es un usuario registrado sus preferencias se guardarán solo 24 horas, si desea que sus preferencias se guarden permanentemente, le invitamos a <strong><a href="<?php echo wp_registration_url() ?>">registrarse</a></strong>. Gracias.
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="pull-left">
						<?php $redirectto = ( is_home() ) ? home_url() : get_the_permalink(); ?>
						<?php if ( is_user_logged_in() ){ ?>
						<a class="modal-user-link logout" href="<?php echo wp_logout_url( $redirectto ) ?>">Desconectarme</a>
						<?php }else{ ?>
						 <a class="btn btn-success" href="<?php echo wp_login_url( $redirectto ) ?>">Entrar</a>&nbsp;&nbsp;&nbsp;<a class="modal-user-link register" href="<?php echo wp_registration_url() ?>">Registrarme</a>
						<?php } ?>
						</div>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<?php if ( is_user_logged_in() ){ ?>
						<button id="submited_preferences" name="submited_preferences" type="submit" class="btn btn-primary">Guardar</button>
						<?php } ?>
					</div>
				</div>
				</form>
			</div>
		</div>
		<!-- END Modal -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!--script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script-->
		<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-beta.2/lazyload.js"></script>
		<script src="<?php echo STYLESHEET_URL ?>/js/jquery.sticky.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>
		<script>
			<?php 
				if ($prefs)
				echo (in_array('modo_enfoque', $prefs ))  ? 'window.eev_user_prefs = { "darkMode" : true };' : '';
			?>
			
			if (window.hasOwnProperty('eev_user_prefs')) {
				console.log('darkmode')
				jQuery("#main_sidebar").hide();
				jQuery("#article_container").removeClass('col-lg-9');
				jQuery("#article_container").addClass('col-lg-10 col-md-offset-2 col-lg-offset-1');
			}else{
				jQuery("#article_container").addClass('col-lg-9');
				jQuery("#article_container").removeClass('col-lg-10 col-md-offset-2 col-lg-offset-1');
				jQuery("#main_sidebar").show();
			}
			jQuery(document).ready( function(){
				
				jQuery("#sticky_sidebar").sticky({topSpacing:60});
				
				jQuery("img.lazyload").lazyload();
//				jQuery( "#sortable" ).sortable({
//			    	placeholder: "ui-state-highlight"
//				});
//				jQuery( "#sortable" ).disableSelection();
				// modo_enfoque
				jQuery("#modo_enfoque").click(function () {
					focus_mode($(this));
				});
				jQuery("#modo_noche").click(function () {
					if (jQuery(this).is(":checked")) {
						jQuery("#main-container").addClass('dark-mode');
					} else {
						jQuery("#main-container").removeClass('dark-mode');
					}
				});
				
				function focus_mode(e = ''){
					if (e.is(":checked")) {
						jQuery("#main_sidebar").hide();
						jQuery("#article_container").removeClass('col-lg-9');
						jQuery("#article_container").addClass('col-lg-10 col-md-offset-2 col-lg-offset-1');
					} else {
						jQuery("#article_container").addClass('col-lg-9');
						jQuery("#article_container").removeClass('col-lg-10 col-md-offset-2 col-lg-offset-1');
						jQuery("#main_sidebar").show();
					}
				}
			})
		</script>
	</body>
</html>
