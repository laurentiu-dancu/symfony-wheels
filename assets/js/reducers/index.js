import ArticleReducer, { initialState as articleState } from './ArticleReducer'
import { combineReducers }  from 'redux'

export default combineReducers({
    articleState: ArticleReducer,
})

export const initialStates = {
    articleState,
};
