<template>
  <div class="emptyCart">
     <div class="main-pic">
       <img src="../../assets/img/logo/empty_pic.png">
     </div>
     <h3>你的购物车是空的哦！</h3>
     <div class="btns">
       <router-link to="/myProducts">
         <a class="btns-lt">随便看看</a>
       </router-link>
       <router-link to="/myLogin">
         <a class="btns-rt">去登录</a>
       </router-link>
     </div>
  </div>
</template>
<script>
  export default{
  }
</script>
<style scoped lang="stylus">
    fn(x)
      return x/25
    .emptyCart
        width:100%
        text-align center
        position:absolute
        top:fn(64rem)
        .main-pic
           img
              width:fn(95rem)
              height:fn(95rem)
        h3
          line-height: fn(22rem);
          text-align: center;
          padding: fn(8rem) 0;
          font-size fn(12rem)
          font-family: \5FAE\8F6F\96C5\9ED1,SimHei;
          color: #999;
        .btns
            width 100%
            padding-top fn(20rem)
            font-size fn(15.5rem)
            a
              display: inline-block;
              width:fn(120rem)
              margin:0 fn(19rem)
              padding:fn(7rem) 0
              border-radius fn(10rem)
              text-decoration none
            .btns-lt
               background:#ff4d8e
               color:#fff
            .btns-rt
               background:#fff
               color:#666
</style>
