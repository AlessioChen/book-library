<template>
  <div>
    <Nav />

    <div class="bg-white rounded-lg shadow sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
      <div class="px-4 py-8 sm:px-10">
        <div class="relative mt-6">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300">
            </div>
          </div>
          <div class="relative flex justify-center text-sm leading-5">
            <span class="px-2 text-gray-500 bg-white">
              Sign Up Form
            </span>
          </div>
        </div>

        <form class="mt-8 space-y-6" @submit.prevent="register">
          <div class="mt-6">
            <div class="w-full space-y-6">
              <!-- Email input -->
              <div class="w-full">
                <div class=" relative ">
                  <input type="email" v-model="email" id="email" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Your email" />
                </div>
              </div>
              <!-- Name Input  -->
              <div class="w-full">
                <div class=" relative ">
                  <input type="text" v-model="name" id="name" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Your name" />
                </div>
              </div>
              <!-- Password Input  -->
              <div class="w-full">
                <div class=" relative ">
                  <input v-model="password" type="password" id="password" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Your password" />
                </div>
              </div>
              <!-- Password Confirm -->
              <div class="w-full">
                <div class=" relative ">
                  <input v-model="passwordConfirm" type="password" id="password_confirm" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Your password confirm" />
                </div>
              </div>
              <!-- Register button  -->
              <div>
                <span class="block w-full rounded-md shadow-sm">
                  <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    Sign up
                  </button>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</template>

<script setup>
import Nav from "@/components/Nav.vue";
import { ref } from "@vue/reactivity";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const email = ref("");
const name = ref("");
const password = ref("");
const passwordConfirm = ref("");

const store = useStore();
const router = useRouter();

const register = () => {
  store
    .dispatch("auth/register", {
      email: email.value,
      password: password.value,
      name: name.value,
      passwordConfirm: passwordConfirm.value,
    })
    .then(() => {
      router.push({ name: "Login" });
    });
};
</script>

<style>
</style>