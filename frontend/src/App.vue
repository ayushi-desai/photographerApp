<script setup>
import Body from './components/Body.vue'
</script>

<template>
  <header>

  </header>

  <main>

    <Body></Body>
  </main>
</template>

<style scoped>
@media only screen and (min-width: 320px) and (max-width: 991.98px) {
  body {
    font-size: 16px !important;
  }

}

@media only screen and (min-width: 992px) {
  body {
    font-size: 14px !important;
  }

}
</style>

<script>
import axiosInstance from './axios'

export default {
  provide: {
    axios: axiosInstance
  }
}
</script>
