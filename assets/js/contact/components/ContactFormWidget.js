import React from 'react'
import InputWithLabel from './InputWithLabel'
import TextareaWithLabel from './TextareaWithLabel'

const ContactFormWidget = (props) => (
    <form onSubmit={props.submitMethod}>
        <InputWithLabel changeMethod={props.changeMethod} label="First name:" id="first_name" name="firstName" />
        <InputWithLabel changeMethod={props.changeMethod} label="Last name:" id="last_name" name="lastName" />
        <InputWithLabel changeMethod={props.changeMethod} label="Email:" id="email" name="email" required="true" />
        <TextareaWithLabel changeMethod={props.changeMethod} label="Content:" id="content" name="content"/>
        <input className="btn btn-primary" type="submit" value="Contact" />
    </form>
);

export default ContactFormWidget
