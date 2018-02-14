import React from 'react'
import ContactFormWidget from '../components/ContactFormWidget';
import FormErrorsWidget from '../components/FormErrorsWidget';

export default class ContactFormContainer extends React.Component {
    constructor(props) {
        super(props);
        this.state = this.constructor.getInitialState();

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    static getInitialState() {
        return {
            firstName: '',
            lastName: '',
            email: '',
            content: '',
            formErrors: {
                email: '',
                content: '',
            },
            emailValid: false,
            contentValid: false,
            formValid: false,
        };
    }

    handleChange(event) {
        let name = event.target.name;
        let value = event.target.value;
        this.setState(
            {[name]: value},
            () => {this.validateField(name, value)}
        );
    }

    validateField(name, value) {
        let fieldValidationErrors = this.state.formErrors;
        let emailValid = this.state.emailValid;
        let contentValid = this.state.contentValid;

        switch (name) {
            case 'email':
                emailValid = value.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i);
                fieldValidationErrors.email = emailValid ? '' : ' is invalid';
                break;
            case 'content':
                contentValid = value.length >= 6;
                fieldValidationErrors.content = contentValid ? '': ' is too short';
                break;
            default:
                break;
        }
        this.setState({formErrors: fieldValidationErrors,
            emailValid: emailValid,
            contentValid: contentValid
        }, this.validateForm);
    }

    validateForm() {
        this.setState({formValid: this.state.emailValid && this.state.contentValid});
    }

    handleSubmit(event) {
        event.preventDefault();

        fetch('/api/contacts', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                firstName: this.state.firstName,
                lastName: this.state.lastName,
                email: this.state.email,
                content: this.state.email,
            })
        }).then(response => {
            this.setState(this.constructor.getInitialState());
        });
    }

    render() {
        return(
            <div className="contact-form-container">
                <ContactFormWidget changeMethod={this.handleChange} submitMethod={this.handleSubmit} values={this.state} />
                <FormErrorsWidget formErrors={this.state.formErrors} />
            </div>
        );
    }
}
