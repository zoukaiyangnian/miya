<template>
  <div class="cart1">
    <CartHeader></CartHeader>
    <ShoppingCart v-if="!isSOE" @sendToCart="receiveSCMsg($event)"></ShoppingCart>
    <EmptyCart v-if="isSOE"></EmptyCart>

  </div>
</template>

<script>
  import Vue from 'vue'
  import CartHeader from '@/components/cart/cartHeader';
  Vue.component("CartHeader",CartHeader)
  import EmptyCart from '@/components/cart/emptyCart';
  Vue.component("EmptyCart",EmptyCart)
  import ShoppingCart from '@/components/cart/shoppingCart';
  Vue.component("ShoppingCart",ShoppingCart)
  import {getCookie} from '../../util/util';
  export default{
   // components:{CartHeader,EmptyCart,ShoppingCart},
    mounted:function () {
      var  list=getCookie("cartList");
      if(list!=null){
        this.isSOE=false;
      }else{
        this.isSOE=true;
      }
    },
    data:function () {
        return{
          isSOE:false,
        }
    },
    methods:{
      receiveSCMsg:function (msg) {
         this.isSOE=msg
      }
    }

  }
</script>
<style scoped lang="stylus">

</style>
