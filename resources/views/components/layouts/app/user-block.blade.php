@auth
    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button"
           aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="/hyper/images/a.png" alt="user-image" class="rounded-circle">
                                    </span>
            <span>
                                        <span class="account-user-name">{{ auth()->user()->full_name }}</span>
                                    <span class="account-position">{{  auth()->user()->role->label()  }}</span>
                                    </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
            <!-- item-->
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Добро пожаловать !</h6>
            </div>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="dropdown-item notify-item">
                <i class="mdi mdi-logout mr-1"></i>
                <span>Выход</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>


        </div>
    </li>

@endauth
