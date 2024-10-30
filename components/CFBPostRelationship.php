<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBPostRelationship extends CFBComponent
{

	public function __construct($template, $data)
	{
		parent::__construct($template, $data);

		add_action('wp_ajax_cfb_relationship_find_entities', [ $this, 'findEntities' ]);
	}

	public function render($post, $value = null)
	{
		if ($value === null) {
			$relations = get_post_meta($post->ID, $this->data['input_id'], true);
		}
		else {
			$relations = $value;
		}

		$posts = [];
		if ($relations) {
			$results = get_posts([
				'numberposts' => -1,
				'post_type' => $this->data['post_type'],
				'include' => $relations
      ]);

			if ($results) {
				foreach ($results as $result) {
					$thumb = get_the_post_thumbnail_url($result->ID, 'thumbnail');

					$posts[] = [
						'id' => $result->ID,
						'title' => $result->post_title,
						'thumb' => $thumb === false ? (CF_BUILDER_URL . 'img/no-image.jpg') : $thumb
					];
				}
			}
		}

		return CFBuilderView::render($this->data['type'], [
			'field' => $this->data,
			'posts' => $posts
		]);
	}

	public function findEntities()
	{
		if (!isset($_GET['title'])) {
			$this->sendJson([
				'error' => 'Title param not found'
			]);
		}

		global $wpdb;

		$posts = $wpdb->get_results(
			"SELECT ID, post_title 
			FROM " . $wpdb->prefix . "posts " .
		  " WHERE post_title LIKE '%" . sanitize_text_field($_GET['title']) . "%' " .
			"AND post_type = '" . sanitize_text_field($this->data['post_type']) . "' " .
			"AND post_status = 'publish'"
			,
			ARRAY_A
		);

		if (!$posts) {
			$this->sendJson([
				'posts' => []
			]);
		}

		$result = [];

		foreach ($posts as $post) {
			$thumb = get_the_post_thumbnail_url($post['ID'], 'thumbnail');

			$result[] = [
				'id' => $post['ID'],
				'title' => $post['post_title'],
				'thumb' => $thumb === false ? (CF_BUILDER_URL . 'img/no-image.jpg') : $thumb
			];
		}

		$this->sendJson([
			'posts' => $result
    ]);
	}

	public function getValue($postId, $fromValue = null) {
		$relations = $this->getDbValue($postId, $fromValue);

		if (!$relations) {
			return null;
		}

		$filterData = [
			'numberposts' => -1,
			'post_type' => $this->data['post_type'],
			'include' => $relations
		];

		if ($this->data['post_type'] == 'product') {
			$posts = wc_get_products($filterData);
		}
		else {
			$posts = get_posts($filterData);
		}

		return $posts;
	}

	private function sendJson($data)
	{
		header('Content-Type: application/json');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		wp_die();
	}

}