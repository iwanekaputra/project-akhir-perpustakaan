@php

use App\Models\Peminjaman;

$notif = Peminjaman::latest()->where('keterangan_id', 1)->get();
// dd(count($notif));


@endphp





<div class="header">
  <div class="header-left">
    <div class="menu-icon dw dw-menu"></div>

  </div>
  <div class="header-right">
    <div class="dashboard-setting user-notification">
      <div class="dropdown">
        <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
          <i class="dw dw-settings2"></i>
        </a>
      </div>
    </div>

    <div class="user-notification">
      <div class="dropdown">
        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
          <i class="icon-copy dw dw-notification"></i>
          <span class="badge notification-active {{ count($notif) == 0 ? " d-none" : "" }}"></span>
        </a>
        @if (count($notif) != 0)
        <div class="dropdown-menu dropdown-menu-right">
          <div class="notification-list mx-h-350 customscroll">
            <ul>
              @foreach ($notif as $n)
              <li>
                <a href="{{ url('/admin/peminjam') }}">
                  <img class="rounded-circle" src="{{asset('img\hero\profile.png')}}" alt="" />
                  <h3>{{ $n->nama }}</h3>
                  <p>Telah mengajukan peminjaman buku</p>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        @endif
      </div>
    </div>
    <div class="user-info-dropdown">
      <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
          <span class="user-icon">
            <img src="{{asset('admin/vendors/images/photo1.jpg')}}" alt="" />
          </span>
          <span class="user-name">{{ Auth::user()->fullname }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
          <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">
              <i class="dw dw-logout"></i> Log Out
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>