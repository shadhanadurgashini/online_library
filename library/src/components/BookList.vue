<template>
    <div>
      <h2>Book List</h2>
      <ul>
        <li v-for="book in books" :key="book.id">
          <h3>{{ book.title }}</h3>
          <p>{{ book.description }}</p>
          <p>{{ book.genre }}</p>
          <p>{{ book.price }}</p>
          <button @click="borrowBook(book.id)">Borrow</button>
        </li>
      </ul>
      <button @click="loadMore">Load More</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        books: [],
        page: 1,
      };
    },
    created() {
      this.fetchBooks();
    },
    methods: {
      fetchBooks() {
        axios.get('/api/books', { params: { page: this.page } })
          .then(response => {
            this.books = [...this.books, ...response.data.data];
          })
          .catch(error => {
            console.error(error);
          });
      },
      loadMore() {
        this.page++;
        this.fetchBooks();
      },
      borrowBook(bookId) {
        axios.delete(`/api/books/${bookId}`)
          .then(response => {
            this.books = this.books.filter(book => book.id !== bookId);
          })
          .catch(error => {
            console.error(error);
          });
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  