import ReactOnRails from 'react-on-rails'
import React from 'react'
import {
    BrowserRouter,
    StaticRouter,
    Route
} from 'react-router-dom'
import Routes from './routing';

const BlogApp = (initialProps, context) => {
    let Router;

    if (context.serverSide) {
        Router = (props) => (
            <StaticRouter basename={context.base} location={context.location} context={{}} >
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
                {Routes.map(route => (
                    <Route path={route.path} exact={route.exact} render={(props) => <route.component {...initialProps} base={context.base} {...props} />} />
                ))}
            </div>
        </Router>
    )
};

export default BlogApp;
ReactOnRails.register({BlogApp});
