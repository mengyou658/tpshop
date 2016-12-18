<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {

    /**
     * 首页
     */
    public function index()
    {
        //获取广告信息
        $adModel = M('Ad');
        $now = date('Y-m-d H:i:s');
        $where = array('adpos_id'=>1,'start_time'=>array('lt',$now),'end_time'=>array('gt',$now),'enabled'=>1);
        $ad = $adModel->where($where)->order('id desc')->select();
        $this->assign('ad', $ad);
        $this->display();
    }

    public function test()
    {
//        $Data = '我是测试缓存的哦，哈哈哈';
//        F('data',$Data);
        if(S('a') != null)
        {
             echo S('a');
        }
        else
        {
             S('a','钟贵廷',3000);
        }
        echo F('data');
    }

    public function test2()
    {
        echo realpath(__ROOT__);
        echo __APP__;
        $this->display();
    }

    public function read($id)
    {

        $this->display('index');
    }


    public function test3()
    {
        $p_type = 'a12';
        echo substr($p_type,1 );
        if(substr($p_type,0,1 ) == 'A')
        {
            echo 'test';
        }
    }

    public function test4()
    {
        $p_type = '29';
        if(strstr($p_type,'_' ))
        {
            echo 'yes';
        }
        else
        {
            echo 'n';
        }
    }


    public function test5()
    {
        $type_id = array('2','10','2');
        $custom_id = array('0','0','25');
        foreach ($custom_id as $k=> $v)
        {
            if($v != 0 )
            {
                $type_id[$k] = $custom_id[$k];
            }
        }

        var_dump($type_id);
    }


    public function test6()
    {
        $str = "10|1 50|10 100|20 500|150";
        $arr = explode(" ",$str );
        $arr2 =array();
        foreach ($arr as $v)
        {
            $realArr = explode("|",$v );
            $arr2[$realArr[0]] =$realArr[1];
        }
        var_dump($arr2);
    }


    public function test7()
    {
       $arr =  array('state'=>'A Coruña');
        $str = json_encode($arr);
        var_dump(json_decode($str,true));
    }
}