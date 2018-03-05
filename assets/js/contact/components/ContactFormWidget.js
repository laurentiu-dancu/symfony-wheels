import React from 'react'
import {InputWithLabel, TextAreaWithLabel} from 'common'

const ContactFormWidget = (props) => (
    <form onSubmit={props.submitMethod}>
        <InputWithLabel changeMethod={props.changeMethod} label="First name:" id="first_name" name="firstName" value={props.values.firstName} />
        <InputWithLabel changeMethod={props.changeMethod} label="Last name:" id="last_name" name="lastName" value={props.values.lastName} />
        <InputWithLabel changeMethod={props.changeMethod} label="Email:" id="email" name="email" required="true" type="email" value={props.values.email} />
        <TextAreaWithLabel changeMethod={props.changeMethod} label="Content:" id="content" name="content" value={props.values.content} />
        <input className="btn btn-primary" type="submit" value="Contact" disabled={!props.values.formValid} />
    </form>
);

export default ContactFormWidget
