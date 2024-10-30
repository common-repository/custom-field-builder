<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBuilder
{
	private static $instance;

	private $cfbLoader;
	private $templates;
	private $templateViewers;

  private function __construct()
  {
  	$this->cfbLoader = new CFBuilderLoader();
	  $this->templates = [];

	  add_action('init', function () {
		  do_action( 'cf_builder_init', $this );

		  $this->initTemplates();
	  });
  }

	public static function getInstance()
	{
		if (!static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function registerTemplate($template)
	{
		if (is_array($template)) {
			array_push($this->templates, $template);
		}
		else {
			array_push($this->templates, include $template);
		}
	}

	public function initTemplates()
	{
		$this->templateViewers = [];

		foreach ($this->templates as $template) {
			array_push($this->templateViewers, new CFBuilderTemplate($template));
		}
	}

	public function createComponent($template, $data)
	{
		switch ($data['type']) {
			case 'textbox':
				return new CFBTextBox($template, $data);
				break;
			case 'textarea':
				return new CFBTextArea($template, $data);
				break;
			case 'editor':
				return new CFBEditor($template, $data);
				break;
			case 'select':
				return new CFBSelect($template, $data);
				break;
			case 'media':
				return new CFBMedia($template, $data);
				break;
			case 'color_picker':
				return new CFBColorPicker($template, $data);
				break;
			case 'logic':
				return new CFBLogic($template, $data);
				break;
			case 'repeater':
				return new CFBRepeater($template, $data);
				break;
			case 'checkbox_group':
				return new CFBCheckboxGroup($template, $data);
				break;
			case 'date_picker':
				return new CFBDatePicker($template, $data);
				break;
			case 'post_relationship':
				return new CFBPostRelationship($template, $data);
				break;
			default:
				return null;
		}
	}

	public function getPostField($postId, $fieldName)
	{
		foreach ($this->templateViewers as $template) {
			$field = $template->getField($postId, $fieldName);

			if ($field !== null) {
				return $field;
			}
		}

		return null;
	}

	public function getPostFields($postId, $templateId)
	{
		foreach ($this->templateViewers as $template) {
			if ($template->id == $templateId) {
				return $template->getFields($postId);
			}
		}

		return [];
	}
}