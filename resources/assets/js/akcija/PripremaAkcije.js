import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class PripremaAkcije extends Component {
    
    constructor(){
        super();

        this.state = {
            clanovi: clanovi,
            clanovi_akcije: [],
            naziv: "",
            datum: this.danasnjiDatum(),
            lokacija: "",
            opis: "",
            napomena: ""
        }

        this.dodajClana = this.dodajClana.bind(this);
        this.renderClanoviAkije = this.renderClanoviAkije.bind(this);
        this.changeNaziv = this.changeNaziv.bind(this);
        this.changeDatum = this.changeDatum.bind(this);
        this.changeLokacija = this.changeLokacija.bind(this);
        this.changeOpis = this.changeOpis.bind(this);
        this.changeNapomena = this.changeNapomena.bind(this);
        this.submit = this.submit.bind(this);
    }
    
    renderLista(){
        const listItems = this.state.clanovi.map((item,key) =>
        <option key={key} value={item.id} >{item.name+" "+item.prezime+" "+item.nadimak+" ("+item.username+") "}</option>
        );
        return (
            <select id="select-clan" className="form-control col-8">
                <option value="-1" >Odaberi clana</option>
                {listItems}
            </select>
        );
    }

    danasnjiDatum(){
        let danas = new Date();
        let mm = danas.getMonth() + 1;
        if(mm < 10)
            mm = "0" + mm;
        let dd = danas.getDate();
        let yyyy = danas.getFullYear();

        return yyyy+"-"+mm+"-"+dd;
    }

    renderClanoviAkije(){
        const listItems = this.state.clanovi_akcije.map((item) =>
        <tr className="table" key={item.id} value={item.id} ><td>{item.name}</td><td>{item.prezime}</td><td>{item.nadimak}</td><td><button className="btn btn-danger" onClick={this.removeFromList.bind(this,item.id)} ><i className="fa fa-trash-o"></i></button></td></tr>
        );
        return (
            <table className="table table-hover" >
                <thead></thead>
                <tbody>
                    {listItems}
                </tbody>
            </table>
        );
    }

    dodajClana(){
        let clanID = document.getElementById('select-clan').value;
        if(clanID == -1){
            alert("Moras prvo odabrati clana!");
        }else{
            let tmpClan = this.state.clanovi.filter((clan)=>{
                return clan.id == clanID;
            })[0];
            this.setState({clanovi_akcije: [...this.state.clanovi_akcije,tmpClan]});
            this.setState({clanovi: this.state.clanovi.filter((clan)=>{
                return clan.id != clanID;
            })});
                        
        }
    }

    removeFromList(id){
        let tmpClan = clanovi.filter((clan)=>{
            return clan.id == id;
        })[0];
        this.setState({clanovi: [...this.state.clanovi,tmpClan]});
        this.setState({clanovi_akcije: this.state.clanovi_akcije.
            filter((clan) => {
                return clan.id != id;
        })});
    }

    changeNaziv(e){
        this.setState({naziv: e.target.value});
    }

    changeDatum(e){
        this.setState({datum: e.target.value});
    }

    changeLokacija(e){
        this.setState({lokacija: e.target.value});
    }

    changeOpis(e){
        this.setState({opis: e.target.value});
    }

    changeNapomena(e){
        this.setState({napomena: e.target.value});
    }

    submit(){
        axios.post('/akcija/kreiraj', 
            this.state
            )
          .then( () => {
            window.location.href = '/akcije';
          })
    }

    render() {
        return (
            <div className="row justify-content-center">
            <div className="col-10 ">
                <h1>Priprema akcije</h1>
                <hr/>
                <div className="form-group row">
                    <label className="col-2 col-form-label">Naziv</label>
                    <div className="col-10">
                        <input value={this.state.naziv} onChange={this.changeNaziv} className="form-control" type="text"  name="naziv" />
                    </div>
                </div>
                <div className="form-group row">
                    <label className="col-2 col-form-label">Datum</label>
                    <div className="col-10">
                        <input type="date" value={this.state.datum} onChange={this.changeDatum} className="form-control"  name="datum" />
                    </div>
                </div>
                <div className="form-group row">
                    <label className="col-2 col-form-label">Lokacija</label>
                    <div className="col-10">
                        <input value={this.state.lokacija} onChange={this.changeLokacija} className="form-control" type="text"  name="lokacija" />
                    </div>
                </div>
                <div className="form-group row">
                    <label className="col-2 col-form-label">Opis</label>
                    <div className="col-10">
                        <textarea rows="8" value={this.state.opis} onChange={this.changeOpis} className="form-control" type="text"  name="opis" >
                        </textarea>
                    </div>
                </div>
                <div className="form-group row">
                    <label className="col-2 col-form-label">Napomena</label>
                    <div className="col-10">
                        <input value={this.state.napomena} onChange={this.changeNapomena} className="form-control" type="text"  name="napomena"  />
                    </div>
                </div>
                    <div className="" >
                        <div className="col-md-6">
                            <div className="row">
                                {this.renderLista()}
                                <button className="btn btn-primary col-3 " onClick={this.dodajClana}><i className="fa fa-plus"></i> Dodaj</button>        
                            </div>
                        </div>
                        <br/>
                        <div className="">
                            {this.renderClanoviAkije()}
                        </div>            
                    </div>
                    <button className="btn btn-primary btn-lg btn-block" onClick={this.submit} >Kreiraj</button>
                </div>
            </div>            
        );
    }
}

if (document.getElementById('priprema_akcije')) {
    ReactDOM.render(<PripremaAkcije />, document.getElementById('priprema_akcije'));
}