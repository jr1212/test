<?php
/**
 * Created by PhpStorm.
 * User: kunlan
 * Date: 2017/3/9
 * Time: 10:20
 */
class Controller{
    public $assign;

    public function assign($name,$value){
        $this->assign[$name]= $value;
    }

    public function display($path){
        $file = APP.'/Home/Views/'.$path.'View.html';
        if(is_file($file)){
            extract($this->assign);
            require_once $file;
        }
    }


}