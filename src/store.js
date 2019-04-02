import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = {
  state: {
    currentScreen: 0,
    totalLength: 0,
    text: {
      next: "CONTINUE"
    }
  },
  // DO NOT USE DIRECTLY! Call actions to do mutations
  mutations: {
    updateScreen (state, data) {
      state.currentScreen = data.question;
      state.totalLength = data.length;
    }
  },
  getters: {
    // Get the text for the button
    // (Could add some mutation to change it)
    getNextBttn: state => {
      return state.text.next;
    },
    // Used in progress bar and for next button
    getScreen: state => {
      return state.currentScreen;
    },
    // Used in progress bar, for next button, and final screen
    getLength: state => {
      return state.totalLength;
    },
  },
  actions: {
    // Update progress
    updateProgress ({commit}, data) {
      commit('updateScreen', data);
    }
  }
};

export default new Vuex.Store(store);
