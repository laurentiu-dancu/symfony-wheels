import React from 'react'
import {NavLink} from 'react-router-dom'
import {connect} from 'react-redux'
import {CategoryMenu} from "./components";

class Menu extends React.Component {

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
                    <CategoryMenu categories={this.props.categories}/>
                </div>
            </nav>
        );
    }
}

const mapStateToProps = (store) => ({
    categories: store.articleState.categories,
    limit: store.articleState.limit,
    page: store.articleState.page,
    category: store.articleState.category,
});

export default connect(mapStateToProps)(Menu)
