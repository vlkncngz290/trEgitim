import Vue from 'vue'
import Router from 'vue-router'
import login from '@/components/login'
import TodoList from '@/components/TodoList'
import oldTodo from '@/components/oldTodo'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'login',
      component: login
    },
    {
      path: '/TodoList',
      name: 'TodoList',
      component: TodoList
    },
    {
      path: '/oldTodo',
      name: 'oldTodo',
      component: oldTodo
    }
  ]
})
