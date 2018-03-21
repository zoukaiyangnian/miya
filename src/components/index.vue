<template>
    <div>
      <router-view  @toFatherEvent="rcvMsg"></router-view>
      <mynav :state1="isLogin" ></mynav>
    </div>
</template>

<script>
  export default {
    data:function(){
      return{
        isLogin:false
      }
    },
    methods:{
      rcvMsg:function(msg){
        this.isLogin=msg;
       // console.log(msg);
      }
    },
    beforeMount:function(){
          //挂载前判断是否登录,并把值保存
      this.$http.get('http://127.0.0.1/miya/my/src/assets/data/user/isLogin.php',{withCredentials:true}).then((result)=>{
       // console.log(result.body.ok)
        if(result.body.ok==1){
          this.isLogin=true;
        }
      })
    }
  }

</script>
<style scoped lang="stylus">
  fn(x)
    return x/25
  mynav{
    position:fixed;
    bottom:0;
  }
</style>
