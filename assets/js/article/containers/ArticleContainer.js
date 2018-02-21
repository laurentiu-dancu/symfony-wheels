import React from 'react'
import ArticleDetailWidget from '../components/ArticleDetailWidget';
import ArticleActions from '../../actions/ArticleActions';
import { connect } from 'react-redux'

class ArticleContainer extends React.Component {
    componentDidMount() {
        if (!this.props.article || this.props.article.id != this.props.match.params.id) {
            const {dispatch} = this.props;
            dispatch(ArticleActions.fetchArticle(this.props.match.params.id, this.props.baseUrl))
        }
    }

    render() {
        if (this.props.fetching || !this.props.article || this.props.article.id != this.props.match.params.id) {
            return (
                <div>
                    Loading...
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
