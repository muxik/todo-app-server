<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class User extends Model
{

    protected $name = "users";

    /**
     * @param $user
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function login($user){
        $res = $this->where($user)->find();

        if (!$res) return "帐号或密码错误";

        unset($res['password']);

        return $res->toArray();
    }
}
