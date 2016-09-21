<?php
/*
 *  Author: Martin K
 *  URL: www.webfir.com
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/


/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('chilly', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// ChillySpaces Blank navigation
function chilly_nav()
{
	wp_nav_menu(
	array(
		'theme_address'  => 'main-menu',
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '%3$s',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load ChillySpaces Blank scripts (header.php)
function chilly_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_enqueue_script( 'landio', get_template_directory_uri() . '/js/theme.min.js', array( 'jquery' ), '1', true );
    	wp_enqueue_script('landio');

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('chillyscripts', get_template_directory_uri() . '/js/site.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('chillyscripts'); // Enqueue it!
    }
}

// Load ChillySpaces Blank conditional scripts
function chilly_conditional_scripts()
{
    if (is_singular( 'space' )) {
        wp_register_style('lightslider', get_template_directory_uri() . '/css/lightslider.min.css', array(), '1.0', 'all');
        wp_enqueue_style('lightslider'); // Enqueue it!

        wp_register_script('lightslider', get_template_directory_uri() . '/js/plugins/lightslider.min.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('lightslider'); // Enqueue it!
    }
}

function chilly_styles()
{	wp_register_style('landio', get_template_directory_uri() . '/css/chillyspaces.min.css', array(), '1.0', 'all');
    wp_enqueue_style('landio'); // Enqueue it!

    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('chilly', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('chilly'); // Enqueue it!
}

function register_chilly_menu()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'chilly'),
        'mobile-menu' => __('Mobile Menu', 'chilly'),
        'footer-menu' => __('Footer Menu', 'chilly')
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add custom class to nav menu
function extra_nav_class( $classes, $item ){
	$classes[] = "nav-item nav-item-toggable";
 	return $classes;
}

function wpse_remove_empty_links( $menu ) {
    return str_replace( '<a', '<a class="nav-link"', $menu );
}

add_filter( 'wp_nav_menu_items', 'wpse_remove_empty_links' );

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'chilly'),
        'description' => __('Description for this widget-area...', 'chilly'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'chilly'),
        'description' => __('Description for this widget-area...', 'chilly'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function chillywp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function chillywp_index($length) // Create 20 Word Callback for Index page Excerpts, call using chillywp_excerpt('chillywp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using chillywp_excerpt('chillywp_custom_post');
function chillywp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function chillywp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function chilly_blank_view_article($more)
{
    global $post;
    return '... <a class="view-more" href="' . get_permalink($post->ID) . '">' . __('View More', 'chilly') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function chilly_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function chillygravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function chillycomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'chilly_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'chilly_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'chilly_styles'); // Add Theme Stylesheet
add_action('init', 'register_chilly_menu'); // Add ChillySpaces Blank Menu
add_action('init', 'create_custom_post_types'); // Add our ChillySpaces Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'chillywp_pagination'); // Add our ChillySpaces Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'chillygravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
//add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('nav_menu_css_class' , 'extra_nav_class' , 10 , 2); // Add extra class to <li>
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'chilly_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'chilly_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

function create_custom_post_types()
{
    register_taxonomy_for_object_type('category', 'space'); // Register Taxonomies for Category
    register_post_type('space', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Spaces', 'chilly'), // Rename these to suit
            'singular_name' => __('Space', 'chilly'),
            'add_new' => __('Add New', 'chilly'),
            'add_new_item' => __('Add New Space', 'chilly'),
            'edit' => __('Edit', 'chilly'),
            'edit_item' => __('Edit Space', 'chilly'),
            'new_item' => __('New Space', 'chilly'),
            'view' => __('View Space', 'chilly'),
            'view_item' => __('View Space', 'chilly'),
            'search_items' => __('Search for Space', 'chilly'),
            'not_found' => __('No Spaces found', 'chilly'),
            'not_found_in_trash' => __('No Spaces found in Trash', 'chilly')
        ),
        'public' => true,
        'hierarchical' => false,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ), 
        'can_export' => true,
        'taxonomies' => array(
            'post_tag',
            'category'
        )
    ));
    register_post_type('testimonial', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Testimonials', 'chilly'), // Rename these to suit
            'singular_name' => __('Testimonial', 'chilly'),
            'add_new' => __('Add New', 'chilly'),
            'add_new_item' => __('Add New Testimonial', 'chilly'),
            'edit' => __('Edit', 'chilly'),
            'edit_item' => __('Edit Testimonial', 'chilly'),
            'new_item' => __('New Testimonial', 'chilly'),
            'view' => __('View Testimonial', 'chilly'),
            'view_item' => __('View Testimonial', 'chilly'),
            'search_items' => __('Search for Testimonial', 'chilly'),
            'not_found' => __('No Testimonial found', 'chilly'),
            'not_found_in_trash' => __('No Testimonial found in Trash', 'chilly')
        ),
        'public' => true,
        'hierarchical' => false,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    ));
}
/**
 * Adds the custom fields to the registration form and profile editor
 *
 */
function pw_rcp_add_user_fields() {
    
    $company_name = get_user_meta( get_current_user_id(), 'rcp_company_name', true );
    $address   = get_user_meta( get_current_user_id(), 'rcp_address', true );
    $house_number   = get_user_meta( get_current_user_id(), 'rcp_house_number', true );
    $postcode   = get_user_meta( get_current_user_id(), 'rcp_house_number', true );
    ?>
    <p id="rcp_company_name_wrap">
        <label for="rcp_company_name"><?php _e( 'Company name', 'rcp' ); ?></label>
        <input name="rcp_company_name" id="rcp_company_name" class="form-control form-control-lg" type="text" value="<?php echo esc_attr( $company_name ); ?>"/>
    </p>
    <p id="rcp_address_wrap">
        <label for="rcp_address"><?php _e( 'Address', 'rcp' ); ?></label>
        <input name="rcp_address" id="rcp_address" class="form-control form-control-lg" type="text" value="<?php echo esc_attr( $address ); ?>"/>
    </p>
    <p id="rcp_house_number_wrap">
        <label for="rcp_house_number"><?php _e( 'House Number', 'rcp' ); ?></label>
        <input name="rcp_house_number" id="rcp_house_number" class="form-control form-control-lg" type="text" value="<?php echo esc_attr( $house_number ); ?>"/>
    </p>
    <?php
}
add_action( 'rcp_before_subscription_form_fields', 'pw_rcp_add_user_fields' );
add_action( 'rcp_profile_editor_after', 'pw_rcp_add_user_fields' );
/**
 * Adds the custom fields to the member edit screen
 *
 */
function pw_rcp_add_member_edit_fields( $user_id = 0 ) {
    
    $company_name = get_user_meta( $user_id, 'rcp_company_name', true );
    $address   = get_user_meta( $user_id, 'rcp_address', true );
    ?>
    <tr valign="top">
        <th scope="row" valign="top">
            <label for="rcp_company_name"><?php _e( 'Company name', 'rcp' ); ?></label>
        </th>
        <td>
            <input name="rcp_company_name" id="rcp_company_name" type="text" value="<?php echo esc_attr( $company_name ); ?>"/>
            <p class="description"><?php _e( 'The member\'s company name', 'rcp' ); ?></p>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row" valign="top">
            <label for="rcp_company_name"><?php _e( 'Phone', 'rcp' ); ?></label>
        </th>
        <td>
            <input name="rcp_address" id="rcp_address" type="text" value="<?php echo esc_attr( $address ); ?>"/>
            <p class="description"><?php _e( 'The member\'s phone number', 'rcp' ); ?></p>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row" valign="top">
            <label for="rcp_house_number"><?php _e( 'House number', 'rcp' ); ?></label>
        </th>
        <td>
            <input name="rcp_house_number" id="rcp_house_number" type="text" value="<?php echo esc_attr( $house_number ); ?>"/>
            <p class="description"><?php _e( 'The member\'s house number', 'rcp' ); ?></p>
        </td>
    </tr>
    <?php
}
add_action( 'rcp_edit_member_after', 'pw_rcp_add_member_edit_fields' );
 
/**
 * Determines if there are problems with the registration data submitted
 *
 */
function pw_rcp_validate_user_fields_on_register( $posted ) {
    if( empty( $posted['rcp_company_name'] ) ) {
        rcp_errors()->add( 'invalid_company name', __( 'Please enter your company name', 'rcp' ), 'register' );
    }
    if( empty( $posted['rcp_address'] ) ) {
        rcp_errors()->add( 'invalid_address', __( 'Please enter your address', 'rcp' ), 'register' );
    }
    if( empty( $posted['rcp_house_number'] ) ) {
        rcp_errors()->add( 'invalid_house_number', __( 'Please enter your house number', 'rcp' ), 'register' );
    }
}
add_action( 'rcp_form_errors', 'pw_rcp_validate_user_fields_on_register', 10 );
/**
 * Stores the information submitted during registration
 *
 */
function pw_rcp_save_user_fields_on_register( $posted, $user_id ) {
    if( ! empty( $posted['rcp_company_name'] ) ) {
        update_user_meta( $user_id, 'rcp_company_name', sanitize_text_field( $posted['rcp_company_name'] ) );
    }
    if( ! empty( $posted['rcp_address'] ) ) {
        update_user_meta( $user_id, 'rcp_address', sanitize_text_field( $posted['rcp_address'] ) );
    }
    if( ! empty( $posted['rcp_house_number'] ) ) {
        update_user_meta( $user_id, 'rcp_house_number', sanitize_text_field( $posted['rcp_house_number'] ) );
    }
}
add_action( 'rcp_form_processing', 'pw_rcp_save_user_fields_on_register', 10, 2 );
/**
 * Stores the information submitted profile update
 *
 */
function pw_rcp_save_user_fields_on_profile_save( $user_id ) {
    if( ! empty( $_POST['rcp_company_name'] ) ) {
        update_user_meta( $user_id, 'rcp_company_name', sanitize_text_field( $_POST['rcp_company_name'] ) );
    }
    if( ! empty( $_POST['rcp_address'] ) ) {
        update_user_meta( $user_id, 'rcp_address', sanitize_text_field( $_POST['rcp_address'] ) );
    }
    if( ! empty( $_POST['rcp_house_number'] ) ) {
        update_user_meta( $user_id, 'rcp_house_number', sanitize_text_field( $_POST['rcp_house_number'] ) );
    }
}
add_action( 'rcp_user_profile_updated', 'pw_rcp_save_user_fields_on_profile_save', 10 );
add_action( 'rcp_edit_member', 'pw_rcp_save_user_fields_on_profile_save', 10 );



?>
