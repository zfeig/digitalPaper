<?php

/**
*挂件的使用，
*1.先在配置文件中引入import 'application.widgets.*',
*2.在protected文件下建立widgets,及widgets/views文件夹
*3.新建widget类，实现init，run方法，并建立视图文件
*4.引用widget类，在视图中调用：
*$this->widget('application.widgets.DbWidget',array('num'=>5))
**/
class DbWidget extends CWidget{
    public $num;//显示的用户个数
  
    //显示最近添加的n个用户，init方法可有可无
    public function init() {
        //初始化num值为3，如果使用挂件时没有传递num参数，则num=3
        if($this->num == false){
            $this->num = 3;
        }
    }
  
    public function run() {
        $users = $this->getUsers();
        //渲染db挂件视图;路径protected/widgets/views/db.php
        $this->render('db',array(
            'users'=>$users,
        ));
    }
  
    //获取最新添加的n个用户
    protected function getUsers(){
        return Yii::app()->db->createCommand()
                                ->select('id,title,content')
                                ->from('p_news')
                                ->order('id desc')
                                ->queryAll();
    }
}

?>