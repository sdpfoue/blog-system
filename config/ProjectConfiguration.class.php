<?php
//echo realpath(dirname(__FILE__).'/../RELEASE_1_2_12/lib/autoload/sfCoreAutoload.class.php');
//DIE;

$autoload =  realpath(dirname(__FILE__).'/../RELEASE_1_2_12/lib/autoload/sfCoreAutoload.class.php');
require_once $autoload;
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // for compatibility / remove and enable only the plugins you want
    $this->enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfCompat10Plugin'));
  }
}
