<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15"> </div>
    <div class="sidebar-brand-text mx-3">TOKO IKAN HIAS</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Charts -->
  <li class="nav-item">
  <a class="nav-link" href="<?php echo site_url('user/read');?>">
    <i class="fas fa-fw fa-users"></i>
    <span>User</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('kategori_barang/read');?>">
        <i class="fas fa-fw fa-book"></i>
        <span>Data Kategori Barang</span></a>
    </li>
  
  <!-- Nav Item - Charts -->
  <li class="nav-item ">
    <a class="nav-link" href="<?php echo site_url('barang/read');?>">
      <i class="fas fa-fw fa-book"></i>
      <span>Data Barang</span></a>
  </li>
  
  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('pelanggan/read');?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Data Pelanggan</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('jual/read');?>">
      <i class="fas fa-fw fa-book"></i>
      <span>Data Penjualan</span></a>
  </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('beli/read');?>">
      <i class="fas fa-fw fa-book"></i>
      <span>Data Pembelian</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('suplier/read');?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Data Suplier</span></a>
  </li>
  
  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>