<template>
  <div class="container">
    <!-- Final screen -->
    <div class="hero is-fullheight is-warning is-bold">
      <div class="hero-head">
        <br>
        <h1 class="title" v-html="greeting()"></h1>
      </div>
      <div class="hero-body">
        <h2 class="subtitle has-text-centered is-full" v-html="feedback()"></h2>
      </div>
    </div>

  </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
  name: 'Finito',
  data: () => {
    return {
      reply: null
    }
  },
  watch: {
    reply(to, from) {
      this.$emit('ready', to);
    }
  },
  props: {
    content: Object,
  },
  computed: {
    ...mapGetters({
      max: 'getLength'
    })
  },
  mounted () {
  },
  methods: {
    greeting() {
      // Smashing together a normal sentence with a variable comming from prop 
      // and returning it back to title
      return `Thanks, ${this.content.name}!`;
    },
    feedback() {
      // Smashing together a normal sentence with a variable comming from prop and Vuex 
      // and returning it back to subtitle
      return `You answered correctly to ${this.content.correct} out of ${this.max} questions.`
    }
  }
}
</script>

<style lang="scss" scoped>
.hero-body {
  justify-content: center;
}
</style>
