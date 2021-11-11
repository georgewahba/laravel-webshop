    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
          Robbins bakery
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('dashboard') ? "active" : "" }}">
            <a class="nav-link" href="./dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('catagories') ? "active" : "" }}">
            <a class="nav-link" href="{{ url('catagories') }}">
              <i class="material-icons">person</i>
              <p>Catagories</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('addcatagories') ? "active" : "" }}">
            <a class="nav-link" href="{{ url('addcatagories') }}">
              <i class="material-icons">person</i>
              <p>Add Catagories</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('products') ? "active" : "" }}">
            <a class="nav-link" href="{{ url('products') }}">
              <i class="material-icons">person</i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('addproducts') ? "active" : "" }}">
            <a class="nav-link" href="{{ url('addproducts') }}">
              <i class="material-icons">person</i>
              <p>Add Products</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('stores') ? "active" : "" }}">
            <a class="nav-link" href="{{ url('stores') }}">
              <i class="material-icons">person</i>
              <p>Stores</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('addstore') ? "active" : "" }}">
            <a class="nav-link" href="{{ url('addstore') }}">
              <i class="material-icons">person</i>
              <p>Add Store</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('orders') ? "active" : "" }}">
            <a class="nav-link" href="{{ url('orders') }}">
              <i class="material-icons">content_paste</i>
              <p>orders</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('users') ? "active" : "" }}">
            <a class="nav-link" href="{{ url('users') }}">
              <i class="material-icons">person</i>
              <p>users</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('birthday') ? "active" : "" }}">
            <a class="nav-link" href="{{ url('birthday') }}">
              <i class="material-icons">person</i>
              <p>users birthday</p>
            </a>
          </li>
        </ul>
      </div>
    </div>