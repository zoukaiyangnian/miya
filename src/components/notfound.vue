<template>
  <div>
    <h1>404 Page NotFound</h1>

    <h3>{{count}}s自动返回上一页</h3>
  </div>
</template>
<script>
  export default{
    mounted(){
    //组件挂载完成后启动周期性定时器,每个一秒对count进行自减
    this.myTimer = setInterval(()=>{
      this.count--
      if(this.count<1){
        clearInterval(this.myTimer)
        this.myTimer=null
        this.$router.go(-1)
      }
    },1000)
  },
  beforeDestroy(){
    if(this.myTimer){
      clearInterval(this.myTimer)
    }
  },
  data(){
    return {
      count: 5,
      myTimer:0
    }
  }
  }
</script>
