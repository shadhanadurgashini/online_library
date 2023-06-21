<!-- login.vue -->
<template>
    <div>
      <h2>Login</h2>
      <form @submit="login">
        <label for="email">Email:</label>
        <input type="email" v-model="email" required>
        <label for="password">Password:</label>
        <input type="password" v-model="password" required>
        <button type="submit">Login</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: '',
        password: '',
      };
    },
    methods: {
      login(event) {
        event.preventDefault();
        // Call the login API endpoint using axios or any other HTTP client library
        // Send the email and password data to the backend for authentication
        // Handle the login response from the backend
      },
    },
  };
  </script>
  