import React from 'react'
import ArticleListWidget from './components/ArticleListWidget';
import {connect} from 'react-redux'
import ArticleActions from '../actions/ArticleActions';
import PageLimitWidget from "./components/PageLimitWidget";
import PagerWidget from "./components/PagerWidget";

class ArticleList extends React.Component {
    static prefetch(props) {
        const categoryId = props.match.params.id ? parseInt(props.match.params.id) : null;
        const categoryChanged = props.category !== categoryId;
        if (!props.articleList || categoryChanged) {
            const {dispatch} = props;
            dispatch(ArticleActions.changeCategory(categoryId));
            const page = categoryChanged ? 1 : props.page;
            return new Promise((resolve) => {
                resolve(dispatch(ArticleActions.fetchArticleList(props.baseUrl, props.limit, page, categoryId)))
            });
        }
    }

    onLimitChange(event) {
        const {dispatch} = this.props;
        const value = event;
        dispatch(ArticleActions.changeLimit(value));
        dispatch(ArticleActions.fetchArticleList(this.props.baseUrl, value, this.props.page, this.props.category))
    }

    onPagerClick(event) {
        const {dispatch} = this.props;
        const value = event.target.getAttribute('value');
        dispatch(ArticleActions.changePage(value));
        dispatch(ArticleActions.fetchArticleList(this.props.baseUrl, this.props.limit, value, this.props.category))
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
                    <ArticleListWidget categories={this.props.categories} category={this.props.category} articleList={this.props.articleList}/>
                    <PageLimitWidget limit={this.props.limit} onChange={this.onLimitChange.bind(this)} />
                    <PagerWidget totalPages={this.props.totalPages} currentPage={this.props.page} onClick={this.onPagerClick.bind(this)}/>
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
    page: store.articleState.page,
    totalPages: store.articleState.totalPages,
    category: store.articleState.category,
    categories: store.articleState.categories,
});

export default connect(mapStateToProps)(ArticleList)
