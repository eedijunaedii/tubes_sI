<!-- Detail Modal -->     
    <div class="modal fade text-start" id="detail<?php echo $id_produk[$i] ?>" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Detail Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="./gambarLaptop/<?php echo $gambar[$i] ?>" style="height: 150px;">
                    </div>
                    <div class="invisible position-absolute">
                        <input type="text" class="form-control" name="id_produk" value="<?php echo $id_produk[$i] ?>" readonly>
                    </div>
                    <div class="row"> 
                        <div class="col px-auto mx-2">
                            <label for="firstName" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" value="<?php echo $nama[$i] ?>" readonly>
                        </div>             
                        <div class="col px-auto mx-2">
                            <label for="firstName" class="form-label">Merek</label>
                            <input type="text" class="form-control"  value="<?php echo $merek[$i] ?>" readonly>
                        </div>
                    </div>
                    <div class="row my-2">
                       <div class="col px-auto mx-2">
                            <label for="firstName" class="form-label">Kategori</label>
                            <input type="text" class="form-control" value="<?php echo $kategori[$i] ?>" readonly>
                        </div> 
                    </div>
                    <div class="row my-2">
                        <div class="col px-auto mx-2">
                            <label for="firstName" class="form-label">Stok</label>
                            <input type="number" class="form-control" value="<?php echo $stok[$i] ?>" readonly>
                        </div>
                        <div class="col px-auto mx-2">
                            <label for="firstName" class="form-label">Harga</label>
                            <input type="number" class="form-control" value="Rp. <?php echo number_format($harga[$i], 0, ',', '.')?>" readonly>
                        </div>    
                    </div> 
                    <div class="row my-2">
                        <div class="col px-auto mx-2">
                            <label for="firstName" class="form-label">Deskripsi Produk</label>
                            <input type="text" class="form-control" value="<?php echo $deskripsi[$i] ?>" readonly>
                        </div>   
                    </div>  
                    <div class="row py-1">
                            <div class="col-5 mt-1"><label>Gambar Produk</label></div>
                            <div class=col>
                                <input type="file" class="form-control form-box" name="gambar_produk">
                            </div>
                        </div>
                    <div class="row mt-3">  
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>                                     
                    </div>   
                </div>
            </div>
        </div>
    </div>
<!-- Modal Tambah Data -->
    <form method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="headerLabel">Tambah Data Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        <div class="row py-1">
                            <div class="col-5 mt-1"><label>Nama Produk</label></div>
                            <div class=col>
                                <input type="text" class="form-control form-box" name="nama">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-5 mt-1"><label>Merek</label></div>
                            <div class=col>
                                <input type="text" class="form-control form-box" name="merek">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-5 mt-1"><label>kategori</label></div>
                            <div class=col>
                                <input type="text" class="form-control form-box" name="kategori">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-5 mt-1"><label>harga</label></div>
                            <div class=col>
                                <input type="number" class="form-control form-box" name="harga">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="col-5 mt-1"><label>deskripsi</label></div>
                            <div class=col>
                                <input type="text" class="form-control form-box" name="deskripsi">
                            </div>
                        </div>
                        <div class="row mt-3">  
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alertTambahModal">Simpan</button>
                            </div>                                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade text-start" id="alertTambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Data sudah benar ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" name="createData">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form> 
<!-- Edit Modal -->     
    <form method="POST" class="form-group" enctype="multipart/form-data">
        <div class="modal fade text-start" id="edit<?php echo $id_produk[$i] ?>" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="./gambarLaptop/<?php echo $gambar[$i] ?>" style="height: 150px;">
                        </div>
                        <div class="invisible position-absolute">
                            <input type="text" class="form-control" name="id_produk" value="<?php echo $id_produk[$i] ?>">
                        </div>
                        <div class="row">                 
                            <div class="col px-auto mx-2">
                                <label for="firstName" class="form-label">Nama Produk</label>
                                <input type="text" name="nama" class="form-control"  value="<?php echo $nama[$i] ?>">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col px-auto mx-2">
                                <label for="firstName" class="form-label">Merek</label>
                                <input type="text" name="merek" class="form-control" value="<?php echo $merek[$i] ?>">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col px-auto mx-2">
                                <label for="firstName" class="form-label">Kategori</label>
                                <input type="text" name="kategori" class="form-control" value="<?php echo $kategori[$i] ?>">
                            </div>
                            <div class="col px-auto mx-2">
                                <label for="firstName" class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control" value="<?php echo $stok[$i] ?>">
                            </div>
                        </div> 
                        <div class="row my-2">
                            <div class="col px-auto mx-2">
                                <label for="firstName" class="form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?php echo $harga[$i] ?>">         
                            </div>   
                            <div class="col px-auto mx-2">
                                <label for="firstName" class="form-label">Deskripsi</label>
                                <input type="text" name="size_storage" class="form-control" value="<?php echo $deskripsi[$i] ?>">
                            </div>
                        </div>  
                        <div class="row mt-3">  
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alertEditModal<?php echo $id_produk[$i] ?>">Simpan</button>
                            </div>                                     
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade text-start" id="alertEditModal<?php echo $id_produk[$i] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Edit data <?php echo $id_produk[$i] ?> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" name="editData">Yes</button>
                    </div>
                </div>
            </div>
        </div>  
    </form>  
<!-- Tombol Konfirmasi Hapus -->
<form method="POST" class="form-group">
  <div class="modal fade text-start" id="hapus<?php echo $id_produk[$i] ?>" tabindex="-1" aria-labelledby="alertHapusModal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pemberitahuan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Hapus data <?php echo $id_produk[$i] ?>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

          <!-- Hidden input untuk mengirimkan id_produk -->
          <input 
            type="hidden" 
            name="id_produk" 
            value="<?php echo $id_produk[$i]; ?>"
          >

          <button name="hapusData" type="submit" class="btn btn-danger">Yes</button>
        </div>
      </div>
    </div>
  </div>
</form>

