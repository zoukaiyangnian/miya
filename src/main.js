// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router/index.js'
import VueResource from 'vue-resource'
Vue.use(VueResource);

//引入样式类文件
import "./assets/css/base.css"
import "./assets/css/bootstrap.css"
import "./assets/css/font-awesome.css"
import "./assets/js/jquery-3.2.1.js"
import "./assets/js/bus.js"
//创建全局组件

import Index from '@/components/index'
Vue.component("index",Index)
import myNav from '@/components/nav'
Vue.component("mynav",myNav)
import NotFound from '@/components/notfound'
Vue.component("notfound",NotFound)
Vue.config.productionTip = false

/* eslint-disable no-new */

new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
