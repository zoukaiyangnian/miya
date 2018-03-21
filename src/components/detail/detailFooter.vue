<template>
     <div class="Dfooter">
         <span class="DF-lf">
           <router-link to="/myCart">
            <div class="cartP">
                <b class="number">{{cartCount}}</b>
                 <i class="cart"></i>
                <a class="title" >购物车</a>
            </div>
           </router-link>
         </span><span class="DF-rt" @click="addCart()">
             <a >加入购物车</a>
         </span>
     </div>
</template>

<script>
  import bus from '../../assets/js/commonality'
  import {setCookie,getCookie} from '../../util/util';
    export default {
      mounted:function () {
        var that=this;//  传递this的作用域
         bus.$on('sendCount',function (msg) {
            that.mcount=msg
         })
       },
       props:['Pdata'],
       data:function () {
         return{
           cartCount:0,
           mcount:1
         }
       },
      methods:{
        addCart(){
            this.cartCount+=this.mcount
          console.log(this.Pdata.lid)
          var a = {
            lid:this.Pdata.lid,
            product_name: this.Pdata.product_name,
            count: this.cartCount,
            lg: this.Pdata.lg,
            price: this.Pdata.price,
            checked: false
          }
          var list = JSON.parse(getCookie('cartList'));
          var c = 0;
          if (list == null) {
            list = [];
            list.push(a)
          } else {
            for (var b of list) {
              if (b.lid == a.lid) {
                b.count += a.count;
                c = 1;
              }
            }
            if (c == 0) list.push(a)
          }
          setCookie("cartList", JSON.stringify(list), 7)
        }
      }
    }
</script>

<style scoped lang="stylus">
     fn(x)
       return x/25
     .Dfooter
       width: 100%
       position:fixed
       bottom:fn(44rem)
       height:fn(52rem)
       .DF-lf
           width:fn(140rem)
           height:fn(52rem)
           border-top:1px solid #f2f2f2
           display inline-block
           background:#fff
           .cartP
             width fn(90rem)
             height:fn(52rem)
             position relative
             display inline-block
             i.cart
               display:block
               width:fn(25rem)
               height:fn(25rem)
               position:absolute
               top:fn(8rem)
               left:fn(30rem)
               background:url(../../assets/img/logo/detail_cart.png) no-repeat
               background-size:fn(25rem) fn(25rem)
             b.number
               position: absolute;
               display: block;
               height:fn(15rem);
               color: #fff;
               font-size: .4267rem;
               border-radius: .5973rem;
               min-width:fn(15rem);
               background: #fa4b9b;
               text-align: center;
               line-height: .5973rem;
               top: .1067rem;
               left:fn(48rem)
               font-style: normal;
             a.title
                color:#333;
                display: block;
                font-size fn(13rem)
                height:fn(20rem)
                position:absolute
                top fn(31rem)
                left:fn(25rem)
                text-decoration none
       .DF-rt
           width:fn(260rem)
           height:fn(52rem)
           display:inline-block
           background:#ff4d8e
           text-align center
           position relative
           a
             position:absolute
             top:fn(15rem)
             left fn(88rem)
             color:#fff
             font-size fn(17rem)
             text-decoration none
</style>
