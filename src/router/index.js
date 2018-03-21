import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/index'
import myNav from '@/components/nav'
import myHomePage from '@/components/index/homepage'
import myLogin from '@/components/core/login'
import myCore from '@/components/core/core'
import myRegiste from '@/components/core/registe'
import Cart from '@/components/cart/cart'
import Products from '@/components/products/products'
import Detail from '@/components/detail/detail';
import NotFound from '@/components/notfound'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/', component: Index,children:[
        {path:"/",component:myHomePage},
        {path:"/myHomePage",component:myHomePage},
        {path:"/myLogin",component:myLogin},
        {path:"/myCore",component:myCore},
        {path:"/myRegiste",component:myRegiste},
        {path:"/myCart",component:Cart},
        {path:"/myDetail/:lid",component:Detail},
        {path:"/myProducts",component:Products}
      ]
    },
    {
      path: '/index', component: Index,children:[
        {path:"/",component:myHomePage},
        {path:"/myHomePage",component:myHomePage},
        {path:"/myLogin",component:myLogin},
        {path:"/myCore",component:myCore},
        {path:"/myRegiste",component:myRegiste},
        {path:"/myCart",component:Cart},
        {path:"/myDetail/:lid",component:Detail},
        {path:"/myProducts",component:Products}
      ]
    },
    {
      path:"/nav",component:myNav
    },
    {
      path:"*",component:NotFound
    }
  ]
})
