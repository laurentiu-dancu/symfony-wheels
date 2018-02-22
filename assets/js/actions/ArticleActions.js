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

    fetchArticleList: (baseUrl, limit = 5, page = 1) => ({
        type: Types.GET_ARTICLE_LIST,
        payload: new Promise(resolve => {
            fetch(baseUrl + '/api/articles?limit=' + limit + '&page=' + page).then((response) => {
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

    changePage: (page) => ({
        type: Types.CHANGE_ARTICLE_PAGE,
        page: page,
    }),

};

export default Actions;
