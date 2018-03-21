<!--头部搜索导航栏-->
<template>
  <!--顶部导航条-->
  <div class="searchHead">
      <a class="icon-lt icon-back" :class="[showClass,isXS?hiddenClass:'']" @click="Back()"></a>
    <router-link to="/myProducts">
      <a class="icon-lt icon-close" :class="[showClass,!isXS?hiddenClass:'']"
        @click="updateShow()">
      </a>
    </router-link>
    <div class="inpbox" @click="jump()">
         <input type="text" placeholder="请输出关键字搜索" v-model.trim="searchContent">
    </div>
    <router-link to="/index">
      <a class="icon-rt icon-home"></a>
    </router-link>
  </div>
</template>
<script>
  const delay = (function() {
    let timer = 0;
    return function(callback, ms) {
      clearTimeout(timer);
      timer = setTimeout(callback, ms);
    };
  })();
  import bus from '../../assets/js/commonality'
  export default{
      data:function(){
        return{
          isXS:false,
          showClass:'show', //显示返回图标
          hiddenClass:'hidden',  //隐藏返回图标
          searchContent:'',       //搜索框内容
        }
      },
      methods:{
        updateShow:function () {
          this.isXS=false //隐藏返回图标
          this.$emit('toFatherEvent',true)
        },
        jump:function () {
          this.isXS=true; //显示返回图标
          this.$emit('toFatherEvent',false)
        },
        //返回上一页
        Back(){
          this.$router.go(-1);
        },
        sendData:function () {
          var RC;  //搜索框值改变通过传参切换搜索界面
          var dname = this.searchContent;
          if (dname.length > 0) {
            RC = true;
            this.$http
              .get('http://127.0.0.1/miya/my/src/assets/data/product/searchproduct.php?dname='+ dname)
              .then((result) => {
                bus.$emit('toSearchEvent',{RC,result});
              });
          } else{
            RC = false;
            bus.$emit('toSearchEvent',RC);
          }
        }
      },
      watch:{
        searchContent(){
          delay(() => {
           this.sendData()
          }, 300);
        }
      }

  }
</script>
<style scoped lang="stylus">
  /*装换函数*/
  fn(x)
    return x/25
  /* 头部导航*/
  div.searchHead
    width:100%;
    position: fixed;
    top:0;
    padding: fn(5rem) 0;
    height: fn(46rem);
    font-size:17.5px;
    background-color: #ff4d8e;
    z-index: 50;
    .icon-lt
      position: absolute;
      top:.175rem;
      left:0;
      width:1.5rem;
      height:1.5rem;
    .icon-back
      background:url(../../assets/img/logo/icon_back.png) no-repeat center;
      background-size:1rem auto;
    .icon-close
      background:url(../../assets/img/logo/icon_close.png) no-repeat center;
      background-size:1rem auto;
    .show
      display:block
    .hidden
      display:none
    .icon-rt
      width: 2rem;
      height: 1.5rem;
      position: absolute;
      top: .175rem;
      right: 0;
    .icon-home
      background:url(../../assets/img/logo/icon_home.png) no-repeat center;
      background-size:1rem auto;
    .inpbox
      border-radius: 0.2rem;
      position: relative;
      margin:0 2rem 0 1.5rem;
      height:100%;
      background-color:#fff;
      overflow:hidden;
      input
        transition: all .3s ease;
        position: relative;
        z-index: 5;
        padding: 0 .4rem;
        border: none 0;
        background:#FFFFFF;
        width: 100%;
        height: 1.5rem;
        line-height: 1.5rem;
        font-size: .7rem;
        font-family: inherit;
        color: #999;
        outline: 0;



</style>

