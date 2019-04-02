<template>
  <div class="app content">
    <ProgressBar></ProgressBar>
    <Container></Container>
  </div>
</template>

<script>
import ProgressBar from "./components/ProgressBar.vue";
import Container from "./components/Container.vue";

export default {
  data () {
    return {
    }
  },
  components: {
    Container,
    ProgressBar
  },
}
</script>

<style lang="scss">
  html {
    width: 100%;
    height: 100%;
  }

  body {
    width: 100%;
    min-height: 100%;
    margin: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
  }
</style>
