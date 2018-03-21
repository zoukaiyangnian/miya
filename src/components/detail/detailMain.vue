<template>
    <div class="detail_main">
       <img class="banner" :src="require('../../assets/'+Pdata.lg)">
       <div class="detail">
           <div class="miya">{{Pdata.brand}}&nbsp;&nbsp;&nbsp;蜜芽保税仓发货 </div>
           <div class="product_name"> {{Pdata.product_name}}</div>
           <div class="price">￥{{Pdata.price}} <i>￥{{Pdata.price*1.2}}</i><span>包邮</span></div>
           <div class="descInfo"> &nbsp;&nbsp;&nbsp;{{Pdata.disk}}<br> &nbsp;&nbsp;&nbsp;{{Pdata.details}}<br>{{Pdata.title}} </div>
       </div>
       <div class="cost">
           <ul>
             <li><i></i>自营</li>
             <li><i></i>花呗分期</li>
             <li><i></i>进口税</li>
             <li><i></i>假一赔十</li>
           </ul>
       </div>
       <div class="count">
           <b>购买数量&nbsp;:</b>
           <span class="plt" @click="updateCount(1)">-</span><span><i class="number">{{count}}</i></span><span class="prt" @click="updateCount(2)">+</span>
       </div>
    </div>
</template>

<script>
  import bus from '../../assets/js/commonality'
  export default {
      props:['Pdata'],
      data:function () {
        return{
         productData:[],
          Lid:null,
          count:1,
        }
      },
      methods:{
         //增减数量
         updateCount(n){
           if(n==1){
             this.count--
             if(this.count<2)
               this.count=1
           }else if(n==2){
             this.count++
           }
           bus.$emit('sendCount',this.count)
         }
      }
    }
</script>

<style scoped lang="stylus">
  fn(x)
    return x/25
  .detail_main
    width:100%
    margin-bottom:fn(96rem)
    position absolute
    top:fn(44rem)
    img.banner
      width: fn(400rem)
      height:fn(400rem)
    div.detail
      width: 100%
      padding:fn(11rem) fn(11rem)
      background #fff
      border-top:1px solid #f2f2f2
      border-bottom:1px solid #f2f2f2
      div.miya
        line-height: 1;
        color: #2c83f3;
        font-size: .5973rem;
        padding: .5547rem 0 .4267rem 1rem;
      div.product_name
        font-size: .6827rem;
        line-height: 1.4;
        display: box;
        line-clamp: 2;
        box-orient: vertical;
        overflow: hidden;
        font-weight: 400;
        color: #1a1a1a;
      div.price
        color: #fa4b9b;
        font-size: .896rem;
        margin: .32rem 0 0.1rem;
        i
          font-size: .5547rem;
          color: #989898;
          display: inline-block;
          vertical-align: text-bottom;
          margin-right: .2133rem;
          margin-left: .1493rem;
          font-style normal
          text-decoration line-through
        span
          line-height: 1;
          border: .0213rem solid #fa4b9b;
          border-radius: .1067rem;
          color: #fa4b9b;
          font-size: .4267rem;
          padding: .0853rem .1067rem;
          display: inline-block;
          vertical-align: middle;
          margin-left: .3133rem;
          margin-bottom fn(2rem)
      div.descInfo
        color: #999;
        margin-top: .32rem;
        font-size:fn(13rem)
    div.cost
      padding fn(15rem);
      height fn(50rem)
      border-bottom: .0213rem solid #f2f2f2;
      position: relative;
      background: #fff;
      font-size: .5547rem;
      li
          float left
          margin-right: 0.6rem;
          font-size: .512rem;
          i
            display:inline-block
            width:fn(6rem)
            height fn(6rem)
            border-radius 50%
            background #fa4b9b
            margin-right: 0.1rem;
    div.count
      width: 100%
      height:fn(50rem)
      background:#fff
      padding:fn(10rem) fn(20rem)
      font-size:fn(15rem)
      b
         font-weight normal
         margin-right fn(15rem)
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
      span.plt
        border-radius fn(8rem) 0 0 fn(8rem)
      span.prt
        border-radius 0 fn(8rem) fn(8rem) 0
</style>
