import React from 'react'
import {DropdownButton, MenuItem} from 'react-bootstrap'

const PageLimitWidget = (props) => (
    <DropdownButton
        id={"items-per-page"}
        title={"Items per page: " + props.limit}
    >
        <MenuItem onSelect={props.onChange} eventKey={2}>2 items</MenuItem>
        <MenuItem onSelect={props.onChange} eventKey={5}>5 items</MenuItem>
        <MenuItem onSelect={props.onChange} eventKey={10}>10 items</MenuItem>
        <MenuItem onSelect={props.onChange} eventKey={20}>20 items</MenuItem>
    </DropdownButton>
);

export default PageLimitWidget;
