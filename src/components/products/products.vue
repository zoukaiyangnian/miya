<!--商品分类页面-->
<template>
  <div>
    <SearchHeader @toFatherEvent="accept($event)"></SearchHeader>
    <ProductList v-if="isShowList"></ProductList>
    <Search v-if="!isShowList"></Search>

  </div>
</template>
<script>
 // import myNav from '../nav';
 import Vue from 'vue'
 import Search  from  '@/components/products/search';
 Vue.component("Search",Search)
  import SearchHeader from '@/components/products/headerNav';
 Vue.component("SearchHeader",SearchHeader)
  import ProductList from '@/components/products/productList';
 Vue.component("ProductList",ProductList)
  export default{
   // components:{SearchHeader,Search,ProductList},
    data:function () {
      return{
        isShowList:true
      }
    },
    methods:{
      accept(msg){
        this.isShowList=msg;
      }
    }
  }
</script>

