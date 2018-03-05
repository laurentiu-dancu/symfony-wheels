import React from 'react'
import {DropdownButton} from 'react-bootstrap'
import {Link} from "react-router-dom";

const CategoryMenu = (props) => (
    <div className={"category-dropdown-container"}>
        <DropdownButton id="category-selector" title="Categories">
            {Object.keys(props.categories).map(key => {
                return(
                    <Link key={key} to={'/category/' + key}>
                        <span className='btn'>{props.categories[key].name}</span>
                    </Link>
                )
            })}
        </DropdownButton>
    </div>
);

export default CategoryMenu;
