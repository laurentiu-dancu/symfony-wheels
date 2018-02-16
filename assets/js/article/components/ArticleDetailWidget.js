import React from 'react'
import { Link } from 'react-router-dom'

const ArticleDetailWidget = (props) => (
    <div>
        <h1>{ props.article.title }</h1>
        <hr/>
        <img src={props.article.image}/>
        <p>{ props.article.content }</p>
    </div>
);

export default ArticleDetailWidget
