import { createStore, applyMiddleware, compose } from 'redux'
import thunkMiddleware from 'redux-thunk'
import reducers from './reducers'
import { initialStates } from './reducers'
import { loadingBarMiddleware } from 'react-redux-loading-bar'
import promiseMiddleware from 'redux-promise-middleware';


export default function configureStore(props, context) {
    const {base, location} = context;
    const {articleState} = initialStates;

    const initialState = {
        articleState: {...articleState, ...props, baseUrl: base, location},
    };

    let composeEnhancers = typeof(window) !== 'undefined' && window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

    const enhancers = composeEnhancers(
        applyMiddleware(thunkMiddleware, promiseMiddleware(), loadingBarMiddleware())
    );

    return createStore(reducers, initialState, enhancers);
}
