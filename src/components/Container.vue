<template>
  <div class="container" v-if="response">
    <!-- Initial screen -->
    <StartScreen 
    v-if="response.type === 'start'"
    v-bind:content="response"
    v-on:ready="setReply"/>
    <!-- Question with text only -->
    <TextQ
    v-if="response.type === 'textq'"
    v-bind:content="response"
    v-on:ready="setReply"/>
    <!-- Question with images only -->
    <ImgQ
    v-if="response.type === 'imgq'"
    v-bind:content="response"
    v-on:ready="setReply"/>
    <!-- Final screen -->
    <Finito
    v-if="response.type === 'finito'"
    v-bind:content="response"/>
    <br>
    <!-- "Continue" button -->
    <button 
      v-if="showBttn"
      class="button is-primary is-medium is-outlined" 
      v-html="getNextBttn"
      @click="nextView"
      v-bind:disabled="reply === null">
      NEXT
    </button>
  </div>
  <!-- Loading screen -->
  <b-loading 
    v-else
    :is-full-page="true" 
    :active.sync="loading">
  </b-loading>
</template>

<script>
// Important stuff
import { getURL, postURL } from '../api.js';
import { mapGetters, mapActions } from 'vuex';

// Components
import StartScreen from './StartScreen.vue';
import TextQ from './questions/TextQ.vue';
import ImgQ from './questions/ImgQ.vue';
import Finito from './Finito.vue';

export default {
  name: 'Container',
  components: {
    StartScreen,
    TextQ,
    ImgQ,
    Finito,
  },
  data: ()=> {
    return {
      response: null,
      reply: null,
      loading: true,
      showBttn: true
    }
  },
  computed: {
    ...mapGetters([
      'getNextBttn',
    ]),
    ...mapGetters({
      max: 'getLength',
      value: 'getScreen'
    })
  },
  mounted () {
    this.getView();
  },
  methods: {
    ...mapActions ([
      'updateProgress'
    ]),
    // Asks back-end for information about the screen
    getView() {
      getURL('question').then((res)=>{
        this.response = res.content;
        // Resetting variables
        this.reply = null;
        this.loading = false;
        if (res.length) {
          this.updateProgress({length: res.length, question: res.question});          
          if((this.max > 0) && (this.max === this.value)) {
            this.showBttn = false;
          }
        }
      });
    },
    // Tells back-end that user has replied
    nextView() {
      if (this.reply != null) {
        // Resetting variables
        this.response = null;
        this.loading = true;
        postURL('answer', {data: this.reply}).then((res)=>{
          this.getView();
        })
      }
    },
    // Seperated for future improvements
    setReply(rep) {
      this.reply = rep;
    }
  }
}
</script>
