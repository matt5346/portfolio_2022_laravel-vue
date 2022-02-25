import axios from 'axios';

export default {
  namespaced: true,
  state: {
    portfolio: [],
    portfolioItem: [],
    portfolioRu: [],
    portfolioRuItem: [],
    isLoaded: false
  },
  getters: {
    getPortfolio (state) {
      return state.portfolio;
    },
    getRuPortfolio (state) {
      return state.portfolioRu;
    },
    getPortfolioItem (state) {
      return state.portfolioItem;
    },
    getRuPortfolioItem (state) {
      return state.portfolioRuItem;
    }
  },
  mutations: {
    changePortfolio (state, portfolio) {
      state.portfolio = portfolio;
    },
    changeRuPortfolio (state, portfolio) {
      state.portfolioRu = portfolio;
    },
    changePortfolioItem (state, item) {
      state.portfolioItem = item;
    },
    changeRuPortfolioItem (state, item) {
      state.portfolioRuItem = item;
    },
    loader_init (state, result) {
      state.isLoaded = result;
    }
  },
  actions: {
    fetchPortfolio ({ commit }, id = 10) {
        const localUrl = 'http://127.0.0.1:8000/api/portfolio';
        const remoteUrl = 'https://progerboy.com/api/portfolio';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
      commit('loader_init', false);
      try {
        axios({
          method: 'get',
          url: `${baseUrl}?id=${id}`,
          onDownloadProgress: function (progressEvent) {
            if (progressEvent.returnValue) {
              commit('loader_init', true);
            }
          }
        })
          .then(res => {
            commit('loader_init', true);
            commit('changePortfolio', res.data);
          })
            .catch(err => {
                console.log(err);
                commit('loader_init', true);
            });
      } catch (er) {
        console.log(er, 'fetchPosts');
      }
    },
    fetchRuPortfolio ({ commit }, id = 10) {
        const localUrl = 'http://127.0.0.1:8000/api/ru/portfolio';
        const remoteUrl = 'https://progerboy.com/api/ru/portfolio';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
        commit('loader_init', false);
        try {
            axios({
                method: 'get',
                url: `${baseUrl}?id=${id}`,
                onDownloadProgress: function (progressEvent) {
                    if (progressEvent.returnValue) {
                        commit('loader_init', true);
                    }
                }
            })
                .then(res => {
                    commit('loader_init', true);
                    commit('changeRuPortfolio', res.data);
                })
                .catch(err => {
                    console.log(err);
                    commit('loader_init', true);
                });
        } catch (er) {
            console.log(er, 'fetchPosts');
        }
    },
    fetchPortfolioItem ({ commit }, id) {
        const localUrl = 'http://127.0.0.1:8000/api/portfolio';
        const remoteUrl = 'https://progerboy.com/api/portfolio';
        let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
      try {
        axios.get(`${baseUrl}/${id}`)
          .then(result => {
            console.log(result, 'changePortfolioItem');
            commit('changePortfolioItem', result.data);
          });
      } catch (er) {
        console.log(er);
      }
    },
      fetchRuPortfolioItem ({ commit }, id) {
          const localUrl = 'http://127.0.0.1:8000/api/ru/portfolio';
          const remoteUrl = 'https://progerboy.com/api/ru/portfolio';
          let baseUrl = process.env.NODE_ENV === 'development' ? localUrl : remoteUrl;
          try {
              axios.get(`${baseUrl}/${id}`)
                  .then(result => {
                      console.log(result, 'changeRuPortfolioItem');
                      commit('changeRuPortfolioItem', result.data);
                  });
          } catch (er) {
              console.log(er);
          }
      }
  }
};
