<?php
require_once("../init.php");
//4:获取二个参数 uname upwd
@$uname = $_REQUEST["uname"];
@$upwd = $_REQUEST["upwd"];
//4.1 创建二个变量保存正则表达式验证用户名密码格式
//4.2 创建用户名正则表达式  字母数字3,12
$uPattern = '/^[a-zA-Z0-9]{6,18}$/';
//4.3 验证用户名
if(!preg_match($uPattern,$uname)){
  //4.4 输出出错提示
  echo '{"code":-1,"msg":"用户名格式不正确"}';
  exit; //停止php执行
}
//判断当前用户名是否存在
$sql="SELECT uid FROM miya_user WHERE uname='$uname'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($result);
//var_dump ($row);
if($row[0]>0){
  echo '{"code":-2,"msg":"当前用户名已存在"}';
  exit;
}
if(!preg_match($uPattern,$upwd)){
  //4.4 输出出错提示
  echo '{"code":-3,"msg":"密码格式不正确"}';
  exit; //停止php执行
}
//5:创建sql语句##注意大小写
//如果出现如下错误:原因sql语法写错了!
//expects parameter 1 to be mysqli_result
$sql = "INSERT INTO miya_user(uname,upwd) VALUES('$uname','$upwd')";
//6:发送sql语句
$result = mysqli_query($conn,$sql);
if(!$result){
    echo('{"code":-4, "msg":"用户名或密码格式不确定"}');
}else{
    echo('{"code":1, "msg":"恭喜!注册成功,请重新登录"}');
}

?>
