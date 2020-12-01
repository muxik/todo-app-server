<?php

declare(strict_types=1);

namespace app\controller;

use app\BaseController;
use think\Request;

class User extends BaseController
{

    protected $model;

    protected function initialize()
    {
        parent::initialize();
        $this->model =  new \app\model\User();
    }


    public function login(Request $request)
    {
        $user = [
            'username' => $request->param('username'),
            'password' => $request->param('password')
        ];

        $res = $this->model->login($user);
        if (is_string($res)) {
            return show(0, $res);
        }

        return  show(1, "登录成功", [
            'id' => $res['id'],
            'username' => $res['username'],
            'token' => signToken($res['id']),
        ]);
    }


    public function checkLogin(Request $request)
    {
        if (checkToken($request->param('token', 'todo'))['code'] == 1) {
            return show(1, 'Is Login');
        }
        return show(0, 'Not login');
    }
}
