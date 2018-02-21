import Constants from '../constants'

const Actions = {
    fetchArticle: (id, baseUrl) => {
        return dispatch => {
            dispatch({type: Constants.ARTICLE_FETCH});

            fetch(baseUrl + '/api/articles/' + id).then((response) => {
                return response.json()
            }).then((data) => {
                dispatch({
                    article : data,
                    type: Constants.ARTICLE_RECEIVE
                })
            })
        }
    },

    fetchArticleList: (baseUrl) => {
        return dispatch => {
            dispatch({type: Constants.ARTICLE_LIST_FETCH});

            fetch(baseUrl + '/api/articles').then((response) => {
                return response.json()
            }).then((data) => {
                dispatch({
                    articleList : data,
                    type: Constants.ARTICLE_LIST_RECEIVE
                })
            })
        }
    }
};

export default Actions;
