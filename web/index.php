<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
date_default_timezone_set('Asia/Shanghai');

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();

?>
