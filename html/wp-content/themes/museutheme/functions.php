<?php

// Text domain

load_theme_textdomain( 'custom', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);


// Load Font Awesome

function thirty8base_enqueue_awesome() {
	wp_enqueue_style( 'thirty8base-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.3.0' );
}

add_action( 'wp_enqueue_scripts', 'thirty8base_enqueue_awesome' );

// Load Additional Styles

function thirty8base_enqueue_addstyle() {
	wp_enqueue_style( 'calendar', get_template_directory_uri() . '/modules/fullcalendar/fullcalendar.css', array(), '1.0', 'screen' );
	wp_enqueue_style( 'calendar-print', get_template_directory_uri() . '/modules/fullcalendar/fullcalendar-print.css', array(), '1.0', 'print' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
	wp_enqueue_style( 'imagetricks', get_template_directory_uri() . '/css/imagetricks.css', array() );
}

add_action( 'wp_enqueue_scripts', 'thirty8base_enqueue_addstyle' );

// Load Javascript

function thirty8theme_load_scripts() {
	if (!is_admin()) {
		// Register our Javascript
		wp_register_script('meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array('jquery'), false, false);
		// Load our Javascript
		wp_enqueue_script('meanmenu');
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '3.3.6', true );
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), '3.4.1', true );

	}
}
add_action('wp_enqueue_scripts', 'thirty8theme_load_scripts');


// Register widgets/sidebars

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
// Registrar áreas de widgets
function theme_widgets_init() {
 // Área 1
 register_sidebar( array (
 'name' => 'Primary Widget Area',
 'id' => 'primary_widget_area',
 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
 'after_widget' => "</li>",
 'before_title' => '<h3 class="widget-title">',
 'after_title' => '</h3>',
  ) );

 // Área 2
 register_sidebar( array (
 'name' => 'Secondary Widget Area',
 'id' => 'secondary_widget_area',
 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
 'after_widget' => "</li>",
 'before_title' => '<h3 class="widget-title">',
 'after_title' => '</h3>',
  ) );
} // end theme_widgets_init

add_action( 'init', 'theme_widgets_init' );
// Enable menus
$preset_widgets = array (
 'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
 'secondary_widget_area'  => array( 'links', 'meta' )
);
if ( isset( $_GET['activated'] ) ) {
 update_option( 'sidebars_widgets', $preset_widgets );
}
// Verificar widgets nas áreas de widgets
function is_sidebar_active( $index ){
  global $wp_registered_sidebars;

  $widgetcolums = wp_get_sidebars_widgets();

  if ($widgetcolums[$index]) return true;

 return false;
} // end is_sidebar_active



add_theme_support( 'nav-menus' );

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary' => __( 'Primary' ),
			'footer' => __( 'Footer' )
		)
	);
}


// Feed support

add_theme_support('automatic-feed-links');


// Post thumbnails

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 60, 60, true ); // hard crop mode
add_image_size( 'index-object', 300, 300, true );	// index object

// http://css-tricks.com/snippets/wordpress/remove-width-and-height-attributes-from-inserted-images/

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// http://www.mightyminnow.com/2014/02/wordpress-captions-how-to-remove-default-10px-padding/

function remove_caption_padding( $width ) {
	return $width - 10;
}
add_filter( 'img_caption_shortcode_width', 'remove_caption_padding' );


// Check browser (and stuff it into our body class)

add_filter('body_class','thirty8theme_browser_body_class');
function thirty8theme_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}

add_filter('body_class','thirty8theme_mobile_body_class');
// Add Mobile Body Class "wp-is-mobile" for mobile and "wp-is-not-mobile" for non-mobile device
function thirty8theme_mobile_body_class( $classes ){
    if ( wp_is_mobile() ) :
        $classes[] = 'wp-is-mobile';
    else :
        $classes[] = 'wp-is-not-mobile';
    endif;
    return $classes;
}


// Remove WordPress "junk" from the header file (remove lines if it's something here that you want to use)

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


// Remove rel attribute from the category list, for validation
function remove_category_list_rel($output)
{
  $output = str_replace(' rel="category tag"', '', $output);
  return $output;
}
add_filter('wp_list_categories', 'remove_category_list_rel');
add_filter('the_category', 'remove_category_list_rel');


// Comments

// Custom callback to list comments
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
  ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    	<div class="comment-author-section clearfix">
	        <div class="comment-author vcard">
	        	<?php commenter_link() ?>
	        </div>
	        <div class="comment-meta">
	        <?php printf(__('%1$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'thirty8theme'),
	                    get_comment_date(),
	                    get_comment_time(),
	                    '#comment-' . get_comment_ID() );
	                    edit_comment_link(__('Edit', 'thirty8theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>');
	                    if($args['type'] == 'all' || get_comment_type() == 'comment') :
	                comment_reply_link(array_merge($args, array(
	                    'reply_text' => __('Reply to this comment','thirty8theme'),
	                    'login_text' => __('Log in to reply.','thirty8theme'),
	                    'depth' => $depth,
	                    'before' => ' <span class="meta-sep">|</span> <span class="comment-reply-link">',
	                    'after' => '</span>'
	                )));
	            endif;
	         ?>
	         </div>
	      </div>

  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'thirty8theme') ?>
          <div class="comment-content clearfix">
            <?php comment_text() ?>
        	</div>
        <?php } // end custom_comments

// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
            <li id="comment-<?php comment_ID() ?>" <?php comment_class('thirty8-g') ?>>
                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'thirty8theme'),
                        get_comment_author_link(),
                        get_comment_date(),
                        get_comment_time() );
                        edit_comment_link(__('Edit', 'thirty8theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'thirty8theme') ?>
            <div class="comment-content">
                	<?php comment_text() ?>
            </div>
<?php } // end custom_pings

// Produces an avatar image with the hCard-compliant photo class
function commenter_link() {
    $commenter = get_comment_author_link();
    if ( preg_match( '~]* class=[^>]+>~', $commenter ) ) {
    	$commenter = preg_replace( '~(]* class=[\'"]?)~', '\\1url ' , $commenter );
	} else { $commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
    }
    $avatar_email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 60 ) );
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}


// Custom post types

//add_action( 'init', 'create_my_post_types' );

	function create_my_post_types() {

		register_post_type('sidebar', array(
		'labels' => array(
			'name' => __( 'Sidebars' ),
			'singular_name' => __( 'Sidebar' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Sidebar' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Sidebar' ),
			'new_item' => __( 'New Sidebar' ),
			'view' => __( 'View Sidebar' ),
			'view_item' => __( 'View Sidebar' ),
			'search_items' => __( 'Search Sidebars' ),
			'not_found' => __( 'No Sidebars found' ),
			'not_found_in_trash' => __( 'No Sidebars found in Trash' ),
		),
		'public' => false,
		'show_ui' => true,
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'menu_position' => 24,
		'menu_icon'   => 'dashicons-layout',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'sidebar', 'with_front' => false ),
		'supports' => array( 'title', 'editor' ),
		'has_archive' => false
		) );

		register_post_type('newsletter', array(
		'labels' => array(
			'name' => __( 'Newsletters' ),
			'singular_name' => __( 'Newsletter' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Newsletter' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Newsletter' ),
			'new_item' => __( 'New Newsletter' ),
			'view' => __( 'View Newsletters' ),
			'view_item' => __( 'View Newsletter' ),
			'search_items' => __( 'Search Newsletters' ),
			'not_found' => __( 'No Newsletters found' ),
			'not_found_in_trash' => __( 'No Newsletters found in Trash' ),
		),
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'menu_position' => 22,
		'menu_icon'   => 'dashicons-email-alt',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'newsletters', 'with_front' => 'false' ),
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'has_archive' => 'newsletters' // Will use the post type slug, ie. example
		) );


	}

// ACF Options

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}


// Function for displaying caption on featured image

function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span class="wp-caption-text">'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}


// Shortcodes

function thirty8base_pullquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'float' => '$align',
		), $atts));
	return '<blockquote class="shortcode-pullquote ' . $float . '">' . $content . '</blockquote>';
 }

add_shortcode('pullquote', 'thirty8base_pullquote');

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since MyTheme 1.0
 */
class MyTheme_Customize {
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    *
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since MyTheme 1.0
    */
   public static function register ( $wp_customize ) {

      //2. Register new settings to the WP database...
      $wp_customize->add_setting( 'link_textcolor', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => '#229ac7', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );

      $wp_customize->add_setting( 'link_hovercolor', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => '#3eb2de', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );

      //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'mytheme_link_textcolor', //Set a unique ID for the control
         array(
            'label' => __( 'Link Color', 'mytheme' ), //Admin-visible name of the control
            'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' => 'link_textcolor', //Which setting to load and manipulate (serialized is okay)
            'priority' => 10, //Determines the order this control appears in for the specified section
         )
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'mytheme_link_hovercolor', //Set a unique ID for the control
         array(
            'label' => __( 'Link Hover Color', 'mytheme' ), //Admin-visible name of the control
            'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' => 'link_hovercolor', //Which setting to load and manipulate (serialized is okay)
            'priority' => 11, //Determines the order this control appears in for the specified section
         )
      ) );

      //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
      $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
      $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
   }

   /**
    * This will output the custom WordPress settings to the live theme's WP head.
    *
    * Used by hook: 'wp_head'
    *
    * @see add_action('wp_head',$func)
    * @since MyTheme 1.0
    */
   public static function header_output() {
      ?>
      <!--Customizer CSS-->
      <style type="text/css">
           <?php self::generate_css('#site-title a', 'color', 'header_textcolor', '#'); ?>

           <?php self::generate_css('body', 'background-color', 'background_color', '#'); ?>

           <?php self::generate_css('a:link, a:visited, #primary-nav li, #primary-nav li ul a:hover, #breadcrumbs span i, #sidebar .widget ul li a:link, #sidebar .widget ul li a:visited, nav#footer-navigation ul li a:link, nav#footer-navigation ul li a:visited, footer ul.social-links li a:hover', 'color', 'link_textcolor'); ?>

           <?php self::generate_css('#primary-nav a, .button, .button:visited, .mean-container .mean-bar, #navbar, #primary-nav li, .wp-pagenavi a:link, .wp-pagenavi a:visited, .wp-pagenavi span, button.search-submit:hover', 'background', 'link_textcolor'); ?>

           <?php self::generate_css('a:hover, a:focus, a:active, #sidebar .widget ul li a:hover, #sidebar .widget ul li a:focus, #sidebar .widget ul li a:active, nav#footer-navigation ul li a:hover, nav#footer-navigation ul li a:focus, nav#footer-navigation ul li a:active', 'color', 'link_hovercolor'); ?>

           <?php self::generate_css('#primary-nav a:hover, #primary-nav a.focus, #primary-nav a.active, .button:hover, .button:focus, .button:active, #primary-nav li:hover, .wp-pagenavi a:hover, .wp-pagenavi a:focus, .wp-pagenavi a:active, .wp-pagenavi a:hover, .wp-pagenavi span.current ', 'background', 'link_hovercolor'); ?>

      </style>
      <!--/Customizer CSS-->
      <?php
   }

   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    *
    * Used by hook: 'customize_preview_init'
    *
    * @see add_action('customize_preview_init',$func)
    * @since MyTheme 1.0
    */
   public static function live_preview() {
      wp_enqueue_script(
           'mytheme-themecustomizer', // Give the script a unique ID
           get_template_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
           array(  'jquery', 'customize-preview' ), // Define dependencies
           '', // Define a version (optional)
           true // Specify whether to put in footer (leave this true)
      );
   }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since MyTheme 1.0
     */
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'MyTheme_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'MyTheme_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'MyTheme_Customize' , 'live_preview' ) );



// Culture Object Stuff Below Here ----------------------------------------------------------------


// Add theme support for COS remappings

function custom_theme_setup()
{
	add_theme_support( 'cos-remaps' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );



// Example shortcode
// this one is [objectsnippet number=IN2015.14] where number = Object Number

function co_shortcode($atts)
{

	//echo "slug = " . print_r($atts);

	$objectid = $atts["number"];

	$shortcodequeryargs=array(
	   'post_type'=>'object',
	   'posts_per_page' => -1,
	   'meta_key' => 'objectNumber',
	   'meta_value' => $objectid,
	);

	$coshortcodequery = new WP_Query( $shortcodequeryargs );

	while ( $coshortcodequery->have_posts() ) : $coshortcodequery->the_post();

		$singleshortcode = '<div class="index-object-inner">';
		$singleshortcode = $singleshortcode . '<h2>' . get_the_title() . '</h2>';
		$singleshortcode = $singleshortcode . '<p>' . cos_the_field("briefDescription") . '</p>';
		$singleshortcode = $singleshortcode . '<p><a href="' . get_permalink() . '">See this obect &raquo;</a></p>';
		$singleshortcode = $singleshortcode . '</div>';

	endwhile;

	return $singleshortcode;

}



add_shortcode('objectsnippet','co_shortcode');

function objectNumber2Category() {
  $categories = array(
    'C' => array(
	'Dispositivo computacional',
	array(
	    0 => array(
                'Computador',
                array(
                    1 => 'Computador pessoal',
                    2 => 'Computador servidor',
                    3 => 'Estação de trabalho',
                    4 => 'Estação de trabalho',
                    9 => 'Outro computador',
		)
            ),
            1 => array(
                'Jogo eletronico',
                array(
                    1 => 'Videogame',
                    2 => 'Sensor para videogame',
                    9 => 'Outro jogo eletronico',
		)
            ),
            2 => array(
                'Dispositivo computacional analógico',
                array(
                    1 => 'Computador analógico',
                    9 => 'Outro dispositivo computacional analógico',
		)
            ),
            3 => array(
                'Dispositivo computacional analógico',
                array(
                    1 => 'Personal Digital Assistant (PDA)',
                    2 => 'Tablet',
                    3 => 'Smartphone',
                    9 => 'Outro dispositivo computacional analógico',
		)
            ),
            9 => array(
                'Outros de Dispositivo computacional',
                array()
            )
	)),
    'D' => array(
	'Dispositivo Mecanico',
	array(
            0 => array(
                'Dispositivo mecânico para cálculo',
                array(
                    1 => 'Ábaco',
                    2 => 'Régua de cálculo',
                    3 => 'Calculadora mecânica',
                    9 => 'Outro dispositivo mecânico para cálculo',
		)
            ),
            1 => array(
                'Dispositivo de escrita',
                array(
                    1 => 'Máquina de escrever',
                    2 => 'Processador de texto',
                    9 => 'Outro dispositivo de escrita',
		)
            ),
            2 => array(
                ' Dispositivo de reprodução',
                array(
                    1 => 'Mimeógrafo',
                    9 => 'Outro dispositivo de reprodução',
		)
            ),
            9 => array(
		'Outros de Dispositivo Mecanico',
                array()
            )

	)),
    'P' => array(
        'Periférico',
        array(
            0 => array(
                'Dispositivo de armazenamento',
                array(
                    1 => 'Unidade de disco magnético rígido',
                    2 => 'Unidade de disco removível',
                    3 => 'Unidade de fita magnética',
                    4 => 'Gravador de disco óptico (CD, DVD, BluRay)',
                    5 => 'Unidade de armazenamento em memória não volátil',
                    9 => 'Outro dispositivo de armazenamento',
		)
            ),
            1 => array(
                'Dispositivo de entrada de dados',
                array(
                    1 => 'Dispositivo alfanumérico',
                    2 => 'Dispositivo de apontamento',
                    3 => 'Dispositivo de controle de ação',
                    4 => 'Dispositivo de captura de imagens',
                    5 => 'Dispositivo de captura de vetores',
                    9 => 'Outro dispositivo de entrada de dados',
		)
            ),
            2 => array(
                'Dispositivo de impressão',
                array(
                    1 => 'Impressora',
                    2 => 'Plotter',
                    3 => 'Dispositivo multifuncional',
                    9 => 'Outro dispositivo de impressão',
		)
            ),
            3 => array(
                'Dispositivo de comunicacao de dados',
                array(
                    1 => 'Modem',
                    2 => 'Roteador',
                    3 => 'Switch/Hub',
                    9 => 'Outro dispositivo de comunicacao de dados',
		)
            ),
            4 => array(
                'Dispositivo de visualização',
                array(
                    1 => 'Monitor de vídeo',
                    2 => 'Placa de vídeo',
                    3 => 'Dispositivo de apontamento',
                    9 => 'Outro dispositivo de visualização',
                )
            ),
            5 => array(
                'Dispositivo de sensoriamento ou medicao',
                array(
                    1 => 'Sensor analógico',
                    2 => 'Sensor digital',
                    9 => 'Outro dispositivo de sensoriamento ou medição',
		)
            ),
            9 => array(
                'Outros de Periférico',
                array()
            )
        )),
    'M' => array(
	'Midia',
	array(
	    0 => array(
                'Mídia magnética',
                array(
                    1 => 'Disco magnético',
                    2 => 'Fita magnética',
                    9 => 'Outra mídia magnética',
                )
            ),
            1 => array(
                'Mídia óptica ou magneto-óptica',
                array(
                    1 => 'Disco óptico',
                    2 => 'Disco magneto-óptico',
                    9 => 'Outra mídia óptica ou magneto-óptica',
                )
            ),
            2 => array(
                'Mídia baseada em papel',
                array(
                    1 => 'Mídia para impressão (papel)',
                    2 => 'Fita perfurada',
                    3 => 'Cartão perfurado',
                    9 => 'Outra mídia baseada em papel',
                )
            ),
            3 => array(
                'Mídia fotográfica',
                array(
                    1 => 'Película fotográfica',
                    2 => 'Película cinematográfica',
                    3 => 'Microfilme',
                    4 => 'Microficha',
                    9 => 'Outra mídia fotográfica',
                )
            ),
            4 => array(
                'Mídia baseada em memória',
                array(
                    1 => 'Cartão de memória flash',
                    9 => 'Outra mídia baseada em memória',
                )
            ),
            5 => array(
                'Mídia analógica para áudio',
                array(
                    1 => 'Disco',
                    2 => 'Cilindro',
                    9 => 'Outra mídia analógica para áudio',
                )
            ),
            9 => array(
                'Outros de Midia',
                array()
            ),

	)),
    'A' => array(
	'Dispositivo Audiovisual',
	array(
            0 => array(
                'Dispositivo de áudio',
                array(
                    1 => 'Amplificador',
                    2 => 'Tocador de áudio digital',
                    3 => 'Tocador de fita magnética',
                    4 => 'Tocador de discos de vinil',
                    5 => 'Rádio',
                    6 => 'Editor de áudio',
                    7 => 'Alto-falante, caixa de som e semelhantes',
                    9 => 'Outro dispositivo de áudio',
                )
            ),
            1 => array(
                'Dispositivo de imagem',
                array(
                    1 => 'Câmera de fotografia',
                    2 => 'Leitora de microfilme',
                    3 => 'Projetor de imagens estáticas',
                    9 => 'Outro dispositivo de imagem',
                )
            ),
            2 => array(
                'Dispositivo de áudio e vídeo',
                array(
                    1 => 'Aparelho de TV',
                    2 => 'Câmera',
                    3 => 'Gravador e tocador de áudio e vídeo',
                    4 => 'Editor de vídeo',
                    5 => 'Sintonizador de canais',
                    6 => 'Projetor de filme',
                    7 => 'Editor de filme',
                    9 => 'Outro dispositivo de áudio e vídeo',
                )
            ),
            3 => array(
                'Dispositivo de comunicação',
                array(
                    1 => 'Aparelho de fac-símile',
                    2 => 'Aparelho de telefone',
                    3 => 'Chaveador de chamadas',
                    4 => 'Identificador de chamadas',
                    5 => 'Secretária eletrônica',
                    6 => 'Telefone celular',
                    9 => 'Outro dispositivo de comunicação',
                )
            ),
            9 => array(
                'Outros de Dispositivo Audiovisual',
                array()
            ),

	)),
    'X' => array(
	'Interfaces, Cabos e Energia',
	array(
            0 => array(
                'Interfaces e cabos de comunicação de dados',
                array(
                    1 => 'Cabo de comunicação de dados entre computador e periférico',
                )
            ),
            1 => array(
                'Interfaces e cabos de dispositivos audiovisuais',
                array(
                    1 => 'Cabo de áudio e/ou vídeo',
                )
            ),
            2 => array(
                'Interfaces e cabos de energia',
                array(
                    1 => 'Cabos de energia',
                    2 => 'Fontes de energia',
                )
            ),
            9 => array(
                'Outros de Interfaces, Cabos e Energia',
                array()
            ),
	)),
    'Z' => array(
	'Miscelânea',
	array(
            1 => array(
                'Componentes isolados',
                array(
                    0 => 'Placas de circuito',
                    1 => 'Circuitos integrados e componentes eletrônicos',
                    2 => 'Sensores',
                    3 => 'Displays',
                    9 => 'Outros componentes isolados',
                )
            ),
            9 => array(
                'Outros de Miscelânea',
                array()
            ),

	)),
  );

  $args = array('post_type' => 'object', 'posts_per_page' => -1);
  $custom_query = new WP_Query( $args );
  while ($custom_query->have_posts()) {
    $custom_query->the_post();
    $id = get_the_ID();
    $objectNumber = get_post_meta($id, 'objectNumber', true);
    $objectParts = explode(".", $objectNumber);

    $letter = $objectParts[0][0];
    $catN = $objectParts[0][1];
    $subcatN = $objectParts[0][2];
    $objN = $objectParts[1];

    if (array_key_exists($letter, $categories)) {
        $section = $categories[$letter];
        $sectionName = $section[0];

        if (array_key_exists($catN, $section[1])) {
	    $cat = $section[1][$catN];
            $catName = $cat[0];

            if (array_key_exists($subcatN, $cat[1])) {
                $subcatName = $cat[1][$subcatN];
            } else {
                $subcatName = 'Desconhecido';
            }
        } else {
            $catName = 'Desconhecido';
            $subcatName = 'Desconhecido';
        }
    } else {
        $sectionName = 'Outros';
        $catName = 'Desconhecido';
        $subcatName = 'Desconhecido';
    }

    $term_id = term_exists($sectionName, 'categoria');
    if (!$term_id) {
        $slug = str_replace(" ", "-", strtolower($sectionName));
        wp_insert_term($sectionName, 'categoria', array('slug' => $slug));
        $parent_term_id = term_exists($sectionName, 'categoria');
    } else {
        $parent_term_id = $term_id;
    }
    wp_set_object_terms($id, $sectionName, 'categoria', true);

    $term_id = term_exists($catName, 'categoria');
    if (!$term_id) {
        $slug = str_replace(" ", "-", strtolower($catName));
        wp_insert_term($catName, 'categoria', array('slug' => $slug, 'parent' => $parent_term_id['term_id']));
        $parent_term_id = term_exists($catName, 'categoria');
    } else {
        $parent_term_id = $term_id;
    }
    wp_set_object_terms($id, $catName, 'categoria', true);
    $term_id = term_exists($subcatName, 'categoria');
    if (!$term_id) {
        $slug = str_replace(" ", "-", strtolower($subcatName));
        wp_insert_term($subcatName, 'categoria', array('slug' => $slug, 'parent' => $parent_term_id['term_id']));
    }
    wp_set_object_terms($id, $subcatName, 'categoria', true);
  }
}

$labels = array(
    'name'              => __('Categoria'),
    'singular_name'     => __('Categoria'),
    'search_items'      => __('Buscar Categoria'),
    'all_items'         => __('Todas as Categorias'),
    'parent_item'       => __('Categoria Pai'),
    'parent_item_colon' => __('Categoria Pai:'),
    'edit_item'         => __('Editar Categoria'),
    'update_item'       => __('Atualizar Categoria'),
    'add_new_item'      => __('Nova Categoria'),
    'new_item_name'     => __('Novo Nome de Categoria'),
    'menu_name'         => __('Categorias'),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'categoria', 'with_front' => false),
);

register_taxonomy('categoria', array('object'), $args);

objectNumber2Category();
$iter = 0;
function categorias_section( $sections = array() ) {
	global $iter;
	$taxonomy = 'categoria';
    // set link class (for determing later if the term is a top-level term)
    $link_class = '';
    if ( empty( $sections ) ) {
        $link_class = 'root';  // set the link class to root on the first iteration
        $sections = get_terms( $taxonomy, array(
            'parent' => 0, // only return top-level terms
            'hide_empty' => 0 // don't return empty terms
        ) ); // (taxonomy, args)

        echo '<ul class="main-menu clearfix">';

	}
    foreach ( $sections as $section ) {
        $section_children = get_terms( $taxonomy, array( // get terms of children
            'parent' => $section->term_id, // identify children if the parent is in the $sections array
            'hide_empty' => 0 // again, hide empties
        ) );
 		$parents_list =  explode('/', get_term_parents_list( $section, $taxonomy,  array( 'link' => false )));
		$parents_number = sizeof($parents_list) - 2;
		$pn = "pn" . $parents_number . $iter;
		$inputid = $pn;
		$iter++;
        //echo '<li >'; // create a new list item in the unordered list
        echo '<li class="'. $pn . '">';
        echo '<a  href="' . get_term_link( $section, $taxonomy ) . '" class="' . $link_class . '" rel="' . $section->slug . '">
				' . $toggle . $section->name . '
				<span class="drop-icon">▾</span>
                <label title="Toggle Drop-down" class="drop-icon" for="'. $inputid.'">
					<i class="fa fa-chevron-right" aria-hidden="true">
				    </i>
				</label>
				</a>';
		echo '<input type="checkbox" id="'. $inputid.'" >';
		//echo '<span >' . $section->name . '</span>'; // display the taxonomy name

        if ( !empty( $section_children ) ) { // if there are children in the array

            echo '<ul id="' . $section->slug . '" class="sub-menu">'; // create a new nested unordered list with the ID of the parent slug

            categorias_section( $section_children ); // call again the kb_sections which looks for sub-sub-menus
        }

        if ( empty( $section_children ) ) { // however, if there are no children in the array (aka, we've arrived at the final level)
            $newargs = array( // arguments for the query to populate lowest menu with items
                'post_type' => 'object',
		'tax_query' => array(
			array(
				'taxonomy' => 'categoria',
				'field'    => $section->slug,
				'terms'    => $section->term_id,
			),
		),
                'order'    => 'ASC',
                'posts_per_page' => -1
            );

            $my_new_query = new WP_Query( $newargs ); // run query to find all posts using argument above
            echo '<ul class="sub-menu">'; //create the final unordered list, one that stores links to titles

            while ( $my_new_query->have_posts() ) : $my_new_query->the_post(); // start the custom loop
                // this must be output in 5 lines, and not all in one, or else errors are thrown.
                echo '<li style="padding-left: 30px;"><a href="';
                echo the_permalink();
                echo '">';
                echo get_the_title();
                echo '</a></li>';
            endwhile;
            wp_reset_postdata();
            echo '</ul>';
        }
        echo "</li>";
    }
    echo "</ul>";
}


function categorias_navsection( $sections = array() ) {
	global $iter;
	$taxonomy = 'categoria';
    // set link class (for determing later if the term is a top-level term)
    $link_class = '';
    if ( empty( $sections ) ) {
        $link_class = 'root';  // set the link class to root on the first iteration
        $sections = get_terms( $taxonomy, array(
            'parent' => 0, // only return top-level terms
            'hide_empty' => 0 // don't return empty terms
        ) ); // (taxonomy, args)

        echo '<ul class="main-menu clearfix">';

	}
    foreach ( $sections as $section ) {
        $section_children = get_terms( $taxonomy, array( // get terms of children
            'parent' => $section->term_id, // identify children if the parent is in the $sections array
            'hide_empty' => 0 // again, hide empties
        ) );
 		$parents_list =  explode('/', get_term_parents_list( $section, $taxonomy,  array( 'link' => false )));
		$parents_number = sizeof($parents_list) - 2;
		$pn = "pn" . $parents_number . $iter;
		$inputid = $pn;
		$iter++;
        //echo '<li >'; // create a new list item in the unordered list
        echo '<li class="'. $pn . '">';
        echo '<a  href="' . get_term_link( $section, $taxonomy ) . '" class="' . $link_class . '" rel="' . $section->slug . '">
				' . $toggle . $section->name . '
				<span class="drop-icon">▾</span>
                <label title="Toggle Drop-down" class="drop-icon" for="'. $inputid.'">
					<i class="fa fa-chevron-left" aria-hidden="true">
				    </i>
				</label>
				</a>';
		echo '<input type="checkbox" id="'. $inputid.'" >';
		//echo '<span >' . $section->name . '</span>'; // display the taxonomy name

        if ( !empty( $section_children ) ) { // if there are children in the array

            echo '<ul id="' . $section->slug . '" class="sub-menu">'; // create a new nested unordered list with the ID of the parent slug

            categorias_navsection( $section_children ); // call again the kb_sections which looks for sub-sub-menus
        }

        if ( empty( $section_children ) ) { // however, if there are no children in the array (aka, we've arrived at the final level)
            $newargs = array( // arguments for the query to populate lowest menu with items
                'post_type' => 'object',
		'tax_query' => array(
			array(
				'taxonomy' => 'categoria',
				'field'    => $section->slug,
				'terms'    => $section->term_id,
			),
		),
                'order'    => 'ASC',
                'posts_per_page' => -1
            );

            $my_new_query = new WP_Query( $newargs ); // run query to find all posts using argument above
            echo '<ul class="sub-menu">'; //create the final unordered list, one that stores links to titles

            while ( $my_new_query->have_posts() ) : $my_new_query->the_post(); // start the custom loop
                // this must be output in 5 lines, and not all in one, or else errors are thrown.
                echo '<li style="padding-left: 30px;"><a href="';
                echo the_permalink();
                echo '">';
                echo get_the_title();
                echo '</a></li>';
            endwhile;
            wp_reset_postdata();
            echo '</ul>';
        }
        echo "</li>";
    }
    echo "</ul>";
}
?>
