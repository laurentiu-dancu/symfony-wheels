import Types from '../constants'

export const initialState = {
    categories: {},
    category: null,
    article: null,
    articleList: null,
    fetching: false,
    baseUrl: '/',
    location: '/',
    limit: 5,
    page: 1,
    totalPages: 1,
};

export default function ArticleReducer(state = initialState, action) {
    switch (action.type) {
        case `${Types.GET_ARTICLE}_PENDING`:
            return {...state, fetching: true};

        case `${Types.GET_ARTICLE}_FULFILLED`:
            return { ...state, article: action.payload, fetching: false };

        case `${Types.GET_ARTICLE}_REJECTED`:
            return { ...state, fetching: false };

        case `${Types.GET_ARTICLE_LIST}_PENDING`:
            return {...state, fetching: true};

        case `${Types.GET_ARTICLE_LIST}_FULFILLED`:
            return { ...state, articleList: action.payload.articleList, totalPages: action.payload.totalPages, fetching: false };

        case `${Types.GET_ARTICLE_LIST}_REJECTED`:
            return { ...state, fetching: false };

        case Types.CHANGE_ARTICLE_LIST_LIMIT:
            return {...state, limit: parseInt(action.limit)};

        case Types.CHANGE_ARTICLE_PAGE:
            return {...state, page: parseInt(action.page)};

        case Types.CHANGE_ARTICLE_CATEGORY:
            return {...state, category: action.category, page: 1};

        default:
            return state;
    }

}
