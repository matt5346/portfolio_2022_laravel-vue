/* eslint-disable no-unused-vars */
import axios from 'axios';

export default {
  namespaced: true,
  state: {
    postComments: [],
    isLoaded: false
  },
  getters: {
    getComments (state) {
      return state.postComments;
    }
  },
  mutations: {
    changeComments (state, comments) {
      state.postComments = comments;
    },
    CREATE_COMMENT (state, item) {
      state.postComments.push(item);
    },
    UPDATE_COMMENT (state, { replyObj, id }) {
      state.postComments.filter((comment, key) => {
        if (comment.id === id) {
          state.postComments[key].commentReplies.push(replyObj.reply);
        }
      });
    },
    EDIT_COMMENT (state, { commentEdit, id }) {
      state.postComments.filter((item, key) => {
        if (item.id === id) {
          console.log(commentEdit, 'CHANGED');
          state.postComments[key].content = commentEdit.edit.commentContent;
          state.postComments[key].author = commentEdit.edit.commentAuthor;
        }
      });
    },
    DELETE_COMMENT (state, id) {
      state.postComments.filter((comment, key) => {
        if (comment.id === id) {
          state.postComments.splice(key, 1);
        }
      });
    },
    loader_init (state, result) {
      state.isLoaded = result;
    }
  },
  actions: {
    fetchComments ({ commit }, postId) {
        const localUrl = 'http://127.0.0.1:8000/api/comments';
        const remoteUrl = 'https://progerboy.com/api/comments';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
      try {
        axios({
          method: 'get',
          url: `${baseUrl}/${postId}`
        })
          .then(res => {
            const comments = res.data.filter(item => {
              item.commentReplies = JSON.parse(item.commentReplies);
              return item;
            });
            commit('changeComments', comments);
          })
          .catch(err => console.log(err, 'fetchComments'));
      } catch (er) {
        console.log(er, 'fetchComments');
      }
    },
    postComment ({ commit }, item) {
        const localUrl = 'http://127.0.0.1:8000/api/comments';
        const remoteUrl = 'https://progerboy.com/api/comments';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
      try {
        axios({
          method: 'post',
          data: item,
          url: `${baseUrl}`
        })
          .then(res => {
            commit('CREATE_COMMENT', item);
          })
          .catch(err => console.log(err, 'postComment'));
      } catch (er) {
        console.log(er, 'postComment');
      }
    },
    editCommentAction ({ commit }, { commentEdit, id }) {
        const localUrl = 'http://127.0.0.1:8000/api/comments';
        const remoteUrl = 'https://progerboy.com/api/comments';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
      try {
        axios({
          method: 'put',
          data: commentEdit,
          url: `${baseUrl}/${id}`
        })
          .then(res => {
            commit('EDIT_COMMENT', { commentEdit, id });
          })
          .catch(err => console.log(err, 'editCommentAction'));
      } catch (er) {
        console.log(er, 'editCommentAction');
      }
    },
    updateCommentAction ({ commit }, { replyObj, id }) {
        const localUrl = 'http://127.0.0.1:8000/api/comments';
        const remoteUrl = 'https://progerboy.com/api/comments';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
      try {
        axios({
          method: 'put',
          data: replyObj,
          url: `${baseUrl}/${id}`
        })
          .then(res => {
            commit('UPDATE_COMMENT', { replyObj, id });
          })
          .catch(err => console.log(err, 'postUpdate'));
      } catch (er) {
        console.log(er, 'postUpdate');
      }
    },
    deleteCommentAction ({ commit }, id) {
        const localUrl = 'http://127.0.0.1:8000/api/comments';
        const remoteUrl = 'https://progerboy.com/api/comments';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
      try {
        axios({
          method: 'delete',
          url: `${baseUrl}/${id}`
        })
          .then(res => {
            commit('DELETE_COMMENT', id);
          })
          .catch(err => console.log(err, 'postUpdate'));
      } catch (er) {
        console.log(er, 'postUpdate');
      }
    }
  }
};
