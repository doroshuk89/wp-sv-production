<?php

function the_breadcrumbs ($separator = '/') {
	$separator = ' / ';
	$tax = 'mebel';
	$post_type_name = 'projects_mebel';
				// получаем номер текущей страницы
				$pageNum = ( get_query_var('paged') ) ? get_query_var('paged') : 1;


				if(is_single() && is_singular('post')) {
					echo '<a href ='.site_url().'>'. __('name_home_page', 'svkupe-domain'). '</a>'.$separator;
					$post_categories = get_the_category();
						// это и будет наша единственная рубрика, присвоенная к посту
						if( !empty( $post_categories[0]->cat_ID) ) {
							echo get_category_parents( $post_categories[0]->cat_ID, true, $separator );
						}
							the_title();
				}

				if(is_singular($post_type_name))
				{
				 	custom_post_single($separator, $tax);
				}
				
				if(is_page()) {
					$current_post = get_queried_object();
					$breadcrumbs[] = $current_post->post_title;
					if($current_post->post_parent) {
						$parent_id = $current_post->post_parent;
							while($parent_id) {
								$page = get_page($parent_id);
								$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
								$parent_id = $page->post_parent;
							}
							$breadcrumbs[]= '<a href ="'.site_url().'">'. __('name_home_page', 'svkupe-domain'). '</a>';
					}else {
							$breadcrumbs[]= '<a href ="'.site_url().'">'. __('name_home_page', 'svkupe-domain'). '</a>';
					}
					echo join ($separator, array_reverse($breadcrumbs));
				}

				if(is_category()) {
					echo '<a href ='.site_url().'>'. __('name_home_page', 'svkupe-domain'). '</a>'.$separator;
					$current_cat = get_queried_object();
						// если родительская рубрика существует
							if( $current_cat->parent) {
								echo get_category_parents( $current_cat->parent, true, $separator);
							}
								single_cat_title();
				}

				if( is_tax() ) {
					echo '<a href ='.site_url().'>'. __('name_home_page', 'svkupe-domain'). '</a>'.$separator;
					$current_term = get_queried_object();
						// если родительский элемент таксономии существует
						if( $current_term->parent ) {
								echo get_term_parents_list( $current_term->parent, $tax, array( 'separator' => $separator ));
							}
								single_term_title();
				}

				if (is_404()) {
					echo '<a href ='.site_url().'>'. __('name_home_page', 'svkupe-domain'). '</a>'.$separator;
					esc_html_e('404 Error: Page not Found', 'svkupe-domain'); 
				}

				if(is_search()) {
					echo '<a href ='.site_url().'>'. __('name_home_page', 'svkupe-domain'). '</a>'.$separator;
						echo '<a href ='.link_catalog().'>'. __('Catalog', 'svkupe-domain'). '</a>'.$separator;
						_e('Search','svkupe-domain');
				}

				if ( $pageNum > 1 ) { // номер текущей страницы
							echo ' (' . $pageNum . '-я страница)';
					}
}

//Хлебные крошки формируются в зависимости от страницы с короторой перешел пользователь (referer)
function custom_post_single ($separator = '/', $taxomony ) {
	
	$separator = '/';
	$separator = ' '.trim($separator).' ';
	$tax = $taxomony;
	
	if($referer = wp_get_referer()) {

				$url = parse_url($referer, PHP_URL_PATH);
				$url = trim($url, '/');
				//Преобразование в массив и удаление из url пагинацию если есть
				$url_item = delete_pagination_is_url (explode('/',$url));
				//Последний элемент в url
				$last_item_url = array_pop($url_item);

			//Получаем все элементы (термины) указанной таксономии	
			$categories= get_the_terms(get_the_ID(), $tax);
			if($categories) {
				//Добавляем родитеские элементы таксономии, если они не выбраны в админке
				$categories = add_parents_terms($categories);
			}
			//Название страницы
			$array_link[] = ''. get_the_title(get_the_ID()) .'';

			foreach ($categories as $term) 
			{
				if($term->slug === $last_item_url)
					{
						$term_link = get_term_link((int) $term->term_id, $tax);
						$term_arr[] = '<a href="'. $term_link .'">'. ucfirst ($term->name) .'</a>';
						$parent_id = $term->parent;
						while($parent_id) {
							$term_item = get_term_by( 'id', $parent_id, $term->taxonomy );
							$term_link = get_term_link( (int) $term_item->term_id, $tax);
								$term_arr[] = '<a href="'. $term_link .'">'. ucfirst ($term_item->name) .'</a>';
							$parent_id = $term_item->parent;
						}
					}
			}
			
			if(empty($term_arr)) {
					$root_terms = get_top_term ($tax, get_the_ID());
					$array_link = creater_url_link($array_link,$root_terms);
			}else {
					$array_link = array_merge($array_link, $term_arr);
					$array_link = creater_url_link($array_link);
				}
}else 	
		{
					//Название страницы или поста
					$array_link[] = '<span>'. get_the_title(get_the_ID()) .'</span>';
					//Получить родительскую категорию
					$root_terms = get_top_term ($tax, get_the_ID());
					//Формируем массив ссылок
					$array_link = creater_url_link($array_link, $root_terms);
		}
		echo join($separator, array_reverse($array_link));
}

//Функция формирует массив ссылок для Хлебных крошек
function creater_url_link (array $arr, $term = 0 ) {
				//Get ссылку термина таксономии
				if(is_array($term) && !empty($term)) {
					$arr   = array_merge($arr, $term);
				}
				$arr[] = '<a href="'. site_url() .'">'. __('name_home_page', 'svkupe-domain'). '</a>';
	return $arr;
}

//Получает термин предпоследнего уровня и последнего уровня, (последний уровень - корневой раздел КАТАЛОГ) для указанного или текущего поста в цикле
function get_top_term( $taxonomy, $post_id = 0 ){ 
	if( isset($post_id->ID) ) $post_id = $post_id->ID;
	if( ! $post_id )          $post_id = get_the_ID();
	$terms = get_the_terms( $post_id, $taxonomy );
	if( ! $terms || is_wp_error($terms) )
		return $terms;
	$next_term="";
	$array_link=[];
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
				break;
			}
	}
			if($next_term) {
				$next_link = get_term_link( (int) $next_term->term_id, $next_term->taxonomy);
				$array_link[] = '<a href="'. $next_link .'">'.$next_term->name.'</a>';
			}
			if($term) {
				$root_link = get_term_link( (int) $term->term_id, $term->taxonomy);
				$array_link[] = '<a href="'. $root_link .'">'.$term->name.'</a>';
			}
			
			
		return  $array_link;
}

//Функция удаления из url пагинации 
function delete_pagination_is_url (array $url) {
	$arr_urls = $url;
	$paginagion = 'page';
	if (is_numeric(array_pop($arr_urls))) {
			if (array_pop($arr_urls) == $paginagion) {
				return $arr_urls;
			}else {
				return $url;
			}
	}else {
		return $url;
	}
}

//Добавление родительских элементов таксономии в массив терминов при наличии
function add_parents_terms (array $categories) {
	if (!empty($categories)) {
		foreach ($categories as $key => $term) {
			if ($term->parent){
				$parent_id = $term->parent;
				while($parent_id) {
					$term_item = get_term_by( 'id', $parent_id, $term->taxonomy );
					if(!in_array($term_item, $categories)) {
						$categories[] =$term_item;
					}
					$parent_id = $term_item->parent;
				}
			}
		}
	}
	return $categories;
}


