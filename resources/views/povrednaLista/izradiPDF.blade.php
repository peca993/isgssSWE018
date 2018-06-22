    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-yw4l{vertical-align:top}
    </style>
    <table class="tg" style="undefined;table-layout: fixed; width: 100%">
    <colgroup>
    <col style="width: 25%">
    <col style="width: 25%">
    <col style="width: 25%">
    <col style="width: 25%">
    </colgroup>
      <tr>
        <th class="tg-yw4l"></th>
        <th class="tg-yw4l">Ime</th>
        <th class="tg-yw4l">Prezime</th>
        <th class="tg-yw4l">Mesto rodjena</th>
      </tr>
      <tr>
        <td class="tg-yw4l">Povredjeni</td>
        <td class="tg-yw4l">{{$povrednaLista->ime_p}}</td>
        <td class="tg-yw4l">{{$povrednaLista->prezime_p}}</td>
        <td class="tg-yw4l">{{$povrednaLista->mesto_rodjenja_p}}</td>
      </tr>
    </table>

    <ul>
        <p>
            <b>Pol:</b> {{$povrednaLista->pol_p}}
        </p>
        <p>
            <b>Adresa:</b> {{$povrednaLista->adresa_p}}
        </p>
        <p>
            <b>Ski pas:</b> {{$povrednaLista->ski_pas_p}}
        </p>
        <p>
            <b>Smestaj:</b> {{$povrednaLista->smestaj}}
        </p>
    </ul>
    <hr>
    <h4>Opis akcije spasavanja:</h4>
    <p>
        {{$povrednaLista->opis_akcije_spasavanja}}
    </p>
    <p><b>Vodja akcije:</b> {{$vodjaAkcije->username.' '.$vodjaAkcije->name.' '.$vodjaAkcije->prezime.' '.$vodjaAkcije->nadimak}} </p>
    <p><b>Mesto predaje:</b> {{$povrednaLista->mesto_predaje}}</p>
    <p><b>Datum:</b> {{$povrednaLista->datum}}</p>
    <p><b>Vreme predaje:</b> {{$povrednaLista->vreme_predaje}}</p>
    <p><b>Predati materijal:</b> {{$povrednaLista->predati_materijal}}</p>
    <p><b>Primalac:</b> {{$primalac->username.' '.$primalac->name.' '.$primalac->prezime.' '.$primalac->nadimak}}</p>
    <p><b>Mesto nesrece:</b> {{$povrednaLista->mesto_nesrece}}</p>
    <p><b>Vreme nesrece:</b> {{$povrednaLista->vreme_nesrece}}</p>
    <p><b>Vreme prijema poziva:</b> {{$povrednaLista->vreme_prijema_poziva}}</p>
    <p><b>Vreme dolaskaspasilaca:</b> {{$povrednaLista->vreme_dolaska_spasilaca}}</p>
    <p><b>Trajanje ukazivanja pomoci:</b> {{$povrednaLista->trajanje_ukazivanja_pomoci}}</p>
    <p><b>Trajanje transporta:</b> {{$povrednaLista->trajanje_transporta}}</p>
    <p><b>Vreme zavrsetka akcije:</b> {{$povrednaLista->vreme_zavrsetka_akcije}}</p>
    <p><b>Meteoroloski uslovi:</b> {{$povrednaLista->meteoroloski_uslovi}}</p>
    <p><b>Povrede:</b></p>
    <ul>
    @foreach($vrstePovreda as $povreda)
        <li>{{$povreda->vrsta}}</li>
    @endforeach
    </ul>
    <p><b>Nacin pruzanja pomoci:</b> {{$povrednaLista->nacin_pruzanja_pomoci}}</p>
    