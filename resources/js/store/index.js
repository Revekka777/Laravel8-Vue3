import Vuex from 'vuex';

import * as article from './modules/article'

export default new Vuex.Store({
    modules: {
        article
    },
    state: {
        slug: ''
    },
    actions:{

    },
    getters: {
        articleSlugRevers(state){
            return state.slug.split('').reverse().join('');
        }
    },
    mutations: {
        SET_SLUG(state, payload){
            state.slug = payload;
        }
    }
});
