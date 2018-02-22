import ArticleReducer, { initialState as articleState } from './ArticleReducer'
import { combineReducers }  from 'redux'
import { loadingBarReducer } from 'react-redux-loading-bar'

export default combineReducers({
    articleState: ArticleReducer,
    loadingBar: loadingBarReducer,
})

export const initialStates = {
    articleState,
};
