<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
        <div>
          <router-link class="mr-5 hover:text-gray-900" to="/">Home</router-link>
          <router-link class="mr-5 hover:text-gray-900" to="/login">Login</router-link>
        </div>
      </nav>
    </div>
  </header>
</template>