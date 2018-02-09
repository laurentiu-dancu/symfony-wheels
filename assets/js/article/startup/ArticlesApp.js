import React from 'react'
import ArticleContainer from '../containers/ArticleContainer'
import ArticlesContainer from '../containers/ArticlesContainer'
import {
    BrowserRouter,
    StaticRouter,
    Route
} from 'react-router-dom'

export default (initialProps, context) => {
    let Router;

    // We render a different router depending on whether we are rendering server side
    // or client side.
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
                <Route path={'/article/:id'} render={(props) => <ArticleContainer {...initialProps} base={context.base} {...props} />}/>
                <Route path={'/'} exact render={
                    (props) => <ArticlesContainer {...initialProps} base={context.base} {...props}/>
                }/>
            </div>
        </Router>
    )
}
