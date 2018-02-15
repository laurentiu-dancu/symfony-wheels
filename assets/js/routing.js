import React from 'react'
import ArticlesContainer from './article/containers/ArticlesContainer'
import ArticleContainer from './article/containers/ArticleContainer'
import ContactForm from './contact/containers/ContactFormContainer'

const routes = [
    {
        path: '/',
        exact: true,
        component: ArticlesContainer
    },
    {
        path: '/article/:id',
        component: ArticleContainer,
    },
    {
        path: '/contact',
        component: ContactForm,
    },
];

export default routes;
