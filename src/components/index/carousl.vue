<template>
  <div class="lunbo ">
      <img src="../../assets/img/carousl/1.jpg" class="img  show"/>
      <img src="../../assets/img/carousl/2.jpg" class="img "/>
      <img src="../../assets/img/carousl/3.jpg" class="img "/>
      <img src="../../assets/img/carousl/4.jpg" class="img "/>
      <img src="../../assets/img/carousl/5.jpg" class="img "/>
      <img src="../../assets/img/carousl/6.jpg" class="img "/>
      <img src="../../assets/img/carousl/7.jpg" class="img "/>
  </div>
  </template>
<script>
  export default {
    mounted:function(){
        function task(){
        var show=$(".show")
        show.removeClass("show");
        if(show.next().length!==0){
          show.next().addClass("show")
        }else{
          $(".lunbo").children().first().addClass("show")
        }
      }
      var timer=setInterval(task,3000)
//      $(".lunbo").onmouseover=function(){
//        clearInterval(timer);
//        this.timer=null;
//      }
//      $(".lunbo").onmouseout=function(){
//        timer=setInterval(task,3000)
//      }
    }
  }
</script>
<style scoped lang="stylus">
  fn(x)
    return x/25
  div{
    margin-top:10px;
    padding:0;
    width:fn(400rem);
    height: fn(214rem);
    position: relative;
    text-align: center;
  }
.img{
    width:fn(400rem);
    position: absolute;
  left:0;
  opacity:0;
  margin:auto 0;
  transition:all 0.2s linear;
}
  .show{
    z-index: 10;
    opacity:1;
  }
</style>
