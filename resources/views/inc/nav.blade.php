
<nav style="background-color:navy; color:white;" class="navbar navbar-expand-md navbar-default navbar-fixed-top navbar-laravel ">
            <div class="container">
                <a style="color:#51dfa0;" class="navbar-brand" href="{{ url('/') }}">
                  Home | {{ config('app.name', 'WebtecHub') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span style="color:white" class="navbar-toggler-icon">Menu</span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul style="color:white;" class="navbar-nav mr-auto">

          <li class="nav-item active">
        <a style="color:white;" class="nav-link" href="/books">Tutorials<span class="sr-only">(current)</span></a>
      </li>&nbsp;&nbsp;
      @if(Auth::user())
   @if(Auth::user()->email=='simonnabuko@gmail.com')
   <li class="nav-item">
      <a style="color:white;" class="nav-link " href="/books/create">Add Tutorials</a>
    </li>&nbsp;&nbsp;
@endif
@endif   

      <li class="nav-item">
        <a style="color:white;" class="nav-link " href="/tutorials">e-Books</a>
      </li>
      <li class="nav-item">
        <a style="color:white;" class="nav-link " href="/groups/index">Join Groups</a>
      </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a style="color:#51dfa0;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="color:#51dfa0;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a style="color:#51dfa0; id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user())
                                    @if(Auth::user()->email=='simonnabuko@gmail.com')
                                    <a style="color:#51d8af; class="dropdown-item" href="/dashboard"
                                    >
                             Dashboard
                                 </a>
                                 @endif
                                 @endif 



                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
