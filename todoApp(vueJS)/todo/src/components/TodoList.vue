<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <input type="text" class="todo-input" placeholder="Assigned To" v-model="assigneTo" />
        <br />
        <input type="text" class="todo-input" placeholder="Title" v-model="title" />
        <br />
        <input type="text" rows="6" class="todo-input" placeholder="Content" v-model="content" />
        <br />
        <input type="text" rows="6" class="todo-input" placeholder="Deadline" v-model="deadline" />
        <br />
        <button type="submit" @click="addTodo()">Save</button>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <button type="submit" @click="getAll()">Get All ToDo's</button>
        <button type="submit" @click="goOld()">View Finised ToDo's</button>
        <table>
          <tr>
            <th>ID</th>
            <th>CREATOR MAIL</th>
            <th>TITLE</th>
            <th>CONTENT</th>
            <th>DEADLINE</th>
            <th>DONE</th>
          </tr>
          <tr v-for="(todo, index) in todos" :key="todo.id" class="todo-item">
            <td>{{todo.id}}</td>
            <td>{{todo.creator_mail}}</td>
            <td>{{todo.title}}</td>
            <td>{{todo.content}}</td>
            <td>{{todo.deadline}}</td>
            <td class="done-item" @click="doneTodo()">&times;</td>
          </tr>
        </table>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TodoList",
  data() {
    return {
      newTodo: "",
      creator_mail: "mailFromDB",
      assigneTo: "",
      pickedassigneTo: "",
      title: "",
      pickedtitle: "",
      content: "",
      pickedcontent: "",
      deadline: "",
      pickeddeadline: "",
      idForTodo: 3,
      todos: [],
      msg: "Welcome to Your Vue.js App"
    };
  },
  methods: {
    addTodo() {
      if (this.assigneTo.trim().length == 0) {
        return;
      }
      axios
        .get(
          "localhost:8000/newtodo/" +
            localStorage.mail +
            "/" +
            this.assigneTo +
            "/" +
            this.title +
            "/" +
            this.content +
            "/" +
            this.deadline
        )
        .then(response => {
          this.todos.push({
            id: this.id,
            creator_mail: localStorage.mail,
            title: this.title,
            content: this.content,
            deadline: this.deadline
          });
          this.newTodo = "";
          this.deadline = "";
          this.title = "";
          this.content = "";
          this.assigneTo = "";
          this.idForTodo++;
        });
    },
    doneTodo(index) {
      Pickid = this.todos[index].id;
      axios.get("localhost:8000/donetodo/" + Pickid).then(response => {
        this.todos.splice(index, 1);
      });
    },
    getAll() {
      axios
        .get("localhost:8000/list_all_todo/" + localStorage.mail)
        .then(response => {
          if (response.data[1].length > 0) {
            this.todos = response;
          }
        });
    },
    goOld() {
      this.$emit("authenticated", true);
      this.$router.replace({ name: "oldTodo" });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style >
table,
th,
td {
  border: 1px solid black;
  margin-left: 3px;
  margin-right: 3px;
  margin-top: 3px;
  margin-bottom: 3px;
  padding-left: 3px;
  padding-right: 3px;
  padding-top: 3px;
  padding-bottom: 3px;
}

.remove-item {
  cursor: pointer;
  color: blue;
}
.remove-item:hover {
  color: pink;
}

@import "~bootstrap/dist/css/bootstrap.css";
</style>
