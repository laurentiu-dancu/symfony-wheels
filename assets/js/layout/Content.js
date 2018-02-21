import React from 'react'
import {Route} from 'react-router-dom'

const Content = (props) => (
    <div className="main-container container-fluid">
        {props.routes.map((route, key) => (
            <Route key={key} path={route.path} exact={route.exact} component={route.component}/>
        ))}
    </div>
);

export default Content
