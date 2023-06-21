<template>
  <div class="container">
    <h1>Online Library</h1>
    <div>
      <input type="text" v-model="searchTerm" placeholder="Search" @input="searchBooks">
      <button @click="searchBooks">Search</button>
    </div>
    <ul>
      <li v-for="book in books" :key="book.id">
        <div>
          <h2>{{ book.title }}</h2>
          <p>{{ book.description }}</p>
          <p>{{ book.genre }}</p>
          <p>{{ book.price }}</p>
        </div>
        <div>
          <button @click="borrowBook(book)">Borrow</button>
          <button @click="returnBook(book)">Return</button>
        </div>
      </li>
    </ul>
    <div>
      <button @click="previousPage" :disabled="currentPage === 1">Previous</button>
      <button @click="nextPage" :disabled="currentPage === lastPage">Next</button>
    </div>
  </div>
</template>

<script> 

import axios from 'axios';

export default {
  data() {
    return {
      books: [],
      searchTerm: '',
      currentPage: 1,
      lastPage: 1,
    };
  },

  mounted() {
    this.fetchBooks();
  },
  methods: {
    fetchBooks() {
      axios.get('/api/books?page=' + this.currentPage)
        .then(response => {
          this.books = response.data.data;
          this.currentPage = response.data.current_page;
          this.lastPage = response.data.last_page;
        })
        .catch(error => {
          console.log(error);
        });
    },
    searchBooks() {
      axios.get('/api/books/search?search=' + this.searchTerm)
        .then(response => {
          this.books = response.data.data;
          this.currentPage = response.data.current_page;
          this.lastPage = response.data.last_page;
        })
        .catch(error => {
          console.log(error);
        });
    },
    borrowBook(book) {
      axios.post('/api/books/' + book.id + '/borrow')
        .then(response => {
          console.log(response.data.message);
          this.fetchBooks();
        })
        .catch(error => {
          console.log(error);
        });
    },
    returnBook(book) {
      axios.post('/api/books/' + book.id + '/return')
        .then(response => {
          console.log(response.data.message);
          this.fetchBooks();
        })
        .catch(error => {
          console.log(error);
        });
    },
    previousPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
        this.fetchBooks();
      }
    },
    nextPage() {
      if (this.currentPage < this.lastPage) {
        this.currentPage++;
        this.fetchBooks();
      }
    },
  },
};
</script>


<style>
.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}
</style>
