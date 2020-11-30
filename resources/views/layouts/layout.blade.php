<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>RingCeram</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="/css/main.css"  rel="stylesheet">
      
    </head>
    <body>
        <nav >
            <div class="header">
        <h3 class="mt-2 ml-2">Ring Ceram</h3>
        <ul>
            <li><a href="/">Home</a></li>
        <li><a  href="/products">Stock</a></li>
      <li> <a href="/commandes" >Commandes</a></li>
      <li> <a href="/sales" >Ventes</a></li>
     </ul>
 </div>
     
        <ul>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      
         </nav>
        @yield('content')
        <footer>
            @Copyright 2020 Ring Ceram
        </footer>
        <script>

            function searchProduct(event){

                const search = document.getElementById('searchP');
             const rows = document.querySelectorAll('tbody tr');


                const q =event.target.value.toLowerCase();

                rows.forEach(row => {
                    row.querySelector('td').textContent.toLowerCase().startsWith(q) 
                    ?(row.style.display='')
                    : row.style.display='none';
                })

            }

            function searchCommande(event){
                const search = document.getElementById('searchC');
                const rows = document.querySelectorAll('tbody tr');

                const q =event.target.value.toLowerCase();

                rows.forEach(row => {
                    row.querySelector('#name').textContent.toLowerCase().startsWith(q) 
                    ?(row.style.display='')
                    : row.style.display='none';
                })

            }





        </script>
    </body>
    </html>