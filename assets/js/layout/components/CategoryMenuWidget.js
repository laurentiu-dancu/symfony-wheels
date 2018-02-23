import React from 'react'
import {DropdownButton, MenuItem} from 'react-bootstrap'
import {Link} from "react-router-dom";

const CategoryMenuWidget = (props) => (
    <div>
        <DropdownButton id="category-selector" title="Categories">
            <MenuItem header>Pick your poison</MenuItem>
            {props.categories.map(category => {
                return(
                    <Link key={category.id} to={'/category/' + category.id}>
                        <MenuItem divider />
                        <span className='btn'>{category.name}</span>
                    </Link>
                )
            })}
        </DropdownButton>
    </div>
);

export default CategoryMenuWidget;
