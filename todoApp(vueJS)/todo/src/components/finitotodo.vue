<template>
  <div>
    <table>
      <tr>
        <th>ID</th>
        <th>CREATOR MAIL</th>
        <th>TITLE</th>
        <th>CONTENT</th>
        <th>DEADLINE</th>
        <th>DELETE</th>
        <th>DONE</th>
      </tr>
      <tr v-for="(todo, index) in todos" :key="todo.id" class="todo-item">
        <td>{{todo.id}}</td>
        <td>{{todo.creator_mail}}</td>
        <td>{{todo.title}}</td>
        <td>{{todo.content}}</td>
        <td>{{todo.deadline}}</td>
        <td class="remove-item" @click="removeTodo()">&times;</td>
        <td class="done-item" @click="doneTodo()">&times;</td>
        <td class="pick-item" @click="pickTodo()">&times;</td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  name: "finitotodo",
  data() {
    return {
      msg: "Welcome to Your Vue.js App"
    };
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
