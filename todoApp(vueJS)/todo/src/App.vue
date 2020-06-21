<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<script>
import login from './components/login'
import oldTodo from './components/oldTodo'
import TodoList from './components/TodoList'
export default {
  name: 'App',
  components:{
    login,
    oldTodo,
    TodoList
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
