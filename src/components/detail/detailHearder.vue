<template>
    <div class="dheader">
      <div class="CH-left" @click="Back()">
        <a>
          <span class=" lt-icon"></span>
        </a>
      </div>
      <div class="CH-content">商品详情</div>
      <router-link to="/index">
        <div class="CH-right">
          <a>
            <span class="rt-icon"></span>
          </a>
        </div>
      </router-link>
    </div>
</template>

<script>
    export default {
      methods:{
        Back(){
          this.$router.go(-1);
        },
      }
    }
</script>

<style scoped lang="stylus">
  fn(x)
    return x/25
  .dheader
    width:100%;
    position: fixed;
    top:0;
    height: fn(44rem);
    font-size:fn(17.5rem);
    background-color: #ff4d8e;
    color: #fff;
    z-index: 50;
    .CH-left,.CH-content,.CH-right
      float :left
    .CH-left,.CH-right
      width:fn(46rem)
      height:fn(44rem)
      a
        display:block;
        padding: fn(9rem) fn(10rem);
        span
          display:block;
          width:fn(26rem);
          height:fn(26rem);
        .lt-icon
          background:url('../../assets/img/logo/icon_back.png')no-repeat;
          background-size:fn(26rem) fn(26rem);
        .rt-icon
          background:url('../../assets/img/logo/icon_home.png')no-repeat
          background-size:fn(26rem) fn(26rem);
    .CH-content
      width:fn(308rem)
      height:fn(44rem)
      text-align:center
      font-size:fn(18rem)
      line-height:fn(44rem)
</style>
