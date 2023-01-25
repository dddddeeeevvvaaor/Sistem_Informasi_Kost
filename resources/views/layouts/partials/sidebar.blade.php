<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="nav-link {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
      <img src="http://files.web.neo.id/08/a3/08a3e4e2-1504-4355-ac9c-3b8e878c92f6.jpg" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Sistem Informasi Kost</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
    @if (Auth::user()->role == 'admin')
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-home {{ (request()->segment(2) != 'dashboard') ? 'text-dark' : '' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'facilities') ? 'active' : '' }}" href="{{ route('facilities.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-hand-holding-heart {{ (request()->segment(1) != 'facilities') ? 'text-dark' : '' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Fasilitas Kamar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'roomTypes') ? 'active' : '' }}" href="{{ route('roomTypes.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-door-open {{ (request()->segment(1) != 'roomTypes') ? 'text-dark' : '' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Tipe Kamar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'rooms') ? 'active' : '' }}" href="{{ route('rooms.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-key {{ (request()->segment(1) != 'rooms') ? 'text-dark' : '' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Manajemen Kamar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'customers') ? 'active' : '' }}" href="{{ route('customers.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-users {{ (request()->segment(1) != 'customers') ? 'text-dark' : '' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Manajemen Customer</span>
        </a>
      </li>
      <li class="nav-item">
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'transactions' ? 'active' : '' }}" href="{{ route('transactions.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-credit-card {{ Request::segment(1) === 'transactions' ? '' : 'text-dark' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Pembayaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'messages') ? 'active' : '' }}" href="{{ route('messages.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-comments {{ (request()->segment(1) != 'messages') ? 'text-dark' : '' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Pesan</span>
        </a>
      </li>
    </ul>
    @else
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}" href="{{ route('customer.dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-home {{ (request()->segment(2) != 'dashboard') ? 'text-dark' : '' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'transactions' ? 'active' : '' }}" href="{{ route('transactions.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-credit-card {{ Request::segment(1) === 'transactions' ? '' : 'text-dark' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Pembayaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'messages' ? 'active' : '' }}" href="{{ route('messages.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-comments  {{ Request::segment(1) === 'messages' ? '' : 'text-dark' }}" style="font-size: 13px; top: 0px !important"></i>
          </div>
          <span class="nav-link-text ms-1">Pesan</span>
        </a>
      </li>
    </ul>
    @endif
  </div>
</aside>