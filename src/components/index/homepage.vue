<template>
  <div id="dd">
    <myheader></myheader>
    <mycarousl></mycarousl>
    <floor></floor>
    <myfooter></myfooter>
  </div>
</template>


<script>
  import Vue from 'vue'
  import myHeader from '@/components/index/header'
  Vue.component("myheader",myHeader)
  import myFooter from '@/components/index/footer'
  Vue.component("myfooter",myFooter)
  import myCarousel from '@/components/index/carousl'
  Vue.component("mycarousl",myCarousel)
  import Floor from '@/components/index/floor'
  Vue.component("floor",Floor)
  export default {

  }

</script>
<style>
  #dd {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;

  }
</style>
