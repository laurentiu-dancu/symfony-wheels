import React from 'react'
import ArticleListItem from './ArticleListItem';

const ArticleLister = (props) => (
    <div>
        {props.category &&
            <h2>
                Category: {props.categories[props.category].name}
            </h2>
        }
        {props.articleList.map((article, idx) => (
            <div key={idx}>
                <ArticleListItem key={idx} article={article} id={idx}/>
            </div>
        ))}
    </div>
);

export default ArticleLister
