<template>
  <div id="app">
    <header>
      <router-link to="/">
        <img src="./assets/Header2.png">
      </router-link>
    </header>

    <router-view/>

    <footer>
      <img src="./assets/Footer.png">
    </footer>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
footer, header {
  width: 100vw;
}
header {
  margin-bottom: 1em;
}
</style>
