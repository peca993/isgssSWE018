import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Oprema } from './models'


export default class Zaduzi extends Component {

    constructor(){
        super();

        this.state = {
            oprema: oprema,
            trazenaOprema: [],
            datumOd: "",
            datumDo: "",
            napomena: ""
        }

        this.dodajOpremu = this.dodajOpremu.bind(this);
        this.renderTrazenaOprema = this.renderTrazenaOprema.bind(this);
        this.zaduziOpremu = this.zaduziOpremu.bind(this);
        this.promeniKolcinu = this.promeniKolcinu.bind(this);
        this.promeniNapomenu = this.promeniNapomenu.bind(this);
        this.promeniDatumOd = this.promeniDatumOd.bind(this);
        this.promeniDatumDo = this.promeniDatumDo.bind(this);
        
    }

    renderLista(){
        const listItems = this.state.oprema.map((item,key) =>
        <option key={key} value={item.id} >{item.naziv+" "+item.kolicina}</option>
        );
        return (
            <select id="select-oprema" className="form-control ">
                <option value="-1" ></option>
                {listItems}
            </select>
        );
    }
    
    dodajOpremu(){
        let opremaID = document.getElementById('select-oprema').value;
        if(opremaID == -1){
            alert("Moras prvo odabrati opremu!");
        }else{
            let tmpOprema = this.state.oprema.filter((o)=>{
                return o.id == opremaID;
            })[0];
            tmpOprema.trazena_kolicina = 1;
            this.setState({trazenaOprema: [...this.state.trazenaOprema,tmpOprema]});
            this.setState({oprema: this.state.oprema.filter((o)=>{
                return o.id != opremaID;
            })});
                        
        }        
    }

    promeniKolcinu(id,e){
        let tmpState = this.state.trazenaOprema;
        tmpState.filter( 
            o => o.id == id
         )
         .map(o => o.trazena_kolicina = e.target.value)
         
         this.setState({
             trazenaOprema: tmpState
         })
         
         
    }


    promeniNapomenu(e){
        this.setState({
            napomena: e.target.value
        })
    }

    promeniDatumOd(e){
        this.setState({
          datumOd: e.target.value  
        })
    }

    promeniDatumDo(e){
        this.setState({
          datumDo: e.target.value  
        })
    }

    removeFromList(id){
        let tmpOprema = oprema.filter((o)=>{
            return o.id == id;
        })[0];
        this.setState({oprema: [...this.state.oprema,tmpOprema]});
        this.setState({trazenaOprema: this.state.trazenaOprema.
            filter((o) => {
                return o.id != id;
        })});
    }

    renderTrazenaOprema(){
        const listItems = this.state.trazenaOprema.map((item) => {

            return (
                <tr className="table" key={item.id} value={item.id} >
                    <td style={{width: '35%' }} >{item.naziv}</td>
                    <td style={{width: '30%' }} >{item.kategorija}</td>
                    <td style={{width: '10%' }} >{ "("+(item.kolicina-item.zauzeto)+")"+item.kolicina}</td>
                    <td style={{width: '15%' }} ><input onChange={(e) => this.promeniKolcinu(item.id, e)} className="form-control" type="number" defaultValue="1"  min="1" max={item.kolicina - item.zauzeto} /></td>
                    <td style={{width: '10%' }} ><button className="btn btn-block btn-danger" onClick={this.removeFromList.bind(this,item.id)} ><i className="fa fa-trash-o"></i></button></td>
                </tr>
            )
        }
        );

        return (
            <table className="table table-hover" >
                <thead>
                    <tr>
                        <th>
                            Naziv
                        </th>
                        <th>
                            Kategorija
                        </th>
                        <th>
                            (Slobodno)Kolicina
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {listItems}
                </tbody>
            </table>
        );
    }

    zaduziOpremu(){

        if(this.state.trazenaOprema == []){
            alert('Korpa prazna!');
            return;
        }
        if( this.state.datumOd == '' || this.state.datumDo == ''){
            alert('Neispravan datum!');
            return;            
        }
        if(this.state.trazenaOprema.length == 0){
            alert('Odaberite opremu!');
            return;
        }
        axios.post('/magacin/o/zaduzi', 
                this.state
                )
              .then( () => {
                window.location.href = '/';
              })
    }

    render(){
        return (
            <div className="container-fluid mx-auto" style={{width: '70%'}} >
                <div className="row">
                    <div className="col-md-12">
                        <h1>Zaduzi opremu</h1>
                        <hr/>
                        <div className="row">
                            <div className="col-md-6">
                                <div className="form-group">
                                    <label>Od:</label>
                                    <input className="form-control" type="date" onChange={ (e) => this.promeniDatumOd(e)} />
                                </div>
                            </div>
                            <div className="col-md-6">
                                <div className="form-group">
                                    <label>Do:</label>
                                    <input className="form-control" type="date" onChange={ (e) => this.promeniDatumDo(e)} />
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-12">
                                <div className="form-group">
                                    <label>Napomena</label>
                                    <textarea className="form-control" onChange={ (e) => this.promeniNapomenu(e)} >
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-md-8">
                                {this.renderLista()}
                            </div>
                            <div className="col-md-4">
                                <button className="btn btn-block btn-primary" onClick={this.dodajOpremu}>Dodaj</button>
                            </div>
                        </div>
                        <hr/>
                        <div className="row">
                            <div className="col-md-12">
                                {this.renderTrazenaOprema()}
                                <button className="btn btn-success btn-block"  onClick={this.zaduziOpremu} >Zaduzi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        );
    }

}

if (document.getElementById('zaduzi-div')) {
    ReactDOM.render(<Zaduzi />, document.getElementById('zaduzi-div'));
}
