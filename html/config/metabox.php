<?php
return array(
    // метабокс для стоимости проекта
    array(
        'id'	=>	'Cash',
        'name'	=>	'Project cost',
        'post'	=>	array('projects_mebel'), 
        'pos'	=>	'normal',
        'pri'	=>	'high',
        'cap'	=>	'edit_posts',
        'args'	=>	array(
            array(
                'id'			=>	'cash',
                'title'			=>	'Cash',
                'placeholder'   =>  'Furniture price, USD',
                'desc'			=>	'Project cost at the time of installation, USD',
                'type'			=>	'text',
                'cap'			=>	'edit_posts',
                'def'           => 0
            )
        )
    ),
    array(
        'id'    =>  'Desc',
        'name'  =>  'Description Page (H1)',
        'post'  =>  array('page', 'post','projects_mebel'), 
        'pos'   =>  'normal',
        'pri'   =>  'high',
        'cap'   =>  'edit_posts',
        'args'  =>  array(
            array(
                'id'            =>  'desc',
                'title'         =>  'Description H1',
                'placeholder'   =>  'Tag H1',
                'desc'          =>  'Add text for tag H1',
                'type'          =>  'text',
                'cap'           =>  'edit_posts',
            )
        )
    ),
    array(
        'id'    =>  'Header',
        'name'  =>  'Name for post',
        'post'  =>  array('page', 'post','projects_mebel'), 
        'pos'   =>  'normal',
        'pri'   =>  'high',
        'cap'   =>  'edit_posts',
        'args'  =>  array(
            array(
                'id'            =>  'single',
                'title'         =>  'Header for post',
                'placeholder'   =>  'Header for post',
                'desc'          =>  'Add header for post',
                'type'          =>  'text',
                'cap'           =>  'edit_posts',
            )
        )
    ),
);