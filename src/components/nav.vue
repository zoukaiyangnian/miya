<template>
  <div class="bottom-nav">
    <ul id="footerNav">
      <li><router-link to="/myHomePage" ><a><img src="../assets/img/logo/index.png" ></a></router-link></li>
      <li ><router-link to="/myProducts" ><a><img src="../assets/img/logo/list.png" ></a></router-link></li>
      <li ><router-link to="/myCart" ><a><img src="../assets/img/logo/cart.png"></a></router-link></li>
      <li><a @click="handleClick">
        <img v-if="!state1" src="../assets/img/logo/login.png">
        <img v-else="state1" src="../assets/img/logo/me.png">
      </a></li>
      <li><div><a class="downApp"><img src="../assets/img/logo/applogo.png"></a></div></li>
    </ul>
  </div>
</template>

<script>
  export default{
    props:['state1'],
    methods:{
      handleClick:function(){
       // console.log(this.state1)
       // console.log(bus);
        if(this.state1){
          this.$router.push('/myCore')
        }else{
          this.$router.push('/myLogin')
        }
      }
   }


  }
</script>
<style lang="stylus">
  fn(x)
    return x/25
  /*尾部导航*/
  div.bottom-nav
    width:100%;

    ul
        width:100%;
        height: fn(44rem);
        background:#fafafa;
        border-top:1px solid lightgray;
        position:fixed;
        bottom:-10px;
        li
          float:left;
          width:20%;
          text-align:center;
          img
            max-width: 100%;
            max-height: 100%;
          a
            width: fn(57rem);
            height: fn(44rem);
            display:inline-block;
          div
            a.downApp
              position: absolute;
              right:0;
              bottom:0;
              height: fn(59rem);
              width: fn(68rem);
              img
                width:100%;
</style>
