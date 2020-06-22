<template>
  <div>
    <button type="submit" @click="getAll()">Get All Unfinised ToDo's</button>
    <button type="submit" @click="goTodo()">View Unfinised ToDo's</button>
    <table>
      <tr>
        <th>ID</th>
        <th>CREATOR MAIL</th>
        <th>TITLE</th>
        <th>CONTENT</th>
        <th>DEADLINE</th>
        <th>UNDONE</th>
      </tr>
      <tr v-for="(todo, index) in todos" :key="todo.id" class="todo-item">
        <td>{{todo.id}}</td>
        <td>{{todo.creator_mail}}</td>
        <td>{{todo.title}}</td>
        <td>{{todo.content}}</td>
        <td>{{todo.deadline}}</td>
        <td class="done-item" @click="undoneTodo()">&times;</td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  name: "oldTodo",
  data() {
    return {
      todos: [],
      msg: "Welcome to Your Vue.js App"
    };
  },
  methods: {
    getAll() {
      axios
        .get("localhost:8000/list_all_undonetodo/" + localStorage.mail)
        .then(response => {
          if (response.data[1].length > 0) {
            this.todos = response;
          }
        });
    },
    goTodo() {
      this.$emit("authenticated", true);
      this.$router.replace({ name: "TodoList" });
    },
    undoneToDo(index){
      PickId=this.todos[index].id
        axios
        .get("localhost:8000/undonetodo/" + PickId)
        .then(response => {
          this.todos.splice(index, 1);
        });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
