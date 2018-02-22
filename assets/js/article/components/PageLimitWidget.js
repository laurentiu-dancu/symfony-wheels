import React from 'react'

const PageLimitWidget = (props) => (
    <label>
        Items per page:
        <select
            value={props.limit} onChange={props.onChange}>
            <option value={2}>2</option>
            <option value={5}>5</option>
            <option value={10}>10</option>
            <option value={20}>20</option>
        </select>
    </label>
);

export default PageLimitWidget;
