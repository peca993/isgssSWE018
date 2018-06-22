      @guest
      <nav class="navbar navbar-expand-md navbar-dark bg-primary">
      @endguest
      @auth
      @if(Auth::user()->admin)
      <nav class="navbar navbar-expand-md navbar-dark bg-danger">
      @else
      <nav class="navbar navbar-expand-md navbar-dark bg-primary">
      @endif
      @endauth
      <a class="navbar-brand" href="/"><i class="fa fa-angle-left"></i>isGSS/<i class="fa fa-angle-right"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">     
        @auth 

        <ul class="navbar-nav mr-auto">
            
            <!-- Home -->
            <li class="nav-item ">
              <a class="nav-link" href="/home"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
          
          <!-- Korisnik -->
          <li class="nav-item dropdown">
            <a  class="nav-link dropdown-toggle" href="#" id="dropdownKorisnik" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Korisnik</a>
            <div class="dropdown-menu" aria-labelledby="dropdownKorisnik">
            @if(Auth::user()->admin)
              <a class="dropdown-item" href="/korisnik/dodaj"><i class="fa fa-user-plus"></i> Dodaj</a>
             @endif  
              <a class="dropdown-item" href="/korisnici"><i class="fa fa-users"></i> Korisnici</a>
            </div>
          </li>

        <!-- Akcije -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownAkcije" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fighter-jet"></i> Akcije</a>
            <div class="dropdown-menu" aria-labelledby="dropdownAkcije">
                @if(Auth::user()->uloga == 'Spasilac' || Auth::user()->uloga == 'Magacioner' )
                <a class="dropdown-item" href="/akcija/kreiraj"><i class="fa fa-plus"></i> Kreiraj</a>
                @endif  
              <a class="dropdown-item" href="/akcije"><i class="fa fa-rocket"></i> Akcije</a>
            </div>
        </li>

        <!-- Magacin -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownMagacin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-stack-overflow"></i> Magacin</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMagacin">
                @if(Auth::user()->uloga == 'Magacioner' )
                <a class="dropdown-item" href="/magacin/dodaj"><i class="fa fa-plus"></i><i class="fa fa-cube"></i> Dodaj opremu</a>
                <a class="dropdown-item" href="/magacin/o/zahtevi"><i class="fa fa-list-alt"></i> Zahtevi <span class="badge badge-danger" id="zahtevi-navbar-obavestenje"></span></span> </a>                
                @endif  
                <a class="dropdown-item" href="/magacin"><i class="fa fa-cubes"></i> Oprema</a>
                @if(Auth::user()->uloga == 'Magacioner' ||Auth::user()->uloga ==  'Spasilac' )
                <a class="dropdown-item" href="/magacin/o/zaduzi"><i class="fa fa-wpforms"></i> Zaduzi</a>
                @endif
            </div>
        </li>

        <!-- Povredna lista -->
        @if(Auth::user()->uloga != 'Neaktivan clan' )
        <li class="nav-item dropdown">    
            <a class="nav-link dropdown-toggle" href="#" id="dropdownPovrednaLista" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-medkit"></i> Povredna lista</a>
                <div class="dropdown-menu" aria-labelledby="dropdownPovrednaLista">
                    @if(!Auth::user()->admin)
                    <a class="dropdown-item" href="/povrednaLista/izradi"><i class="fa fa-ambulance"></i> Izradi</a>
                    @endif
                    <a class="dropdown-item" href="/povredneListe"><i class="fa fa-hospital-o"></i> Povredne liste <span class="badge badge-danger" id="zahtevi-navbar-obavestenje"></span></span> </a>                
                </div>
        </li>
        @endif    

        @endauth

        </ul>

        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Uloguj se') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        @if(Auth::user()->admin) <i class="fa fa-user-secret"></i> @else<i class="fa fa-user-circle-o"></i> @endif {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if(!Auth::user()->admin)
                                    <a class="dropdown-item" href="/korisnik/{{Auth::user()->id}}" >
                                        Moj profil
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Izloguj se') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
      </div>
    </nav>