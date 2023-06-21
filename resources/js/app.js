import Vue from 'vue';
import BookList from './components/BookList.vue';

Vue.component('book-list', BookList);

const app = new Vue({
  el: '#app',
});
