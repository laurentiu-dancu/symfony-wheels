import React from 'react'

const InputWithLabel = (props) => (
    <div>
        <label className="control-label" htmlFor={props.id}>{props.label}</label>
        <input onChange={props.changeMethod}
               type={props.type != 'text' ? props.type : 'text'}
               id={props.id}
               name={props.name}
               maxLength="255"
               className="form-control"
               required={props.required == 'true'}
               value={props.value}
        />
    </div>
);

export default InputWithLabel
