<?php
session_start();
if (!isset($_SESSION['user'])) {
    return header('Location: http://localhost:81/Nadyaaptr/kantor_nnd/views/login/' );
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
  body {
      font-family: 'Open Sans', sans-serif;
      background-color: #F0DBAF ;
      margin: 0;
      padding:0;
      }
 </style>

  </head>
  <body>
        <nav class="navbar navbar-expand-lg "style="background-color: #DC8686;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Nanadd Net</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost:81/Nadyaaptr/kantor_nnd/views/dasboard/">Home</a>
                    </li>
                    <?php if ($_SESSION['user']['roll'] == "kasir") { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/penjualan/index.php'>Penjualan</a></li>
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/pembelian/index.php'>Pembelian</a></li>
                        </ul>
                    </li>
                    <?php }?>
                    <?php if ($_SESSION['user']['roll'] == "admin") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/User/'>Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/Barang/'>Barang</a>
                    </li>
                    <?php }?>
                    <?php if ($_SESSION['user']['roll'] == "Owner") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/User/'>Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/Barang/'>Barang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/penjualan/'>Penjualan</a></li>
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/pembelian/'>Pembelian</a></li>
                        </ul>
                    </li>
                    <?php }?>
                    <?php if ($_SESSION['user']['roll'] == "dev") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/User/'>Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/Barang/'>Barang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/penjualan/'>Penjualan</a></li>
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/views/pembelian/'>Pembelian</a></li>
                        </ul>
                    </li>
                <?php }?>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
        </nav>
        <div class="container px-4 text-left">
              <div class="row gx-1">
                <div class="col">
                <div class="p-4">
                    <div class="card" >
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">nnd ya</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="p-4">
                    <div class="card" >
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">nnd ya</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>