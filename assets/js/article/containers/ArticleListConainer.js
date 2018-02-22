import React from 'react'
import ArticleListWidget from '../components/ArticleListWidget';
import {connect} from 'react-redux'
import ArticleActions from '../../actions/ArticleActions';

class ArticleListContainer extends React.Component {
    static prefetch(props) {
        if (!props.articleList) {
            return new Promise((resolve) => {
                const {dispatch} = props;
                resolve(dispatch(ArticleActions.fetchArticleList(props.baseUrl)))
            });
        }
    }

    render() {
        if (!this.props.articleList) {
            return (
                <div>
                    Unable to load page.
                </div>
            )
        } else {
            return (
                <ArticleListWidget articleList={this.props.articleList}/>
            )
        }
    }
}

const mapStateToProps = (store) => ({
    articleList: store.articleState.articleList,
    fetching: store.articleState.fetching,
    baseUrl: store.articleState.baseUrl,
});

export default connect(mapStateToProps)(ArticleListContainer)
