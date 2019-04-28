<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="{{url('ze/logindo')}}" method="get" class="reg-login">
      <h3>还没有三级分销账号？点此<a class="orange" href="{{url('ze/zereg')}}">注册</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="ze_name" placeholder="输入邮箱号" /></div>
       <div class="lrList"><input type="text" name="ze_pwd" placeholder="输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即登录" />
      </div>
     </form>
</body>
</html>