<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBApi
{

	/**
	 * Get single meta field for post.
	 *
	 * @param int $postId
	 * @param string $fieldName Custom field ID
	 * @return mixed
	 */
	public static function getPostField($postId, $fieldName)
	{
		return CFBuilder::getInstance()->getPostField($postId, $fieldName);
	}

	/**
	 * Get meta fields group for post.
	 *
	 * @param int $postId
	 * @param string $templateId Custom Field Builder template ID
	 * @return array
	 */
	public static function getPostFields($postId, $templateId)
	{
		return CFBuilder::getInstance()->getPostFields($postId, $templateId);
	}

}