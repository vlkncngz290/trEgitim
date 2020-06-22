<template>
  <div>
    <input type="text" placeholder="User Mail" v-model="userMail" />
    <br />
    <input type="text" placeholder="User Password" v-model="userPass" />
    <br />
    <button type="submit" @click="login()">Login</button>
    <br />
  </div>
</template>

<script>
export default {
  name: "login",
  data() {
    return {
      userMail: "",
      userPass: "",
      msg: "Welcome to Your Vue.js App"
    };
  },
  methods: {
    login() {
      axios.get("localhost:8000/sign_in/"+userMail+"/"+userPass).then(response => {
        if (response.data[1].length > 0) {
          localStorage.id = response.data[0];
          localStorage.mail = response.data[1];
          localStorage.firm = response.data[3];
          localStorage.loa = response.data[4];
          this.$emit("authenticated", true);
          this.$router.replace({ name: "TodoList" });
        }
      });
    }

  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
