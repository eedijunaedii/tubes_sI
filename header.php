<?php 
    // Pastikan $id_user sudah tersedia di halaman yang memanggil file ini
    // Misalnya, melalui file session.php yang sudah di-include di halaman utama
?>
<div class="dropdown">
    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw me-3"></i>Pengaturan Akun</a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li>
            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id_user ?>">
            <i class="fas fa-cog me-3"></i>Ubah Password</button>
        </li>
        <div class="dropdown-divider"></div>
        <li><a class="dropdown-item text-danger" href="/sistem_vapestore/logout.php" name="logout"><i class="fas fa-sign-out-alt me-3"></i>Logout</a></li>
    </ul>
</div>