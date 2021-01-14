<?php
/*Добаляем произвольный тип записи teamperson*/
add_action('init', 'projects_mebel');
function projects_mebel(){
    $args = array(
        'labels' => 
			        [
				        'name' => __('Projects Mebel','svkupe-domain'),
				        'menu_name' => __('Projects Mebel','svkupe-domain'),
				        'singular_name' => __('Project Mebel','svkupe-domain'),
				        'add_new' => __('Add Project','svkupe-domain'),
				        'add_new_item' => __('Add new project','svkupe-domain'),
				        'edit_item' => __('Edit project','svkupe-domain'),
				        'new_item' => __('New project mebel','svkupe-domain'),
				        'view_item' => __('View project','svkupe-domain'),
				        'search_items' => __('Search projects','svkupe-domain'),
				        'not_found' =>  __('Projects not found','svkupe-domain'),
				        'not_found_in_trash' => __('Projects not found','svkupe-domain'),
				        'parent_item_colon' => ''
        			],
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => false,
        'rewrite' => array('slug' =>'project/%category%', 'with_front' => true ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        //'menu_icon' => ANBLOG_TEST_URL .'assets/img/plugins-icon.png', // иконка в меню
        'menu_position' => 40, //позиция в меню
        'supports' => array('title','editor','thumbnail','page-attributes'),
        'taxonomies' => array('mebel','category','post_tag'),
    );
    register_post_type('projects_mebel', $args);
}

// Создаем новую таксономию для project_mebel
add_action( 'init', 'create_projects_taxonomies', 0 );
function create_projects_taxonomies(){
    register_taxonomy('mebel', array('projects_mebel'),
        array(
            'labels' => [
            			'name' => __('Types projects','svkupe-domain'),
				        'singular_name' =>__('Categories','svkupe-domain'),
				        'menu_name' =>__('Types Mebel','svkupe-domain'),
				        'search_items' =>__('Search types','svkupe-domain'),
				        'all_items' =>__('All types mebel','svkupe-domain'),
				        'parent_item' =>__('Parent type','svkupe-domain'),
				        'parent_item_colon' => __('Parent type','svkupe-domain'),
				        'edit_item' => __('Parent type mebel','svkupe-domain'),
				        'update_item' =>__('Update type','svkupe-domain'),
				        'add_new_item' =>__('Add new type mebel','svkupe-domain'),
				        'new_item_name' => __('Name new type mebel','svkupe-domain'),
            			],
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_menu' =>true,
            'show_in_quick_edit' =>  true,
            'show_admin_column' => true,
            //'hierarchical'=>true и 'query_var' => true для иерархии терминов кастомной таксономии и формирования красивого url
            'query_var' => true,
            'rewrite' => array('slug' => false, 'with_front'=>false, 'hierarchical'=>true),
        )
    );
}
//Получает термин предпоследнего уровня, (последний уровень - корневой раздел КАТАЛОГ) для указанного или текущего поста в цикле
function get_top_term( $taxonomy, $post_id = 0 ){ 
	if( isset($post_id->ID) ) $post_id = $post_id->ID;
	if( ! $post_id )          $post_id = get_the_ID();
	$terms = get_the_terms( $post_id, $taxonomy );
	if( ! $terms || is_wp_error($terms) )
		return $terms;
	// только первый
	$term = array_shift( $terms );
	$next_term;
	// найдем ТОП
			$parent_id = $term->parent;
			if($parent_id) {
				while( $parent_id ){
					$next_term = $term;
					$term = get_term_by( 'id', $parent_id, $term->taxonomy );
					if($parent_id) {
						$parent_id = $term->parent;
					}
				}
			}
			//echo $term->slug. ' / '.$next_term->slug; 
	return $next_term;
}
//Замена плейсхолдера (%category%) на значение полученое от get_top_term
function create_post_link_category( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = get_top_term( 'mebel', $post->ID);
        if( $terms ){
            return str_replace( '%category%' , $terms->slug , $post_link );
        }else {
        	return str_replace( '%category%' , 'types' , $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'create_post_link_category', 1, 3 );


//add new colums for custom type post "projects_mebel"
add_filter( 'manage_projects_mebel_posts_columns', function ( $columns ) {

	$my_columns = [
		'id'    => 'ID',
		'thumb' => 'Миниатюра'
	];
    $sort = [
        	'sort'  => 'Сортировка',
        	'cash'	=> 'Цена, USD',
        ];

    return array_slice( $columns, 0, 1 ) +$my_columns + array_slice( $columns, 1, 2 ) +$sort + array_slice( $columns, 3 );
} );
// Выводим контент для каждой из зарегистрированных нами колонок. Обязательно.
add_action( 'manage_projects_mebel_posts_custom_column', function ($column_name) {
switch ( $column_name ) {
	
	case 'id':
		echo get_the_ID();
		break;
	
	case 'thumb':
		if(has_post_thumbnail(get_the_ID())) { ?>
			<a href="<?php echo get_edit_post_link(); ?>">
				<?php echo get_the_post_thumbnail(get_the_ID(), array(110,)); ?>
			</a>
		<?php }
		break;
	
	case 'sort':
		$post=get_post(get_the_id());
		echo $post->menu_order;
		break;

	case 'cash':
	if(get_post_meta(get_the_ID(),'Cash_cash', true)) {
				echo get_post_meta(get_the_ID(),'Cash_cash', true).' $';
			}else {
				echo __('Not set', 'svkupe-domain');
			}
		break;
	}
} );

// добавляем возможность сортировать колонку
add_filter( 'manage_'.'edit-projects_mebel'.'_sortable_columns', 'add_views_sortable_column' );
function add_views_sortable_column( $sortable_columns ){
	$sortable_columns['sort'] = [ 'menu_order', true ];
	$sortable_columns['cash'] = [ 'Cash_cash', true ];
            // false = asc (по умолчанию)
            // true  = desc
	return $sortable_columns;
}

add_action( 'pre_get_posts', 'my_cash_orderby' );
function my_cash_orderby( $query ) {
        if( ! is_admin()) return;
        $orderby = $query->get( 'orderby');
        if( 'Cash_cash' == $orderby ) {
                $query->set('meta_key','Cash_cash');
                $query->set('orderby','meta_value_num');
        }
}