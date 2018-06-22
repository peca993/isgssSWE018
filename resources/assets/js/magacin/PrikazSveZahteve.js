import $ from "jquery";
import datatables from 'datatables.net-bs4';
$.DataTable = datatables;
import srpski from '../tabele/srpski.json';



if (document.getElementById('zahtevi-tabela')) {
    console.log(zahtevi);
    
    $('#zahtevi-tabela').DataTable( {
        language: srpski,
        data: zahtevi,
        "columns": 
        [
            {"title": "Prikazi" , "data": "id",
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                $(nTd).html("<a class='btn btn-default btn-block' href='/magacin/zahtev/"+oData.id+"'>Prikazi</a>");
            } },
            {"title": "Datum", "data": "datum_od" },
            {"title": "Spasilac", "data": "korisnik_id",
            "fnCreatedCell": (nTd, sData, oData, iRow, iCol) => {
                axios.get('/korisnik/dajKorisnika/'+oData.korisnik_id)
                    .then( (korisnik) => {
                        $(nTd).html("<a href='/korisnik/"+korisnik.data.id+"'>"+korisnik.data.name+" "+korisnik.data.prezime+" "+korisnik.data.nadimak+"</a>");  
                    })    
            }  },
            {"title": "Napomena", "data": "napomena" }
        ],
        "createdRow": function( row, data, dataIndex){
            if( !data.odobren){
                $(row).addClass('table-danger');
            }
        }
    } );        
}

if (document.getElementById('zahtevi-navbar-obavestenje')) {

    axios.get('/magacin/o/kolikoZahteva')
        .then( (brZaheva) => {
            if(brZaheva.data > 0)
            document.getElementById('zahtevi-navbar-obavestenje').innerHTML = brZaheva.data;
        })
   
}
