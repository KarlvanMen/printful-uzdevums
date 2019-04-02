<template>
  <section>
    <!-- Title -->
    <div class="hero is-primary is-bold">
      <div class="hero-body" v-if="content">
        <h1 class="title" v-html="content.title">
        </h1>
      </div>
    </div>
    <br>
    <!-- Input Fields -->
    <div class="field column is-half is-offset-one-quarter">
      <!-- Name -->
      <div class="control has-icons-left">
        <input 
        class="input is-primary" 
        type="text" 
        v-bind:placeholder="content.placeholder"
        v-model="name">
        <b-icon
          pack="fas"
          icon="user"
          size="is-small is-left">
        </b-icon>
      </div>
      <br>
      <!-- Test -->
      <div class="select is-primary">
        <select v-model="test">
          <option disabled value="-1">Select test</option>
          <option v-for="(option, key) in content.tests" :key="key" v-html="option" v-bind:value="key"></option>
        </select>
      </div>
    </div>
  </section>
</template>

<script>
import {getURL} from '../api.js';

export default {
  name: 'StartScreen',
  data: () => {
    return {
      name: null,
      test: -1,
      reply: null
    }
  },
  props: {
    content: Object,
  },
  watch: {
    test(to,from){
      this.checkReply();
    },
    name(to,from) {
      this.checkReply();
    }
  },
  methods: {
    checkReply() {
      this.reply = {
        name: this.name,
        test: this.test
      };
      // Telling Container.vue that the "form" is complete
      if(name !== null && this.test !== -1) {
        this.$emit('ready',this.reply);
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.select {
  width: 100%;
  select {
    width: 100%;
  }
}
</style>
