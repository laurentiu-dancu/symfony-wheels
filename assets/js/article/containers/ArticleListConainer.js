import React from 'react'
import ArticleListWidget from '../components/ArticleListWidget';
import { connect } from 'react-redux'
import ArticleActions from '../../actions/ArticleActions';

class ArticleListContainer extends React.Component {
    componentDidMount() {
        if (!this.props.articleList) {
            const {dispatch} = this.props;
            dispatch(ArticleActions.fetchArticleList(this.props.baseUrl))
        }
    }

    render() {
        if (this.props.fetching || !this.props.articleList) {
            return (
                <div>
                    Loading...
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
