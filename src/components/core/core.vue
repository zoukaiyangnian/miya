<template>
  <div id="dd">
    <!--头部-->
    <div class="header">
      <div><a href="javascript:history.go(-1)"><span class="glyphicon glyphicon-chevron-left"></span></a></div>
      <div>个人中心</div>
      <div><a href="javascript:;" @click="goindex"><span class="glyphicon glyphicon-home"></span></a></div>
    </div>
    <!--个人资料-->
    <div class="core">
      <div class="core-1">
        <img src="../../assets/img/logo/tx.jpg">
      </div>
      <div class="core-2">
        <span class="core-2-uname">{{this.uname}}</span>
        <p>
          <span>等级:</span>
          <span>小蜜蜂 &nbsp;&nbsp;&nbsp;</span>
          <span>蜜蜂值:</span>
          <span>0</span>
          <br>
          <span>宝宝:</span>
        </p>
      </div>
    </div>
    <!--分割线-->
    <div class="line"></div>
    <!--购物详情列表-->
    <div class="cartList">
      <a href="javascript:;"><img src="../../assets/img/logo/1.jpg" alt=""></a>
      <a href="javascript:;"><img src="../../assets/img/logo/2.jpg" alt=""></a>
      <a href="javascript:;"><img src="../../assets/img/logo/3.jpg" alt=""></a>
      <a href="javascript:;"><img src="../../assets/img/logo/4.jpg" alt=""></a>
      <a href="javascript:;"><img src="../../assets/img/logo/5.jpg" alt=""></a>
    </div>
    <!--优惠券-->
    <ul class="ticket">
      <li>
        <a href="javascript:;">
          <span>优惠券</span>
          <span>0张未使用></span>
        </a>
      </li>
      <li>
        <a href="javascript:;">
          <span>实名认证</span>
          <span>未认证></span>
         </a>
      </li>
      <li>
        <a href="javascript:;">
          <span>拨打热线</span>
          <span  style="color:#ff4e88;font-weight:bold">10108088></span>
        </a>
      </li>
    </ul>
    <!-- 下载App-->
    <div class="download">
      <img src="../../assets/img/logo/logo_1.png"/>
      <a href="javascript:;">立即下载</a>
    </div>
    <!-- 退出登录-->
    <button class="logout" @click="logout">退出登录</button>
  </div>
</template>


<script>
  import bus from "../../assets/js/bus.js";
  export default {

    beforeMount:function(){
	this.$http.get('http://127.0.0.1/miya/my/src/assets/data/user/islogin.php',{withCredentials:true})
          .then((result)=>{
            //console.log(result.body.uname)
		this.uname=result.body.uname
        })
	},
    data:function(){
      return{
        uname:''
      }
    },
    methods:{

      logout:function(){
        this.$http.get('http://127.0.0.1/miya/my/src/assets/data/user/logout.php',{withCredentials:true})
          .then((result)=>{
            this.$emit("toFatherEvent",false)
            this.$router.push('/myHomePage')
        })
      },
      goindex:function(){
        this.$router.push('/myHomePage')

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
  .core:after{
    content:'';
    display:block;
    clear:both;
  }
    .core{
      margin-top :fn(20rem);
      height :fn(80rem);
    }
  .core>div {
    height: fn(60rem);
    float :left;
    margin-left:fn(20rem);
  }
  .core-1>img{
      width :fn(60rem);
    height :fn(60rem);
  }
    .core-2{
      text-align :left;
    }
  .core-2>span{
    display :inline-block;
    text-align :left;
      font-size :fn(14rem);
    font-weight :bold;
  }
  .core-2>p{
    height :fn(20rem);
    width :fn(200rem);
  }
  .core-2>p>span{
    font-size :fn(12rem);
    color:#999;
    margin-top:fn(5rem);
  }
  .core-2>p>span:nth-child(2){
    color:#ff4e88;
    font-size :fn(14rem);
  }
  .core-2>p>span:nth-child(4){
    color:#000;
    font-size :fn(14rem);
  }
  .line{
    width :100%;
    height :1px;
    border-bottom :1px solid #999;
  }
  .cartList{
    height :fn(80rem);
    border-bottom:1px solid #999;
  }
  .cartList>a{
    display :inline-block;
    width :18%;
    height :fn(30rem);
  }
  .ticket{
    border-top:1px solid #999;
    margin-top :fn(10rem);
  }
  .ticket>li{
    height :fn(50rem);
    line-height :fn(50rem);
    border-bottom :1px solid #999;
  }
  .ticket>li>a{
    display :inline-block;
    width :90%;
    text-align: left;
    position :relative;
  }
  .ticket>li>a>span:nth-child(1){
    color :#555;
    font-size: fn(15rem);
  }
  .ticket>li>a>span:nth-child(2){
    color :#000;
    font-size: fn(13rem);
    position :absolute;
    right:0;
  }
  .download{
    width: 100%;
    height: fn(55rem);
    line-height: fn(55rem);
    margin-top: fn(20rem);
    border-bottom: 1px solid #999;

    position: relative;
  }
  .download>img{
    width: fn(70rem);
    height: fn(39rem);
    position: absolute;
    left:5%;
    top:20%;
  }
  .download>a{
    display: inline-block;
    width: fn(80rem);
    height: fn(35rem);
    line-height: fn(35rem);
    border: 1px solid #999;
    border-radius: 5px;
    background: #ff4e88;
    color: #fff;
    position: absolute;
    right: 5%;
    top: 20%;
  }
  .logout{
    width: fn(200rem);
    height: fn(45rem);
    background: #ff4e88;
    color: #fff;
    margin-top: fn(20rem);
    border: 0;
    border-radius: 5px;
  }
</style>
