import ReactOnRails from 'react-on-rails'
import { Provider } from 'react-redux'
import React from 'react'
import {BrowserRouter, StaticRouter} from 'react-router-dom'
import AppStore from './store'
import Routes from './routing';
import {Header, Menu, Content, Cancer}  from './layout'
import Prefetch from 'react-router-prefetch'
import { showLoading, hideLoading } from 'react-redux-loading-bar';
import LoadingBar from 'react-redux-loading-bar';

const BlogApp = (initialProps, context) => {
    const store = ReactOnRails.getStore('AppStore');
    let Router;

    if (context.serverSide) {
        Router = (props) => (
            <StaticRouter basename={context.base} location={context.location} context={{}}>
                {props.children}
            </StaticRouter>
        )
    } else {
        Router = (props) => (
            <BrowserRouter basename={context.base}>
                {props.children}
            </BrowserRouter>
        )
    }
    return (
        <Provider store={store}>
            <Router>
                <Prefetch preloader={null}
                          onError={message => window.alert(message)}>
                    <div className="react-router-container">
                        <Header/>
                        <Menu/>
                        <LoadingBar />
                        <Content routes={Routes}/>
                        {/*<Cancer/>*/}
                    </div>
                </Prefetch>
            </Router>
        </Provider>
    )
};

ReactOnRails.registerStore({AppStore});
ReactOnRails.register({BlogApp});
