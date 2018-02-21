import Constants from '../constants'

export const initialState = {
    article: null,
    articleList: null,
    fetching: false,
    baseUrl: '/',
    location: '/'
};

export default function ArticleReducer(state = initialState, action) {
    switch (action.type) {
        case Constants.ARTICLE_FETCH:
            return {...state, fetching: true};

        case Constants.ARTICLE_RECEIVE:
            return { ...state, article: action.article, fetching: false };

        case Constants.ARTICLE_LIST_FETCH:
            return {...state, fetching: true};

        case Constants.ARTICLE_LIST_RECEIVE:
            return { ...state, articleList: action.articleList, fetching: false };

        default:
            return state;
    }


}
