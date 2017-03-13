<?php
use App\Home\Model\testModel;

class testController{

    public function index(){
        include CORE.'/smatyconf.php';
        $pro = new testModel();
        $data = $pro->create($_GET["data"]);
        $this->assign('data',$data);
        $this->display('test');

    }
}
