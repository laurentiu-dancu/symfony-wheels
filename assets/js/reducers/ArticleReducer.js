import Types from '../constants'

export const initialState = {
    article: null,
    articleList: null,
    fetching: false,
    baseUrl: '/',
    location: '/',
    limit: 5,
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
            return { ...state, articleList: action.payload, fetching: false };

        case `${Types.GET_ARTICLE_LIST}_REJECTED`:
            return { ...state, fetching: false };

        case Types.CHANGE_ARTICLE_LIST_LIMIT:
            return {...state, limit: action.limit};

        default:
            return state;
    }

}
