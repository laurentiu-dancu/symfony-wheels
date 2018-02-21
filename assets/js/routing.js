import React from 'react'
import ArticleList from './article/containers/ArticleListConainer'
import Article from './article/containers/ArticleContainer'
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
];

export default routes;
