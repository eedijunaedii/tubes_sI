<?php
    function active($currect_page){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
        $url = end($url_array);  
        if($currect_page == $url){
            echo 'active-bar';
        } else {
            echo 'warna-2';
        }
    }
?>
<!-- Sidebar -->
    <div class="bg-4" id="sidebar-wrapper">
        <div class="list-group list-group-flush my-3">
            <a href="index.php" class="list-group-item list-group-item-action bg-4 fw-bold text-nowrap<?php active('index.php');?>"><i class="bi bi-house me-2"></i>Dashboard</a>
            <a href="data_produk.php" class="list-group-item list-group-item-action bg-4 fw-bold text-nowrap <?php active('data_produk.php');?>"><i class="bi bi-laptop me-2"></i>Data Produk</a>
            <a href="barang_masuk.php" class="list-group-item list-group-item-action bg-4 fw-bold text-nowrap <?php active('barang_masuk.php');?>"><i class="bi bi-box-arrow-in-down me-2"></i>Barang Masuk</a>
            <a href="barang_keluar.php" class="list-group-item list-group-item-action bg-4 fw-bold text-nowrap <?php active('barang_keluar.php');?>"><i class="bi bi-box-arrow-up me-2"></i>Barang Keluar</a>
            <a href="rekap_transaksi.php" class="list-group-item list-group-item-action bg-4 fw-bold text-nowrap <?php active('rekap_transaksi.php');?>"><i class="bi bi-box-arrow-in-down me-2"></i>Riwayat Transaksi</a>
            <a href="kelola_user.php" class="list-group-item list-group-item-action bg-4 fw-bold text-nowrap <?php active('kelola_user.php');?>"><i class="bi bi-people me-2"></i>Kelola User</a>
        </div>
    </div>
    <form method="POST">
        <div class="modal fade" id="edit<?php echo $id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="invisible position-absolute">
                            <input type="text" class="form-control" name="id_user" value="<?php echo $rowSet['id_user'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-5 mt-1"><label>Username</label></div>
                            <div class=col>
                                <input class="form-control" name="username" type="text" readonly value="<?php echo $rowSet['username'] ?>"><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 mt-1"><label>Nama</label></div>
                            <div class=col>
                                <input class="form-control" name="nama" type="text" readonly value="<?php echo $rowSet['nama'] ?>"><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 mt-1"><label>No HP</label></div>
                            <div class=col>
                                <input class="form-control" name="no_hp" type="number" readonly value="<?php echo $rowSet['no_hp'] ?>"><br>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-5 mt-1"><label>Password Lama</label></div>
                            <div class=col>
                                <input class="form-control" name="password_lama" type="password" placeholder="Masukan Password lama"><br>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-5 mt-1"><label>Password Baru</label></div>
                            <div class=col>
                                <input class="form-control" name="password_baru" type="password" placeholder="Masukkan password baru"><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row mt-3">  
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Keluar</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alertEditModal">Simpan</button>
                                </div>                                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="alertEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Edit data ID User <?php echo $rowSet['id_user'] ?>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" name="eksekusiEdit">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        
