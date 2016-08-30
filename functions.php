<?php

add_theme_support( 'post-thumbnails' );
add_filter('show_admin_bar', '__return_false');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

register_nav_menus(array(
	'header' => 'Header',
	'footer' => 'Footer'
));

const EXPERTISE_ID = 8;

function add_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_register_script( 'kompas_functions', get_template_directory_uri() . '/assets/scripts/functions.js', false, NULL, true );

    wp_enqueue_script( array('jquery', 'kompas_functions'));
}
add_action( 'wp_enqueue_scripts', 'add_scripts' );

function add_styles() {
    wp_register_style('kompas', get_template_directory_uri() . '/assets/css/style.css', false, "4");
    wp_enqueue_style('kompas');
}
add_action( 'wp_enqueue_scripts', 'add_styles' );


function get_mood_image($post_ID = null) {
	if (has_post_thumbnail($post_ID)) {
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post_ID), 'large' );
		return $thumbnail[0];
	} else {
		return get_template_directory_uri() . "/assets/images/mood.jpg";
	}
}

function remove_menus(){

  remove_menu_page( 'edit-comments.php' );          //Comments

}
add_action( 'admin_menu', 'remove_menus' );


function new_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter('excerpt_more', 'new_excerpt_more');


add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
function extra_user_profile_fields( $user ) {
?>
  <h3>Overig</h3>
  <table class="form-table">
    <tr>
      <th><label for="intro">Korte introductie</label></th>
      <td>
        <textarea rows="3" name="intro" id="intro" class="regular-text"><?php echo esc_attr( get_the_author_meta( 'intro', $user->ID ) ); ?></textarea><br />
        <span class="description">Een korte tekst over jezelf</span>
    </td>
    <tr>
      <th><label for="intro">Telefoonnummer</label></th>
      <td>
        <input type="text" name="phone" id="phone" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" /><br />
    </td>
    </tr>
    <tr>
      <th><label for="intro">LinkedIn</label></th>
      <td>
        <input type="text" name="linkedin" id="linkedin" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" /><br />
    </td>
    </tr>
  </table>
<?php
}

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
function save_extra_user_profile_fields( $user_id ) {
  $saved = false;
  if ( current_user_can( 'edit_user', $user_id ) ) {
    update_user_meta( $user_id, 'intro', $_POST['intro'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_user_meta( $user_id, 'phone', $_POST['phone'] );
    $saved = true;
  }
  return true;
}