<?php

return [
	'id'          => 'custom_fields',
	'title'       => 'Custom Field Builder example',
	'post_type'   => 'post',
	'position'    => 'normal',
	'priority'    => 'high',
	'fields'      => [

		'author_name' => [
			'type'    => 'textbox',
			'title'   => 'Author name'
		],

		'author_bio' => [
			'type'    => 'textarea',
			'title'   => 'Author bio'
		],

		'editor_sample' => [
			'type'    => 'editor',
			'title'   => 'Editor sample'
		],

		'author_role' => [
			'type'    => 'select',
			'title'   => 'Author role',
			'options' => [

				'admin' => 'Admin',
				'writer' => 'Writer'

			]
		],

		'post_preview' => [
			'type'    => 'media',
			'title'   => 'Post preview'
		],

		'enable_comments' => [
			'type'    => 'logic',
			'title'   => 'Enable comments'
		],

		'grid_bg_color' => [
			'type'    => 'color_picker',
			'title'   => 'Grid background color'
		],

		'date_example' => [
			'type'    => 'date_picker',
			'title'   => 'Date field example'
		],

		'relation_example' => [
			'type' => 'post_relationship',
			'title' => 'Post relationship example',
			'post_type' => 'post'
		],

		'permissions' => [
			'type' => 'checkbox_group',
			'title' => 'Permissions',
			'options' => [
				'add' => 'Add',
				'edit' => 'Edit',
				'remove' => 'Remove'
			]
		],

		'post_gallery' => [
			'type' => 'repeater',
			'title' => 'Post gallery',
			'fields' => [

				'image' => [
					'type' => 'media',
					'title' => 'Image'
				],

				'title' => [
					'type' => 'textbox',
					'title' => 'Image title'
				]

			]
		]

	]
];