<!-- welcome.vue -->
<template>
    <div>
      <h2>Welcome, {{ username }}</h2>
      <!-- Add your content here -->
    </div>
  </template>
  
  <script>
  export default {
    computed: {
      username() {
        // Retrieve the logged-in user's username from the backend (e.g., via Vuex state)
        // Return the username
      },
    },
  };
  </script>
  