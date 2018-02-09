import React from 'react'
import ArticleDetailWidget from '../components/ArticleDetailWidget';

export default class ArticleContainer extends React.Component {
    constructor(props, context) {
        super(props, context);

        //We check it there is no recipe (only client side)
        //Or our id doesn't match the recipe that we received server-side
        //
        if (!this.props.article || (this.props.match.params.id && this.props.match.params.id != this.props.article.id)) {
            this.state = {
                article: null,
                loading: true
            }
        } else {
            this.state = {
                article: this.props.article,
                loading: false
            }
        }
    }
    componentDidMount() {
        if (this.state.loading) {
            fetch(this.props.base + '/api/article/' + this.props.match.params.id).then((response) => {
                return response.json()
            }).then((data) => {
                this.setState({
                    article : data,
                    loading: false
                })
            })
        }
    }
    render() {
        if (this.state.loading) {
            return (
                <div>
                    Loading...
                </div>
            )
        } else {
            return(
                <ArticleDetailWidget article={this.state.article}/>
            );
        }
    }
}
