import ReactOnRails from 'react-on-rails'
import React from 'react'
import {
    BrowserRouter,
    StaticRouter,
    Route
} from 'react-router-dom'
import Routes from './routing';
import {Header, Menu, Content, Cancer}  from './layout'

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
            <div className="react-router-container">
                <Header/>
                <Menu/>
                <Content routes={Routes} {...context} {...initialProps} />
                {/*<Cancer/>*/}
            </div>
        </Router>
    )
};

ReactOnRails.register({BlogApp});
