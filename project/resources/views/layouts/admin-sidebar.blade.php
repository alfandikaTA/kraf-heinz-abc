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
          <i class="bi bi-grid-fill"></i>
          <span>Data Barang</span>
      </a>
  </li>
  <li class="sidebar-item {{ (request()->routeIs('admin.toko')) ? 'active' : '' }}">
    <a href="{{ route("admin.toko") }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Data Toko</span>
    </a>
  </li>
  <li class="sidebar-item {{ (request()->routeIs('admin.pesanan')) ? 'active' : '' }}">
    <a href="{{ route("admin.pesanan") }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Data Pesanan Barang</span>
    </a>
  </li>
</ul>