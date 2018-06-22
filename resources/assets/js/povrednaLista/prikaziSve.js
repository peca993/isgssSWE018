import $ from "jquery";
import datatables from 'datatables.net-bs4';
$.DataTable = datatables;
import srpski from '../tabele/srpski.json';

if (document.getElementById('povrednalista-table')) {
    $('#povrednalista-table').DataTable( {
        language: srpski,
        data: povredneListe,
        "columns": 
        [
            {"title": "Prikazi" , "data": "id",
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                $(nTd).html("<a class='btn btn-default btn-block' href='/povrednaLista/"+oData.id+"'>Prikazi</a>");
            } },
            {"title": "Datum", "data": "datum" },
            {"title": "Izradio", "data": "izradio",
            "fnCreatedCell": (nTd, sData, oData, iRow, iCol) => {
                axios.get('/korisnik/dajKorisnika/'+oData.izradio)
                    .then( (korisnik) => {
                        $(nTd).html("<a href='/korisnik/"+korisnik.data.id+"'>"+korisnik.data.name+" "+korisnik.data.prezime+" "+korisnik.data.nadimak+"</a>");  
                    })    
            }  },
            
        ]
    } );        
}
