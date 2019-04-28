 @extends('layouts.shop')
@section('title','微商城首页')
@section('content')
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="{{asset('shop/images/head.jpg')}}" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">1</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>

     <div class="dingdanlist">
      <table>
       <tr goods_id="{{$data->goods_id}}">
        <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" id="allbox"/> 全选</a></td>
       </tr>
       <tr>
        <td width="4%"><input type="checkbox" name="1" class="box"/></td>
        <td class="dingimg" width="15%"><img src="http://upload.tp5.com/{{$data->goods_img}}"  width="150px" /></td>
        <td width="50%">
         <h3>{{$data->goods_name}}</h3>

        </td>
        <td align="center">
                <div class="c_num">
                    <input type="button" value="-"  class="car_btn_1 less" />
                    <input type="text" value="" name="" class="car_ipt buy_number" />
                    <input type="button" value="+"  class="car_btn_2 add" />
                </div>
            </td>
       </tr>
       <tr>
        <th colspan="4"><strong class="orange">¥{{$data->shop_price}}</strong></th>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     <div class="height1"></div>
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥<font id="count">0</font></strong></td>
       <td width="40%"><a href="pay{{$data->goods_id}}" class="jiesuan" >去结算</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('shop/js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('shop/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('shop/js/style.js')}}"></script>
    <!--jq加减-->
    <script src="{{asset('shop/js/jquery.spinner.js')}}"></script>
   <script>
	$('.spinnerExample').spinner({});
	</script>
  </body>
</html>
<script>
    $(function(){
      layui.use(['layer'],function(){
        var layer=layui.layer;
        //全选 全不选
        $("#allbox").click(function(){
          var status=$(this).prop('checked');
          $(".box").prop('checked',status);
          //调用商品总价方法
            countTotal();
        });

        $(document).on("click",'.box',function(){
          //调用商品总价方法
            countTotal();
        })

        $(document).on("click",'.add',function(){
            //js改变购买数量
            var _this=$(this);

            //给当前复选框选中
            boxChecked(_this);
            //获取小计
            getSubTotal(goods_id,_this);

            //重新计算总价
            countTotal();

        })

        //点击减号
        $(document).on("click",'.less',function(){
            //js改变购买数量
            var _this=$(this);
            //控制器改变购买数量
            var goods_id=_this.parents('tr').attr('goods_id');
            changeBuyNumber(goods_id,buy_number);

            //复选框选中
            boxChecked(_this);

            //改变商品总价
            countTotal();
        })

        //给当前复选框选中
        function boxChecked(_this){
            _this.parents("tr").find("input[class='box']").prop("checked",true);
        }

        //获取商品总价
        function countTotal()
        {
            //获取所有选中的复选框 对应的商品id
            var _box=$(".box");
            var goods_id='';
            _box.each(function(index){
                if($(this).prop('checked')==true){
                    goods_id+=$(this).parents("tr").attr("goods_id")+',';
                }
            })
            goods_id=goods_id.substr(0,goods_id.length-1);
            //把商品id传给控制器 获取商品总价
            $.post(
                "{{url('/countTotal')}}",
                {goods_id:goods_id},
                function(res){
                    $("#count").text(res);
                }
                );
        }

      })
    })
</script>