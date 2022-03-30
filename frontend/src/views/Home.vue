<template>

  <div>
    <Nav />
    <h1>Your Library books </h1>

    <UserBookList v-if="!showBook()" />
    <UserSingleBook v-if="showBook()" />

  </div>

</template>

<script setup>
// @ is an alias to /src
import Nav from "@/components/Nav.vue";
import UserBookList from "@/components/userBook/UserBookList";
import UserSingleBook from "@/components/userBook/UserSingleBook";

import { useStore } from "vuex";

const store = useStore();

const showBook = () => {
  return store.getters["userBooks/getShowBook"];
};
</script>
