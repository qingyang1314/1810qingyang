<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
class ZeController extends Controller
{
    public function index()
    {
        //$stack = array("orange", "banana"); array_push($stack, "apple", "raspberry"); print_r($stack);
        $stack = array("orange", "banana", "apple", "raspberry"); $fruit = array_pop($stack); print_r($stack);
        return view('ze/index');
    }

    //登录
    public function logindo(Request $request)
    {
        $post=$request->all();
        //$ze_name=$request->ze_name;
        $where=[
            'ze_name'=>$post['ze_name'],
            'ze_pwd'=>$post['ze_pwd']
            ];

        $ze_name=$post['ze_name'];
        $res=DB::table('ze')->where($where)->first();
        if($res){
            $request->session()->put('ze_name',$ze_name);
            echo "<script>alert('登录成功');location.href='ze/index'</script>";
        }else{
            echo "<script>alert('登录失败');location.href='/zelogin'</script>";
        }
    }

    //注册
    public function reg()
    {
        return view("ze.reg");
    }

    //发送邮箱
    public function sendSm()
            {
                //echo 123;die;
                    $ze_name=request()->ze_name;

                    $reg = "/^1[0-9]\d{9}$/";
                    $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
                    $rands=rand(10000,99999);
                    if (preg_match($reg, $ze_name)) {

                    $host = "http://dingxin.market.alicloudapi.com";
                    $path = "/dx/sendSms";
                    $method = "POST";
                    $appcode = "c29ac8471dbb4e7890fdeb00a5c0915d";
                    $headers = array();
                    array_push($headers, "Authorization:APPCODE " . $appcode);
                    $querys = "mobile=".$ze_name."&param=code%3A1234&tpl_id=TP1711063";
                    $bodys = "";
                    $url = $host . $path . "?" . $querys;

                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($curl, CURLOPT_FAILONERROR, false);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HEADER, false);
                    if (1 == strpos("$".$host, "https://"))
                    {
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                    }
                    $data=curl_exec($curl);
                    dd($data);
                    $requ=request()->session->put('ze_name'.$rand);
                    return['code'=>1,'msg'=>'手机号注册成功'];
                    }else if(preg_match($chars, $ze_name)){
                        Mail::send('ze/ze_name',['rands'=>$rands],function($message)use($ze_name){
                            $message->subject('你的验证码为');
                            $message->to($ze_name);
                        });
                        //$requ=request()->session()->put('ze_name',$rands);
                        $emailInfo=[
                            'ze_name'=>$ze_name,
                            'user_code'=>$rands,
                            'ze_time'=>time()
                            ];
                            session('emailInfo',$emailInfo);
                            return['code'=>1,'msg'=>'请去邮箱检查，填写验证码'];
                    }else{
                            return['code'=>0,'msg'=>'注册失败'];
                    }
            }

    //唯一性
    public function checkname()
    {
        $ze_name=request()->ze_name;
        if (!$ze_name) {
            return ['code'=>0,'msg'=>'请填写邮箱'];
        }
        $count=DB::table('ze')->where('ze_name',$ze_name)->count();
        if (!$count) {
            return['code'=>1,'msg'=>'邮箱可用'];
        }else{
           return['code'=>0,'msg'=>'邮箱已经被注册'];
        }
    }

    //执行注册
    public function addreg()
        {
            $post=request()->except('_token');
            $ze_name=$post['ze_name'];
            $data=DB::table('ze')->where('ze_name',$ze_name)->first();
            dd($dara);die;
            $res=DB::table('ze')->insertGetId($post);
            if(time()>session('emailInfo')['ze_time']+5*60){
            echo "<script>alert('注册成功');</script>";
            }
            if ($data) {
                echo "<script>alert('账号已存在');location.href='/zereg'</script>";
            }elseif ($res) {
                echo "<script>alert('注册成功');location.href='ze/zelogin'</script>";
            }else{
                echo "<script>alert('注册失败');location.href='/zereg'</script>";
            }
        }
}
