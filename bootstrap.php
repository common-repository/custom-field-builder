<?php

if (!defined('ABSPATH')) {
	exit;
}

include_once CF_BUILDER_DIR . 'core/helpers.php';

include_once CF_BUILDER_COMPONENTS_DIR . 'CFBComponent.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBTextBox.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBTextArea.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBEditor.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBSelect.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBMedia.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBColorPicker.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBLogic.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBRepeater.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBCheckboxGroup.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBDatePicker.php';
include_once CF_BUILDER_COMPONENTS_DIR . 'CFBPostRelationship.php';

include_once CF_BUILDER_DIR . 'core/CFBuilderView.php';
include_once CF_BUILDER_DIR . 'core/CFBuilderLoader.php';
include_once CF_BUILDER_DIR . 'core/CFBuilderTemplate.php';
include_once CF_BUILDER_DIR . 'core/CFBuilder.php';
include_once CF_BUILDER_DIR . 'core/CFBApi.php';

CFBuilder::getInstance();