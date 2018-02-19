import React from 'react'
import {Route} from 'react-router-dom'

const Content = (initialProps) => (
    <div className="main-container container-fluid">
        {initialProps.routes.map((route, key) => (
            <Route key={key} path={route.path} exact={route.exact}
                   render={(props) => (
                       <route.component {...props} {...initialProps}/>
                   )}/>
        ))}
    </div>
);

export default Content
