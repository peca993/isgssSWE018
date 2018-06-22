import $ from "jquery";
import datatables from 'datatables.net-bs4';
$.DataTable = datatables;
import srpski from './srpski.json';


if (document.getElementById('tabelaKorisnika')) {
    
        if(user.admin != 1){
            $('#tabelaKorisnika').DataTable( {
                language: srpski,
                data: korisnici,
                "columns": 
                [
                    {"title": "ID" , "data": "username",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a href='/korisnik/"+oData.id+"'>"+oData.username+"</a>");
                    } },
                    {"title": "Ime", "data": "name" },
                    {"title": "Prezime", "data": "prezime" },
                    {"title": "Nadimak", "data": "nadimak" },
                    {"title": "Uloga", "data": "uloga" },
                    {"title": "Grad", "data": "grad" }
                ]
          
            } );    
        }else{
            $('#tabelaKorisnika').DataTable( {
                language: srpski,
                data: korisnici,
                "columns": 
                [
                    {"title": "ID" , "data": "username",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a href='/korisnik/"+oData.id+"'>"+oData.username+"</a>");
                    } },
                    {"title": "Ime", "data": "name" },
                    {"title": "Prezime", "data": "prezime" },
                    {"title": "Nadimak", "data": "nadimak" },
                    {"title": "Uloga", "data": "uloga" },
                    {"title": "Grad", "data": "grad" },
                    {"title": "Izmena" , "data": "username",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a class='btn btn-warning' href='/korisnik/"+oData.id+"/izmeni'><i class='fa fa-pencil-square-o'></i> Izmeni</a>");
                    } },
                    {"title": "Brisanje" , "data": "username",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html('');
                        $(nTd).append("<button  class='btn btn-danger' href='/asd'  ><i class='fa fa-trash'></i> Obrisi</button>").click(() => {
                            let potvrda = confirm('Da li zaista zelis da obrises '+oData.name+' '+oData.prezime+' ?');
                            if(potvrda){
                                window.location.href = '/korisnik/'+oData.id+'/obrisi';
                            }
                        });
                        
                    } }
                ]
          
            } );
        } 
    
    }
