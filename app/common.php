<?php
// 应用公共文件


use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;

/**
 * 通用Api数据格式化方法
 * @param $code
 * @param $msg
 * @param $data
 * @return \think\response\Json
 */
function show($code, $msg, $data = null)
{
    return json([
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    ]);
}


/**
 * 生成token
 * @param $uid
 * @return mixed
 *
 */
function signToken($uid)
{
    $key = 'todo.im';
    $token = array(
        "iss" => $key,
        "aud" => '',
        "iat" => time(),
        "nbf" => time(),
        "exp" => time() + 2000,
        "data" => [
            'uid' => $uid,
        ]
    );
    $jwt = JWT::encode($token, $key, "HS256");
    return $jwt;
}


/**
 * 验证token
 * @param $token
 * @return int[]
 */
function checkToken($token)
{
    $key = 'todo.im';
    $status = array("code" => 2);
    try {
        JWT::$leeway = 60;//当前时间减去60，把时间留点余地
        $decoded = JWT::decode($token, $key, array('HS256')); //HS256方式，这里要和签发的时候对应
        $arr = (array)$decoded;
        $res['code'] = 1;
        $res['data'] = $arr['data'];
        return $res;

    } catch (SignatureInvalidException $e) { //签名不正确
        $status['msg'] = "签名不正确";
        return $status;
    } catch (BeforeValidException $e) { // 签名在某个时间点之后才能用
        $status['msg'] = "token失效";
        return $status;
    } catch (ExpiredException $e) { // token过期
        $status['msg'] = "token失效";
        return $status;
    } catch (Exception $e) { //其他错误
        $status['msg'] = "未知错误";
        return $status;
    }
}
