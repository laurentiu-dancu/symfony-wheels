import React from 'react'
import ArticleListWidget from '../components/ArticleListWidget';

export default class ArticleContainer extends React.Component {
    constructor(props, context) {
        super(props, context);
        if (this.props.articles) {
            this.state = {
                articles: this.props.articles,
                loading: false,
            }
        } else {
            this.state = {
                articles: null,
                loading: true
            }
        }
    }

    componentDidMount() {
        if (this.state.loading) {
            fetch(this.props.base + '/api/articles').then((response) => {
                return response.json()
            }).then((data) => {
                this.setState({
                    articles : data,
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
            return (
                <div>
                    <ArticleListWidget articles={this.state.articles} routePrefix={this.props.base}/>
                </div>
            )
        }
    }
}
