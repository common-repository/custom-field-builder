=== Custom Field Builder - WordPress custom fields plugin ===
Contributors: kirillbdev
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Tags: cfb, custom field builder, custom fields, custom meta, custom meta fields, meta fields, metabox, custom metabox, meta-box, field, repeater, textbox, textarea, select, media field, color-picker, field group
Requires PHP: 5.4
Requires at least: 4.6
Tested up to: 5.0.0
Stable tag: 1.2.4

Custom Field Builder is a powerful and lightweight developer plugin to create custom meta boxes and custom fields for WordPress.

== Description ==

**Custom Field Builder is a powerful and lightweight developer plugin to create custom meta boxes and custom fields for WordPress.**

= Features =

• Many free custom fields (regular updating and adding new fields).
• Easy to install and very easy to use.
• Pure and clean code (increase your admin performance).

= Links =

• [Documentation](http://cfbuilder.kirillbdev.pro)

= Available fields =

• Textbox
• Textarea
• Select
• Media (image, attachments)
• Logic (checkbox may only "true" or "false")
• Color picker
• Repeater
• Checkbox group
• Date picker
• Post relationship

== Installation ==

Via [Composer](http://getcomposer.org/).

`composer require kirillbdev/custom-field-builder:dev-master`

To do an automatic install of Custom Field Builder, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type "cfb" or "Custom Field Builder" and click Search Plugins. Once you have found it you can install it by simply clicking "Install Now".

The WordPress codex contains [instructions on how to install a WordPress plugin](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

== Usage ==

Watch this short video tutorial

https://www.youtube.com/watch?v=AEeothh5apo

Add the following code to your functions.php (or in any convenient file).

`<?php
    add_action('cf_builder_init', function ($cfBuilder) {
    	$cfBuilder->registerTemplate([
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
    			]

            ]
        ]);
    });
?>`

You also can include your custom template in php file. For example:

`<?php
    add_action('cf_builder_init', function ($cfBuilder) {
    	$cfBuilder->registerTemplate('path_to_your_template_file.php');
    });
?>`

** See all fields example in examples/base-fields-template.php in plugin directory! **

== Screenshots ==

1. Register custom fields template in functions.php file.
2. Custom fields
3. Repeater field

== Changelog ==

= Version 1.2.4 / (05.03.2019) =
* Editor Field release (See example file)

= Version 1.2.3 / (18.12.2018) =
* Some bug fix and refactoring.

= Version 1.2.2 / (13.12.2018) =
* Fix bug when textarea in repeater not save new line char.

= Version 1.2.1 / (02.12.2018) =
* getPostFields API method release (see more in [Documentation](http://cfbuilder.kirillbdev.pro)).
* Fixed error when call API method getPostField on Repeater which contains Checkbox group field.

= Version 1.2.0 / (28.11.2018) =
* Front-end API release (see more in [Documentation](http://cfbuilder.kirillbdev.pro)).

= Version 1.1.6 / (22.11.2018) =
* Fix post relationship field (not working for WooCommerce).

= Version 1.1.5 / (22.11.2018) =
* Added Post relationship field.

= Version 1.1.1 / (20.11.2018) =
* Added Date picker field.

= Version 1.1.0 / (18.11.2018) =
* Added Checkbox group field.
* Fixed repeater bug, when not saved some field types.

= Version 1.0.1 / (18.11.2018) =
* Fix bug when repeater save previous values when was empty.

= Version 1.0.0 / (14.11.2018) =
* initial release.
