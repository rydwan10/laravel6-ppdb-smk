<nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
          <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
     </ul>

     <ul class="navbar-nav ml-auto">
          @guest
          <li class="nav-item">
               <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
               <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
               <a class="btn btn-danger mr-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
               </form>
          @endguest
     </ul>



</nav>