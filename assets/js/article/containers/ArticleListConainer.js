import React from 'react'
import ArticleListWidget from '../components/ArticleListWidget';
import {connect} from 'react-redux'
import ArticleActions from '../../actions/ArticleActions';
import PageLimitWidget from "../components/PageLimitWidget";

class ArticleListContainer extends React.Component {
    static prefetch(props) {
        if (!props.articleList) {
            return new Promise((resolve) => {
                const {dispatch} = props;
                resolve(dispatch(ArticleActions.fetchArticleList(props.baseUrl, props.limit)))
            });
        }
    }

    onLimitChange(event) {
        const {dispatch} = this.props;
        dispatch(ArticleActions.changeLimit(event.target.value));
        dispatch(ArticleActions.fetchArticleList(this.props.baseUrl, event.target.value))
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
                <div>
                    <ArticleListWidget articleList={this.props.articleList}/>
                    <PageLimitWidget limit={this.props.limit} onChange={this.onLimitChange.bind(this)} />
                </div>
            )
        }
    }
}

const mapStateToProps = (store) => ({
    articleList: store.articleState.articleList,
    fetching: store.articleState.fetching,
    baseUrl: store.articleState.baseUrl,
    limit: store.articleState.limit,
});

export default connect(mapStateToProps)(ArticleListContainer)
