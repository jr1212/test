<?php
/**
 * Created by PhpStorm.
 * User: kunlan
 * Date: 2017/3/8
 * Time: 14:51
 */

class coreConf{
    public static $class = array();
    public static $param = array();
    public static $_GET = array();


    /**
     * 运行框架
     */
    static function run(){
        include_once CORE.'/function.php';
        include_once CORE.'/Controller.php';
        self::bootstrap();
        $cont = self::$param['ctr'].'Controller';
        $pro = new $cont();
        $method = self::$param['mtd'];
        $pro->$method();
    }

    /**
     * 分配路由
     */
    static function bootstrap(){
        $uri = $_SERVER['REQUEST_URI'];
        if(isset($uri) && $uri != '/'){
            if(strpos($uri,'?') === false){
                $path = explode('/', trim($uri, '/'));
                if (isset($path[1])) {
                    self::$param = array(
                        'ctr' => $path[0],
                        'mtd' => $path[1]
                    );
                } else {
                    self::$param = array(
                        'ctr' => $path[0],
                        'mtd' => 'index'
                    );
                }

            }else{
                $pathArray = explode('?',$uri);
                if(isset($pathArray[1])) {
                    $path = explode('/', trim($pathArray[0], '/'));
                    if (isset($path[1])) {
                        self::$param = array(
                            'ctr' => $path[0],
                            'mtd' => $path[1]
                        );
                    } else {
                        self::$param = array(
                            'ctr' => $path[0],
                            'mtd' => 'index'
                        );
                    }
                    $params = explode('&', $pathArray[1]);
                    foreach($params as $value){
                        $pa = explode('=',$value);
                        if(isset($pa[1])) {
                            self::$_GET[$pa[0]] = $pa[1];
                        }
                    }
                }

            }
        }else{
            self::$param = array(
                'ctr' => 'index',
                'mtd' => 'index'
            );

        }
    }


    /**
     * 自动加载类
     */
    static public function loadClass($param){
        if(isset($class[$param])){
            return true;
        }else {
            $array = explode('\\',$param);
            $param =end($array);
            $pathInfo = preg_split("/(?=[A-Z])/", $param);
            $pathInfo = end($pathInfo);
            if ($pathInfo == 'Controller') {
                $path = APP . '/Home/Controller/' . $param . '.php';
                if(is_file($path)){
                    require $path;
                    self::$class[$param] = $param;
                }else{
                    return false;
                }
            } elseif ($pathInfo == 'Model') {
                $path = APP . '/Home/Model/' . $param . '.php';
                if(is_file($path)){
                    require $path;
                    self::$class[$param] = $param;
                }else{
                    return false;
                }
            } elseif ($pathInfo == 'Business') {
                $path = APP . '/Home/Business/' . $param . '.php';
                if(is_file($path)){
                    require $path;
                    self::$class[$param] = $param;
                }else{
                    return false;
                }

            }
        }

    }

}