<!--商品主体-->
<template>
  <div class="products">
    <div class="product-lt">
      <ul id="pHight">
        <li v-for="(tem,index) in Plist"
            :class="{current:index==nowList}"
            @touchstart="changeList(index)"
        >{{tem}}</li>
      </ul>
    </div>
    <div class="product-rt">
      <div id="banner">
         <div class="banner">
             <img src="../../assets/img/logo/product_banner.jpg" >
         </div>
         <h3 class="1ist">
           <b v-for="(tem,index) in checkList"
              :class="{checked:index==nowChecked}"
              @click="hanleChecked(index)"
           >{{tem}}</b>
           <i  v-if="nowChecked==2" :class="{up:isShow,down:!isShow}"></i>
         </h3>
      </div>
      <div class="list" id="prLists">
         <a v-for="(p,index) in products">
           <div @click="jumpToDetail(p.lid)">
             <div class="product-sm">
               <img :src="require('../../assets/'+p.lg)">
             </div>
             <p class="product-name">
               {{p.product_name}}
             </p>
             <div class="product-price">
               <span class="price_icon">￥</span>
               <span class="price">{{p.price}}</span>
             </div>
           </div>
           <img src="../../assets/img/logo/shopping_cart.png" @click="addCart(p.lid)" class="carticon">
         </a>
       </div>
    </div>
    <div class="addcart" v-show="isShowCart">
      <i></i>
      <p class="">已加入购物车</p>
    </div>
    <div class="addLoading" v-show="isLoading">
      <i></i>
      <p class="">loading</p>
    </div>
  </div>
</template>
<script>
  import {setCookie,getCookie} from '../../util/util';
  import bus from '../../assets/js/commonality';
  export default {
    mounted: function () {
      this.accommodateHieght();
      this.argus = 'pname=' + this.pname;
      this.loadData();
    },
    data: function () {
      return {
        Plist: [
          '爱他美',
          "美素佳儿",
          '喜宝HiPP',
          'Hero Baby',
          "偌优能",
          '贝因美',
          '美赞臣',
          "惠氏",
          'Cow&Gate',
          'A2'
        ],
        nowList: 0,
        nowChecked: 0,
        isShowCart:false,
        isLoading:false,
        isShow: "",
        checkList: ['全部', '销量', '价格', '特价'],
        pname: '德国爱他美 Aptamil',
        argus: null,
        products: []
      }
    },
    methods: {
      //切换商品品牌
      changeList: function (index,) {
        this.nowList = index;
      },
      //切换商品类型
      hanleChecked: function (index) {
        this.nowChecked = index;
        this.argus = "pname=" + this.pname + '&check=' + index;
        if (index == 2) {
          if (!this.isShow) {
            this.isShow = true;
            this.argus = "pname=" + this.pname + '&check=' + 4;
          } else {
            this.isShow = false;
            this.argus = "pname=" + this.pname + '&check=' + 2;
          }
        }
        this.loadData();
      },
      //发送http请求数据
      loadData: function () {
        this.$http
          .get('http://127.0.0.1/miya/my/src/assets/data/product/getproducts.php?' + this.argus)
          .then((result) => {
            this.products = result.data.data;
          })
      },
      //页面滚动条适应不同屏幕的高度
      accommodateHieght() {
        var H = document.documentElement.clientHeight;
        var W = document.documentElement.clientWidth;
        var PHeight = document.getElementById('pHight');
        var LHeight = document.getElementById('prLists');
        var headerH = document.getElementsByClassName('searchHead')[0].offsetHeight;
        var bannerH = document.getElementById('banner').offsetHeight;
        var footerH = document.getElementById('footerNav').offsetHeight;
        PHeight.style.height = (H - headerH - footerH-10) + 'px';
        if (bannerH < 100 && W < 640 || bannerH < 200 && W >= 640) {
          LHeight.style.height = (H - headerH - footerH - bannerH / 0.3851) + 'px';
        } else {
          LHeight.style.height = (H - headerH - footerH - bannerH - H / 40 ) + 'px';
        }
      },
      //添加购物车
      addCart(id){
        this.isLoading=true;
        setTimeout( ()=> {
          this.isLoading=false
          this.isShowCart=true;
          setTimeout(()=>{
            this.isShowCart=false
          },800)
        },500);
        for (var n = 0, len1 = this.products.length; n < len1; n++) {
          if (this.products[n].lid == id) {
            var a = {
              lid: id,
              product_name: this.products[n].product_name,
              count: 1,
              lg: this.products[n].lg,
              price: this.products[n].price,
              checked: false
            }
          }
        }
        var list = JSON.parse(getCookie('cartList'));
        var c = 0;
        if (list == null) {
          list = [];
          list.push(a)
        } else {
          for (var b of list) {
            if (b.lid == a.lid) {
              b.count += a.count;
              c = 1;
            }
          }
          if (c == 0) list.push(a)
        }
        setCookie("cartList", JSON.stringify(list), 7)
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
  .products
    width:100%;
    position:fixed;
    top:fn(46rem);
    left:0;
    .product-lt
      display:inline-block;
      width:fn(100rem);
      background:#f6f6f6;
      overflow:hidden;
      ul
        width:fn(120rem);
        overflow:scroll;
        li
          height:fn(55rem);
          font-size:fn(15rem);
          line-height:fn(55rem);
          text-align: center;
          color:#333;
        .current
          background-color: #fff;
          color: #ff4d8e;
          border-left:fn(3rem) solid #ff4d8e;
    .product-rt
       display:inline-block;
       width:fn(300rem);
       position:absolute;
       left:fn(100rem);
       overflow hidden;
       background #ffffff
       div#banner
         margin-top:fn(12.5rem);
         .banner
             margin:0 fn(2rem) fn(2rem) fn(12.5rem);
             img
               width:100%;
         h3
           height:fn(1.2*25rem);
           font-size: .55rem;
           color: #333;
           line-height:fn(1.2*25rem);
           border-bottom:2px solid  #f2f2f2;
           position:relative;
           margin: 0
           padding: 0
           b
             display:inline-block;
             width:22%;
             color:#666;
             text-align:right;
             font-size:fn(13rem);
             font-weight normal
           .checked
             color: #ff4d8e;
           i
             position:absolute;
             left:fn(200rem);
             display: inline-block;
             vertical-align: middle;
             width: 0;
             height: 0;
             border-width: .175rem .125rem;
           .down
              top:fn(8rem)
              border-style: solid;
              border-color: #ff4e88 transparent transparent transparent;
              margin: .2rem 0 0 .2rem;
           .up
             top:fn(13rem)
             border-style: solid
             border-color: transparent transparent #ff4e88 transparent
             margin: -.2rem 0 0 .2rem
       .list
         width:fn(320rem);
         margin-left:fn(2rem);
         background: #f2f2f2;
         overflow :scroll;
         a
            display:inline-block;
            text-decoration none
            position:relative;
            vertical-align:top;
            height:fn(260rem);
            width:fn(140rem);
            margin:fn(4rem) fn(10rem) fn(4rem) 0;
            text-align: center;
            background:#fff;
            div.product-sm
              display: flex;
              align-items: center;
              width:100%;
              justify-content: center;
              img
                width: 100%;
                heigth:100%;
            p.product-name
              overflow: hidden;
              padding: 3px 10px 0;
              line-height: 1.4;
              font-size:fn(12rem);
              height:fn(55rem);
              text-overflow:ellipsis;
              font-family: "Helvetica Neue",Helvetica,STHeiTi,Arial,sans-serif;
              color:#333;
            div.product-price
              position: absolute;
              left:fn(12rem);
              bottom:fn(6rem);
              padding:0 fn(10rem);
              color: #fa4b9b;
              .price_icon
                 font-size:fn(14rem);
                 position:absolute;
                 left:fn(-4rem);
                 top:fn(6rem)
              .price
                 font-size:fn(18rem);
         img.carticon
            position: absolute;
            right:fn(10rem);
            bottom: fn(10rem);
            width:fn(35rem)
            height:fn(35rem)
            border-radius:50%;
            border:1px solid #ffd9d9;
            transform all 0.2 ease-in-out


    .addcart
      border-radius:fn(8rem)
      top:48%;
      left:45%;
      position:fixed;
      padding:0 fn(15rem)
      width:fn(120rem);
      height: fn(94rem);
      background:rgba(49,49,49,.8);
      font-size:fn(12rem)
      color: #fff;
      text-align: center;
      z-index: 10000;
      p
        font-size:fn(14rem);
    .addcart:before
          background: url(../../assets/img/logo/tip_app.png) no-repeat fn(-32rem);
          background-size:2.5rem;
          content: '';
          display: block;
          margin: .75rem auto .4rem auto;
          width:1.25rem;
          height: 1.25rem;
    .addLoading
      border-radius:fn(8rem)
      top:48%;
      left:45%;
      position:fixed;
      padding:0 fn(15rem)
      width:fn(120rem);
      height: fn(94rem);
      background:rgba(49,49,49,.8);
      font-size:fn(12rem)
      color: #fff;
      text-align: center;
      z-index: 10000;
      p
        font-size:fn(14rem);
    .addLoading:before
        background: url(../../assets/img/logo/ajax-loader.gif) no-repeat
        background-size:cover;
        content: '';
        display: block;
        margin: 1rem auto .4rem auto;
        width:1rem;
        height: 1rem;
</style>
