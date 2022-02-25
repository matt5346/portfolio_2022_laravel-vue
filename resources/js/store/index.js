import { createStore } from 'vuex';

// MODULES
import Posts from './modules/posts';
import Portfolio from './modules/portfolio';
import Comments from './modules/comments';
import Admin from './modules/admin';
import Globals from './modules/globals';

const mainStore = {
  modules: {
    Posts,
    Portfolio,
    Comments,
    Admin,
    Globals
  },
  state: {
    isLoaded: false
  },
  getters: {
    isLoading (state) {
        return state.isLoaded;
    }
  }
};

export const store = new createStore(mainStore);

export default store;
