<template>
  <div class="container" v-if="response">
    <StartScreen 
    v-if="response.type === 'start'"
    v-bind:content="response"
    v-on:ready="setReply"/>
    <TextQ
    v-if="response.type === 'textq'"
    v-bind:content="response"
    v-on:ready="setReply"/>
    <ImgQ
    v-if="response.type === 'imgq'"
    v-bind:content="response"
    v-on:ready="setReply"/>
    <Finito
    v-if="response.type === 'finito'"
    v-bind:content="response"/>
    <br>
    <button 
      v-if="showBttn"
      class="button is-primary is-medium is-outlined" 
      v-html="getNextBttn"
      @click="nextView"
      v-bind:disabled="reply === null">
      NEXT
    </button>
  </div>
  <b-loading 
    v-else
    :is-full-page="true" 
    :active.sync="loading">
  </b-loading>
</template>

<script>
import StartScreen from './StartScreen.vue';
import TextQ from './questions/TextQ.vue';
import ImgQ from './questions/ImgQ.vue';
import Finito from './Finito.vue';

import {getURL, postURL} from '../api.js';
import { mapGetters, mapActions } from 'vuex';

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
    getView() {
      getURL('question').then((res)=>{
        console.log(res);
        this.response = res.content;
        this.reply = null;
        this.loading = false;
        if (res.length) {
          this.updateProgress({length: res.length, question: res.question});          
          if((this.max > 0) && (this.max === this.value)) {
            this.showBttn = false;
            console.log(111)
          }
        }
      });
    },
    nextView() {
      if (this.reply != null) {
        this.response = null;
        this.loading = true;
        postURL('answer', {data: this.reply}).then((res)=>{
          this.getView();
          console.log(res);
        })
      }
    },
    setReply(rep) {
      this.reply = rep;
    }
  }
}
</script>
