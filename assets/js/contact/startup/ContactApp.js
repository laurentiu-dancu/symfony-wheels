import React from 'react'
import ContactForm from '../containers/ContactFormContainer'
import {
    BrowserRouter,
    StaticRouter,
    Route
} from 'react-router-dom'

export default (initialProps, context) => {
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
                <Route path={'/contact'} render={(props) => <ContactForm {...initialProps} base={context.base} {...props} />}/>
            </div>
        </Router>
    )
}
