<template>

  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Title
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Author
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  isbn_code
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  actions
                </th>

              </tr>
            </thead>
            <tbody>
              <tr v-for="book in books.data" :key="book.id" class="border-b">

                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{book.title}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{book.author}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{book.isbn_code}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button @click="handleViewButtonClick(book)" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">
                    View book
                  </button>

                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "vuex";
import { computed } from "@vue/reactivity";

const store = useStore();
const books = computed(() => store.getters["userBooks/getUserBooks"]);

store.dispatch("userBooks/getAllUserBooks");

const handleViewButtonClick = (book) => {
  store.dispatch("userBooks/setShowBook", {
    book: book,
    value: true,
  });
};
</script>

