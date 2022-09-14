
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
          Toko Online
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('/') ? 'active':'' }}  ">
            <a class="nav-link" href="{{ url('/') }}">
              <i class="material-icons">home</i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('categories') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('categories') }}">
              <i class="material-icons">person</i>
              <p>Categories</p>
            </a>
          </li>
        
          <li class="nav-item {{ Request::is('products') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('products') }}">
              <i class="material-icons">person</i>
              <p>Products</p>
            </a>
          </li>
        
          <li class="nav-item {{ Request::is('users') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('users') }}">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('orders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('orders') }}">
              <i class="material-icons">content_paste</i>
              <p>Orders</p>
            </a>
          </li>
        
          <li class="nav-item ">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                <i class="material-icons">logout</i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </a>
          </li>
          
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>