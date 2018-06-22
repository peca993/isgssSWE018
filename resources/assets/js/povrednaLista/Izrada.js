import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {
    TextField,
    Select,
    InputLabel,
    FormControl,
    MenuItem
} from '@material-ui/core/';
import MuiThemeProvider from '@material-ui/core/styles/MuiThemeProvider';
import theme from '../theme';



export default class IzradaPovredneListe extends Component {

    constructor(){
        super();
        

        this.state = {
            ime_p: '',
            prezime_p: '',
            mesto_rodjenja_p: '',
            pol_p: '',
            adresa_p: '',
            ski_pas_p: '',
            smestaj: '',
            licna_oprema: '',
            opis_akcije_spasavanja: '',
            vodja_akcije: '',
            mesto_predaje: '',
            datum: '',
            vreme_predaje: '',
            predati_materijal: '',
            primalac: '',
            mesto_nesrece: '',
            vreme_nesrece: '',
            vreme_prijema_poziva: '',
            vreme_dolaska_spasilaca: '',
            trajanje_ukazivanja_pomoci  : '',  
            trajanje_transporta: '',
            vreme_zavrsetka_akcije: '',
            meteoroloski_uslovi: '',
            vrste_povreda: [],
            nacin_pruzanja_pomoci: '',
            ucesnici: [],
            neselektovaniUcesnici: clanovi,
            selectedUcesnik: ''
        }

        this.submit = this.submit.bind(this)
        this.ime = this.ime.bind(this)
        this.prezime = this.prezime.bind(this)
        this.mesto_rodjenja_p = this.mesto_rodjenja_p.bind(this)
        this.pol_p = this.pol_p.bind(this)
        this.adresa_p = this.adresa_p.bind(this)
        this.ski_pas_p = this.ski_pas_p.bind(this)
        this.smestaj = this.smestaj.bind(this)
        this.licna_oprema = this.licna_oprema.bind(this)
        this.vodja_akcije = this.vodja_akcije.bind(this)
        this.opis_akcije_spasavanja = this.opis_akcije_spasavanja.bind(this)
        this.mesto_predaje = this.mesto_predaje.bind(this)
        this.datum = this.datum.bind(this)
        this.vreme_predaje = this.vreme_predaje.bind(this)
        this.predati_materijal = this.predati_materijal.bind(this)
        this.primalac = this.primalac.bind(this)
        this.mesto_nesrece = this.mesto_nesrece.bind(this)
        this.vreme_nesrece = this.vreme_nesrece.bind(this)
        this.vreme_prijema_poziva = this.vreme_prijema_poziva.bind(this)
        this.vreme_dolaska_spasilaca = this.vreme_dolaska_spasilaca.bind(this)
        this.trajanje_ukazivanja_pomoci = this.trajanje_ukazivanja_pomoci.bind(this)
        this.trajanje_transporta = this.trajanje_transporta.bind(this)
        this.vreme_zavrsetka_akcije = this.vreme_zavrsetka_akcije.bind(this)
        this.nacin_pruzanja_pomoci = this.nacin_pruzanja_pomoci.bind(this)
        this.meteoroloski_uslovi = this.meteoroloski_uslovi.bind(this)

        this.changeSelectedUcesnik = this.changeSelectedUcesnik.bind(this)

        this.dodajPovredu = this.dodajPovredu.bind(this)
        this.removePovreda = this.removePovreda.bind(this) 
        this.dodajUcesnika = this.dodajUcesnika.bind(this)   
        this.removeUcesnik = this.removeUcesnik.bind(this)    
    }


    
    ime(e){
        this.setState({ime_p: e.target.value})
    }
    prezime(e){
        this.setState({prezime_p: e.target.value})
    }
    mesto_rodjenja_p(e){
        this.setState({mesto_rodjenja_p: e.target.value})
    }
    pol_p(e){
        this.setState({pol_p: e.target.value})
    }
    adresa_p(e){
        this.setState({adresa_p: e.target.value})
    }
    ski_pas_p(e){
        this.setState({ski_pas_p: e.target.value})
    }
    smestaj(e){
        this.setState({smestaj: e.target.value})
    }
    licna_oprema(e){
        this.setState({licna_oprema: e.target.value})
    }
    vodja_akcije(e){
        this.setState({vodja_akcije: e.target.value})
    }
    opis_akcije_spasavanja(e){
        this.setState({opis_akcije_spasavanja: e.target.value})
    }
    mesto_predaje(e){
        this.setState({mesto_predaje: e.target.value})
    }
    datum(e){
        this.setState({datum: e.target.value})
    }
    vreme_predaje(e){
        this.setState({vreme_predaje: e.target.value})
    }
    predati_materijal(e){
        this.setState({predati_materijal: e.target.value})
    }
    primalac(e){
        this.setState({primalac: e.target.value})
    }
    mesto_nesrece(e){
        this.setState({mesto_nesrece: e.target.value})
    }
    vreme_nesrece(e){
        this.setState({vreme_nesrece: e.target.value})
    }
    vreme_prijema_poziva(e){
        this.setState({vreme_prijema_poziva: e.target.value})
    }
    vreme_dolaska_spasilaca(e){
        this.setState({vreme_dolaska_spasilaca: e.target.value})
    }
    trajanje_ukazivanja_pomoci(e){
        this.setState({trajanje_ukazivanja_pomoci: e.target.value})
    }
    trajanje_transporta(e){
        this.setState({trajanje_transporta: e.target.value})
    }
    vreme_zavrsetka_akcije(e){
        this.setState({vreme_zavrsetka_akcije: e.target.value})
    }
    meteoroloski_uslovi(e){
        this.setState({meteoroloski_uslovi: e.target.value})
    }
    nacin_pruzanja_pomoci(e){
        this.setState({nacin_pruzanja_pomoci: e.target.value})
    }
    changeSelectedUcesnik(e){
        this.setState({selectedUcesnik: e.target.value})
    }
    
    dodajPovredu(){
        let povreda = document.getElementById('input-povreda').value;
        if(povreda == ''){
            alert("Moras prvo uneti povredu!");
        }else{
            this.setState({vrste_povreda: [...this.state.vrste_povreda,povreda]});
            document.getElementById('input-povreda').value = '';                        
        }        
    }
    removePovreda(index){
        alert(index)
        let n = [...this.state.vrste_povreda]
        console.log(n)
        n.splice(index, 1);
        this.setState({vrste_povreda: n}) 
    }
    dodajUcesnika(){
        let ucesnik = this.state.neselektovaniUcesnici.filter(
            u => u.id == this.state.selectedUcesnik    
        ).pop()

        let neselektovaniUcesnici = this.state.neselektovaniUcesnici.filter(
            u => u.id != this.state.selectedUcesnik    
        ) 

        this.setState({neselektovaniUcesnici })
        this.setState({ucesnici: [...this.state.ucesnici,ucesnik]})
    }
    removeUcesnik(index){
        let ucesnici = [...this.state.ucesnici]
        let ucesnik = ucesnici[index];
        ucesnici.splice(index, 1);
        this.setState({ucesnici})
        this.setState({neselektovaniUcesnici: [...this.state.neselektovaniUcesnici,ucesnik]}) 
        this.setState({selectedUcesnik: ''})
    }

    submit(){
        axios.post('/povrednaLista/izradi', 
            this.state
            )
          .then( () => {
            window.location.href = '/povredneListe';
          })
    }

    render(){

        const clanoviSelect = clanovi.map((clan) => {
            return(<MenuItem key={clan.id} value={clan.id}>{"("+clan.username+") "+clan.name+" "+clan.prezime+" "+clan.nadimak}</MenuItem>)
        })

        const neselektovaniUcesniciOptions = this.state.neselektovaniUcesnici.map((clan) => {
            return(<MenuItem key={clan.id} value={clan.id}>{"("+clan.username+") "+clan.name+" "+clan.prezime+" "+clan.nadimak}</MenuItem>)
        })

        const povrede = this.state.vrste_povreda.map( (povreda,key) => {
            return(<tr key={key}><td className="col-10">{povreda}</td><td className="col-2"><button className="btn btn-danger" onClick={ () => { this.removePovreda(key) } } index={key} ><i className="fa fa-trash" ></i></button></td></tr>)
        })

        const slektovaniUcesniciRows = this.state.ucesnici.map( (ucesnik,key) => {
        return(<tr key={key}><td className="col-2">({ucesnik.username})</td><td className="col-3">{ucesnik.name}</td><td className="col-3">{ucesnik.prezime}</td><td className="col-2">{ucesnik.nadimak}</td><td className="col-2"><button className="btn btn-danger" onClick={ () => {this.removeUcesnik(key)}} index={key} ><i className="fa fa-trash" ></i></button></td></tr>)            
        } )

        return(
            <MuiThemeProvider theme={theme}>
            <div className="row justify-content-center">
                <div className="col-10 ">
                    <h1>Izrada povrene liste</h1>
                    <hr/>
                    <div className="card ">
                        <div className="card-header ">
                            <h3>Povredjeni</h3>
                        </div>
                        <div className="card-body"> 
                            <TextField label="Ime" margin="normal" fullWidth className="col-6" value={this.state.ime_p}  onChange={this.ime} />
                            <TextField label="Prezime" margin="normal" fullWidth className="col-6" value={this.state.prezime_p} onChange={this.prezime} />
                            <TextField label="Mesto rodjenja" margin="normal" fullWidth value={this.state.mesto_rodjenja_p} onChange={this.mesto_rodjenja_p} />
                            <FormControl>
                                <InputLabel htmlFor="age-simple">Pol</InputLabel>
                                <Select value={this.state.pol_p} onChange={this.pol_p} >
                                    <MenuItem value="">
                                    <em></em>
                                    </MenuItem>
                                    <MenuItem value='muski'>Muski</MenuItem>
                                    <MenuItem value='zenski'>Zenski</MenuItem>                                   
                                </Select>
                            </FormControl>
                            <TextField  value={this.state.adresa_p} label="Adresa" margin="normal" fullWidth onChange={this.adresa_p} />
                            <TextField value={this.state.ski_pas_p} label="Ski pas" margin="normal" fullWidth onChange={this.ski_pas_p} />
                            <TextField value={this.state.smestaj} label="Smestaj" margin="normal" fullWidth onChange={this.smestaj} />
                            <TextField value={this.state.licna_oprema} label="Licna oprema" margin="normal" fullWidth onChange={this.licna_oprema} />
                        </div>
                    </div>
                    <div className="card ">
                        <div className="card-header ">
                            <h3>Akcija spasavanja</h3>
                        </div>
                        <div className="card-body">
                            <TextField value={this.state.opis_akcije_spasavanja} label="Opis" multiline fullWidth margin="normal" onChange={this.opis_akcije_spasavanja} />    
                            <FormControl fullWidth>
                                <InputLabel htmlFor="age-simple">Vodja akcije</InputLabel>
                                <Select value={this.state.vodja_akcije} onChange={this.vodja_akcije} >
                                    <MenuItem value="">
                                    <em></em>
                                    </MenuItem>
                                    {clanoviSelect}
                                 </Select>
                            </FormControl>
                            <TextField value={this.state.mesto_predaje} label="Mesto predaje" margin="normal" fullWidth onChange={this.mesto_predaje} />
                            <TextField value={this.state.datum} label="Datum" type="date" margin="normal"  InputLabelProps={{shrink: true, }} fullWidth onChange={this.datum}  />
                            <TextField value={this.state.vreme_predaje} label="Vreme predaje" type="time" margin="normal"  InputLabelProps={{shrink: true, }} fullWidth onChange={this.vreme_predaje}  />
                            <TextField value={this.state.predati_materijal} label="Predati materijal"  margin="normal" fullWidth onChange={this.predati_materijal}  />
                            <FormControl fullWidth>
                                <InputLabel htmlFor="age-simple">Primalac</InputLabel>
                                <Select value={this.state.primalac} onChange={this.primalac} >
                                    <MenuItem value="">
                                    <em></em>
                                    </MenuItem>
                                    {clanoviSelect}
                                 </Select>
                            </FormControl>
                            <TextField value={this.state.mesto_nesrece} label="Mesto nesrece"  margin="normal" fullWidth InputLabelProps={{shrink: true, }} onChange={this.mesto_nesrece}  />
                            <TextField value={this.state.vreme_nesrece} label="Vreme nesrece" type="time"  margin="normal" InputLabelProps={{shrink: true, }} fullWidth onChange={this.vreme_nesrece}  />
                            <TextField value={this.state.vreme_prijema_poziva} label="Vreme prijema poziva" type="time"  margin="normal" InputLabelProps={{shrink: true, }} fullWidth onChange={this.vreme_prijema_poziva}  />
                            <TextField value={this.state.vreme_dolaska_spasilaca} label="Vreme dolsaska spasilaca" type="time"  margin="normal" fullWidth InputLabelProps={{shrink: true, }} onChange={this.vreme_dolaska_spasilaca}  />
                            <TextField value={this.state.trajanje_ukazivanja_pomoci} label="Trajanje ukazivanja pomoci"   margin="normal" fullWidth onChange={this.trajanje_ukazivanja_pomoci}  />
                            <TextField value={this.state.trajanje_transporta} label="Trajanje transporta"   margin="normal" fullWidth onChange={this.trajanje_transporta}  />
                            <TextField value={this.state.vreme_zavrsetka_akcije} label="Vreme zavrsetka akcije" type="time"  margin="normal" fullWidth onChange={this.vreme_zavrsetka_akcije}  InputLabelProps={{shrink: true, }} />
                            <TextField id="input-povreda"  label="Vrsta povrede"   margin="normal" fullWidth className="col-8" /><button className="btn btn-primary col-4" onClick={this.dodajPovredu} ><i className="fa fa-plus"></i> Dodaj</button>
                            <table className="table-responsive">
                                <tbody>
                                    {povrede}
                                </tbody>
                            </table>
                            <TextField value={this.state.nacin_pruzanja_pomoci} label="Nacin pruzanja pomoci"   margin="normal" fullWidth onChange={this.nacin_pruzanja_pomoci}  />
                            <TextField value={this.state.meteoroloski_uslovi} label="Meteoroloski uslovi"   margin="normal" fullWidth onChange={this.meteoroloski_uslovi}  />
                            <FormControl fullWidth className="col-8" >
                                <InputLabel htmlFor="age-simple">Ucesnici</InputLabel>
                                <Select value={this.state.selectedUcesnik} onChange={this.changeSelectedUcesnik}>
                                    <MenuItem value="">
                                    <em></em>
                                    </MenuItem>
                                    {neselektovaniUcesniciOptions}
                                 </Select>
                            </FormControl>
                            <button className="col-4 btn btn-primary" onClick={this.dodajUcesnika} ><i className="fa fa-plus"  ></i> Dodaj</button>
                            <table className="table-responsive">
                                <tbody>
                                    {slektovaniUcesniciRows}
                                </tbody>
                            </table>
                        </div>                    
                    </div>
                    <br/>
                    <button  className="btn btn-success btn-lg btn-block" onClick={this.submit} >Izradi</button>
                </div>
            </div>  
            </MuiThemeProvider>
        )
    }
}

if (document.getElementById('izrada-povredne-liste-div')) {
    ReactDOM.render(<IzradaPovredneListe />, document.getElementById('izrada-povredne-liste-div'));
}