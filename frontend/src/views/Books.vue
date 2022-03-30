<template>
  <div>
    <Nav />

    <form class="mt-8 space-y-6" @submit.prevent="handleSubmit">
      <input type="hidden" name="remember" value="true">

      <select v-model="selected">
        <option v-for="book in books.data" :key="book.id" v-bind:value="book">
          {{ book.title }}
        </option>
      </select>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input v-model="completed_readings" required type="number" id="completed_readings" name="completed_readings" placeholder="Completed reading pages" />
        </div>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Add book
        </button>
      </div>
    </form>
  </div>

</template>

<script setup>
import Nav from "@/components/Nav.vue";
import { useStore } from "vuex";
import { computed, ref } from "@vue/reactivity";
import { useRouter } from "vue-router";

const store = useStore();
const router = useRouter();
const books = computed(() => store.getters["books/getBooks"]);

const selected = ref(books.value.data[0]);
const completed_readings = ref(0);

store.dispatch("books/fetchBooks");

const handleSubmit = () => {
  store
    .dispatch("userBooks/addBook", {
      book_id: selected.value.id,
      completed_readings: completed_readings.value,
    })
    .then(() => {
      router.push({ name: "Home" });
    });
};
</script>

<style>
</style>