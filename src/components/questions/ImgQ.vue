<template>
  <section>
    <div class="question image-question">
      <div class="hero is-primary is-bold">
        <div class="hero-body">
          <h1 class="title" v-html="content.title">
          </h1>
        </div>
      </div>
      <br>
      <div class="block columns is-mobile">
        <b-radio
          class="column"
          v-model="reply"
          v-for="(answer, index) in content.answers" 
          :key="index"
          v-bind:native-value="index">
          <figure class="image is-256x256">
            <img :src="answer">
          </figure>
        </b-radio>
      </div>
    </div>
  </section>
</template>

<script>

export default {
  name: 'ImageQuestion',
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
  },
  mounted () {
  },
  methods: {
  }
}
</script>

<style lang="scss" scoped>
.columns {
  justify-content: center;
  flex-wrap: wrap;
  padding: 0 10px;
  .column {
    width: 100%;
    flex: 1 0 auto;
    text-align: center;
    margin-left: 0;
    @media (min-width: 768px) {
      width: 50%;
    }
  }
}
</style>
