<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">Menu</li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard')}}">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title">Podsumowanie</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('addMeal')}}">
        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
        <span class="menu-title">Dodaj posiłek</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('savedMeals')}}">
        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
        <span class="menu-title">Ulubione posiłki</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('changePass')}}">
        <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
        <span class="menu-title">Zmień hasło</span>
      </a>
    </li>
    <li class="nav-item sidebar-user-actions" style="margin-top:30px">
      <div class="user-details">
            <div class="nav-link">
              <form method="GET" action="{{ route('logout') }}">
                @csrf
                <input type='submit' class="btn btn-danger btn-fw" value="Wyloguj się">
              </form>
            </div>
      </div>
    </li>
  </ul>
</nav>