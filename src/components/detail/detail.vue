<template>
    <div>
      <DetailHeader></DetailHeader>
      <DetailMain :Pdata="productData"></DetailMain>
      <DetailFooter :Pdata="productData"></DetailFooter>
    </div>
</template>
<script>
  import Vue from 'vue'
  import DetailHeader from '@/components/detail/detailHearder';
  Vue.component("DetailHeader",DetailHeader)
  import DetailMain from '@/components/detail/detailMain';
  Vue.component("DetailMain",DetailMain)
  import DetailFooter from  '@/components/detail/detailFooter';
  Vue.component("DetailFooter",DetailFooter)
    export default {
   // components:{DetailHeader,DetailMain,DetailFooter},
    mounted:function () {
      this.Lid=this.$route.params.lid;
      this.loadDetailData()
    },
    data:function () {
      return{
        productData:[]
      }
    },
    methods:{
      loadDetailData(){
        this.$http.get('http://127.0.0.1/miya/my/src/assets/data/product/getProductDetail.php?lid='+this.Lid)
          .then((result=>{
            this.productData=result.data
          }))
      },
    }
    }
</script>

<style >

</style>
