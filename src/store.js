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
  mutations: {
    updateScreen (state, data) {
      state.currentScreen = data.question;
      state.totalLength = data.length;
    }
  },
  getters: {
    getStart: state => {
      return state.start;
    },
    getNextBttn: state => {
      return state.text.next;
    },
    getScreen: state => {
      return state.currentScreen;
    },
    getLength: state => {
      return state.totalLength;
    },
  },
  actions: {
    updateProgress ({commit}, data) {
      commit('updateScreen', data);
    }
  }
};

export default new Vuex.Store(store);
