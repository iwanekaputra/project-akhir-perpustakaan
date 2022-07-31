
<div class="left-side-bar">
		<div class="brand-logo">
			<a href="{{ route('buku') }}">
				<img src="{{asset('admin/src/images/logo.png')}}" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu"><br>
					<li>
						<a href="{{url('/admin/dashboard')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					
					<li>
						<a href="{{ url('/admin/peminjam') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user-2"></span><span class="mtext">Peminjam</span>
						</a>
					</li>
					<li>
						<a href="{{ url('/admin/buku') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-book-1"></span><span class="mtext">Data Buku</span>
						</a>
					</li>
					<li>
						<a href="{{ url('/admin/penerbit') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1"></span><span class="mtext">Data Penerbit</span>
						</a>
					</li>
					<li>
						<a href="{{ url('/admin/pengarang') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user2"></span><span class="mtext">Data Pengarang</span>
						</a>
					</li>
					<li>
						<a href="{{ url('/admin/rak') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">Data Rak</span>
						</a>
					</li>
					<li>
						<a href="{{ url('admin/user') }}"  class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user2"></span><span class="mtext">Data User</span>
						</a>
					</li>
					<li>
						<a href="{{ url('/admin/kategori') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-list3"></span><span class="mtext">Kategori Buku</span>
						</a>
					</li>
					
					<li>
						<a href="{{ url('admin/denda') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-notepad-2"></span><span class="mtext">Denda</span>
						</a>
					</li>
					<li>
						<a href="{{ route('transaksi') }}"  class="dropdown-toggle no-arrow">
							<span class="micon dw dw-notepad-1"></span><span class="mtext">Transaksi</span>
						</a>
					</li>
					
					
					<i class="icon-copy "></i>
						<div class="dropdown-divider"></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
