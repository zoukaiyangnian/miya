<template>
  <div id="dd">
    <!--头部-->
    <div class="header">
      <div><a href="javascript:history.go(-1)"><span class="glyphicon glyphicon-chevron-left"></span></a></div>
      <div>快速注册</div>
      <div><a href="" @click="goindex"><span class="glyphicon glyphicon-home"></span></a></div>
    </div>
    <!--注册框-->
    <div class="userinput">
      <div class="uname">
        <span class="glyphicon glyphicon-user"></span>
        <input type="text" placeholder="请输入6-18位用户名">
      </div>
      <div class="upwd">
        <span class="glyphicon glyphicon-lock"></span>
        <input type="password" placeholder="请输入密码">
      </div>
    </div>
    <!-- 注册状态提示-->
    <p class="loging"></p>
    <!--注册按钮-->
    <div class="login">
      <button  @click="clickRegiste">注册</button>
    </div>
    <a class="tologin" @click="toLogin" href="javascript:;">去登录>></a>



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
      clickRegiste: function () {
        //获取输入框内容
        var uname=$(".uname>input").val();
        var upwd=$(".upwd>input").val();
        var reg=/^[a-z0-9]{6,18}$/i;
        if(!reg.test(uname)){
          $('.loging').text("用户名格式不正确")
          return;
        }
        if(!reg.test(upwd)) {
          $('.loging').text("密码格式不正确")
          return;
        }
        // console.log(uname,upwd);
        //发请求
        this.$http.get('http://127.0.0.1/miya/my/src/assets/data/user/registe.php?uname='+uname+'&upwd='+upwd,{withCredentials:true})
          .then((result)=>{
              //console.log(result.body)
              if(result.body.code===1){
                $('.loging').text(result.body.msg)
                setTimeout(()=>{
                  this.$router.push('/myLogin')
                },2000)
              }else{
                $('.loging').text(result.body.msg)
              }
            })
        //清空输入框
        $(".uname>input").val('');
        $(".upwd>input").val('');
//        bus.bus.$emit("toCore",uname)
      },
      goindex:function(){
        this.$router.push('/myHomePage')
      },
      toLogin:function(){
        this.$router.push('/myLogin')
      }
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
.tologin{
  margin-top: fn(20rem);
  position: absolute;
  right:fn(20rem);
  color: lightseagreen;
}
</style>
