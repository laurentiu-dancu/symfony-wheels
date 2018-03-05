import React from 'react'
import PropTypes from 'prop-types';
import {Pagination} from 'react-bootstrap'

const propTypes = {
    totalPages: PropTypes.number.required,
    currentPage: PropTypes.number.required,
    onClick: PropTypes.func.required,
};

const Pager = (props) => (
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

Pager.propTypes = propTypes;

export default Pager;
