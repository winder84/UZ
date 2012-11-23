<?php
function _sys_get_temp_dir() {
	return ini_get('upload_tmp_dir');
}
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('front', 'prod', false);

dm::createContext($configuration)->dispatch();