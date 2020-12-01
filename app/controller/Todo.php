<?php

declare(strict_types=1);

namespace app\controller;

use app\BaseController;
use app\middleware\CheckLogin;
use think\db\exception\DbException;
use think\Request;

class Todo extends BaseController
{

    protected $model;

    protected $middleware = [CheckLogin::class];

    protected function initialize()
    {
        parent::initialize();
        $this->model = new \app\model\Todo();
    }

    /**
     * 获取todos
     * @return \think\response\Json
     */
    public function read()
    {
        try {
            $res = $this->model->select();
        } catch (DbException $e) {
            return show(0, $e->getMessage(), null);
        }
        return show(1, "获取TODO成功", $res);
    }

    /**
     * 添加待办
     * @param Request $request
     * @return \think\response\Json
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => $request->param('user_id'),
            'description' => $request->param('description'),
            'completed' => $request->param('completed'),
            'completed_time' => 0
        ];

        $res = $this->model->make($data);
        if (!$res) return show(0, $res, null);
        else return show(1, '添加成功！', $data);
    }


    /**
     * 更新数据
     * @param Request $request
     * @return \think\response\Json
     */
    public function update(Request $request)
    {
        $res = $this->model->_update(
            $request->param('id'),
            $request->param('completed')
        );
        if (!$res) return show(0, $res);
        else return show(1, "Hello", "修改成功！");
    }
}
