<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', '4EGames') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ Route('home') }}" class="nav-link">{{__('Home')}}<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('gaming') }}" class="nav-link">{{ __('Gaming')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('merchandise') }}" class="nav-link">{{__('Merchandise')}}</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('faq') }}" class="nav-link">{{__('F.A.Q')}}</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('contact') }}" class="nav-link">{{ __('Contact') }}</span></a>
                </li>
            </ul>
            <form class="navbar-form navbar-link" style="padding: 0; margin: 0; margin-top: 6px">

                    <div class="form-group" style="display: inline-block">
                        <input type="text" class="form-control" name="searchProduct">
                    </div>
                    <button type="submit" class="btn btn-success" style="margin: 0; margin-bottom: 4px">{{ __('Submit') }}</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{Route('fav')}}" class="nav-link"><i class="fa fa-heart" style="font-size:25px"></i><i id="cantFav">0</i></a></li>
                <li class="nav-item"><a href="{{Route('cart')}}" class="nav-link"><i class="fa fa-shopping-cart" style="font-size:25px"></i><i id="cantProd">0</i></a></li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               {{ __('My account') }}
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="navbarDropdown">
                <ul class="text-center" style="margin: 0; padding: 0">
                    @if (!Auth::user())
                    <li class="dropdown-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="dropdown-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    {{-- <div class="dropdown-divider"></div> --}}
                    <li class="dropdown-item" href="#">{{ __('Terms and conditions')}}</li>
                    @else
                    @if (Auth::user()->image)
                        <li class="dropdown-item"><img src="{{ Auth::user()->image }}" class="picture img-thumbnail"></li>
                    @else
                        <li class="dropdown-item">
                            <img src="/storage/img/users/default/anonymous.png" class="picture img-thumbnail">
                        </li>
                    @endif
                    <li role="separator" class="divider dropdown-item"></li>
                    @if (Auth::user()->isAdmin == 1)
                        <li class="text-title dropdown-item text-blue">
                            {{ Auth::user()->name }} {{ (Auth::user()->lastname != 'undefine') ? Auth::user()->lastname : ''}}
                            <button class="btn btn-danger btn-block btnAdmin">Administrador</button>
                        </li>
                    @else
                        <li  class="dropdown-item text-title">
                            {{ Auth::user()->name }} {{ (Auth::user()->lastname != 'undefine') ? Auth::user()->lastname : ''}}
                            <button class="btn btn-success btn-block">Usuario</button>
                        </li>


                    @endif
                    
                <li  role="separator" class="divider dropdown-item"></li>
                <li class="dropdown-item"><a href="{{ Route('profile')}}">{{__('Profile')}}</a></li>
                <li class="dropdown-item" href="messages">{{ __('Messages')}}</li>
                <li class="dropdown-item" role="separator" class="divider"></li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();
                                localStorage.setItem('cartList','');
                                localStorage.setItem('favList','');">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endif
                </ul>
            </div>
        </li>
    </div>
  </nav>