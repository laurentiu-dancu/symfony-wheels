import React from 'react'
import { Link } from 'react-router-dom'

const ArticleListItemWidget = (props) => (
    <div id={props.id}>
        <h2>
            <Link to={'/article/' + props.article.id}>
                {props.article.title}
            </Link>
        </h2>
        <p>
            {props.article.content.substring(0, 150)}
        </p>
    </div>
);

export default ArticleListItemWidget
