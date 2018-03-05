import React from 'react'
import CommentWidget from './Comment'

const ArticleDetail = (props) => (
    <div>
        <h1>{ props.article.title }</h1>
        <hr/>
        <img src={props.article.image}/>
        <p>{ props.article.content }</p>
        <div>
            <h3>Comments:</h3>
            {props.article.comments.map((comment) => (
                <CommentWidget offset={15} {...comment} key={comment.id}/>
            ))}
        </div>
    </div>
);

export default ArticleDetail
