<!--搜索组件-->
<template>
  <div class="search-main">
    <div class="search-result"  v-show="isShowSearch">
      <ul>
        <li v-for="tem in SearchList" @click="jumpToDetail(tem)">
          <b>{{tem.product_name}}</b>
        </li>
      </ul>
    </div>
    <div class="search-histroy"  v-show="!isShowSearch">
        <div class="hot-search">
           <i class="hot"></i>
           <h3>热门搜索</h3>
           <ul v-if="HotList">
             <li v-for="tem in HotList" @click="jumpToDetail2(tem)">
               <a class="hot">{{tem.name}}</a>
             </li>
           </ul>
        </div>
        <div class="recently-search">
          <i class="recently"></i>
          <h3>最近搜索</h3>
          <ul v-if="historyList">
            <li v-for="tem in historyList" @click="jumpToDetail2(tem)">
              <a>{{tem.name}}</a>
            </li>
          </ul>
        </div>
        <div class="clear-result" @click="clearHistory()">
           <i></i>清除搜索历史
        </div>
    </div>
  </div>
</template>
<script>
  import {delCookie,setCookiePlus,getCookie} from "../../util/util";
  import bus from '../../assets/js/commonality'
  export default{
     mounted:function (){
       this.lood();
       this.getHistory()
    },
     data:function () {
       return {
         HotList:[],
         SearchList:[],
         historyList: [],
         hiddenResult:'hiddenResult',
         showResult:'showResult',
         isNow:false,
         isShowSearch:false
       }
     },
     methods:{
       //显示搜索记录
       getHistory(){
         var lists=JSON.parse(getCookie('histroyList'))
           if (lists != null) {
             for(var d of lists) {
               if (d.count >= 10){this.HotList.push(d)}
                 this.historyList.push(d)
             }
         }
        },
       //清除历史记录
       clearHistory:function () {
          delCookie('histroyList');
          this.HotList=[];
          this.historyList=[];
        },
       //接受并加载搜索数据
       lood:function(){
         var that=this
         bus.$on("toSearchEvent",function (msg) {
           that.isShowSearch=msg.RC;
           if(msg.RC)
             that. SearchList=msg.result.data.data
         })
       },
       //跳转详情页
       jumpToDetail(tem){
         var a={
           lid:tem.lid,
           name:tem.product_name,
           count:1
         };
         setCookiePlus("histroyList",a,3);
         this.$router.push("/myDetail/"+tem.lid)
       },
       //跳转详情页2
       jumpToDetail2(tem){
         this.$router.push("/myDetail/"+tem.lid)
       }
     }
  }
</script>
<style scoped lang="stylus">
   fn(x)
     return x/25
   .search-main
     width:100%;
     margin-bottom:fn(200rem)
     position:absolute;
     top:fn(46rem);
     .search-result
       width:100%;
       padding:fn(12.5rem) fn(12.5rem) 0 fn(12.5rem);
       background:#fff;
       ul
         li
           color: #666;
           font-size:fn(17rem);
           background: url(../../assets/img/logo/icon_search.png) no-repeat left center;
           padding-top: fn(18.75rem);
           padding-bottom: fn(18.75rem);
           padding-left: fn(42rem);
           border-bottom:1px solid #f2f2f2;
           background-size:9%;
           b
             color:#000000;
             font-weight:normal;
             text-overflow: ellipsis;
             overflow: hidden;
     .search-histroy
        padding-bottom:fn(12.5rem);
        width:100%;
        background: #fff;
        .hot-search,.recently-search
          padding:fn(13rem) fn(18rem)
          border-top: 1px solid #ddd;
          position:relative;
          h3
            color: #999;
            font-size:fn(16rem);
            height:fn(24rem);
            padding-left: fn(22.5rem);
            margin-bottom:fn(16.5rem);
            font-weight:400;
          i
             position:absolute;
             top:fn(14rem);
             display:inline-block;
             width:fn(20rem);
             height:fn(20rem);
             background:url("../../assets/img/logo/sx_b5.jpg") no-repeat;
             background-size:fn(18rem) fn(18rem);
          .recently
            background:url("../../assets/img/logo/sx_b6.jpg") no-repeat;
            background-size:fn(18rem) fn(18rem);
          ul
            li
               font-size:fn(15rem);
               color:#424242;
               max-width fn(100rem);
               overflow: hidden;
               white-space: nowrap;
               text-overflow: ellipsis;
               margin-bottom:fn(12.5rem);
               display: inline-block;
               border:1px solid #dad7d7;
               border-radius:fn(12.5rem);
               margin-left:fn(12.5rem);
               padding:fn(5rem) fn(12.5rem);
               a
                color:#337ab7;
               .hot
                 color:#FF69B4
        .clear-result
          color: #8594a6;
          font-size: .65rem;
          margin:0 auto;
          padding-left: .95rem;
          width:5rem;
          position:relative
          i
            position:absolute;
            top:fn(2rem);
            left:fn(-2rem);
            display:inline-block;
            width:fn(26rem)
            height:fn(26rem)
            background:url("../../assets/img/logo/sx_b7.jpg") no-repeat;
            background-size:fn(26rem) fn(20rem);


     .showResult
       display:block;
     .hiddenResult
       display:none;
</style>
