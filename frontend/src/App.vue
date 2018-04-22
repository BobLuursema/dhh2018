<template>
  <div id="app">
    <header></header>
    
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <router-link to="/" class="navbar-item">UMC Utrecht</router-link>
        <router-link to="/aanmelden" class="navbar-item">Aanmelden</router-link>
      </div>
    </nav>
    
    <router-view/>

    <footer></footer>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
#app {
  margin: 1em;
}
</style>
