<template>
  <div class="" >
    <span class=""></span>
    <p class="">
      <span class="span1">蜜芽 </span>
      <span class="span2">进口母婴正品特卖</span>
    </p>
    <router-link to="/myProducts"><img src="../../assets/img/logo/search.png"  class="search"/></router-link>
  </div>
</template>


<script>

  export default {
  }

</script>
<style scoped lang="stylus">
  fn(x)
   return x/25
  div{
    height: fn(35rem);
  }
  p{
    display: inline-block;
    margin: auto;
  }
  p>.span1{
    display: inline-block;
    font-size: fn(25rem);
    color: #FA3C94;
  }
.search{
  width: fn(30rem);
  height: fn(25rem);
  display: inline-block;
  position: absolute;
  right: 0;
  top:fn(5rem);
}
</style>
