<div class="sidebar">
  <div class="logo-details">
    <i class='bx bxs-message-check'></i>
    <span class="logo_name">E-Recruitement</span>
  </div>
  <ul class="nav-links">
  @can('isAdmin')
      <li class="{{ Request::is('dashboard-admin') ? 'active' : ''}}">
        <a href="/dashboard-admin">
          <i class='bx bx-layout fs-6'></i>
          <span class="link_name fs-6">Dashboard</span>
        </a>
      </li>
      <li class="{{ Request::is('rekrutmen*') ? 'active' : ''}}">
        <a href="/rekrutmen">
          <i class='bx bx-user-check fs-6'></i>
          <span class="link_name fs-6">Rekrutmen</span>
        </a>
      </li>
      <li class="{{ Request::is('kriteria*') || Request::is('subkriteria*') ? 'active' : ''}}">
        <div class="icon-link">
          <a href="#">
            <i class='bx bxs-user-detail fs-6'></i>
            <span class="link_name fs-6">Kriteria</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a href="/kriteria">Kriteria</a></li>
          <li><a href="/subkriteria">Nilai</a></li>
        </ul>
      </li>
      
      <li class="{{ Request::is('hitung-kriteria*') || Request::is('hitung-subkriteria*') || Request::is('prioritas-pelamar*') ? 'active' : ''}}">
        <div class="icon-link">
          <a href="#">
            <i class='bx bxs-analyse fs-6'></i>
            <span class="link_name fs-6">Analisa</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a href="/hitung-kriteria">Analisa Kriteria</a></li>
          <li><a href="/hitung-subkriteria">Analisa Nilai</a></li>
          <li><a href="/prioritas-pelamar">Rangking Pendaftar</a></li>
        </ul>
      </li>
      
      <li class="{{ Request::is('list-pelamar') ? 'active' : ''}}">
        <a href="/list-pelamar">
          <i class='bx bxs-user-account'></i>
          <span class="link_name fs-6">Pelamar</span>
        </a>
      </li>
  @endcan

  @can('pendaftar')
      <li class="{{ Request::is('dashboard-pelamar') ? 'active' : ''}}">
        <a href="/dashboard-pelamar">
          <i class='bx bx-layout fs-6'></i>
          <span class="link_name fs-6">Dashboard</span>
        </a>
      </li>
      <li class="{{ Request::is('daftar-rekrutmen*') ? 'active' : ''}}">
        <a href="/daftar-rekrutmen">
          <i class='bx bx-user-check fs-6'></i>
          <span class="link_name fs-6">Daftar Rekrutmen</span>
        </a>
      </li>
  @endcan
  </ul>
  <div class="name-tag rounded-3 text-center">
    <p style="margin-top:13px;">Hi, {{ auth()->user()->name }}</p>
  </div>
  <div class="down-section mt-3">
    <form action="/logout" method="post">
      @csrf
      <button class="btn-mid" type="submit">
        <i class='bx bx-log-out'></i> Logout
      </button>
    </form>
  </div>
</div>
<div class="menu-toggle"><i class='bx bx-menu'></i></div>

<script>
$(document).ready(function(){
  $('.menu-toggle').click(function(){
    $('.sidebar').toggleClass('active')
  })

  $('.name-tag').click(function(){
    location.href="/user-profile/{{ auth()->user()->id }}/edit"
  })
})
</script>