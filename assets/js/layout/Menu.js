import React from 'react'
import { NavLink } from 'react-router-dom'


export default class Header extends React.Component {

    //noinspection JSMethodCanBeStatic
    render() {
        return (
            <nav className="navbar navbar-default">
                <div className="container-fluid">
                    <div className="navbar-header">
                        <NavLink exact={true} activeClassName="active" className="navbar-brand"  to="/">
                            Home
                        </NavLink>
                        <NavLink activeClassName="active" className="navbar-brand"  to="/article/create">
                            New article
                        </NavLink>
                        <NavLink activeClassName="active" className="navbar-brand"  to="/contact">
                            Contact
                        </NavLink>
                    </div>
                    {/*<div className="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/}
                        {/*<ul className="nav navbar-nav">*/}
                            {/*{{ render(controller('BlogBundle:Category:_categoryMenu')) }}*/}
                        {/*</ul>*/}
                    {/*</div>*/}
                </div>
            </nav>

        );
    }
}
