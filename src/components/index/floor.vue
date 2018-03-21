<template>
  <div class="floor">
             <div class="floor-two">
              <p><span>给孩子买安心,蜜芽100%正品保障</span></p>
              <div>
                <img src="../../assets/img/floor/floor-1.jpg" class="floor-two-img"/>
                <img src="../../assets/img/floor/floor-2.jpg"/>
                <img src="../../assets/img/floor/floor-3.jpg"/>
                <img src="../../assets/img/floor/floor-4.jpg"/>
                <img src="../../assets/img/floor/floor-5.jpg"/>
            </div>
             </div>
             <div class="floor-one">
               <span class="floor-one-span1">今日特卖</span>
               <span class="floor-one-span2">每日十点上午更新</span>
               <img src="../../assets/img/logo/floor-1.jpg"/>
               <div  class="floor-one-ul">
                 <ul >
                   <li><router-link to="/myDetail/1">
                     <img src="../../assets/img/products/sm/1_sm.png" alt=""/></router-link>
                     <p>德国爱他美 Aptamil 婴幼儿配方奶粉1+段12m+800g *4罐（安心罐）</p>
                     <p>¥535</p>
                   </li>
                   <li><router-link to="/myDetail/2">
                     <img src="../../assets/img/products/sm/2_sm.png" alt=""/></router-link>
                     <p>新西兰原装 a2 【品牌授权】PLATINUM婴儿奶粉3段12~36M 900g*2罐</p>
                     <p>¥450</p>
                   </li>
                   <li><router-link to="/myDetail/3">
                     <img src="../../assets/img/products/sm/3_sm.png" alt=""/></router-link>
                     <p>德国爱他美 Aptamil 爱他美婴儿配方奶粉3段10~12M 800g*2罐</p>
                     <p>¥320</p>
                   </li>
                   <li><router-link to="/myDetail/4">
                     <img src="../../assets/img/products/sm/6_sm.png" alt=""/></router-link>
                     <p>荷兰牛栏 Nutrilon 婴幼儿奶粉4段12M+800g*4罐</p>
                     <p>¥556</p>
                   </li>
                   <li><router-link to="/myDetail/5">
                     <img src="../../assets/img/products/sm/8_sm.png" alt=""/></router-link>
                     <p>新西兰原装 a2 【品牌授权】PLATINUM婴儿奶粉2段6~12M 900g*2罐</p>
                     <p>¥456</p>
                   </li>
                   <li><router-link to="/myDetail/6">
                     <img src="../../assets/img/products/sm/9_sm.png" alt=""/></router-link>
                     <p>荷兰牛栏 Nutrilon 婴幼儿奶粉5段24M+800g*4罐</p>
                     <p>¥432</p>
                   </li>
                   <li><router-link to="/myDetail/7">
                     <img src="../../assets/img/products/sm/10_sm.png" alt=""/></router-link>
                     <p>德国爱他美 Aptamil 爱他美婴儿配方奶粉2段6~10M 800g*4罐</p>
                     <p>¥556</p>
                   </li>
                 </ul>
               </div>
             </div>
             <div class="floor-three">
               <p>
                 <span>蜜芽拼团</span>
                 <span>包邮包税</span>
                 <span>130万</span>
                 <span>达人妈妈都在团</span>
               </p>
               <ul class="floor-three-ul">
                 <li v-for="tmp in lists">
                   <img :src="require('../../assets/'+tmp.sm)" @click="jumpToDetail(tmp.lid)" alt=""/>
                   <p>{{tmp.product_name}}</p>
                   <p>拼团价¥{{tmp.price}}</p>
                 </router-link></li>
               </ul>
               <p class="floor-three-p" @click="clickProduct">更多>></p>
             </div>
  </div>

</template>


<script>
  export default {
    mounted: function () {
      this.load();
//      console.log(this.productList)
    },
    data:function(){
      return{
        productList:[],
        lists:[],
        num:8,
        m:1
      }
    },
    methods: {
      load: function () {
        this.$http.get('http://127.0.0.1/miya/my/src/assets/data/index/index.php')
          .then((result)=>{
//          console.log(result.data);
          this.productList=result.data
          this.lists=this.productList.slice(0,8)
        })
      },
      //默认加载8个数据,每点击一次就多截取8个数组
      clickProduct:function(){
        this.num+=8;
        this.m++;
        this.lists=this.productList.slice(0,this.num);
        //console.log(this.lists)
      },
      jumpToDetail:function(lid){
    this.$router.push('/myDetail/'+lid)
    }
    }
  }
</script>

<style scoped lang="stylus">
  fn(x)
    return x/25
   /*.floor{*/
    /*height:fn(600rem);*/
    /*}*/
  .floor-two{
	margin-top:10px;
  }
  .floor-two>p{
    height: fn(30rem);
    line-height: fn(30rem);
    width: 100%;
    font-size:fn(15rem);
    text-align: left;
    background: #F2F2F4;
  }
  .floor-two>p>span{
    margin-left: fn(30rem);
  }
  .floor-two>div{
  	width:fn(400rem);
	height:fn(175.97rem);
  }
  .floor-two>div>.floor-two-img{
	float:left;
	height:fn(157.84rem);
	width:fn(121.59rem);
	margin-left:fn(10rem);
  }
 .floor-two>div>img{
	float:left;
	height:fn(75.19rem);
	width:fn(118.39rem);
	margin:fn(5rem);
 }
  .floor-one{
   // height: fn(350rem);
    line-height: fn(35rem);
    margin-top:10px;
  }
  .floor-one>img{
    width:100%;
  }
  .floor-one .floor-one-span1{
    /*display: inline-block;*/
    font-size: fn(20rem);
    position: absolute;
    left: fn(25rem);
  }
  .floor-one .floor-one-span2{
    font-size: fn(6rem);
    position: relative;
    right: fn(33rem);
    top: fn(3rem);
  }
  .floor-one>.floor-one-ul{
    width: 100%;
    overflow-x: auto;
  }
 .floor-one>.floor-one-ul>ul{
	width: fn(780rem);
  /*overflow-x:auto;*/
	height:fn(130rem);
  margin-top:10px;
 }
  .floor-one>.floor-one-ul>ul>li{
	width:fn(100rem);
	float:left;
	margin:fn(5rem) fn(5rem);
  }
 .floor-one>.floor-one-ul>ul>li>img{
	 border:1px solid  #F2F2F4;
 }
  .floor-one>.floor-one-ul>ul>li>p{
	font-size:fn(10rem);
    width :fn(82rem);
	height:fn(20rem);
    margin:0 auto;
	line-height:fn(20rem);
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
  }
  .floor-one>.floor-one-ul>ul>li>p:nth-child(3){
	color:#fa3c94;
	font-size:fn(13rem);
	height:fn(20rem);
	line-height:fn(20rem);
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
  }
  .floor-three{
    width :100%;
  }
  .floor-three>p{

    text-align: left;
    height: fn(40rem);
    line-height: fn(40rem);
    background: #F2F2F4;
  }
  .floor-three>p>span{

    display: inline-block;
    height: fn(20rem);
    line-height: fn(20rem);
  }
  .floor-three>p>span:nth-child(1){
    margin-left: fn(20rem);
    font-size:fn(20rem);
      color: red;
  }
  .floor-three>p>span:nth-child(2){
    width: fn(55rem);
    text-align: center;
    border-radius:fn(5rem);
    font-size: fn(12rem);
    background: red;
    color: #fff;
  }
  .floor-three>p>span:nth-child(3){
    font-size: fn(12rem);
    color: red;
    margin-left: fn(110rem);
  }
  .floor-three>p>span:nth-child(4){
    font-size: fn(12rem);
  }
  .floor-three>.floor-three-ul{
      width: 100%;
  }
  /*清除浮动*/
  .floor-three>.floor-three-ul:after{
    content:'';
    display:block;
    clear:both;
  }
  .floor-three>.floor-three-ul>li{
    width:fn(90rem);
    float:left;
    margin:fn(5rem) fn(5rem);
  }
  .floor-three>.floor-three-ul>li>img{
    border:1px solid  #F2F2F4;
  }
  .floor-three>.floor-three-ul>li>p{
    font-size:fn(10rem);
    width :fn(82rem);
    height:fn(20rem);
    margin:0 auto;
    line-height:fn(20rem);
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }
  .floor-three>.floor-three-ul>li>p:nth-child(3){
    color:#fa3c94;
    font-size:fn(6rem);
    height:fn(20rem);
    line-height:fn(20rem);
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }
  .floor-three>.floor-three-p{
    color:red;
    text-align: center;
  }
</style>
