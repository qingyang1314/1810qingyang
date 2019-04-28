<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreIndexPost;
use DB;
use Mail;

class IndexController extends Controller
{
    		public function index()
			{
			 	$data=DB::table('users')->get();
    			$user_email=request()->session()->get('user_email');
    			$query=request()->all();

				$where=[];
				$goods_name=$query['goods_name']??'';
				if ($goods_name) {
					$where[]=['goods_name','like',"%$goods_name%"];
				}
				$data=DB::table('goods')->where($where)->paginate(3);
    			return view('index/index',['data'=>$data,'user_email'=>$user_email]);



			}

			public function logindo(Request $request)
			   {
			    	$post=$request->all();

			    	$where=[
			    		'user_email'=>$post['user_email'],
			    		'user_pwd'=>$post['user_pwd']
			    	];
			    	$user_email=$post['user_email'];
			    	$res=DB::table('users')->where($where)->first();
			    	if($res){
		    		$request->session()->put('user_email',$user_email);
				    	echo"<script>alert('登录成功');location.href='/index'</script>";
				      }else{
				        echo"<script>alert('登录失败');location.href='login/login'</script>";
				      }

			   }

			public function sendSms()
			{
					$user_email=request()->user_email;

					$reg = "/^1[0-9]\d{9}$/";
   					$chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
   					$rands=rand(10000,99999);
   					if (preg_match($reg, $user_email)) {

   					$host = "http://dingxin.market.alicloudapi.com";
				    $path = "/dx/sendSms";
				    $method = "POST";
				    $appcode = "c29ac8471dbb4e7890fdeb00a5c0915d";
				    $headers = array();
				    array_push($headers, "Authorization:APPCODE " . $appcode);
				    $querys = "mobile=".$user_email."&param=code%3A1234&tpl_id=TP1711063";
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
				    var_dump(curl_exec($curl));
				    $requ=request()->session->put('user_email'.$rand);
				    return['code'=>1,'msg'=>'手机号注册成功'];
   					}else if(preg_match($chars, $user_email)){
   						Mail::send('index/user_email',['rands'=>$rands],function($message)use($user_email){
   							$message->subject('你的验证码为');
   							$message->to($user_email);
   						});
   						$requ=request()->session()->put('user_email',$rands);
   							return['code'=>1,'msg'=>'请去邮箱检查，填写验证码'];
   					}else{
   							return['code'=>0,'msg'=>'注册失败'];
   					}



			}



		public function checkname()
		{
			$user_email=request()->user_email;
			if (!$user_email) {
				return ['code'=>0,'msg'=>'请填写邮箱'];
			}
			$count=DB::table('users')->where('user_email',$user_email)->count();
			if (!$count) {
				return['code'=>1,'msg'=>'邮箱可用'];
			}else{
				return['code'=>0,'msg'=>'邮箱已经被注册'];
			}
		}

		public function logout(){
			request()->session()->forget('user_email');
			echo "<script>location.href='login/login'</script>";

		}

		public function addreg()
		{
			$post=request()->except('_token');
			$user_email=$post['user_email'];
			$data=DB::table('users')->where('user_email',$user_email)->first();
			$res=DB::table('users')->insertGetId($post);
			if ($data) {
				echo "<script>alert('账号已存在');location.href='login//reg'</script>";
			}elseif ($res) {
				echo "<script>alert('注册成功');location.href='login/login'</script>";
			}else{
				echo "<script>alert('注册失败');location.href='login/reg'</script>";
			}
		}

		public function prolist()
		{
				$query=request()->all();

				$where=[];
				$goods_name=$query['goods_name']??'';
				if ($goods_name) {
					$where[]=['goods_name','like',"%$goods_name%"];
				}
				$data=DB::table('goods')->where($where)->paginate(3);

				return view('index/prolist',['data'=>$data]);
		}

		public function proinfo($goods_id)
		{

			$data=DB::table('goods')->where('goods_id',$goods_id)->first();
			// dd($data);
			return view('index/proinfo',['data'=>$data]);
		}

		public function cart($goods_id)
		{
			$data=DB::table('goods')->where('goods_id',$goods_id)->first();
			if(!request()->session()->get('user_email')){
        		echo"<script>alert('请登录后再进行操作');location.href='login/login'</script>";
        	}
			return view('index/cart',['data'=>$data]);
		}

        public function pay($goods_id)
        {
            $data = DB::table('goods')->where('goods_id',$goods_id)->first();
            if(!request()->session()->get('user_email')){
                echo"<script>alert('请登录后再进行操作');location.href='login/login'</script>";
            }
            return view('index/pay',['data'=>$data]);
        }

        public function success($goods_id)
        {
            $data = DB::table('goods')->where('goods_id',$goods_id)->first();
            if(!request()->session()->get('user_email')){
                echo"<script>alert('请登录后再进行操作');location.href='login/login'</script>";
            }
            return view('index/success',['data'=>$data]);
        }

		public function user()
		{
				$data=DB::table('users')->get();
    			$user_email=request()->session()->get('user_email');
    			return view('index/user',['data'=>$data,'user_email'=>$user_email]);
		}

		//获取商品小计
        public function getSubTotal()
        {
            $goods_id=input('post.goods_id','','intval');
            if(empty($goods_id)){
                echo 0;exit;
            }
            //获取商品价格
            $goodsWhere=[
                ['is_on_sale','=',1],
                ['goods_id','in',$goods_id]
            ];
            $shop_price=DB::table('goods')->where($goodsWhere)->value('shop_price');
            //获取商品购买数量
            $cartWhere=[
                ['goods_id','=',$goods_id]
            ];
            $buy_number=DB::table('cart')->where($cartWhere)->value('buy_number');
            echo $shop_price*$buy_number;
        }
        //
        //支付
        public function zhifu(){
        $shop_price =request()->shop_price;
        $config = config('alipay');
        //dd($config);
        //dd($config);
        $path = base_path();
        include_once $path."/app/libs/alipay/pagepay/service/AlipayTradeService.php";


        include_once $path."/app/libs/alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php";
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = '20190403'.rand(100,999);
        // dd($out_trade_no);
        //订单名称，必填
        $subject = '清扬';
        //付款金额，必填
        $total_amount = $shop_price;
        //dd($total_amount);
        //商品描述，可空
        $body = '2013';
        //构造参数
        $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        //dd(123);
        $aop = new \AlipayTradeService($config);




        /**
         * pagePay 电脑网站支付请求
         * @param $builder 业务参数，使用buildmodel中的对象生成。
         * @param $return_url 同步跳转地址，公网可以访问
         * @param $notify_url 异步通知地址，公网可以访问
         * @return $response 支付宝返回的信息
         */
        $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);
        //输出表单
        return (dump($response));
    }
}
