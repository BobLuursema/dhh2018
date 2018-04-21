import Vue from 'vue'
import Router from 'vue-router'
import umchomepage from '@/components/umc-homepage'
import umcform from '@/components/umc-form'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'umc-homepage',
      component: umchomepage
    },
    {
      path: '/aanmelden',
      name: 'umc-form',
      component: umcform
    }
  ]
})
