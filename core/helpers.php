<?php

function cfBuilderImportSvg($name) {
	return file_get_contents(CF_BUILDER_DIR . 'img/' . $name . '.svg');
}