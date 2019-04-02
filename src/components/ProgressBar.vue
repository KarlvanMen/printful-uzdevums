<template>
  <div class="container">
    <progress v-if="max && max !== value" class="progress is-primary is-success" v-bind:value="value" v-bind:max="max"></progress>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
  name: 'ProgressBar',
  data: () => {
    return {
    }
  },
  computed: {
    ...mapGetters({
      max: 'getLength',
      value: 'getScreen'
    })
  }
}
</script>

<style lang="scss" scoped>
.progress {
  border-radius: 0;
}
</style>
