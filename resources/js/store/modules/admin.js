/* eslint-disable no-unused-vars */
import axios from 'axios';

export default {
    namespaced: true,
    state: {
        adminPortfolio: [],
        adminRuPortfolio: [],
        adminPosts: [],
        adminRuPosts: [],
        isLoaded: false
    },
    getters: {
        getAdminPortfolio (state) {
            return state.adminPortfolio;
        },
        getAdminRuPortfolio (state) {
            return state.adminRuPortfolio;
        },
        getAdminPosts (state) {
            return state.adminPosts;
        },
        getAdminRuPosts (state) {
            return state.adminRuPosts;
        }
    },
    mutations: {
        CREATE_PORTFOLIO (state, portfolio) {
          state.adminPortfolio.push(portfolio);
        },
        CREATE_PORTFOLIO_RU (state, portfolio) {
          state.adminRuPortfolio.push(portfolio);
        },
        CHANGE_PORTFOLIO (state, portfolio) {
            state.adminPortfolio = portfolio;
        },
        CHANGE_PORTFOLIO_RU (state, portfolio) {
            state.adminRuPortfolio = portfolio;
        },
        DELETE_PORTFOLIO (state, id) {
            state.adminPortfolio.filter((portfolio, key) => {
                if (portfolio.id === id) {
                    state.adminPortfolio.splice(key, 1);
                }
            });
        },
        DELETE_PORTFOLIO_RU (state, id) {
            state.getAdminRuPortfolio.filter((portfolio, key) => {
                if (portfolio.id === id) {
                    state.getAdminRuPortfolio.splice(key, 1);
                }
            });
        },
        CHANGE_POSTS (state, posts) {
            state.adminPosts = posts;
        },
        CHANGE_POSTS_RU (state, posts) {
            state.adminRuPosts = posts;
        },
        DELETE_POSTS (state, id) {
            state.getAdminPosts.filter((portfolio, key) => {
                if (portfolio.id === id) {
                    state.getAdminPosts.splice(key, 1);
                }
            });
        },
        DELETE_POSTS_RU (state, id) {
            state.getAdminRuPosts.filter((portfolio, key) => {
                if (portfolio.id === id) {
                    state.getAdminRuPosts.splice(key, 1);
                }
            });
        }
    },
    actions: {
        delete_portfolio ({ commit }, id) {
            const localUrl = 'http://127.0.0.1:8000/api/portfolio';
            const remoteUrl = 'https://progerboy.com/api/portfolio';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'delete',
                    url: `${baseUrl}/${id}`
                })
                    .then(res => {
                        commit('DELETE_PORTFOLIO', id);
                    })
                    .catch(err => console.log(err, 'delete_portfolio'));
            } catch (er) {
                console.log(er, 'delete_portfolio');
            }
        },
        delete_portfolio_ru ({ commit }, id) {
            const localUrl = 'http://127.0.0.1:8000/api/ru/portfolio';
            const remoteUrl = 'https://progerboy.com/api/ru/portfolio';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'delete',
                    url: `${baseUrl}/${id}`
                })
                    .then(res => {
                        commit('DELETE_PORTFOLIO_RU', id);
                    })
                    .catch(err => console.log(err, 'delete_portfolio'));
            } catch (er) {
                console.log(er, 'delete_portfolio');
            }
        },
        fetch_portfolio ({ commit }) {
            const localUrl = 'http://127.0.0.1:8000/api/portfolio';
            const remoteUrl = 'https://progerboy.com/api/portfolio';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'get',
                    url: `${baseUrl}`
                })
                    .then(res => {
                        const portfolio = res.data.filter(item => {
                            return item;
                        });
                        commit('CHANGE_PORTFOLIO', portfolio);
                    })
                    .catch(err => console.log(err, 'fetch_portfolio'));
            } catch (er) {
                console.log(er, 'fetchComments');
            }
        },
        fetch_portfolio_ru ({ commit }) {
            const localUrl = 'http://127.0.0.1:8000/api/ru/portfolio';
            const remoteUrl = 'https://progerboy.com/api/ru/portfolio';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'get',
                    url: `${baseUrl}`
                })
                    .then(res => {
                        const portfolio = res.data.filter(item => {
                            return item;
                        });
                        commit('CHANGE_PORTFOLIO_RU', portfolio);
                    })
                    .catch(err => console.log(err, 'fetch_portfolio_ru'));
            } catch (er) {
                console.log(er, 'fetch_portfolio_ru');
            }
        },
        edit_portfolio ({ commit }, { portfolioItem, id }) {
            const localUrl = 'http://127.0.0.1:8000/api/portfolio';
            const remoteUrl = 'https://progerboy.com/api/portfolio';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'put',
                    data: portfolioItem,
                    url: `${baseUrl}/${id}`
                });
            } catch (er) {
                console.log(er, 'edit_portfolio');
            }
        },
        edit_portfolio_ru ({ commit }, { portfolioItem, id }) {
            const localUrl = 'http://127.0.0.1:8000/api/ru/portfolio';
            const remoteUrl = 'https://progerboy.com/api/ru/portfolio';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'put',
                    data: portfolioItem,
                    url: `${baseUrl}/${id}`
                });
            } catch (er) {
                console.log(er, 'edit_portfolio');
            }
        },
        create_portfolio ( { commit }, portfolioItem ) {
            const localUrl = 'http://127.0.0.1:8000/api/portfolio';
            const remoteUrl = 'https://progerboy.com/api/portfolio';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'post',
                    data: portfolioItem,
                    url: `${baseUrl}`
                })
                  .then(res => {
                      const portfolio = res.data.comment;
                      commit('CREATE_PORTFOLIO', portfolio);
                  })
                  .catch(err => console.log(err, 'create_portfolio'));
            } catch (er) {
                console.log(er, 'create_portfolio');
            }
        },
        create_portfolio_ru ( { commit }, portfolioItem ) {
            const localUrl = 'http://127.0.0.1:8000/api/ru/portfolio';
            const remoteUrl = 'https://progerboy.com/api/ru/portfolio';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'post',
                    data: portfolioItem,
                    url: `${baseUrl}`
                })
                  .then(res => {
                      const portfolio = res.data.comment;
                      commit('CREATE_PORTFOLIO_RU', portfolio);
                  })
                  .catch(err => console.log(err, 'create_portfolio_ru'));
            } catch (er) {
                console.log(er, 'create_portfolio_ru');
            }
        },
        // POSTS METHODS
        // POSTS METHODS
        // POSTS METHODS
        fetch_posts ({ commit }) {
            const localUrl = 'http://127.0.0.1:8000/api/posts';
            const remoteUrl = 'https://progerboy.com/api/posts';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'get',
                    url: `${baseUrl}`
                })
                    .then(res => {
                        const posts = res.data.filter(item => {
                            return item;
                        });
                        console.log(posts, 'fetchPosts');
                        commit('CHANGE_POSTS', posts);
                    })
                    .catch(err => console.log(err, 'fetch_posts'));
            } catch (er) {
                console.log(er, 'fetchPosts');
            }
        },
        fetch_posts_ru ({ commit }) {
            const localUrl = 'http://127.0.0.1:8000/api/ru/posts';
            const remoteUrl = 'https://progerboy.com/api/ru/posts';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'get',
                    url: `${baseUrl}`
                })
                    .then(res => {
                        const posts = res.data.filter(item => {
                            return item;
                        });
                        commit('CHANGE_POSTS_RU', posts);
                    })
                    .catch(err => console.log(err, 'fetch_posts_ru'));
            } catch (er) {
                console.log(er, 'fetch_posts_ru');
            }
        },
        edit_posts ({ commit }, { postItem, id }) {
            const localUrl = 'http://127.0.0.1:8000/api/posts';
            const remoteUrl = 'https://progerboy.com/api/posts';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'put',
                    data: postItem,
                    url: `${baseUrl}/${id}`
                });
            } catch (er) {
                console.log(er, 'edit_posts');
            }
        },
        edit_posts_ru ({ commit }, { postItem, id }) {
            const localUrl = 'http://127.0.0.1:8000/api/ru/posts';
            const remoteUrl = 'https://progerboy.com/api/ru/posts';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'put',
                    data: postItem,
                    url: `${baseUrl}/${id}`
                });
            } catch (er) {
                console.log(er, 'edit_posts');
            }
        },
        create_posts ( { commit }, postItem ) {
            const localUrl = 'http://127.0.0.1:8000/api/posts';
            const remoteUrl = 'https://progerboy.com/api/posts';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'post',
                    data: postItem,
                    url: `${baseUrl}`
                })
                    .then(res => {
                        console.log(res, 'res DATA postItem');
                        console.log(postItem, 'commit DATA postItem');
                        // commit('changeComments', comments)
                    });
                console.log(postItem, 'commit DATA postItem ERROR')
                    .catch(err => console.log(err, 'postItem'));
            } catch (er) {
                console.log(er, 'postItem');
            }
        },
        create_posts_ru ( { commit }, postItem ) {
            const localUrl = 'http://127.0.0.1:8000/api/ru/posts';
            const remoteUrl = 'https://progerboy.com/api/ru/posts';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'post',
                    data: postItem,
                    url: `${baseUrl}`
                })
                    .then(res => {
                        // const comments = res.data.filter(item => {
                        //     item.commentReplies = JSON.parse(item.commentReplies)
                        //     return item
                        // })
                        console.log(res, 'res DATA postItem');
                        console.log(postItem, 'commit DATA postItem');
                        // commit('changeComments', comments)
                    });
                console.log(postItem, 'commit DATA postItem ERROR')
                    .catch(err => console.log(err, 'create_posts_ru'));
            } catch (er) {
                console.log(er, 'postItem_ru');
            }
        },
        delete_posts ({ commit }, id) {
            const localUrl = 'http://127.0.0.1:8000/api/posts';
            const remoteUrl = 'https://progerboy.com/api/posts';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'delete',
                    url: `${baseUrl}/${id}`
                })
                    .then(res => {
                        commit('DELETE_POSTS', id);
                    })
                    .catch(err => console.log(err, 'delete_posts'));
            } catch (er) {
                console.log(er, 'delete_posts');
            }
        },
        delete_posts_ru ({ commit }, id) {
            const localUrl = 'http://127.0.0.1:8000/api/ru/posts';
            const remoteUrl = 'https://progerboy.com/api/ru/posts';
            let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
            try {
                axios({
                    method: 'delete',
                    url: `${baseUrl}/${id}`
                })
                    .then(res => {
                        commit('DELETE_POSTS_RU', id);
                    })
                    .catch(err => console.log(err, 'delete_posts'));
            } catch (er) {
                console.log(er, 'delete_posts');
            }
        }
    }
};
