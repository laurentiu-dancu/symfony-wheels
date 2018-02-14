import React from 'react'

const TextareaWithLabel = (props) => (
    <div>
        <label className="control-label" htmlFor={props.id}>{props.label}</label>
        <textarea onChange={props.changeMethod} type="text" id={props.id} name={props.name} rows="5" className="form-control" value={props.value}/>
    </div>
);

export default TextareaWithLabel
