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

    fetchArticleList: (baseUrl, limit = 5) => ({
        type: Types.GET_ARTICLE_LIST,
        payload: new Promise(resolve => {
            fetch(baseUrl + '/api/articles?limit=' + limit).then((response) => {
                return response.json()
            }).then((data => {
                resolve(data)
            }))
        })
    }),

    changeLimit: (limit) => ({
        type: Types.CHANGE_ARTICLE_LIST_LIMIT,
        limit: limit,
    }),

};

export default Actions;
