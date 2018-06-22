import $ from "jquery";
import datatables from 'datatables.net-bs4';
$.DataTable = datatables;
import srpski from '../tabele/srpski.json';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class PretragaMagacina extends Component {
    
}

if (document.getElementById('tabelaMagacin')) {
        if(user.uloga != 'Magacioner'){
            $('#tabelaMagacin').DataTable( {
                language: srpski,
                data: oprema,
                "columns": 
                [
                    {"title": "ID" , "data": "id",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a href='/magacin/"+oData.id+"'>"+oData.id+"</a>");
                    } },
                    {"title": "Naziv", "data": "naziv" },
                    {"title": "Kategorija", "data": "kategorija" },
                    {"title": "Kolicina", "data": "kolicina" },
                    {"title": "Zauzeto", "data": "zauzeto" }
                ]
          
            } );    
        }else{
            $('#tabelaMagacin').DataTable( {
                language: srpski,
                data: oprema,
                "columns": 
                [
                    {"title": "ID" , "data": "id",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a href='/magacin/"+oData.id+"'>"+oData.id+"</a>");
                    } },
                    {"title": "Naziv", "data": "naziv" },
                    {"title": "Kategorija", "data": "kategorija" },
                    {"title": "Kolicina", "data": "kolicina" },
                    {"title": "Zauzeto", "data": "zauzeto" },
                    {"title": "Izmena" , "data": "naziv",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a class='btn btn-warning' href='/magacin/"+oData.id+"/izmeni'><i class='fa fa-pencil-square-o'></i> Izmeni</a>");
                    } },
                    {"title": "Brisanje" , "data": "naziv",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html('');
                        $(nTd).append("<button  class='btn btn-danger'  ><i class='fa fa-trash'></i> Obrisi</button>").click(() => {
                            let potvrda = confirm('Da li zaista zelis da obrises '+oData.naziv+'?');
                            if(potvrda){
                                window.location.href = '/magacin/'+oData.id+'/obrisi';
                            }
                        });
                        
                    } }
                ]
          
            } );
        }
    }
