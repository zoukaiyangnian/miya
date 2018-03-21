<template>
  <div id="dd">
    <!--头部-->
      <div class="header">
        <div><a  href="javascript:history.go(-1)"><span class="glyphicon glyphicon-chevron-left"></span></a></div>
        <div>快速登录</div>
        <div><a href="" @click="goindex"><span class="glyphicon glyphicon-home"></span></a></div>
      </div>
    <!--登录框-->
      <div class="userinput">
        <div class="uname">
          <span class="glyphicon glyphicon-user"></span>
          <input type="text" placeholder="请输入用户名">
        </div>
        <div class="upwd">
          <span class="glyphicon glyphicon-lock"></span>
          <input type="password" placeholder="请输入密码">
        </div>
      </div>
      <!-- 登录状态提示-->
    <p class="loging"></p>
    <!--登录按钮-->
      <div class="login">
        <button  @click="clickLogin">一键登录</button>
      </div>
    <!--注册提示-->
      <p class="register">用户注册即代表同意&nbsp;&nbsp;&nbsp;
        <a href="javascript:;">蜜芽服务条款</a><a href="javascript:;" @click="gotoregiste">注册>></a></p>
    <!--分割线-->
      <div class="footer">
      <div></div>
      <div>其他方式登录</div>
      <div></div>
    </div>
    <!--其他登录方式-->
      <div class="footerlogin">
      <a href="javascript:;"><img src="../../assets/img/logo/weixin.jpg" alt=""></a>
      <a href="javascript:;"><img src="../../assets/img/logo/weibo.jpg" alt=""></a>
    </div>
  </div>
</template>


<script>
  import bus from "../../assets/js/bus.js";
  export default {
    data:function(){
      return {
        isLogin: false
      }
    },
        methods: {
          clickLogin: function () {
            //获取输入框内容
            var uname=$(".uname>input").val();
            var upwd=$(".upwd>input").val();
            var reg=/^[a-z0-9]{6,18}$/i;
            if(!reg.test(uname)){
              $('.loging').text("用户名格式错误")
              return;
            }
            if(!reg.test(upwd)) {
              $('.loging').text("密码格式错误")
              return;
            }
           // console.log(uname,upwd);
            //发请求
            this.$http.get('http://127.0.0.1/miya/my/src/assets/data/user/login.php?uname='+uname+'&upwd='+upwd,{withCredentials:true})
              .then((result)=>{
             // console.log(result)
              if(result.body=='true'){
                $('.loging').text("登录成功,2秒后返回主页")
                setTimeout(()=>{
                  this.$emit("toFatherEvent",true)
                  this.$router.push('/myHomePage')
                },2000)
              }else{
                $('.loging').text("用户名或密码错误")
              }
              }
            )

            //清空输入框
            $(".uname>input").val('');
            $(".upwd>input").val('');

          },
          goindex:function(){
            this.$router.push('/myHomePage')
          },
          gotoregiste:function(){
            this.$router.push('/myRegiste')          }
        }
      }

</script>
<style scoped lang="stylus">
  fn(x)
    return x/25
  #dd {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    margin-top: 10px;
  }
  .header:after{
    content:'';
    display:block;
    clear:both;
  }
  .header>div {
  height: fn(40rem);
  line-height fn(40rem);
  background: #ff4e88;
  float :left;
}
  .header>div:nth-child(1){
    width :10%;
  }
  .header>div:nth-child(2){
    width :80%;
    color :#fff;
    font-size :fn(20rem);
  }
  .header>div:nth-child(3){
    width :10%;
  }
  .userinput{
    border:1px solid #d7d7d7;
    border-radius :5px;
    width :90%;
    margin:fn(30rem) auto;
  }
  .userinput>div{
    height :fn(50rem);
    width :90%;
    line-height :fn(50rem);
    margin:0 auto;
  }
  .loging{
    height: fn(40rem);
    line-height: fn(40rem);
    width: 80%;
    margin:0 auto;
    color:red;
    text-align: center;
  }
  .uname{
      border-bottom :1px solid #d7d7d7;
    }
  .userinput>div>input{
    width :fn(250rem);
    height :fn(30rem);
    border :0px;
    outline :none;
  }
  .login{
    margin-top: fn(10rem);
  }
  .login>button{
    width :90%;
    height fn(50rem);
    font-size :fn(20rem);
    color :#fff;
    background :#ff4e88;
    border :0;
    border-radius :5px;
  }
  .register{
    width :90%;
    margin :fn(50rem) auto;
    text-align :left;
    font-size :fn(15rem);
  }
  .register>a{
    display inline-block;
    font-size :fn(12rem);
    color :gray;
    border-bottom:1px solid gray;
  }
  .register>a:nth-child(2){
    display inline-block;
    color :red;
    border-bottom:0;
    position:absolute;
    right:fn(30rem);
  }
  .footer{
    width 90%;
    margin :auto;
    text-align center;
    height :fn(20rem);
    line-height :fn(20rem);
  }
  .footer>div{
    float:left;

  }
  .footer>div:nth-child(1){
    width:38%;
    height :1px;
    border-bottom : 1px solid #d7d7d7;
  }
  .footer>div:nth-child(2){
    width:24%;
    position :relative;
    bottom:50%;
    color :gray;
  }
  .footer>div:nth-child(3){
    width:38%;
    height :1px;
    border-bottom : 1px solid #d7d7d7;
  }
  .footerlogin>a>img{
    width :fn(60rem);
    height :fn(60rem);
    border-radius :10px;
  }
  .footerlogin>a:nth-child(1)>img{
    width :fn(40rem);
    height :fn(40rem);
    border-radius :10px;
  }
</style>
