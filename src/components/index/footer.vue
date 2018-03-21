<template>
  <div>
      <div class="download ">
        <span class="">
          <img src="../../assets/img/logo/logo_1.png"/>
          蜜芽APP,进口母婴特卖
        </span>
        <a href="#" class="">立即下载</a>
      </div>
      <div class="footer-nav">
        <span></span>
        <span>电脑版首页</span>
        <span>|</span>
        <span>蜜芽触屏版首页</span>
        <span>|</span>
        <span>关于我们</span>
        <span></span>
      </div>
    <p>通过本网站直接或者间接的推销商品或者服务的商业宣传活动均属"广告"</p>
    <p>Copyright @ 2018</p>
    <p>北京花旺在线商贸有限公司 Mia.com 保留一切权利</p>
    <p class="footer-p"></p>
  </div>
</template>


<script>

  export default {

  }

</script>
<style scoped lang="stylus">
  fn(x)
    return x/25
  .download{
    width: fn(400rem);
    height: fn(45rem);
    line-height:fn(45rem) ;
    margin:fn(15rem) 0;
  }
  .download span{
    display: inline-block;
    height: fn(40rem);
    width: fn(300rem);
    /*font-size: fn(6rem);*/
    font-weight: 500;
    color: fn(25rem);
    font-weight: bold;
    position: relative;
    right:fn(50rem);
  }
  .download a{
    display: inline-block;
    height: fn(25rem);
    line-height:fn(25rem) ;
    width: fn(80rem);
    border: 1px solid #FA3C94;
    color:#FA3C94;
    font-weight: bold;
    margin-top:fn(10rem);
  }
  .footer-nav>span{
    font-weight: 500;
    margin:0  2%;
  }
  p{
    width: fn(400rem);
    font-size: fn(1rem);
    margin-top: fn(5rem);
  }
  .footer-p{
    height: fn(40rem);
  }
</style>
