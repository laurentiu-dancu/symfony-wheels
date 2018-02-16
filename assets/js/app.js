import ReactOnRails from 'react-on-rails'
import React from 'react'
import {
    BrowserRouter,
    StaticRouter,
    Route
} from 'react-router-dom'
import Routes from './routing';
import Layout from './layout/Layout'

const BlogApp = (initialProps, context) => {
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
        <Router>
            <div>
                {Routes.map((route, key) => (
                    <Route key={key} path={route.path} exact={route.exact}
                           render={(props) => (
                               <Layout content={route.component} base={context.base} {...props} {...initialProps}/>
                           )}/>
                ))}
            </div>
        </Router>
    )
};

export default BlogApp;
ReactOnRails.register({BlogApp});
