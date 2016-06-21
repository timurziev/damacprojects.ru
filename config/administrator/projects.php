<?php
return [
	'title' => 'Projects',
	'single' => 'project',
	'model' => 'App\Project',
	'columns' => [
		'id',
	],
	'edit_fields' => array(
		'title' => array(
        'type' => 'text',
    	),
		'description',
		'text' => array(
		'type' => 'textarea'
		),
		'image', 'img' => array(
	    'title' => 'Image',
	    'type' => 'image',
	    'location' => public_path() . '/upload/originals/',
	    'naming' => 'random',
	    'length' => 10,
	    'size_limit' => 2,
	    'sizes' => array(
	        array(401, 580, 'crop', public_path() . '/upload/projects/small/', 100),
	        array(802, 580, 'landscape', public_path() . '/upload/projects/big/', 100),
	        array(1750, 967, 'fit', public_path() . '/upload/projects/huge/', 100))
	    ),
	    
	),
];