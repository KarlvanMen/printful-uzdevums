<template>
  <div class="container">
    <div class="hero is-medium is-warning is-bold">
      <div class="hero-body">
        <h1 class="title" v-html="greeting()"></h1>
        <h2 class="subtitle" v-html="feedback()"></h2>
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
      return `Thanks, ${this.content.name}!`;
    },
    feedback() {
      return `You answered correctly to ${this.content.correct} out of ${this.max} questions.`
    }
  }
}
</script>