<?php
namespace app\index\controller;
//控制器类可以无需继承任何类，命名空间默认以app为根命名空间。

// use think\View;

class Index 
{
    public function index()
    {
        // return view('index');
        // return "123";

        db('user')->data([
        	'login_name'=>'Mark'
        	])->insert();

    	return db('user')->count();

    }
}
