import React from 'react'
import {Article, ArticleList} from './article'
import ContactForm from './contact/containers/ContactFormContainer'

const routes = [
    {
        path: '/',
        exact: true,
        component: ArticleList
    },
    {
        path: '/article/:id',
        component: Article,
    },
    {
        path: '/contact',
        component: ContactForm,
    },
    {
        path: '/category/:id',
        component: ArticleList
    },
];

export default routes;
