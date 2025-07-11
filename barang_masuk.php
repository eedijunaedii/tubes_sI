<?php
    require './proses/F_barang_masuk.php';
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Barang Masuk</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php include 'sidebar.php'; ?>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light py-4 px-4">
                <div class="d-flex align-items-center me-auto">
                </div>
                <?php include 'header.php'; ?>
            </nav>
            <div class="container-fluid px-4">
                <div class="row px-3">
                    <div class="py-2 border-bottom">
                        <h1 class="h1 text-center">Transaksi Barang Masuk</h1>
                    </div>
                    <div class="row px-3 pt-3 pb-4" style="background: white; border-radius: 1em">
                        <div class="col-lg-12">
                            <div class="row g-5">
<!-- Tabel Data -->                            
                                <div class="col-lg-9">  
                                    <h4 class="text-center">Data Produk</h4>      
                                    <form method="POST" class="form-group d-flex justify-content-end mb-3">
                                        <input name="pencarian" class="form-control btn-light border-bottom rounded-0 shadow-none w-25" type="text" placeholder="Search" aria-label="Search" style="background: transparent; border: none; outline: hidden;">
                                        <button name="searchData" type="submit" class="btn shadow-none border-bottom rounded-0 btn-md"><i class="bi bi-search"></i></button>
                                    </form>
                                    <div class="table-responsive" style="max-height: 500px;">              
                                        <table class="table table-bordered border-dark align-middle text-center mx-auto" style="min-width: 800px;">                                    
                                            <thead class="bg-4 border-dark warna-2">
                                                <tr>
                                                    <th style="width: 8%;">No</th>
                                                    <th style="width: 17%;">ID Produk</th>
                                                    <th style="width: 45%;">Nama Produk</th>
                                                    <th style="width: 20%;">Merek</th>                    
                                                    <th style="width: 10%;">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-light border-dark text-center">
                                            <?php
                                                $no = 1;
                                                while ($row = mysqli_fetch_array($queryRead)){
                                                    echo '
                                                    <form>
                                                        <tr>
                                                            <td>'.$no++.'</td>
                                                            <td>'.$row['id_produk'].'</td>
                                                            <td>'.$row['nama'].'</td>
                                                            <td>'.$row['merek'].'</td>
                                                            <td>'.$row['stok'].'</td>
                                                        </tr>
                                                    </form>';
                                                }
                                            ?>  
                                            </tbody>
                                        </table>
                                    </div>                                         
                                </div>
<!-- Form Transaksi Masuk -->                                
                                <div class="col-lg-3">
                                    <h3 class="h4 mb-3 text-center">Form Barang Masuk</h3>
                                    <form method="POST" class="form-group">
                                        <label class="form-label mt-2">ID Produk</label> 
                                        <div class="d-flex justify-content">
                                            <select class="form-select" name="id_produk">
                                                <?php
                                                    while ($row = mysqli_fetch_array($queryID)){
                                                        echo '<option' ?> <?php if ($nowID == $row['id_produk']) { echo 'selected'; }?> <?php echo ' value='.$row['id_produk'].'>'.$row['id_produk'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <button type="submit" name="pilihID" class="btn btn-primary ms-2">Pilih</button>
                                        </div>
                                        <label class="form-label mt-2">Nama Produk</label>
                                        <input type="text" class="form-control" value="<?php echo $getRow['nama'] ?>" readonly>
                                        <label class="form-label mt-2">Merek</label>
                                        <input type="text" class="form-control" value="<?php echo $getRow['merek'] ?>" readonly>
                                        <label class="form-label mt-2">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control">
                                        <div class="d-flex justify-content-end mt-3" id="block">
                                            <button name="prosesMasuk" type="submit" class="btn btn-primary">Simpan</button> 
                                        </div>
                                        <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="alertModalLabel">PEMBERITAHUAN !</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">Proses Transaksi Barang ?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button name="prosesMasuk" type="submit" class="btn btn-primary">Proses</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>  
        </div>
    </div>
<!-- Javascript -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>
