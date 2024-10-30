<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBRepeater extends CFBComponent
{
	private $fields;

	public function __construct($template, $data)
  {
  	parent::__construct($template, $data);

	  $this->initFields();
	}

	public function render($post, $value = null)
	{
		$itemsHtml = '';
		$items = get_post_meta($post->ID, $this->data['input_id'], true);

		if (strlen($items)) {
			$items = json_decode($items, true);
			if ($this->validateItems($items)) {
				foreach ($items as $index => $item) {
					$itemsHtml .= $this->renderItem($index, $item, $post);
				}
			}
			else {
				$itemsHtml .= $this->renderItem(0, null, $post);
			}
		}
		else {
			$itemsHtml .= $this->renderItem(0, null, $post);
		}

		$templateHtml  = '<div class="cfb-repeater__item j-repeater-item">';
		$templateHtml  .= '<div class="cfb-repeater__item-title j-repeater-item-title">Item</div>';
		$templateHtml  .= '<div class="cfb-repeater__item-content j-repeater-item-content">';
		foreach ($this->fields as $field) {
			$tplField = clone $field;
			$tplField->input_id .= '_' . '{{id}}';
			$templateHtml .= $tplField->render($post, '');
		}
		$templateHtml .= '<div class="cfb-repeater__item-buttons">';
		$templateHtml .= '<button class="cfb-repeater__item-remove j-repeater-remove">Remove</button>';
		$templateHtml .= '</div>';
		$templateHtml .= '</div>';
		$templateHtml .= '</div>';

		return CFBuilderView::render($this->data['type'], [
			'field' => $this->data,
			'items_html' => $itemsHtml,
			'template_html' => $templateHtml
		]);
	}

	public function getValue($postId, $fromValue = null)
	{
		$value = $this->getDbValue($postId, $fromValue);

		if (!$value) {
			return null;
		}

		$values = json_decode($value, true);
		$result = [];

		foreach ($values as $val) {
			$item = [];

			foreach ($val as $key => $fieldVal) {
				if (key_exists($key, $this->fields)) {
					$item[$key] = $this->fields[$key]->getValue($postId, $fieldVal);
				}
			}

			$result[] = $item;
		}

		return $result;
	}

	protected function sanitizeValue($value)
	{
		if (!is_array($value)) {
			return null;
		}

		$items = [];

		//Get count items
		$itemsCount = count(current($value));

		for ($i = 0; $i < $itemsCount; $i++) {
			$items[] = $this->saveItem($i, $value);
		}

		return json_encode($items, JSON_UNESCAPED_UNICODE);
	}

	private function saveItem($index, $array)
	{
		$result = [];

		foreach ($array as $key => $value) {
			foreach ($this->fields as $name => $field) {
				if ($name == $key) {
					$result[$key] = $field->sanitizeValue($value[$index]);

					if ($field->type == 'textarea') {
						$result[$key] = str_replace("\r\n", "\\\r\\\n", $result[$key]);
					}
				}
			}
		}

		return $result;
	}

	private function initFields()
	{
		$this->fields = [];

		foreach ($this->data['fields'] as $name => $field) {
			$fieldData = $field;
			$fieldData['name'] = $name;
			$fieldData['input_id'] = $this->template->id . '_' . $this->data['name'] . '_' . $name;
			$fieldData['input_name'] = $this->template->id . '_' . $this->data['name'] . '[' . $name . '][]';

			$component = CFBuilder::getInstance()->createComponent($this->template, $fieldData);

			if ($component) {
				$this->fields[$name] = $component;
			}
		}
	}

	private function renderItem($index, $item, $post)
	{
		$html = '<div class="cfb-repeater__item j-repeater-item">';
		$html .= '<div class="cfb-repeater__item-title j-repeater-item-title">Item</div>';
		$html .= '<div class="cfb-repeater__item-content j-repeater-item-content">';
		if ($item) {
			foreach ($item as $key => $value) {
				$component = clone $this->fields[$key];
				$component->input_id .= '_' . $index;
				$html .= $component->render($post, $value);
			}
		}
		else {
			foreach ($this->fields as $name => $field) {
				$clone = clone $field;
				$clone->input_id .= '_' . $index;
				$html .= $clone->render($post, '');
			}
		}
		$html .= '<div class="cfb-repeater__item-buttons">';
		$html .= '<button class="cfb-repeater__item-remove j-repeater-remove">Remove</button>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	private function validateItems($items)
	{
		$latestKeys = array_keys($this->fields);
		foreach ($items[0] as $key => $value) {
			if (array_shift($latestKeys) !== $key) {
				return false;
			}
		}

		return true;
	}
}