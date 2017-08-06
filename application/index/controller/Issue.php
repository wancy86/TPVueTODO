<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Issue extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //get the issue list
        return json(db('issue')->field('iid as issue_id, title as issue_desc, 0 as show_comments,\'\' as comments')->select());

        // return 'issue index view';
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        if(!input('?title')){
            return 'no title';
        }
        //
        $title=input('title');
        if(!(db('issue')->where('title='.$title)->count())){
            db('issue')->data([
                'uid' => 1,
                'title' => $title,
                'entry_date' => date('yyyy/mm//dd'),
                ])->insert();
            return 'issue added';
        }else{
            return 'issue already exists';
        }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if(!input('?title')){
            return 'no title';
        }
        //
        $title=input('title/s');
        if(!(db('issue')->where('title', '=', $title)->count())){
            db('issue')->data([
                'uid' => 1,
                'title' => $title,
                'entry_date' => date('yyyy/mm/dd'),
                ])->insert();
            return 'issue added';
        }else{
            return 'issue already exists';
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        db('comment')->where('iid',$id)->delete();
        return db('issue')->where('iid',$id)->delete();

    }
}
