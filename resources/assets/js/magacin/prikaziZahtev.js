import $ from "jquery";
import datatables from 'datatables.net-bs4';
$.DataTable = datatables;
import srpski from '../tabele/srpski.json';



if (document.getElementById('zahtev-tabela')) {
    console.log(zahtevanaOprema);
    
    $('#zahtev-tabela').DataTable( {
        language: srpski,
        data: zahtevanaOprema,
        "columns": 
        [
            {"title": "Oprema", "data": "id_oprema",
            "fnCreatedCell": (nTd, sData, oData, iRow, iCol) => {
                axios.get('/magacin/dajOpremu/'+oData.id_oprema)
                    .then( (o) => {
                        $(nTd).html("<a class='btn btn-block' href='/magacin/"+o.data.id+"'>"+o.data.naziv+" ("+o.data.kategorija+") "+oData.trazena_kolicina+"/"+o.data.kolicina+"</a>");  
                    })    
            }  }
        ]

  
    } );        
}
