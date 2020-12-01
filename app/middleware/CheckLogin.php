<?php
declare (strict_types = 1);

namespace app\middleware;

class CheckLogin
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return \think\response\Json
     */
    public function handle($request, \Closure $next)
    {

        $token = $request->param('token');
        $res = checkToken($token);

        if ((int)$res['code'] != 1){
            return show(2, "Token无效");
        }
        return $next($request);
    }
}
