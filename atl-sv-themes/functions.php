<?php

define('DIR_THEMES', get_template_directory());
define('URL_THEMES', get_template_directory_uri());
define('TYPE_POST', 'projects_mebel');
define('TAX_MEBEL', 'mebel');
define('CATALOG', 'catalog');

/**
 * Add log ajax errors
 */
//Отлкючено из-за конфликта с WPvivid
if( WP_DEBUG && WP_DEBUG_DISPLAY && (defined('DOING_AJAX') && DOING_AJAX) ){
    @ ini_set( 'display_errors', 1 );
}
/**
 * Delete meta data from headers
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links',2);
remove_action('wp_head', 'feed_links_extra',3);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_shortlink_wp_head',10,0);
remove_action('wp_head', 'wp_oembed_add_discovery_links' );
remove_action('wp_head', 'wp_oembed_add_host_js');
// Удаляем информацию о REST API из заголовков HTTP и секции head
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
//dns-prefetch
remove_action( 'wp_head', 'wp_resource_hints', 2 );
//Emoji из WordPress
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
//Нужен он для редактора Gutenberg
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );
function wpassist_remove_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
}
// Отключаем сам REST API
//add_filter('rest_enabled', '__return_false');
// Отключаем фильтры REST API
//remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
//remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
//remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
//remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
//remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
// Отключаем события REST API
//remove_action( 'init', 'rest_api_init' );
//remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
//remove_action( 'parse_request', 'rest_api_loaded' );
// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

/* =============================================================================================== */

//Подключение файлов настройки темы
$svkupe_includes = array(
    'custom-page-contacts.php',					// Initialize custom page options.
    'custom-type-post.php',                     // Initialize custom post type and tax.
    'custom-fields.php',                        // Initialize custom fields 
    'breadcrumbs.php',                          // Initialize custom fields 
    'mail-smtp.php',                            // Initialize email from ajax request
);

foreach ( $svkupe_includes as $file ) {
    require_once get_template_directory() . '/includes/' . $file;
}

//Добавляем необходимые элементы для темы
add_action('after_setup_theme', 'svkupe_setup');
function svkupe_setup() {
        load_theme_textdomain('svkupe-domain', get_template_directory() . '/languages/');
        //Регистрируем меню
        register_nav_menus(array( // Регистрируем 2 меню
            'main' =>__('Main Menu', 'svkupe-domain'), // Верхнее
            'footer' =>__('Footer Menu','svkupe-domain'), // Внизу
            'sidebar_menu' =>__('Sidebar Menu', 'svkupe-domain') // Меню Сайдбар
        ));
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
        */
        add_theme_support( 'title-tag' );
        add_theme_support( 'html5', array( 'script', 'style' ));
}


//Регистрируем сайдбар
add_action( 'widgets_init', 'true_register_wp_sidebars' );
function true_register_wp_sidebars() {
    /* В боковой колонке - первый сайдбар */
    register_sidebar(
        array(
            'id' => 'right_sidebar', // уникальный id
            'name' => __('Sidebar-right-at', 'svkupe-domain'), // название сайдбара
            'description' => __('Sidebar for your boss widgets','svkupe-domain'), // описание
            'before_widget' => '<div class="sidebar-box ftco-animate"><div>', // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div></div>',
            'before_title' => '<h3>', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</h3>'
        )
    );
}

/*
 * Функции для добавления версии к подключаемым стилям и скриптам С помощью данной функции нет необходимости очищать кеш браузера
 */
function enqueue_versioned_script( $handle, $src = false, $deps = array(), $in_footer = true ) {
    wp_register_script( $handle, get_stylesheet_directory_uri() . $src, $deps, filemtime( get_stylesheet_directory() . $src ), $in_footer );
}
function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
    wp_register_style( $handle, get_stylesheet_directory_uri() . $src, $deps = array(), filemtime( get_stylesheet_directory() . $src ), $media );
}
/*Register all Styles and Scripts*/
add_action('wp_enqueue_scripts', 'register_theme_scripts');
function register_theme_scripts () {
    $theme_version = wp_get_theme()->get('Version');
        wp_register_script('migrate',     get_template_directory_uri().'/assets/js/jquery-migrate-3.0.1.min.js', array('jquery'), $theme_version, true);
        wp_register_script('bootstrap',  get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), $theme_version, true);
        wp_register_script('parallaxie',     get_template_directory_uri().'/assets/js/parallaxie.min.js', array('jquery'), $theme_version, true);
        wp_register_script('animateNumber', get_template_directory_uri().'/assets/js/jquery.animateNumber.min.js', array('jquery'), $theme_version, true);
        wp_register_script('maskedinput',     get_template_directory_uri().'/assets/js/jquery.maskedinput.min.js', array('jquery'), $theme_version, true);
        wp_register_script('validate',     get_template_directory_uri().'/assets/js/jquery.validate.min.js', array('jquery'), $theme_version, true);
        wp_register_script('scrollax',     get_template_directory_uri().'/assets/js/scrollax.min.js', array('jquery'), $theme_version, true);
        wp_register_script('easing',     get_template_directory_uri().'/assets/js/jquery.easing.1.3.min.js', array('jquery'), $theme_version, true);
        wp_register_script('waypoints',     get_template_directory_uri().'/assets/js/jquery.waypoints.min.js', array('jquery'), $theme_version, true);
        wp_register_script('fotorama',     get_template_directory_uri().'/assets/js/fotorama.min.js', array('jquery'), $theme_version, true);
        enqueue_versioned_script('main','/assets/js/main.min.js', array('jquery'));
        

}
add_action('wp_enqueue_scripts', 'register_theme_styles');
function register_theme_styles () {
    $theme_version = wp_get_theme()->get('Version');
    wp_register_style('animate', get_template_directory_uri().'/assets/css/animate.min.css', array(), $theme_version);
    wp_register_style('icomoon', get_template_directory_uri().'/assets/css/icomoon.min.css', array(), $theme_version);
    wp_register_style('fororama_style', get_template_directory_uri().'/assets/css/fotorama.min.css', array(), $theme_version);
    wp_register_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), $theme_version);
    enqueue_versioned_style('main', '/assets/css/style.min.css');
}
/*include scripts*/
add_action( 'wp_enqueue_scripts', 'includes_scripts' );
function includes_scripts () {
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('animateNumber');
    wp_enqueue_script('maskedinput');
    wp_enqueue_script('validate');
    wp_enqueue_script('scrollax');
    wp_enqueue_script('easing');
    wp_enqueue_script('waypoints');
    wp_enqueue_script('parallaxie');
    if(is_singular(TYPE_POST)){
         wp_enqueue_script('fotorama');
    }
    wp_enqueue_script('main');
    //Передача значений во внешнюю часть сайта для js скрипта
    wp_localize_script('main', 'ajax_data', 
            array(
                'url' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('mail_ajax_nonce'),
            ));
}
/*include styles*/
add_action( 'wp_enqueue_scripts', 'includes_styles' );
function includes_styles () {
      //  wp_enqueue_style('Cookie', 'https://fonts.googleapis.com/css?family=Cookie', array(), null );
      //  wp_enqueue_style('Poppins', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', array(), null);
        wp_enqueue_style('animate');
        wp_enqueue_style('icomoon');
        wp_enqueue_style('font-awesome');
        if(is_singular(TYPE_POST)){
             wp_enqueue_style('fororama_style');
        }
        wp_enqueue_style('main');
}




//Функция получения только ULR логотипа сайта
function get_url_logo () {
    $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
    echo $custom_logo__url[0];
}

//Вывод картинок таксономий использую плагин WP Multiple Taxonomy Images
//get_tax_image_urls - функция плагина WP Multiple Taxonomy Images
function get_url_tax ($id = 0, $size='full') {
    if (function_exists('get_tax_image_urls')) {
        if($id) {
                $img_urls = get_tax_image_urls($id ,$size); 
                    if ($img_urls) {
                         return $img_urls[0];
                    }else {
                        return URL_THEMES."/assets/img/image-cat-not-found.jpg";
                    }  
                }else {
                    $tax_obj = get_queried_object();
                    $term_id = $tax_obj->term_id;
                    $img_urls = get_tax_image_urls($term_id ,$size); 
                    if ($img_urls) {
                        return $img_urls[0];
                    }else {
                        return URL_THEMES."/assets/img/image-cat-not-found.jpg";
                    }  
            }
        }else {
            return URL_THEMES."/assets/img/image-cat-not-found.jpg";
    }
}

//Вывод миниатюры проектов
function the_post_thumbnail_custom ($size = 'full') {
    if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()))
         {
                the_post_thumbnail_url($size);
          } elseif(function_exists('acf_photo_gallery')) {
                            $images = acf_photo_gallery('Gallery', get_the_ID() );
                            if(isset($images) && !empty($images)){
                                $image = array_shift($images);
                                echo acf_photo_gallery_resize_image($image['full_image_url'], 520, 300);
                            } else {
                                //Получаем картинки прикрепленные к посту
                                $attachment_image = get_children( array(
                                    'numberposts' => -1,
                                    'post_mime_type' => 'image',
                                    'post_parent' =>  get_the_ID(),
                                    'post_type' => 'attachment'
                                ));
                                        if(isset($attachment_image) && !empty($attachment_image)) {
                                            // вынимаем первую картинку из массива
                                            $attachment_image = array_shift($attachment_image);
                                            echo wp_get_attachment_image_url( $attachment_image->ID, $size);
                                        }else {
                                            echo URL_THEMES."/assets/img/image-not-found.jpg";
                                        }
                                    }
                            }
}

//Получение термина Каталога
function get_catalog_term() {
     $catalog = get_term_by('slug', CATALOG, TAX_MEBEL);
     if ($catalog) return $catalog;
}

//Получение ссылки на страницу каталога
function link_catalog () {
    if(CATALOG) {
         if(!is_object($link=get_term_link( CATALOG, TAX_MEBEL ))){
            return $link;
         }else {
            return "#";
         };
    }
}

//Функция удаления всего из строки, кроме цифр, для номеров телефонов 
function clear_phone ($str) {
    if($str){
        return preg_replace("/[^+0-9]/", "", $str);
    }
}
//Функция исключения из запроса поиска всего кроме пользовательского типа данных
function SearchFilter($query) {
    if ($query->is_search) {
            $query->set('post_type', 'projects_mebel');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');


//Получение списка элементов таксономии родительского элемента Каталог (картинка, название и ссылка)
function get_categories_catalog () {
    $catalog = get_catalog_term();
    if($catalog) {
        $id_parent = $catalog->term_id;
            $args = [
                    'taxonomy'     => TAX_MEBEL,
                    'hide_empty'   => 0,
                    'orderby'      => 'parent',
                    'parent'       => $id_parent,
                    'order'        => 'ASC',
                    'pad_counts'   => true,
            ];
    $terms= get_categories($args);
    //Фильруем массив объектов
    //$terms = wp_list_filter( $terms, array('parent'=> $id_parent) );
        $array=[];
        foreach ($terms as $key => $item){
            $array[$key]['link']= get_term_link( (int) $item->term_id, $item->taxonomy);
            $array[$key]['img'] = get_url_tax($item->term_id, 'large');
            $array[$key]['name'] = $item->name;
        }
    return $array;
    }
}

//Получение 4 последних проектов
function get_last_projects ($num = 0) {
    if(!$num) $num = 4;
    $args =[
        'tax_query' => array(
            array(
                'taxonomy' => TAX_MEBEL,
                'field'    => 'slug',
                'terms'    => CATALOG
            )
        ),
        'post_type'=>TYPE_POST,
        'numberposts' => $num,
        'orderby'     => 'date',
        'order'       => 'DESC',
    ];
    $posts = get_posts($args);
    return $posts;
}

//Получение  последних новостей
function get_last_blog_posts ($cat = 0, $num=0){
    if(isset($cat) && !empty($cat)){
        $category_slug = $cat;
    }else {
         $category_slug = 'blog';
    }
    //Получить id категории
    if($category = get_category_by_slug($category_slug)) {
        $category_id =$category->term_id; 
    }else {
        $category_id = 0;
    }
    if(!$num) $num = 3;
        $args =[
            'post_type'=>'post',
            'category'    => (int)$category_id,
            'numberposts' => (int)$num,
            'orderby'     => 'date',
            'order'       => 'DESC',
        ];
        $posts = get_posts($args);
    return $posts;
}


//Получает термин предпоследнего уровня и последнего уровня, (последний уровень - корневой раздел КАТАЛОГ) для указанного или текущего поста в цикле
function get_top_term_item( $taxonomy, $post_id = 0 ){ 
    if( isset($post_id->ID) ) $post_id = $post_id->ID;
    if( ! $post_id )          $post_id = get_the_ID();
    $terms = get_the_terms( $post_id, $taxonomy );
    if( ! $terms || is_wp_error($terms) )
        return $terms;
    foreach ($terms as $term) {
        // найдем ТОП
            $parent_id = $term->parent;
            if($parent_id) {
                while($parent_id){
                    $next_term = $term;
                    $term = get_term_by( 'id', $parent_id, $term->taxonomy );
                    if($parent_id) {
                        $parent_id = $term->parent;
                    }
                }
            }
    }
        if(isset($next_term) && !empty($next_term)) {
            return  $next_term;
        }else {
            return  $term;
        }
}

//Получение других проектов на странице просмотра одного проекта (выводить 3 похожих проекта)
function get_random_project ($num = 0) {
    if($term=get_top_term_item(TAX_MEBEL, get_the_id())){
        $term_slug = $term->slug;
    }else {
         $term_slug = CATALOG;
    }
    if(!$num) $num = 3;
        $args =[
                'post_type'=>TYPE_POST,
                TAX_MEBEL => $term_slug,
                'numberposts' => 3,
                'orderby'     => 'rand',
                'order'       => 'DESC',
                'exclude'   => get_the_ID(),
            ];
              $posts = get_posts($args);
    return $posts;
}

//Получении ссылки по переданому slug
function get_uri_for_slug($slug) {
    if(isset($slug) && !empty($slug)){
        $post_data = get_page_by_path($slug, OBJECT, 'post');
    }
    if($post_data->ID) {
        return get_permalink($post_data->ID);
    }else {
        return get_home_url();
    }
}


//Временная функция конвертирования в BYN (Беларуссские рубли)
function convert_currency ($value, $cyrrency = 'USD') {
    $kurs = 2.6;
    if($value) {
        return ceil($value*$kurs);
    }
}

