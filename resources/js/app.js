require('./bootstrap');

import {createApp} from 'vue';
import ArticleComponent from './components/ArticleComponent';
import ViewsComponent from './components/ViewsComponent';
import LikesComponent from './components/LikesComponent';
import CommentComponent from './components/CommentComponent';
import store from './store/';


const app = createApp({});
app.component('article-component', ArticleComponent);
app.component('views-component', ViewsComponent);
app.component('likes-component', LikesComponent);
app.component('comment-component', CommentComponent);
app.use(store);

let url = window.location.pathname;
let slug = url.substr(url.lastIndexOf('/') + 1);

store.commit('SET_SLUG', slug);
store.dispatch('article/getArticleData', slug);
store.dispatch('article/viewsIncrement', slug);

app.mount("#app");


