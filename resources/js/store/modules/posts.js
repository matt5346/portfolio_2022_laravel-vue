/* eslint-disable no-unused-vars */
import axios from 'axios';

export default {
  name: 'Posts',
  namespaced: true,
  state: () => ({
    posts: [],
    post: [],
    isLoaded: false
  }),
  getters: {
    getPosts (state) {
        console.log(state.posts, 'STATE POSTS');
      return state.posts;
    },
    getPost (state) {
      return state.post;
    }
  },
  mutations: {
    fetch_posts (state, posts) {
      state.posts = posts;
    },
    fetch_single_post (state, post) {
      state.post = post;
    },
    loader_init (state, result) {
      state.isLoaded = result;
    }
  },
  actions: {
    fetchPosts ({ state, commit, rootState }, id = 10) {
        const localUrl = 'http://127.0.0.1:8000/api/posts';
        const remoteUrl = 'https://progerboy.com/api/posts';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
      commit('loader_init', false);
      try {
        axios({
          method: 'get',
          url: baseUrl,
          onDownloadProgress: function (progressEvent) {
            if (progressEvent.returnValue) {
              commit('loader_init', true);
            }
          }
        })
            .then(res => {
                console.log(res.data, 'POSTS DATA');
              commit('fetch_posts', res.data);
            })
            .catch(err => console.log(err));
      } catch (er) {
        console.log(er, 'fetchPosts');
      }
    },
    fetchSinglePost ({ commit }, id) {
        const localUrl = 'http://127.0.0.1:8000/api/posts';
        const remoteUrl = 'https://progerboy.com/api/posts';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
      try {
        axios.get(`${baseUrl}/${id}`)
          .then(result => {
            commit('fetch_single_post', result.data);
          });
      } catch (er) {
        console.log(er);
      }
    }
  }
};
