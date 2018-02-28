import React from 'react'
import {Pagination} from 'react-bootstrap'

const PagerWidget = (props) => (
    <div>
        <Pagination className="pagination">
            {[...Array(props.totalPages)].map((x, i) => {
                let page = i + 1;
                return (
                    <Pagination.Item key={i} value={page} onClick={props.onClick} active={page === props.currentPage}>
                        {page}
                    </Pagination.Item>
                )
            })}
        </Pagination>
    </div>
);

export default PagerWidget;
