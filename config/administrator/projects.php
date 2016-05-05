<?php
return [
	'title' => 'Projects',
	'single' => 'project',
	'model' => 'App\Project',
	'columns' => [
		'id',
	],
	'edit_fields' => [
		'id',
		'title',
		'description',
		'text',
		'location',
	],
];