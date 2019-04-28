<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>三级分销</title>
    <link rel="shortcut icon" href="{{asset('shop/images/favicon.ico')}}" />

    <!-- Bootstrap -->
    <link href="{{asset('shop/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/response.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="susstext">订单提交成功</div>
     <div class="sussimg">&nbsp;</div>
     <div class="dingdanlist">
      <table>
       <tr>
        <td width="50%">
         <h3>订单号：{{$data->goods_name}}</h3>
         <time>创建日期：2015-8-11<br />
失效日期：2015-9-12</time>
         <strong class="orange" id="shop_price">¥{{$data->shop_price}}</strong>
        </td>
        <td align="right"><span class="orange">等待支付</span></td>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     <div class="succTi orange">请您尽快完成付款，否则订单将被取消</div>

    </div><!--content/-->

    <div class="height1"></div>
    <div class="gwcpiao">
     <table>
      <tr>
       <td width="50%"><a href="/prolist" style="background:#5ea626;">继续购物</a></td>
       <td width="50%"><a href="/zhifu{{$data->shop_price}}" class="jiesuan">立即支付</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/style.js"></script>
    <!--jq加减-->
    <script src="js/jquery.spinner.js"></script>
   <script>
	$('.spinnerExample').spinner({});
	</script>
  </body>
</html>
<script>
   // $('.jiesuan').click(function () {
   //        $.ajaxSetup({
   //            headers: {
   //                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //            }
   //        });
   //        var shop_price=$('#shop_price').text();
   //        $.ajax({
   //                          method: "GET",
   //                          url: "/zhifu",
   //                          data: {shop_price:shop_price},,
   //                          dataType:'json'
   //                      }).done(function (res) {
   //                document.write(res);
   //                      });
   //   })
</script>