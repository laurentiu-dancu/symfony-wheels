import React from 'react'
import ArticleDetailWidget from '../components/ArticleDetailWidget';
import ArticleActions from '../../actions/ArticleActions';
import {connect} from 'react-redux'

class ArticleContainer extends React.Component {
    static prefetch(props) {
        if (!props.article || props.article.id != props.match.params.id) {
            return new Promise((resolve) => {
                const id = props.match.params.id;
                const baseUrl = props.baseUrl;

                resolve(props.dispatch(ArticleActions.fetchArticle(baseUrl, id)));
            });
        }
    }

    render() {
        if (!this.props.article || this.props.article.id != this.props.match.params.id) {
            return (
                <div>
                    Unable to load page.
                </div>
            )
        } else {
            return(
                <ArticleDetailWidget article={this.props.article}/>
            );
        }
    }
}

const mapStateToProps = (store) => ({
    article: store.articleState.article,
    fetching: store.articleState.fetching,
    baseUrl: store.articleState.baseUrl,
});

export default connect(mapStateToProps)(ArticleContainer)
