
<!DOCTYPE html>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<title><?php wp_title(''); ?></title>
	<link href="<?php echo get_bloginfo( 'template_directory' );?>/css/bootstrap.min.css" rel="stylesheet">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/touch-icon-57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/touch-icon-72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/images/touch-icon-114.png" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />

	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<header id="masthead" class="wrap">

	<div class="container">

		<div id="branding" class="row">

			<div class="logo-col">
				<a id="site-logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logoMuseu_800x295.png" alt="<?php bloginfo('name'); ?>" /></a>
			</div>
			<div class="right-col">
			  <div class="search-col">
				<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="center">
					<input type="text" name="s" id="s" placeholder="<?php esc_attr_e( "Procure no acervo", "custom" ); ?>" />
				</form>
				</div>
				<div class="nav-col">

					<div id="navmenu">
						<label for="tm" id="toggle-menu">Navigation <span class="drop-icon">
							<i class="fa fa-chevron-down" aria-hidden="true"></i></span></label>
							  <input type="checkbox" id="tm">
						<?php categorias_navsection(); ?>
					</div>
			</div>

		</div><!-- /branding -->

	</div>
</header>

<?php if(!is_front_page()){ ?>
	<?php get_template_part('breadcrumb'); ?>
<?php } ?>
