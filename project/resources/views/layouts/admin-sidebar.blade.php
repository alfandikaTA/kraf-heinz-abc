<ul class="menu">
  <li class="sidebar-title">Menu admin</li>
  <li class="sidebar-item {{ (request()->routeIs('admin.dashboard')) ? 'active' : '' }}">
      <a href="{{ route("admin.dashboard") }}" class='sidebar-link'>
          <i class="bi bi-grid-fill"></i>
          <span>Dashboard</span>
      </a>
  </li>
  <li class="sidebar-item {{ (request()->routeIs('admin.barang')) ? 'active' : '' }}">
      <a href="{{ route("admin.barang") }}" class='sidebar-link'>
          <i class="bi bi-box"></i>
          <span>Data Barang</span>
      </a>
  </li>
  <li class="sidebar-item {{ (request()->routeIs('admin.toko')) ? 'active' : '' }}">
    <a href="{{ route("admin.toko") }}" class='sidebar-link'>
        <i class="bi bi-shop"></i>
        <span>Data Toko</span>
    </a>
  </li>
  <li class="sidebar-item {{ (request()->routeIs('admin.pesanan')) ? 'active' : '' }}">
    <a href="{{ route("admin.pesanan") }}" class='sidebar-link'>
        <i class="bi bi-cart-fill"></i>
        <span>Data Pesanan Barang</span>
    </a>
  </li>
</ul>

<div class="p-3">
  <a class="btn btn-danger d-flex align-items-center justify-content-center" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    <i class="bi bi-box-arrow-left me-2"></i>Logout
  </a>

  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
    @csrf
  </form> 
</div>