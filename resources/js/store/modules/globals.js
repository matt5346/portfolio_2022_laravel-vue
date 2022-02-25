
export default {
    name: 'Globals',
    namespaced: true,
    state: {
      urlLang: 'en'
    },
    getters: {
        getLanguage (state) {
            return state.urlLang.toLowerCase();
        },
        getLanguageUrl (state) {
            return `/${state.urlLang.toLowerCase()}`;
        }
    },
    mutations: {
        CHANGE_PORTFOLIO (state, lang) {
            state.urlLang = lang;
        }
    },
    actions: {
        languageAction ({commit}, lang) {
            commit('CHANGE_PORTFOLIO', lang);
        }
    }
};
