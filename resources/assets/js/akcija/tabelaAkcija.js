import $ from "jquery";
import datatables from 'datatables.net-bs4';
$.DataTable = datatables;
import srpski from '../tabele/srpski.json';

function dajKorisnika(id) {
    return korisnici.filter((korisnik) => {
        return korisnik.id == id;
    })[0];
}

if (document.getElementById('tabela_akcija')) {
    $('#tabela_akcija').DataTable( {
        language: srpski,
        data: akcije,
        "columns": 
        [
            {"title": "Naziv" , "data": "naziv",
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                $(nTd).html("<a href='/akcija/"+oData.id+"'>"+oData.naziv+"</a>");
            } },
            {"title": "Datum", "data": "datum" },
            {"title": "Vodja", "data": "vodja_akcije",
            "fnCreatedCell": (nTd, sData, oData, iRow, iCol) => {
                    let korisnik = dajKorisnika(oData.vodja_akcije);
                $(nTd).html("<a href='/korisnik/"+oData.vodja_akcije+"'>"+korisnik.name+" "+korisnik.prezime+" "+korisnik.nadimak+"</a>");
            }  },
            {"title": "Napomena", "data": "napomena" }
        ]
    } );

}

