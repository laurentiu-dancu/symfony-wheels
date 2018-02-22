import React from 'react'
import ArticleListWidget from '../components/ArticleListWidget';
import {connect} from 'react-redux'
import ArticleActions from '../../actions/ArticleActions';
import PageLimitWidget from "../components/PageLimitWidget";
import PagerWidget from "../components/PagerWidget";

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
        const value = event.target.value;
        dispatch(ArticleActions.changeLimit(value));
        dispatch(ArticleActions.fetchArticleList(this.props.baseUrl, value, this.props.page))
    }

    onPagerClick(event) {
        const {dispatch} = this.props;
        const value = event.target.value;
        dispatch(ArticleActions.changePage(value));
        dispatch(ArticleActions.fetchArticleList(this.props.baseUrl, this.props.limit, value))
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
});

export default connect(mapStateToProps)(ArticleListContainer)
