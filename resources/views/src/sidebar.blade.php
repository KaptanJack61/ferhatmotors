<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{ route('control-panel') }}" class="sidebar-brand">
        Ferhat<span>Motors</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">#</li>
        <li class="nav-item">
          <a href="{{ route('control-panel') }}" class="nav-link" aria-controls="dashboard">
            <i class="link-icon" data-feather="command"></i>
            <span class="link-title passive">Pano</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('advert-sold') }}" role="button" aria-controls="adverts">
            <i class="link-icon" data-feather="shopping-bag"></i>
            <span class="link-title">Satılan Araçlar</span>
          </a>
        </li>


        <li class="nav-item nav-category">Menü</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#adverts" role="button" aria-expanded="false" aria-controls="adverts">
            <i class="link-icon" data-feather="list"></i>
            <span class="link-title">Araçlar</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="adverts">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('advert-new') }}" class="nav-link">Yeni Araç</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('advert-all') }}" class="nav-link">Tüm Araçlar</a>
              </li>

              <li class="nav-item">
                <a href="{{ route('advert-on-sale') }}" class="nav-link">Satıştaki Araçlar</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('advert-sold') }}" class="nav-link">Satılan Araçlar</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#customers" role="button" aria-expanded="false" aria-controls="customers">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Müşteriler</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="customers">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('customer-all') }}" class="nav-link">Tüm Müşteriler</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer-new') }}" class="nav-link">Yeni Müşteri</a>
              </li>


            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button" aria-expanded="false" aria-controls="users">
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">Kullanıcılar</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="users">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('users') }}" class="nav-link">Tüm Kullanıcılar</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user-new') }}" class="nav-link">Yeni Kullanıcı</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#reports" role="button" aria-expanded="false" aria-controls="reports">
            <i class="link-icon" data-feather="file"></i>
            <span class="link-title">Raporlar</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="reports">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('report-revenue') }}" class="nav-link">Gelir Raporları</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report-expense') }}" class="nav-link">Gider Raporları</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav-category">Ayar</li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('system') }}">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">Sistem Ayarları</span>
          </a>
        </li>

        <li class="nav-item nav-category">Yardım</li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('htu') }}">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Nasıl Kullanılır?</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('support') }}">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Teknik Destek</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
