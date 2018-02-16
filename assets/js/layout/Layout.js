import React from 'react'
import Header from './components/Header'
import Menu from './components/Menu'

const Layout = (props) => (
    <div>
        <Header/>
        <Menu/>
        <div id="main-container" className="container-fluid">
            <props.content {...props} />
        </div>
    </div>
);

export default Layout
