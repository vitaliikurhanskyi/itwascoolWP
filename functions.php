<?php

/* Отключаем админ панель для всех пользователей. */
show_admin_bar(false);

/* миниатюра записи */

function wpb_theme_setup() {
	add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'wpb_theme_setup');

/* добавляем класс мини-записи */

function add_excerpt_class( $excerpt )
{
    $excerpt = str_replace( "<p", "<p class=\"text\"", $excerpt );
    return $excerpt;
}

add_filter( "the_excerpt", "add_excerpt_class" );

/* длинна мини-записи */

function new_excerpt_length($length) {
	return 38;
}
add_filter('excerpt_length', 'new_excerpt_length');


/* добавляем класс категории */

function translit($str) {
$rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
$lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
return str_replace($rus, $lat, $str);
}
  
function add_class_callback( $result ) {

  $class = strtolower( $result[2] );
  $class = str_replace( ' ', '-', $class );
  // do more sanitazion on the class (slug) like esc_attr() and so on

  $replacement = sprintf( ' class="%s">%s</a>', translit($class), $result[2] );
  return preg_replace( '#>([^<]+)</a>#Uis', $replacement, $result[0] );

}

function add_category_slug( $html ) {

  $search  = '#<a[^>]+(\>([^<]+)\</a>)#Uuis';
  $html = preg_replace_callback( $search, 'add_class_callback', $html );

  return $html;
}

add_filter( 'the_category', 'add_category_slug', 99, 1 );

/* просмотры */

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/* редирект авторизации */

function login_redirect() {
	return '/index.php';
}

add_filter('login_redirect', 'login_redirect');

/* редирект выхода */

function logout_redirect(){
	wp_redirect( '/index.php' );
	exit();
}

add_action('wp_logout','logout_redirect');

/* ограничить симфолы заголовка */

function trim_title_chars($count, $after) {
  $title = get_the_title();
  if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
  else $after = '';
  echo $title . $after;
}

/* подгрузка */

function artabr_lm_footer_scripts() {  
    wp_enqueue_script( 'artabr_lm_ajax', get_template_directory_uri() . '/js/ajax.js', true );
    wp_enqueue_script( 'historyjs', get_template_directory_uri() . '/js/history.js', true );

        
        // Add parameters for the JS
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        wp_localize_script(
        	'artabr_lm_ajax',
        	'mts_ajax_loadposts',
        	array(
        		'startPage' => $paged,
        		'maxPages' => $max,
        		'nextLink' => next_posts( $max, false ),
        		'i18n_loadmore' => __( ' Показать еще...', 'mythemeshop' ),
        		'i18n_nomore' => __( ' Больше нет', 'mythemeshop' ),
        		'i18n_loading' => __(' Загрузка...', 'mythemeshop')
        	 )
        );
    
}  
add_action( 'wp_footer', 'artabr_lm_footer_scripts' );

// Widget Locations
  
  function wpb_init_widgets($id){
  
    register_sidebar(array(
      'name'          => 'social',
      'id'            => 'social',
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '',
      'after_title'   => ''
    ));
  }
  add_action('widgets_init', 'wpb_init_widgets');
