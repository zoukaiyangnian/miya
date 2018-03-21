<template>
  <div class="shopping-cart">
      <div class="SCHeader">
        <i></i>蜜芽自营</div>
      <div class="SCMain">
        <ul class="cart_list">
          <li v-for="(tmp,index) in shopList">
            <i :class="{check:true,checked:tmp.checked}" @click="CheckedEvent(index)"></i>
            <span class="sm-pic">
              <img :src="require('../../assets/'+tmp.lg)" @click="jumpToDetail(tmp.lid)">
            </span>
            <div class="commodity">
              <p class="carttitle">
                <b>{{tmp.product_name}}</b>
                <span>￥{{tmp.price}}</span>
              </p>
              <div class="commodity_count">
                 <span @click="countEvent(1,index)">-</span><span><i class="number">{{tmp.count}}</i></span><span @click="countEvent(2,index)">+</span>
              </div>
            </div>
          </li>
        </ul>
        <div class="cart-remover">
           <b class="first_dustbin"></b>
           <span @click="deleteChecked()">删除选择商品</span>
           <b class="second_dustbin"></b>
           <span @click="clearCart()">清空购物车</span>
        </div>
      </div>
      <div class="SCFooter">
         <div class="cost-lf">
             <div class="all-checked">
               <div class="AC-first" @click="AllCheckedEvent()">
                 <i :class="{allChecked:isAllChecked}"></i>
                 <span>全选</span>
               </div>
               <div class="AC-second">
                  <p>
                    <span>总计:</span>
                    <b>￥{{cost}}</b>
                  </p>
                  <span>不含运费和进口税</span>
               </div>
             </div>
         </div>
         <div :class="{cost_rt:true,costing:isAccounts}">
            <span>结算</span>
            <a>({{sum}})</a>
         </div>
      </div>
      <div class="choseDelete"  id="showWarning">
        <p>请选择要删除的商品</p>
      </div>
  </div>
</template>
<script>
  import {setCookie,getCookie,delCookie} from '../../util/util';
  export default{
    mounted:function(){
      this.getCartData()
    },
    data:function(){
      return {
          isAllChecked:false,          //全选参数
          isAccounts:false,           //结算参数
          cost:0,                     //总额
          sum:0,                     //商品个数
          shopList:[],               //购物车商品详情
      }
    },
    methods:{
      //商品单选函数
      CheckedEvent(index){
          if(!this.shopList[index].checked){
            this.shopList[index].checked=true;
          }else{
            this.shopList[index].checked=false;
        }
        for(var i=0,sum=0,len=this.shopList.length;i<len;i++){
          if(this.shopList[i].checked){
              sum++;
              if(sum==len)
                this.isAllChecked=true;
              else
                this.isAllChecked=false;
          }
        }
        this.totalPrices();
        this.products();
        this.costColor();
        this.saveToCookie();
      },
      //商品全选函数
      AllCheckedEvent() {
        if(this.isAllChecked){
          this.isAllChecked=false
          for(var i=0,len=this.shopList.length;i<len;i++){
            this.shopList[i].checked=false;
          }
        }else{
          this.isAllChecked=true
          for(var i=0,len=this.shopList.length;i<len;i++){
            this.shopList[i].checked=true;
          }
        }
        this.totalPrices();
        this.products();
        this.costColor();
        this.saveToCookie();
    },
      //商品数量增减
      countEvent(code,index){
        var n=this.shopList[index].count;
          if(code==1){
            n--;
            if(n<=1){n=1}
          }else if(code==2){n++;}
          this.shopList[index].count=n;
          this.totalPrices();
          this.products();
          this.saveToCookie();
      },
      //商品选中计算价格
      totalPrices(){
        var cost=0;
        for(var i=0,len=this.shopList.length;i<len;i++){
          if(this.shopList[i].checked) {
            cost += this.shopList[i].count * this.shopList[i].price;
          }
        }
        this.cost=cost;
      },
      //商品选中计算商品数量
      products(){
        var num=0;
        for(var i=0,len=this.shopList.length;i<len;i++){
          if(this.shopList[i].checked) {
            num += this.shopList[i].count
          }
        }
        this.sum=num;
      },
      //删除选中的商品
      deleteChecked(){
        var div1=document.getElementById('showWarning')
        var arr=[];
        for(var i=0,m=0,len2=this.shopList.length;i<len2;i++){
          if(!this.shopList[i].checked) {
            arr.push(this.shopList[i])
            m++;
          }
        }
        if(m==len2){
          div1.style.left=120+'px'
          setTimeout(()=>{
            div1.style.left=-180+'px'
          },800)
        }
        this.shopList=arr;
        this.isAllChecked=false;
        this.costColor();
        this.totalPrices();
        this.products();
        this.saveToCookie();
        if(this.shopList.length==0){
          this.$emit('sendToCart',true);
          delCookie("cartList");
        }


      },
      //清空购物车
      clearCart(){
        this.shopList=[];
        this.costColor();
        this.totalPrices();
        this.products();
        if(this.shopList.length==0){
          this.$emit('sendToCart',true);
        }
        delCookie("cartList");
      },
      //修改结算背景颜色
      costColor(){
        var a=0;
        var len=this.shopList.length
        if(len>0){
          for (var i = 0; i < len; i++) {
            if (this.shopList[i].checked) {
              a++;
            }
            if (a != 0) {
              this.isAccounts = true;
            } else {
              this.isAccounts = false;
            }
          }
        }else{
            this.isAllChecked=false,
            this.isAccounts=false,
            this.cost=0,
            this.sum=0
        }
      },
      //购物车数据存储到cookie
       saveToCookie(){
        var str=JSON.stringify(this.shopList);
        setCookie("cartList",str,7)
      },
      //进入购物车页面加载数据
      getCartData() {
        var list = getCookie("cartList");
        if (list != null) {
          this.shopList = JSON.parse(list);
          var len = this.shopList.length;
          for (var i = 0, a = 0, b = 0; i < len; i++) {
            if (this.shopList[i].checked) {
              this.cost += this.shopList[i].count * this.shopList[i].price
              this.sum += this.shopList[i].count;
              a++;
              b++;
            }
          }
          if (a == len) {
            this.isAllChecked = true
          }
          else {
            this.isAllChecked = false
          }
          if (b > 0) this.isAccounts = true
        }
      },
      //跳转到详情页
      jumpToDetail(lid){
        this.$router.push('/myDetail/'+lid)
      }
    }

  }
</script>
<style scoped lang="stylus">
    fn(x)
      return x/25
    .shopping-cart
       width:100%
       position:absolute
       top:fn(44rem)
       .SCHeader
         padding:fn(10rem) 0 fn(10rem) fn(50rem);
         font-size:fn(20rem);
         color: #333;
         background:#fff;
         border-bottom 0.5px solid #e2e2e2
         position:relative
         i
           position absolute
           top:fn(12rem)
           left:fn(17rem)
           display:inline-block
           width:fn(25rem)
           height:fn(25rem)
           background url('../../assets/img/logo/logo.png') no-repeat
           background-size fn(25rem) fn(25rem)
       .SCMain
          width:100%
          ul.cart_list
            padding-bottom fn(20rem)
            background #fff
            margin-bottom:fn(65rem)
            li
               position:relative
               padding:fn(10rem)
               height:fn(90rem)
               border-bottom 0.5px dotted #e2e2e2
               i.check
                 display inline-block
                 width:fn(20rem)
                 height fn(20rem)
                 border:1px solid  #e2e2e2
                 border-radius 50%
               i.checked
                   background:url('../../assets/img/logo/checked.jpg')no-repeat fn(-20rem) fn(-11rem)
               .sm-pic
                    display:inline-block
                    margin-left:fn(10rem)
                    img
                      width:fn(62.5rem)
                      height:fn(62.5rem)
               .commodity
                  margin-left fn(6rem)
                  display:inline-block
                  width fn(269rem)
                  height:fn(70rem)
                  p.carttitle
                    position: relative;
                    width:100%;
                    text-overflow: ellipsis;
                    overflow: hidden;
                    font-size:fn(12.5rem)
                    color:#333
                    b
                      display inline-block
                      font-weight normal
                      width:fn(200rem);
                      overflow: hidden;
                      white-space:nowrap;
                      text-overflow:ellipsis;
                      font-size:fn(25*0.45rem);
                    span
                      margin-right:fn(12.5rem);
                      font-family: "Helvetica Neue",Helvetica,STHeiTi,Arial,sans-serif;
                      color:#f34fa1;
                      font-size fn(12rem)
                  .commodity_count
                      margin 0
                      width:fn(112rem)
                      span
                        display:inline-block
                        width:fn(33rem)
                        height:fn(29rem)
                        line-height fn(29rem)
                        font-size fn(20rem)
                        text-align center;
                        border:1px solid #dddddd
                        position:relative
                        i.number
                          font-style:normal
                          font-size fn(15rem)
          div.cart-remover
             width:100%
             text-align:center
             font-size fn(13rem)
             padding:fn(14rem) 0
             margin-bottom fn(200rem)
             background #fff
             position:relative
             vertical-align middle
             b.first_dustbin,b.second_dustbin
               display:inline-block
               width fn(20rem)
               height fn(20rem)
               position:absolute
               top:fn(13rem)
               left:fn(80rem)
               background:url('../../assets/img/logo/sx_b7.jpg') no-repeat;
               background-size:fn(20rem) fn(20rem)
             b.second_dustbin
               left:fn(205rem)
             span
                 margin:fn(20rem)
                 color: #f34fa1;
                 opacity .9

       .SCFooter
          position fixed
          bottom fn(44rem)
          width:100%
          background: #fff;
          z-index: 400;
          height: fn(62.5rem);
          font-size fn(15rem)
          color: #8a8a8a;
          border-top 1px solid #f2f2f2
          z-index 5
          .cost-lf
             width fn(300rem);
             height: fn(62.5rem);
             display inline-block
             .all-checked
                .AC-first
                   width:fn(75rem);
                   height fn(62.5rem)
                   line-height fn(62.5rem)
                   display:inline-block
                   position:relative
                   padding-right:fn(5rem)
                   text-align:right
                   float:left
                   i
                     position:absolute
                     top:fn(20rem)
                     left:fn(15rem)
                     display inline-block
                     width:fn(20rem)
                     height fn(20rem)
                     border:1px solid  #e2e2e2
                     border-radius 50%
                   i.allChecked
                      background:url('../../assets/img/logo/checked.jpg')no-repeat fn(-20rem) fn(-11rem)
                .AC-second
                  display inline-block
                  width fn(225rem)
                  height:fn(62.5rem)
                  text-align:right
                  padding fn(9rem) fn(10rem) fn(9rem) 0
                  p
                    text-align right
                    height:fn(26rem)
                    span
                      font-size fn(15rem)
                      color:#000000
                    b
                       font-weight normal
                       color #f34fa1
                       font-size fn(14rem)

                  span
                     font-size fn(12rem)

          .cost_rt
             position: absolute
             top:0
             right 0
             display inline-block
             width fn(95rem)
             height: fn(62.5rem);
             padding:fn(20rem) 0
             text-align:center
             background: #858585;
             span,a
               color #ffffff
               text-decoration none
          .costing
            background:#fa4b9b;
       .choseDelete
          border-radius:fn(8rem)
          top:28%;
          left:-100%;
          position:fixed;
          padding:fn(10rem) fn(15rem)
          width:fn(150rem);
          height: fn(70rem);
          background:rgba(49,49,49,.8)
          opacity .8
          font-size:fn(12rem)
          color:#fa4b9b;
          text-align: center;
          z-index: 10000;
          transform all 3s linear;
          p
            font-size fn(16rem)
</style>
