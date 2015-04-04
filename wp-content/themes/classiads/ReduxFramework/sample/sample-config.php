<?php

/**
	ReduxFramework Sample Config File
	For full documentation, please visit http://reduxframework.com/docs/
**/


/**
 
	Most of your editing will be done in this section.

	Here you can override default values, uncomment args and change their values.
	No $args are required, but they can be overridden if needed.
	
**/
$args = array();


// For use with a tab example below
$tabs = array();

ob_start();

$ct = wp_get_theme();
$theme_data = $ct;
$item_name = $theme_data->get('Name'); 
$tags = $ct->Tags;
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','redux-framework-demo' ), $ct->display('Name') );

?>
<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
	<?php if ( $screenshot ) : ?>
		<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
		<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
			<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		</a>
		<?php endif; ?>
		<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
	<?php endif; ?>

	<h4>
		<?php echo $ct->display('Name'); ?>
	</h4>

	<div>
		<ul class="theme-info">
			<li><?php printf( __('By %s','redux-framework-demo'), $ct->display('Author') ); ?></li>
			<li><?php printf( __('Version %s','redux-framework-demo'), $ct->display('Version') ); ?></li>
			<li><?php echo '<strong>'.__('Tags', 'redux-framework-demo').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
		</ul>
		<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
		<?php if ( $ct->parent() ) {
			printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
				__( 'http://codex.wordpress.org/Child_Themes','redux-framework-demo' ),
				$ct->parent()->display( 'Name' ) );
		} ?>
		
	</div>

</div>

<?php
$item_info = ob_get_contents();
    
ob_end_clean();

$sampleHTML = '';
if( file_exists( dirname(__FILE__).'/info-html.html' )) {
	/** @global WP_Filesystem_Direct $wp_filesystem  */
	global $wp_filesystem;
	if (empty($wp_filesystem)) {
		require_once(ABSPATH .'/wp-admin/includes/file.php');
		WP_Filesystem();
	}  		
	$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
}

// BEGIN Sample Config

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode'] = true;

// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['dev_mode_icon_class'] = 'icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'redux_demo';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
//$args['system_info'] = true;


// Set the icon for the system info tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['system_info_icon'] = 'info-sign';

// Set the class for the system info tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
//$args['system_info_icon_class'] = 'icon-large';

$theme = wp_get_theme();

$args['display_name'] = $theme->get('Name');
//$args['database'] = "theme_mods_expanded";
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

// Define the starting tab for the option panel.
// Default: '0';
//$args['last_tab'] = '0';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
//$args['admin_stylesheet'] = 'standard';

// Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
    'link' => 'http://twitter.com/ghost1227',
    'title' => 'Follow me on Twitter', 
    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
);
$args['share_icons']['linked_in'] = array(
    'link' => 'http://www.linkedin.com/profile/view?id=52559281',
    'title' => 'Find me on LinkedIn', 
    'img' => ReduxFramework::$_url . 'assets/img/social/LinkedIn.png'
);

// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;

// Set the icon for the import/export tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: refresh
//$args['import_icon'] = 'refresh';

// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'icon-large';

/**
 * Set default icon class for all sections and tabs
 * @since 3.0.9
 */
$args['default_icon_class'] = 'icon-large';


// Set a custom menu icon.
//$args['menu_icon'] = '';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('classiads Options', 'redux-framework-demo');

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('classiads Options', 'redux-framework-demo');

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'redux_options';

$args['default_show'] = true;
$args['default_mark'] = '*';

// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';

// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
// Default: menu
//$args['page_type'] = 'submenu';

// Set the parent menu.
// Default: themes.php
// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'options_general.php';

// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;

// Set a custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
// Redux no longer ships with standard icons!
// Default: iconfont
//$args['icon_type'] = 'image';

// Disable the panel sections showing as submenu items.
// Default: true
//$args['allow_sub_menu'] = false;
    
// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
$args['help_tabs'][] = array(
    'id' => 'redux-opts-1',
    'title' => __('Theme Information 1', 'redux-framework-demo'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
);
$args['help_tabs'][] = array(
    'id' => 'redux-opts-2',
    'title' => __('Theme Information 2', 'redux-framework-demo'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
);

// Set the help sidebar for the options page.                                        
$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');


// Add HTML before the form.
/*
if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
	if (!empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace("-", "_", $args['opt_name']);
	}
	$args['intro_text'] = sprintf( __('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
} else {
	$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');
}

// Add content after the form.
$args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo');
*/

// Set footer/credit line.
//$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', 'redux-framework-demo');


$sections = array();              

//Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) :
	
  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
  	$sample_patterns = array();

    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
      	$name = explode(".", $sample_patterns_file);
      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
      }
    }
  endif;
endif;


$sections[] = array(
	'icon' => 'el-icon-cogs',
	'icon_class' => 'icon-large',
    'title' => __('General Settings', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'=>'logo',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Logo', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your logo.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),			

		array(
			'id'=>'favicon',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Favicon', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your favicon.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),

		array(
			'id'=>'layout-version',
			'type' => 'radio',
			'title' => __('Layout', 'redux-framework-demo'), 
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'options' => array('1' => 'Wide', '2' => 'Boxed'),//Must provide key => value pairs for radio options
			'default' => '1'
			),

		array(
			'id'=>'header-version',
			'type' => 'radio',
			'title' => __('', 'redux-framework-demo'), 
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			//'options' => array('1' => 'Version 1', '2' => 'Version 2'),//Must provide key => value pairs for radio options
			'default' => '2'
			),

		array(
			'id'=>'measure-system',
			'type' => 'radio',
			'title' => __('Measurement system', 'redux-framework-demo'), 
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'options' => array('1' => 'Miles', '2' => 'Kilometers'),//Must provide key => value pairs for radio options
			'default' => '2'
			),

		array(
			'id'=>'max_range',
			'type' => 'text',
			'title' => __('Maxim Range', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('You can add the max geolocation range (default: 1000', 'redux-framework-demo'),
			'default' => '1000'
			),
		array(
			'id'=>'ad_expiry',
			'type' => 'select',
			'title' => __('Regular Ads Expiry', 'redux-framework-demo'), 
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'options' => array('7' => 'One week', '30' => 'One Month', '60' => 'Two Months', '90' => 'Three Months', '120' => 'Four Months', '150' => 'Five Months', '180' => 'Six Month', '365' => 'One Year'),//Must provide key => value pairs for radio options
			'default' => '365'
			),

		array(
			'id'=>'add-detail-page-version',
			'type' => 'radio',
			'title' => __('', 'redux-framework-demo'), 
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			//'options' => array('1' => 'Version 1', '2' => 'Version 2'),//Must provide key => value pairs for radio options
			'default' => '2'
			),

		array(
            'id' => 'featured-options-on',
            'type' => 'switch',
            'title' => __('Ads slider', 'redux-framework-demo'),
            'subtitle' => __('', 'redux-framework-demo'),
            'default' => 1,
            ),
		array(
            'id' => 'hide-map',
            'type' => 'switch',
            'title' => __('Map on single category', 'redux-framework-demo'),
            'subtitle' => __('', 'redux-framework-demo'),
            'default' => 1,
            ),
			
		array(
            'id' => 'post-options-on',
            'type' => 'switch',
            'title' => __('Post moderation', 'redux-framework-demo'),
            'subtitle' => __('', 'redux-framework-demo'),
            'default' => 1,
           ),
		array(
            'id' => 'post-options-edit-on',
            'type' => 'switch',
            'title' => __('Post moderation On every edit post', 'redux-framework-demo'),
            'subtitle' => __('', 'redux-framework-demo'),
            'default' => 1,
           ),
			array(
            'id' => 'featured-options-cat',
            'type' => 'switch',
            'title' => __('Featured Ads on category related to category', 'redux-framework-demo'),
            'subtitle' => __('', 'redux-framework-demo'),
            'default' => 0,
            ),
		array(
            'id' => 'author-msg-box-off',
            'type' => 'switch',
            'title' => __('Author Message Box On/OFF', 'redux-framework-demo'),
            'subtitle' => __('Author Message box on ad detail page', 'redux-framework-demo'),
            'default' => 1,
            ),
		array(
            'id' => 'regular-ads',
            'type' => 'switch',
            'title' => __('Regular ad posting On/OFF', 'redux-framework-demo'),
            'subtitle' => __('Regular ad posting On/OFF', 'redux-framework-demo'),
            'default' => 1,
            ),
		array(
			'id'=>'locations',
			'type' => 'textarea',
			'title' => __('AD Locations', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Put AD locations Here With comma seperation. Example: London,New york', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'free_price_text',
			'type' => 'text',
			'title' => __('Free listing tag', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Add here the text tag for free listings', 'redux-framework-demo'),
			'default' => 'Free'
			),
		array(
			'id'=>'tags_limit',
			'type' => 'text',
			'title' => __('Number of tags in tag Cloud widget', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Put here a number. Example "16"', 'redux-framework-demo'),
			'default' => '15'
			),
		array(
			'id'=>'google_id',
			'type' => 'text',
			'title' => __('Google Analytics Domain ID', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Get analytics on your site. Enter Google Analytics Domain ID (ex: UA-123456-1)', 'redux-framework-demo'),
			'default' => ''
			),

		array(
			'id'=>'footer_copyright',
			'type' => 'text',
			'title' => __('Footer Copyright Text', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('You can add text and HTML in here.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'top_phone',
			'type' => 'text',
			'title' => __('Top Bar Phone Text', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('You can add text here.', 'redux-framework-demo'),
			'default' => '+444-8888-444'
			),
		array(
			'id'=>'top_phone_icon',
			'type' => 'text',
			'title' => __('Top Bar Phone Icon Code', 'redux-framework-demo'),
			'subtitle' => __('<a href="http://fontawesome.io/icons/" target="_blank">Click Here to get Code</a>', 'redux-framework-demo'),
			'desc' => __('<i class="fa fa-phone"></i>.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'top_mail',
			'type' => 'text',
			'title' => __('Top Bar E-Mail', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('You can add text here.', 'redux-framework-demo'),
			'default' => 'Support@designinvento.com'
			),
		array(
			'id'=>'top_mail_icon',
			'type' => 'text',
			'title' => __('Top Bar E-Mail Icon Code', 'redux-framework-demo'),
			'subtitle' => __('<a href="http://fontawesome.io/icons/" target="_blank">Click Here to get Code</a>', 'redux-framework-demo'),
			'desc' => __('<i class="fa fa-envelope"></i>.', 'redux-framework-demo'),
			'default' => ''
			),

		array(
			'id'=>'map-style',
	        'type' => 'textarea',
	        'title' => __('Map Styles', 'redux-framework-demo'), 
	        'subtitle' => __('Check <a href="http://snazzymaps.com/" target="_blank">snazzymaps.com</a> for a list of nice google map styles.', 'redux-framework-demo'),
	        'desc' => __('Ad here your google map style.', 'redux-framework-demo'),
	        'validate' => 'html_custom',
	        'default' => '',
	        'allowed_html' => array(
	            'a' => array(
	                'href' => array(),
	                'title' => array()
	            ),
	            'br' => array(),
	            'em' => array(),
	            'strong' => array()
	       		)
			),
			
		
		),
	);	
	
$sections[] = array(
	'icon' => 'el-icon-cogs',
	'icon_class' => 'icon-large',
    'title' => __('Home settings', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'=>'home-cat-counter',
			'type' => 'select',
			'title' => __('How many Categories on homepage?', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'options' => array('4' => '4', '8' => '8', '12' => '12'),
			'default' => '8'
			),
			
		array(
			'id'=>'home-ads-counter',
			'type' => 'select',
			'title' => __('How many ads on homepage?', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'options' => array('8' => '8','12' => '12', '16' => '16', '20' => '20', '24' => '24', '28' => '28', '32' => '32'),
			'default' => '12'
			),

		array(
            'id' => 'home-cat-disable',
            'type' => 'switch',
            'title' => __('Categories on homepage', 'redux-framework-demo'),
            'subtitle' => __('', 'redux-framework-demo'),
            'default' => 1,
            ),
		array(
            'id' => 'home-location-disable',
            'type' => 'switch',
            'title' => __('Locations on homepage', 'redux-framework-demo'),
            'subtitle' => __('', 'redux-framework-demo'),
            'default' => 1,
            ),
			
		array(
            'id' => 'home-callout-disable',
            'type' => 'switch',
            'title' => __('Callout on homepage', 'redux-framework-demo'),
            'subtitle' => __('', 'redux-framework-demo'),
            'default' => 1,
            ),
			
			array(
			'id'=>'home-ads-view',
			'type' => 'select',
			'title' => __('Select Ads view type', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'options' => array('grid' => 'Grid view', 'list' => 'List view'),
			'default' => 'grid'
			),

	)
);

$sections[] = array(
	'icon' => 'el-icon-website',
	'icon_class' => 'icon-large',
    'title' => __('Pages', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'=>'login',
			'type' => 'text',
			'title' => __('Login Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'profile',
			'type' => 'text',
			'title' => __('Profile Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),	

		array(
			'id'=>'edit',
			'type' => 'text',
			'title' => __('Edit Profile Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),	

		array(
			'id'=>'register',
			'type' => 'text',
			'title' => __('Register Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'reset',
			'type' => 'text',
			'title' => __('Reset Password Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'new_post',
			'type' => 'text',
			'title' => __('New Ad Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'edit_post',
			'type' => 'text',
			'title' => __('Edit Ad Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'featured_plans',
			'type' => 'text',
			'title' => __('Featured Plans Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		),
	);

$sections[] = array(
	'icon' => 'el-icon-font',
	'icon_class' => 'icon-large',
    'title' => __('Fonts', 'redux-framework-demo'),
	'fields' => array(
		
		array(
            'id' => 'heading1-font',
            'type' => 'typography',
            'title' => __('H1 Font', 'redux-framework-demo'),
            'subtitle' => __('Specify the headings font properties.', 'redux-framework-demo'),
            'google' => true,
            'output' => array('h1, h1 a, h1 span'),
            'default' => array(
                'color' => '#3f3d59',
                'font-size' => '38.5px',
                'font-family' => 'Roboto Slab',
                'font-weight' => '700',
                'line-height' => '40px',
                ),
         	),

		array(
            'id' => 'heading2-font',
            'type' => 'typography',
            'title' => __('H2 Font', 'redux-framework-demo'),
            'subtitle' => __('Specify the headings font properties.', 'redux-framework-demo'),
            'google' => true,
            'output' => array('h2, h2 a, h2 span'),
            'default' => array(
                'color' => '#444',
                'font-size' => '31.5px',
                'font-family' => 'Raleway',
                'font-weight' => '800',
                'line-height' => '40px',
                ),
         	),

		array(
            'id' => 'heading3-font',
            'type' => 'typography',
            'title' => __('H3 Font', 'redux-framework-demo'),
            'subtitle' => __('Specify the headings font properties.', 'redux-framework-demo'),
            'google' => true,
            'output' => array('h3, h3 a, h3 span'),
            'default' => array(
                'color' => '#444',
                'font-size' => '18px',
                'font-family' => 'Raleway',
                'font-weight' => '700',
                'line-height' => '40px',
                ),
         	),

		array(
            'id' => 'heading4-font',
            'type' => 'typography',
            'title' => __('H4 Font', 'redux-framework-demo'),
            'subtitle' => __('Specify the headings font properties.', 'redux-framework-demo'),
            'google' => true,
            'output' => array('h4, h4 a, h4 span'),
            'default' => array(
				'color' => '#444',
                'font-size' => '18px',
                'font-family' => 'Raleway',
                'font-weight' => '700',
                'line-height' => '40px',
                ),
         	),

		array(
            'id' => 'heading5-font',
            'type' => 'typography',
            'title' => __('H5 Font', 'redux-framework-demo'),
            'subtitle' => __('Specify the headings font properties.', 'redux-framework-demo'),
            'google' => true,
            'output' => array('h5, h5 a, h5 span'),
            'default' => array(
                'color' => '#484848',
                'font-size' => '14px',
                'font-family' => 'Roboto',
                'font-weight' => '300',
                'line-height' => '40px',
                ),
         	),

		array(
            'id' => 'heading6-font',
            'type' => 'typography',
            'title' => __('H6 Font', 'redux-framework-demo'),
            'subtitle' => __('Specify the headings font properties.', 'redux-framework-demo'),
            'google' => true,
            'output' => array('h6, h6 a, h6 span'),
            'default' => array(
                'color' => '#484848',
                'font-size' => '11.9px',
                'font-family' => 'Roboto',
                'font-weight' => '300',
                'line-height' => '40px',
                ),
         	),

		array(
            'id' => 'body-font',
            'type' => 'typography',
            'title' => __('Body Font', 'redux-framework-demo'),
            'subtitle' => __('Specify the body font properties.', 'redux-framework-demo'),
            'google' => true,
            'output' => array('.ad-detail-half-box .ad-detail-info,span.ad-page-price,html, body, div, applet, object, iframe p, blockquote, a, abbr, acronym, address, big, cite, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video'),
            'default' => array(
                'color' => '#888888',
                'font-size' => '14px',
                'font-family' => 'Lato',
                'font-weight' => 'Normal',
                'line-height' => '24px',
                ),
         	),
		array(
            'id' => 'a-heading-font',
            'type' => 'typography',
            'title' => __('Anchor heading Font', 'redux-framework-demo'),
            'subtitle' => __('Specify the Anchor heading font properties.', 'redux-framework-demo'),
            'google' => true,
            'output' => array('.single-slider .single-ad-price,.ad-title h2 a,.ad-title h2,.ad-title .ad-page-price a,.widget-ad-list-content-title a,.ad-detail-info .description,.post-title a,.three-tabs li a'),
            'default' => array(
                'color' => '#444',
                'font-size' => '14px',
                'font-family' => 'Raleway',
                'font-weight' => 'Normal',
                'line-height' => '24px',
                ),
         	),

		),
	);

$sections[] = array(
	'icon' => 'el-icon-adjust',
	'icon_class' => 'icon-large',
    'title' => __('Colors', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'       => 'color-primary',
	        'type'     => 'color',
	        'title'    => __('Primary Color', 'redux-framework-demo'), 
	        'subtitle' => __('Pick a Primary Color (default: #444).', 'redux-framework-demo'),
	        'default'  => '#444',
	        'validate' => 'color',
	        'transparent' => false,
			),
			
		array(
			'id'       => 'color-main',
	        'type'     => 'color',
	        'title'    => __('Link Color', 'redux-framework-demo'), 
	        'subtitle' => __('Pick a color for link (default: #666).', 'redux-framework-demo'),
	        'default'  => '#666',
	        'validate' => 'color',
	        'transparent' => false,
			),

		array(
			'id'       => 'color-main-hover',
	        'type'     => 'color',
	        'title'    => __('Hover/Active Link State Color', 'redux-framework-demo'), 
	        'subtitle' => __('Pick a color for hover/active link state (default: #e96969).', 'redux-framework-demo'),
	        'default'  => '#e96969',
	        'validate' => 'color',
	        'transparent' => false,
			),

		array(
			'id'       => 'button-color-main',
	        'type'     => 'color',
	        'title'    => __('Buttons Color', 'redux-framework-demo'), 
	        'subtitle' => __('Pick a color for buttons (default: #444).', 'redux-framework-demo'),
	        'default'  => '#444',
	        'validate' => 'color',
	        'transparent' => false,
			),

		array(
			'id'       => 'button-color-main-hover',
	        'type'     => 'color',
	        'title'    => __('Buttons Hover State Color', 'redux-framework-demo'), 
	        'subtitle' => __('Pick a color for buttons hover state (default: #e96969).', 'redux-framework-demo'),
	        'default'  => '#e96969',
	        'validate' => 'color',
	        'transparent' => false,
			),

		),
	);

$sections[] = array(
	'icon' => 'el-icon-group',
	'icon_class' => 'icon-large',
    'title' => __('Social Links', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'=>'facebook-link',
			'type' => 'text',
			'title' => __('Facebook Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'twitter-link',
			'type' => 'text',
			'title' => __('Twitter Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'dribbble-link',
			'type' => 'text',
			'title' => __('Dribbble Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'flickr-link',
			'type' => 'text',
			'title' => __('Flickr Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'github-link',
			'type' => 'text',
			'title' => __('Github Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'pinterest-link',
			'type' => 'text',
			'title' => __('Pinterest Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'youtube-link',
			'type' => 'text',
			'title' => __('Youtube Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'google-plus-link',
			'type' => 'text',
			'title' => __('Google+ Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'linkedin-link',
			'type' => 'text',
			'title' => __('LinkedIn Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'tumblr-link',
			'type' => 'text',
			'title' => __('Tumblr Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'vimeo-link',
			'type' => 'text',
			'title' => __('Vimeo Page URL', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		),
	);
			$sections[] = array(
	'icon' => 'el-icon-website',
	'icon_class' => 'icon-large',
    'title' => __('Home Page Ads', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'=>'home_ad1',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Home Page Ad 1', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your Ad Image.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),
		array(
			'id'=>'home_ad1_url',
			'type' => 'text',
			'title' => __('Home Page Ad 1 link URL', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('You can add URL.', 'redux-framework-demo'),
			'default' => '',
			'validate' => 'url',
			),
		array(
			'id'=>'home_ad_code_client1',
			'type' => 'text',
			'title' => __('data-ad-client for Google ads (HOME PAGE AD 1)', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Put here data-ad-client id Example: ca-pub-1989849072509270.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'home_ad_code_slot1',
			'type' => 'text',
			'title' => __('data-ad-slot for Google ads (HOME PAGE AD 1)', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Put here data-ad-slot id Example: 1617159162.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'home_ad_code_width1',
			'type' => 'text',
			'title' => __('Ad width for Google ads (HOME PAGE AD 1)', 'redux-framework-demo'),
			'subtitle' => __('Ad width according to your ad code which got from google', 'redux-framework-demo'),
			'desc' => __('Put here ad width Example: 468, do not use px or any other word.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'home_ad_code_height1',
			'type' => 'text',
			'title' => __('Ad height for Google ads (HOME PAGE AD 1)', 'redux-framework-demo'),
			'subtitle' => __('Ad height according to your ad code which got from google', 'redux-framework-demo'),
			'desc' => __('Put here ad height Example: 60, do not use px or any other word.', 'redux-framework-demo'),
			'default' => ''
			),
			array(
			'id'=>'home_ad2',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Home Page Ad 2', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your Ad Image.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),
		array(
			'id'=>'home_ad2_url',
			'type' => 'text',
			'title' => __('Home Page Ad 2 link URL', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('You can add URL.', 'redux-framework-demo'),
			'default' => '',
			'validate' => 'url',
			),
		array(
			'id'=>'home_ad_code_client2',
			'type' => 'text',
			'title' => __('data-ad-client for Google ads (HOME PAGE AD 2)', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Put here data-ad-client id Example: ca-pub-1989849072509270.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'home_ad_code_slot2',
			'type' => 'text',
			'title' => __('data-ad-slot for Google ads (HOME PAGE AD 2)', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Put here data-ad-slot id Example: 1617159162.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'home_ad_code_width2',
			'type' => 'text',
			'title' => __('Ad width for Google ads (HOME PAGE AD 2)', 'redux-framework-demo'),
			'subtitle' => __('Ad width according to your ad code which got from google', 'redux-framework-demo'),
			'desc' => __('Put here ad width Example: 468, do not use px or any other word.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'home_ad_code_height2',
			'type' => 'text',
			'title' => __('Ad height for Google ads (HOME PAGE AD 2)', 'redux-framework-demo'),
			'subtitle' => __('Ad height according to your ad code which got from google', 'redux-framework-demo'),
			'desc' => __('Put here ad height Example: 60, do not use px or any other word.', 'redux-framework-demo'),
			'default' => ''
			),
		),
	);
	
			$sections[] = array(
	'icon' => 'el-icon-website',
	'icon_class' => 'icon-large',
    'title' => __('Other Ads', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'=>'post_ad',
			'type' => 'media', 
			'url'=> true,
			'title' => __(' Location & category page Ad', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your Ad Image.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),
		array(
			'id'=>'post_ad_url',
			'type' => 'text',
			'title' => __('Location & category page Ad link URL', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('You can add URL.', 'redux-framework-demo'),
			'default' => '',
			'validate' => 'url',
			),
		array(
			'id'=>'post_ad_code_client',
			'type' => 'text',
			'title' => __('data-ad-client for Google ads (Location & category page)', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Put here data-ad-client id Example: ca-pub-1989849072509270.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'post_ad_code_slot',
			'type' => 'text',
			'title' => __('data-ad-slot for Google ads (Location & category page)', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('Put here data-ad-slot id Example: 1617159162.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'post_ad_code_width',
			'type' => 'text',
			'title' => __('Ad width for Google ads (Location & category page)', 'redux-framework-demo'),
			'subtitle' => __('Ad width according to your ad code which got from google', 'redux-framework-demo'),
			'desc' => __('Put here ad width Example: 468, do not use px or any other word.', 'redux-framework-demo'),
			'default' => ''
			),
		array(
			'id'=>'post_ad_code_height',
			'type' => 'text',
			'title' => __('Ad height for Google ads (Location & category page)', 'redux-framework-demo'),
			'subtitle' => __('Ad height according to your ad code which got from google', 'redux-framework-demo'),
			'desc' => __('Put here ad height Example: 60, do not use px or any other word.', 'redux-framework-demo'),
			'default' => ''
			),


		),
	);
	$sections[] = array(
	'icon' => 'el-icon-website',
	'icon_class' => 'icon-large',
    'title' => __('Callout Message For Home page', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'=>'callout_title',
			'type' => 'text',
			'title' => __(' Callout Title', 'redux-framework-demo'),
			'desc'=> __('Put here your Callout title', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>'Are you ready for the posting your ads on ClassiAds ?',
			),
		array(
			'id'=>'callout_desc',
			'type' => 'textArea',
			'title' => __(' Callout Description', 'redux-framework-demo'),
			'desc'=> __('Put here your Callout Description', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>'This is a text board so make sure you are writing here a usefull content lorem ispum dolor sit amet. Morbi accumsan ipsum velit nam nec tellus a odio tincidunt auctor a ornare odio sed non mauris vitae erat consequat auctor eu in elit. ',
			),
		array(
			'id'=>'callout_btn_text',
			'type' => 'text',
			'title' => __(' Callout Button Text', 'redux-framework-demo'),
			'desc'=> __('Put here your Callout Button Text', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>'Get Started ',
			),
			array(
			'id'=>'callout_btn_url',
			'type' => 'text',
			'title' => __(' Callout Button URL', 'redux-framework-demo'),
			'desc'=> __('Put here your Callout Button URL', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default'=>'',
			),

		),
	);
	$sections[] = array(
	'icon' => 'el-icon-website',
	'icon_class' => 'icon-large',
    'title' => __('Partners', 'redux-framework-demo'),
	'fields' => array(
		array(
			'id'=>'partner1',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Partner One', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your logo.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),	
		array(
			'id'=>'partner2',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Partner two', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your logo.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),
		array(
			'id'=>'partner3',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Partner three', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your logo.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),
		array(
			'id'=>'partner4',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Partner four', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your logo.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),
		array(
			'id'=>'partner5',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Partner five', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your logo.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),
		array(
			'id'=>'partner6',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Partner six', 'redux-framework-demo'),
			'compiler' => 'true',
			//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
			'desc'=> __('Upload your logo.', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),
		
		

		),
	);
	$sections[] = array(
	'icon' => 'el-icon-twitter',
	'icon_class' => 'icon-large',
    'title' => __('Twitter Api', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'=>'consumer_key',
			'type' => 'text',
			'title' => __('Consumer Key', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),

		array(
			'id'=>'consumer_secret',
			'type' => 'text',
			'title' => __('Consumer Secret', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),

		array(
			'id'=>'access_token',
			'type' => 'text',
			'title' => __('User Access Token', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),

		array(
			'id'=>'access_token_secret',
			'type' => 'text',
			'title' => __('User Access Token Secret', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),



		),
	);

$sections[] = array(
	'icon' => 'el-icon-envelope',
	'icon_class' => 'icon-large',
    'title' => __('Contact Page', 'redux-framework-demo'),
	'fields' => array(
		
		array(
			'id'=>'contact-email',
			'type' => 'text',
			'title' => __('Your email address', 'redux-framework-demo'),
			'subtitle' => __('This must be an email address.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'email',
			'default' => ''
			),

		array(
			'id'=>'contact-email-error',
			'type' => 'text',
			'title' => __('Email error message', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => 'You entered an invalid email.'
			),

		array(
			'id'=>'contact-name-error',
			'type' => 'text',
			'title' => __('Name error message', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => 'You forgot to enter your name.'
			),

		array(
			'id'=>'contact-message-error',
			'type' => 'text',
			'title' => __('Message error', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => 'You forgot to enter your message.'
			),

		array(
			'id'=>'contact-thankyou-message',
			'type' => 'text',
			'title' => __('Thank you message', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => 'Thank you! We will get back to you as soon as possible.'
			),

		array(
			'id'=>'contact-latitude',
			'type' => 'text',
			'title' => __('Latitude', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),

		array(
			'id'=>'contact-longitude',
			'type' => 'text',
			'title' => __('Longitude', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),

		array(
			'id'=>'contact-zoom',
			'type' => 'text',
			'title' => __('Zoom level', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),

		),
	);

$sections[] = array(
	'icon' => 'el-icon-cogs',
	'icon_class' => 'icon-large',
    'title' => __('Paypal Settings', 'redux-framework-demo'),
	'fields' => array(

		array(
			'id'=>'paypal_api_environment',
			'type' => 'radio',
			'title' => __('PayPal environment', 'redux-framework-demo'), 
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'options' => array('1' => 'Sandbox - Testing', '2' => 'Live - Production'),//Must provide key => value pairs for radio options
			'default' => '1'
			),
		
		array(
			'id'=>'paypal_api_username',
			'type' => 'text',
			'title' => __('API Username (required)', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),	

		array(
			'id'=>'paypal_api_password',
			'type' => 'text',
			'title' => __('API Password (required)', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),

		array(
			'id'=>'paypal_api_signature',
			'type' => 'text',
			'title' => __('API Signature (required)', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'default' => ''
			),

		array(
			'id'=>'paypal_success',
			'type' => 'text',
			'title' => __('Thank you page - after successful payment', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'paypal_fail',
			'type' => 'text',
			'title' => __('Thank you page - after failed payment', 'redux-framework-demo'),
			'subtitle' => __('This must be an URL.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => ''
			),

		array(
			'id'=>'currency_code',
			'type' => 'select',
			'title' => __('Currency', 'redux-framework-demo'), 
			'subtitle' => __('Select your currency.', 'redux-framework-demo'),
			'options' => array('AUD'=>'Australian Dollar', 'CAD'=>'Canadian Dollar', 'CZK'=>'Czech Koruna', 'DKK'=>'Danish Krone', 'EUR'=>'Euro', 'HKD'=>'Hong Kong Dollar', 'HUF'=>'Hungarian Forint', 'JPY'=>'Japanese Yen', 'NOK'=>'Norwegian Krone', 'NZD'=>'New Zealand Dollar', 'PLN'=>'Polish Zloty', 'GBP'=>'Pound Sterling', 'SEK'=>'Swedish Krona', 'SGD'=>'Singapore Dollar', 'CHF'=>'Swiss Franc', 'USD'=>'U.S. Dollar'),
			'default' => 'USD',
			),


		),
	);



$sections[] = array(
	'type' => 'divide',
);	

if (function_exists('wp_get_theme')){
$theme_data = wp_get_theme();
$theme_uri = $theme_data->get('ThemeURI');
$description = $theme_data->get('Description');
$author = $theme_data->get('Author');
$version = $theme_data->get('Version');
$tags = $theme_data->get('Tags');
}else{
$theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
$theme_uri = $theme_data['URI'];
$description = $theme_data['Description'];
$author = $theme_data['Author'];
$version = $theme_data['Version'];
$tags = $theme_data['Tags'];
}	

$theme_info = '<div class="redux-framework-section-desc">';
$theme_info .= '<p class="redux-framework-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'redux-framework-demo').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'redux-framework-demo').$author.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'redux-framework-demo').$version.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$description.'</p>';
if ( !empty( $tags ) ) {
	$theme_info .= '<p class="redux-framework-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'redux-framework-demo').implode(', ', $tags).'</p>';	
}
$theme_info .= '</div>';

if(file_exists(dirname(__FILE__).'/README.md')){
$sections['theme_docs'] = array(
			'icon' => ReduxFramework::$_url.'assets/img/glyphicons/glyphicons_071_book.png',
			'title' => __('Documentation', 'redux-framework-demo'),
			'fields' => array(
				array(
					'id'=>'17',
					'type' => 'raw',
					'content' => file_get_contents(dirname(__FILE__).'/README.md')
					),				
			),
			
			);
}//if


$sections[] = array(
	'icon' => 'el-icon-info-sign',
	'title' => __('Theme Information', 'redux-framework-demo'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
	'fields' => array(
		array(
			'id'=>'raw_new_info',
			'type' => 'raw',
			'content' => $item_info,
			)
		),   
	);


if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
    $tabs['docs'] = array(
		'icon' => 'el-icon-book',
		'icon_class' => 'icon-large',
        'title' => __('Documentation', 'redux-framework-demo'),
        'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
    );
}

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// END Sample Config


/**

	Filter hook for filtering the args array given by a theme, good for child themes to override or add to the args array.

**/
function change_framework_args($args){
    //$args['dev_mode'] = true;
    
    return $args;
}
add_filter('redux/options/redux_demo/args', 'change_framework_args');
// replace redux_demo with your opt_name

/**

	Filter hook for filtering the default value of any given field. Very useful in development mode.

**/
function change_option_defaults($defaults){
    $defaults['str_replace'] = "Testing filter hook!";
    
    return $defaults;
}
add_filter('redux/options/redux_demo/defaults', 'change_option_defaults');
// replace redux_demo with your opt_name


/** 

	Custom function for the callback referenced above

 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}


/**
 
	Custom function for the callback validation referenced above

**/
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation
    
    if(something) {
        $value = $value;
    } elseif(something else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */
    
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}

/**

	This is a test function that will let you see when the compiler hook occurs. 
	It only runs if a field	set with compiler=>true is changed.

**/
function testCompiler() {
	echo "Compiler hook!";
}
//add_filter('redux/options/redux_demo/compiler', 'testCompiler');
// replace redux_demo with your opt_name




/**

	Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.

**/
if ( class_exists('ReduxFrameworkPlugin') ) {
	//remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );	
}


/**

	Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.

**/
function removeDemoModeLink() {
	if ( class_exists('ReduxFrameworkPlugin') ) {
		remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
	}
}
//add_action('init', 'removeDemoModeLink');




