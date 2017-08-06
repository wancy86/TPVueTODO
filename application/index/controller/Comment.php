<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Comment extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($iid)
    {
        // return $iid;
        //get the comments list by issue id
        return json(db('comment')->where('iid',$iid)->field('cid, iid, content as content')->select());
    }


    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if(!input('?post.cid'))
        {
            // return new id
            db('comment')->data([
                'iid' => input('iid/d'),
                'content' => input('content/s'),
                ])->insert();
            return db('comment')->getLastInsID();

        }else{
            db('commnet')->where('cid',input('cid/d'))->update([
                    'content' => input('content/s')
                ]);
        }
        return 'comment added';
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
    public function delete($cid)
    {
        //
        return db('comment')->where('cid',$cid)->delete();
    }
}
