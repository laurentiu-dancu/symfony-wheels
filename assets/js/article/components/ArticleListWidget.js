import React from 'react'
import ArticleListItemWidget from './ArticleListItemWidget';

const ArticleListWidget = (props) => (
    <div>
        {props.category &&
            <h2>
                Category: {props.categories[props.category].name}
            </h2>
        }
        {props.articleList.map((article, idx) => (
            <div key={idx}>
                <ArticleListItemWidget key={idx} article={article} id={idx}/>
            </div>
        ))}
    </div>
);

export default ArticleListWidget
