<?php
    require './proses/F_data_laptop.php';
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Data Laptop</title>
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
            <div class="row py-2 mx-1">
                <h3 class="h3 mb-3 text-center pt-3">Data Produk</h3>
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <button type="button" class="btn btn-primary mb-4" style="width: 160px;" data-bs-toggle="modal" data-bs-target="#tambahData"><i class="fas fa-plus-circle me-3"></i>Tambah Data</button>
                    </div>
                    <div class="col">
                        <form method="POST" class="form-group d-flex justify-content-end">
                            <input name="pencarian" class="form-control border-bottom rounded-0 shadow-none w-50" type="text" placeholder="Search" style="background: transparent; border: none; outline: hidden;">
                            <button name="searchData" type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
<!-- Tabel Data -->
                <div class="table-responsive" style="max-height: 65vh;">
                    <table class="table table-bordered border-dark align-middle mx-auto text-center" style="min-width: 1000px;">		              	
                        <thead class="bg-4 warna-2 text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Merek</th>
                                <th>Kategori</th>
                                <td>Stok</td>
                                <td>Harga</td>
                                <th>Deskripsi</th>                    
                                <th style="width: 160px;">Aksi</th>                    
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            $i = 0;
                            while ($row = mysqli_fetch_array($queryRead)){
                                $id_produk[$i] = $row['id_produk'];
                                $nama[$i] = $row['nama'];
                                $merek[$i] = $row['merek'];
                                $kategori[$i] = $row['kategori'];
                                $stok[$i] = $row['stok'];
                                $harga[$i] = $row['harga'];
                                $deskripsi[$i] = $row['deskripsi'];
                                ?>
                                <div class="invisible position-absolute">
                                    <input type="text" class="form-control" name="id_produk" value="<?php echo $id_produk[$i] ?>" readonly>
                                </div>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $nama[$i] ?></td>
                                    <td><?php echo $merek[$i] ?></td>
                                    <td><?php echo $kategori[$i] ?></td>
                                    <td><?php echo $stok[$i] ?></td>
                                    <td>Rp. <?php echo number_format($harga[$i], 0, ',', '.')?></td>
                                    <td><?php echo $deskripsi[$i] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?php echo $id_produk[$i] ?>" readonly><i class="bi bi-search"></i></button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id_produk[$i] ?>" readonly><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $id_produk[$i] ?>" readonly><i class="bi bi-trash"></i></button>
                                        <?php include 'M_Laptop.php'; ?>
                                    </td>                
                                </tr><?php
                            }
                        ?>                                   
                        </tbody>
                    </table>
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
