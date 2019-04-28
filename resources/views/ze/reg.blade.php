<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
</head>
<body>
    <form action="{{url('ze/addreg')}}" method="post" class="reg-login">
     {{csrf_field()}}
      <h3>已经有账号了？点此<a class="orange" href="ze/zelogin">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input  type="text" name="ze_name" placeholder="输入邮箱号" /></div>
       <div class="lrList2"><input type="text" name="ze_code"   placeholder="输入验证码" />
       <button id="idcg">获取验证码</button></div>
       <div class="lrList"><input type="text" id="ze_pwd"  name="ze_pwd" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" id="ze_pwd1"   placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form>
</body>
</html>

<script>
      //邮箱
        $('input[name=ze_name]').blur(function(){

            var ze_name=$('input[name=ze_name]').val();
            if (ze_name=='') {
                 alert('邮箱不能为空');
                return false;
            }

          //验证唯一
            $.ajax({
                method:"GET",
                url:"{{url('ze/checkname')}}",
                data:{ze_name:ze_name},
            }).done(function(msg){
               $('input[name=ze_name]').next().remove();
                if (msg.code==0) {
                 $('input[name=ze_name]').after("<b style='color:red'>"+msg.msg+"</b>");
                }
            });
        });

          //验证码
        $('input[name=ze_code]').blur(function(){
          var ze_code=$('input[name=ze_code]').val();
          if (ze_code=='') {
              alert('验证码不能为空');
          }
          return false;
        });

        //获取验证码
        $('#idcg').click(function(){
          var ze_name=$('input[name=ze_name]').val();
          $('#idcg').attr('disabled',true);
          $.ajax({
            method:"GET",
            url:"{{url('ze/sendSm')}}",
            data:{ze_name:ze_name}
          }).done(function(msg){
              if (msg.code==0) {
                  alert(msg.msg);
                  return false;
              }else if(msg.code==1){
                  alert(msg.msg);
              }
          });
          });

        //密码
        $('input[name=ze_pwd]').blur(function(){
            var ze_pwd=$('input[name=ze_pwd]').val();
            if (ze_pwd=='') {
                alert('密码不能为空');
            }
            return false;

        });

          //提交
          $('input[type="submit"]').click(function(){
            var ze_name=$('input[name=ze_name]').val();
            if (ze_name=='') {
              alert('注册邮箱不可为空');
              return false;
            }
            var ze_pwd=$('input[name=ze_pwd]').val();
            if (ze_pwd=='') {
              alert('密码不能为空');
              return false;
            }
            var set=/^\w{3,6}$/;
              if (!set.test(ze_pwd)) {
                alert('密码为三到六位数字字母下划线组成');
                return false;
              }
            var ze_pwd1=$('#ze_pwd1').val();
            if (ze_pwd1!=ze_pwd) {
              alert('密码和确认密码要求一致');
              return false;
            }
            $.ajax({
                method:"GET",
                url:"{{url('ze/checkname')}}",
                data:{ze_name:ze_name}
            }).done(function(msg){
                if (msg.code==0) {
                  alert('邮箱已存在');
                  return false;
                }
            })
          });


</script>