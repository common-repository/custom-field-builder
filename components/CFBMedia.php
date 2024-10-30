<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBMedia extends CFBComponent
{
	public function render($post, $value = null)
  {
	  if ($value === null) {
		  $this->data['value'] = get_post_meta($post->ID, $this->data['input_id'], true);
	  }
	  else {
		  $this->data['value'] = $value;
	  }

	  if ($this->data['value']) {
		  $this->data['preview'] = wp_get_attachment_image_url($this->data['value']);
	  }
	  else {
		  $this->data['preview'] = null;
	  }

	  return CFBuilderView::render($this->data['type'], [ 'field' => $this->data ]);
	}

}