<?php
define('KUNLAN',$_SERVER['DOCUMENT_ROOT']);
define('CORE',KUNLAN.'/Core');
define('APP',KUNLAN.'/App');
define('DEBUG',true);

if(DEBUG){
    ini_set('display_errors','on');
}else{
    ini_set('display_errors','off');
}
require_once KUNLAN.'/vendor/autoload.php';
require CORE.'/coreConf.php';
require CORE.'/smatyconf.php';
spl_autoload_register('coreConf::loadClass');
coreConf::run();

