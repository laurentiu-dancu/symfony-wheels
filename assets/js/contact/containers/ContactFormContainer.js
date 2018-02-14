import React from 'react'
import ContactFormWidget from '../components/ContactFormWidget';

export default class ContactFormContainer extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            firstName: '',
            lastName: '',
            email: '',
            content: '',
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(event) {
        this.setState({[event.target.name]: event.target.value});
    }

    handleSubmit(event) {
        event.preventDefault();

        fetch('/api/contacts', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(this.state)
        }).then(function (response) {
            console.log(response);
        });
    }

    render() {
        return(
            <ContactFormWidget changeMethod={this.handleChange} submitMethod={this.handleSubmit} />
        );
    }
}
