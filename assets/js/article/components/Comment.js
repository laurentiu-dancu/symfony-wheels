import React from 'react'

export default class Comment extends React.Component {
    constructor(props, context) {
        super(props, context);
        this.state = props;
    }

    render() {
        return(
            <div style={{marginLeft: this.state.offset + 'px'}} className="comment-details" data-id={this.state.id}>
                <h5>
                    {this.state.id}, on {this.state['created_at']}
                </h5>
                <p className="comment-content">
                    {this.state.content}
                </p>
                {this.state.children.map((comment) => (
                    <Comment offset={this.state.offset + 50} {...comment} key={comment.id}/>
                ))}
            </div>
        )
    }
}
