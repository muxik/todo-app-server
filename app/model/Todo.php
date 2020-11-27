<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 *
 * @mixin \think\Model
 */
class Todo extends Model
{
    /**
     * 表名
     * @var string
     */
    protected $name = "todos";

    /**
     * @param $data
     * @return bool|string
     */
    public function make($data){
        $res = $this->save($data);
        if (!$res) return "服务器错误 添加失败!";
        else return true;
    }


    public function _update($id, $data){
        $todo = $this->find($id);
        $todo->completed = $data == 0 ? 1 : 0;
        $todo->completed_time = $todo['completed_time'] == 0 ? time() : 0 ;
        $res = $todo->save();
        if (!$res) return "修改失败";
        else return $res;
    }
}
