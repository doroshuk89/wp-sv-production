<?php
/*
Plugin Name: Widget Catalog and Filter by Atlas
Description: Plugins widget views term taxomony for navigation
Version: 1.0.0
Author: Atlas-it
Author URI: http://atlas-it.by
Text Domain: atl-catalog-plugin
Domain Path: /languages/

Copyright 2020  Atlas  (email: atlas.webdev89@gmail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// строки для перевода заголовков плагина, чтобы они попали в .po файл.
__( 'Widget Catalog and Filter by Atlas', 'atl-catalog-plugin' );
__( 'Plugins widget views term taxomony for navigation', 'atl-catalog-plugin' );

/*langs file*/
$plugin_dir = basename( dirname( __FILE__ ) );
load_plugin_textdomain( 'atl-catalog-plugin', null, $plugin_dir.'/languages/' );

add_action('widgets_init', 'wp_atl_catalog');
function wp_atl_catalog () { 
    register_widget('atl_catalog_navigation');
}

class atl_catalog_navigation extends WP_Widget {
 
    public $tax;
    public $title_filter ='Разделы';
    public $title_catalog ='Каталог';
    public $clone_filter ='js-clone-filter';
    public $clone_catalog ='js-clone-catalog';

    public function __construct() {
    $args = array (
                'name'=>__('Catalog', 'atl-catalog-plugin'),
                'description'=>__('Widget for displaying posts categories', 'atl-catalog-plugin')
         );
        parent::__construct ('wp_atl_catalog', '', $args);
    }

    public function widget ($args, $instance) { 
                    
                    if(is_tax()){
                            //Получаем текущий объект таксономии
                            $current_object = get_queried_object();
                            //Текущая таксономия
                            $this->tax = $current_object->taxonomy;
                            if($current_object->parent) {
                                //Получаем нужного родителя
                                $parent_term = $this->get_top_term($current_object); 
                                //Вывод дочерних категорий 
                                $this->show_childs_categories($parent_term, $args, $this->clone_filter);
                                //Вывод ссылок на основные разделы
                                $this->show_roots_term($args);
                        }else {
                           //Получение корневой категории
                           $root_terms = $this->get_terms(0);
                           if(count($root_terms) > 1) {
                                $this->show_childs_categories($current_object->term_id, $args, $this->clone_filter);
                                $this->show_roots_term($args);
                           } else {
                                //Вывод корневых категорий таксономии
                                $this->show_roots_term($args, $this->clone_catalog);
                            }
                        }
                    }
    }  

//Функция получения необходимого термина таксономии
 public function get_top_term ($term) {
            if(isset($term->parent) && !empty($term->parent)) {
                $parent_id = $term->parent;
                if ($term->parent == 0) return $term->term_id;
                        while($parent_id){
                            $next_term = $term;
                            $term = get_term_by( 'id', $parent_id, $this->tax );
                            $parent_id = $term->parent;
                        }
                     if(count($this->get_terms(0))>1) {
                       return  $term->term_id;
                     } else {
                        return  $next_term->term_id;
                    }
            }
}

//Функция изменения выходного html для wp_list_categories
public function edit_output_html ($html) {
             $cats = str_replace('(', '<span>(', $html);
             $cats = str_replace(')', ')</span>', $cats);
             $cats = str_replace('</a>','',$cats);
             $cats = str_replace('</span>', '</span></a>', $cats);
        return $cats;
    }


//Функция вывода дочерних категорий в виде дерева (иерархией) Функция wp_list_categories
public function show_childs_categories ($id, $args, $class ='') {
                $cats =wp_list_categories(
                                            [
                                                'echo'=>0,
                                                'taxonomy'     => $this->tax,
                                                'show_count'   => 1,       // не показываем количество записей
                                                'pad_counts'   => 1,       // не показываем количество записей у родителей
                                                'hierarchical' => 1,  
                                                'hide_empty' => 0,
                                                'title_li' =>'',
                                                'order' =>'DESC',
                                                'orderby' => 'count',
                                                'show_option_none' => __('Not found categories', 'atl-catalog-plugin'),
                                                'child_of' => $id,
                                            ]
                                     );
                                //Преобразуем выходной html 
                                $cats =  $this->edit_output_html($cats);
                                            
                                            echo $args['before_widget'];
                                                echo '<div class="categories">'; 
                                                    echo $args['before_title'].$this->title_filter.$args['after_title'];
                                                        echo '<ul class="parent-ul '.$class.'">';
                                                            echo $cats;
                                                        echo '</ul></div>';
                                            echo $args['after_widget'];
}


public function show_roots_term ($args, $class='') {
                                            //Получение корневой категории таксономии Mebel
                                            $root_terms = $this->get_terms($parent = 0); 
                                            //Получаем дочернии от корневой директории
                                            $t = $this->get_terms();
                                            if(count($root_terms)>1) {
                                                //Фильтр, чтобы просуммировать количество с учетом дочерних категорий
                                                $terms = wp_list_filter( $t, array('parent'=>0) );
                                            }else {
                                                $root_terms=array_shift($root_terms);
                                                //Фильтр, чтобы просуммировать количество с учетом дочерних категорий
                                                $terms = wp_list_filter( $t, array('parent'=>$root_terms->term_id) );
                                            }

                                           if(isset($terms) && !empty($terms)) {
                                                /*Вывод списка дочерних страниц*/
                                               echo $args['before_widget'];
                                                    echo '<div class="categories">';
                                                        echo $args['before_title'].$this->title_catalog.$args['after_title'];  
                                                            echo '<ul class="parent-ul '.$class.'">';
                                                                foreach ($terms as $key => $term) {
                                                                        $term_link = get_term_link( (int) $term->term_id, $this->tax);
                                                                            echo '<li><a href='.$term_link.'>'.$term->name.'<span>('.$term->count.')</span></a></li>';
                                                                }
                                                            echo '</ul></div>';
                                                echo $args['after_widget'];
                                           }
    }   


    // Получение необходимых терминов таксономии
    public function get_terms ($id = -1) {
       
            switch ( $id ) {
                case 0:
                        $args =  [
                                                    'taxonomy' => $this->tax,
                                                    'parent' => 0,
                                                    'numberposts' => 0,
                                                    'order' => 'DESC',
                                                    'orderby' => 'count',
                                                    'hide_empty' => 0,
                                                    'count'=>true,
                                                    'pad_counts'  => 1,
                                ];
                    break;
                case '-1':
                        $args =  [
                                                    'taxonomy'=> $this->tax,
                                                    'numberposts' => 0,
                                                    'order' => 'DESC',
                                                    'orderby' => 'count',
                                                    'hide_empty' => 0,
                                                    'count'=>true,
                                                    'pad_counts'  => 1,
                                ];
                    break;
                default:
                        $args =  [
                                                    'taxonomy'=> $this->tax,
                                                    'parent' => $id,
                                                    'numberposts' => 0,
                                                    'order' => 'DESC',
                                                    'orderby' => 'count',
                                                    'hide_empty' => 0,
                                                    'count'=>true,
                                                    'pad_counts'  => 1,
                                ];
            }
        return get_categories($args);
    }
}

