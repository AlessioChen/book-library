<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
        <div>
          <router-link :to="{name: 'Home'}" class="mr-5 hover:text-gray-900">Home</router-link>
          <a v-if="isLoggedIn" @click="logout" href="#" class="pl-3 inline-block no-underline hover:text-black">
            Logout
          </a>
        </div>
      </nav>
    </div>
  </header>
</template>

<script setup>
import { computed } from "@vue/reactivity";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();

const logout = () => {
  store.dispatch("auth/logout").then(() => {
    router.push({ name: "Login" });
  });
};

const isLoggedIn = computed(() => store.getters["auth/isLoggedIn"]);
</script>