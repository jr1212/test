<?php
/**
 * Created by PhpStorm.
 * User: kunlan
 * Date: 2017/3/10
 * Time: 15:37
 */
class smatyconf
{
     static function get_smaty(){
         include_once (KUNLAN."/Smarty-3.1.15/libs/Smarty.class.php"); //包含smarty类文件

         $smarty = new Smarty(); //建立smarty实例对象$smarty

         //$smarty->config_dir="Smarty/Config_File.class.php";  // 目录变量

         $smarty->caching = false; //是否使用缓存，项目在调试期间，不建议启用缓存

         $smarty->template_dir = APP.'Home/Views'; //设置模板目录

         $smarty->compile_dir = KUNLAN."/templates_c"; //设置编译目录

         $smarty->cache_dir = KUNLAN."/smarty_cache"; //缓存文件夹
     }

}
