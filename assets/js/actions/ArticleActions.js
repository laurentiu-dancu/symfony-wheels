import Types from '../constants'

const Actions = {
    fetchArticle: (baseUrl, id) => ({
        type: Types.GET_ARTICLE,
        payload: new Promise(resolve => {
            fetch(baseUrl + '/api/articles/' + id).then((response) => {
                return response.json()
            }).then((data => {
                resolve(data)
            }))
        })
    }),

    fetchArticleList: (baseUrl) => ({
        type: Types.GET_ARTICLE_LIST,
        payload: new Promise(resolve => {
            fetch(baseUrl + '/api/articles').then((response) => {
                return response.json()
            }).then((data => {
                resolve(data)
            }))
        })
    }),

};

export default Actions;
