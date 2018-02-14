import React from 'react'

const InputWithLabel = (props) => (
    <div>
        <label className="control-label" htmlFor={props.id}>{props.label}</label>
        <input onChange={props.changeMethod} type="text" id={props.id} name={props.name} maxLength="255" className="form-control"/>
    </div>
);

export default InputWithLabel
