<?php
$api_link = [
  'admin/api/server',
];
$api_aktif = in_array(str_replace(base_url(), '', current_url()), $api_link);
?>

<!-- Api -->
<li class="nav-item<?= $api_aktif ? ' menu-open' : ''  ?>">
  <a href="#" class="nav-link<?= $api_aktif ? ' active' : ''  ?>">
    <i class="nav-icon bi bi-person-circle"></i>
    <p>Api <i class="right bi bi-caret-left"></i></p>
  </a>
  <ul class="nav nav-treeview">

    <li class="nav-item">
      <a href="<?= url_to('admin/api/server') ?>" class="nav-link<?= (current_url() == base_url('admin/api/server')) ? ' active' : '' ?>">
        <i class="nav-icon bi bi-circle"></i>
        <p>Server</p>
      </a>
    </li>

  </ul>
</li>

<li class="nav-header">VENDOR</li>
<?= $this->include('layout/sidebar_vendor') ?>