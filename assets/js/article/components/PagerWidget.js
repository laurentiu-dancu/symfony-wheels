import React from 'react'

const PagerWidget = (props) => (
    <nav>
        <ul className="pagination">
            {[...Array(props.totalPages)].map((x, i) => {
                let page = i + 1;
                if (page === props.currentPage) {
                    return(
                        <li className="active" key={i}>{page}</li>
                    )
                }
                return(
                    <li key={i}>
                        <button value={page} onClick={props.onClick}>{page}</button>
                    </li>
                )
            })}
        </ul>
    </nav>
);

export default PagerWidget;
