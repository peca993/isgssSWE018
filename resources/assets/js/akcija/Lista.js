import React, { Component } from 'react';

export default class Lista extends Component {
    
    constructor(props){
        super(props);
    
        
    }

    renderLista(){
        const listItems = this.props.list.map((item) =>
        <option>{item.name+" "+item.prezime+" "+item.nadimak+" ("+item.username+") "}</option>
        );
        return (
            <select className="form-control">
                <option>Odaberi clana</option>
                {listItems}
            </select>
        );
    }
    
    render() {
        return (
            <div >
                {this.renderLista()}            
            </div>
        );
    }
}