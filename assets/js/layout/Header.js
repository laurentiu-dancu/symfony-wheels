import React from 'react'
import { Link } from 'react-router-dom'

export default class Header extends React.Component {

    //noinspection JSMethodCanBeStatic
    render() {
        return (
            <div className='images-container navbar-default'>
                <Link to="/">
                    <img src='/images/run.gif'/>
                    <img id="logo-image" src="/images/logo.png"/>
                </Link>
            </div>
        );
    }
}
