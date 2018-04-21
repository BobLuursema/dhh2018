<template>
  <div class="columns is-mobile">
    <div class="column this-column">
      <h4 class="this-title">Zoeken</h4>
      <p class="control has-icons-right">
        <input class="input" type="text">
        <span class="icon is-small is-right">
          <i class="fas fa-search"></i>
        </span>
      </p>
    </div>
    <div class="column this-column">
      <h4 class="this-title">Overzichtspagina's</h4>
      <p>> Ziektes, onderzoeken, behandelingen</p>
      <p>> Centra, poliklinieken, afdelingen</p>
      <p>> Zorgverleners</p>
    </div>
    <div class="column this-column">
      <h4 class="this-title">Veelgezocht</h4>
      <p>> Afspraak maken en wijzigen</p>
      <p>> Wachttijden</p>
      <p>> Contact & route</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'umc-homepage'
}
</script>

<style scoped>
  .this-column {
    background: #1961ab;
    padding: 1em 0.3em;
    border: 1px solid white;
    color: white;
  }
  .this-title {
    font-weight: bold;
    margin-bottom: 1em;
  }
</style>
