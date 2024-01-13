<?php
session_start();
if (!isset($_SESSION['user'])) {
    return header('Location: http://localhost:81/Nadyaaptr/kantor_nnd/views/login//' );
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penjualan - Konterku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <style>
        body {
            padding-top: 10px;
            background-color: #F0DBAF;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #DC8686;
            color: #fff;
        }

        .navbar-brand {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-size: 1rem;
        }

        .card {
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #DC8686;
            color: #fff;
            border-radius: 15px 15px 0 0;
        }

        .btn-success {
            background-color: #E9967A;
            border-color: #E9967A;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #E9967A;
            border-color: #E9967A;
        }

        #message {
            margin-top: 20px;
        }

        .table {
            background-color: #fff;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .btn-close {
            color: #fff;
        }
    </style>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <?php if ($_SESSION['user']['roll'] == "kasir") { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/view/penjualan/index.php'>Penjualan</a></li>
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/view/pembelian/index.php'>Pembelian</a></li>
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
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/view/pembelian/index.php'>Pembelian</a></li>
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
                            <li><a class="dropdown-item" href='http://localhost:81/Nadyaaptr/kantor_nnd/view/pembelian/index.php'>Pembelian</a></li>
                        </ul>
                    </li>
                <?php }?>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
        </nav>
        <div id="message">
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-sm-9">SELLS</div>
                    <div class="col col-sm-3">
                        <a href="http://localhost:81/Nadyaaptr/kantor_nnd/views/penjualan/add.php" class="btn btn-success btn-sm float-end">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="sample_data">
                        <thead>
                            <tr>
                                <th>Id Transaksi</th>
                                <th>Tanggal Penjualan</th>
                                <th>Customer</th>
                                <th>Kasir</th>
                                <th>Grand Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="action_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="sample_form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dynamic_modal_title"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="trxid" id="trxid" class="form-control" />
                                <span id="trxid_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">nm_customer</label>
                                <input type="nm_customer" name="nm_customer" id="nm_customer" class="form-control" />
                                <span id="nm_customer_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                    <input type="password" name="pass" id="pass" class="form-control" />
                                    <span id="pass_error" class="text-danger"></span>
                                </div>
                            <div class="mb-3">
                                <label class="form-label">date_sell</label>
                                <select id="date_sell" class="form-select">
                                <option selected>Choose...</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="dev">Developer</option>
                                <option value="penjualan">penjualan</option>
                                <option value="admin">Admin</option>
                                </select>
                                <span id="date_sell_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id" />
                            <input type="hidden" name="action" id="action" value="Add" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="action_button">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <script>
    $(document).ready(function() {
        showAll();

        $('#add_data').click(function(){
            $('#dynamic_modal_title').text('Add Data penjualan');
            $('#sample_form')[0].reset();
            $('#action').val('Add');
            $('#action_button').text('Add');
            $('.text-danger').text('');
            $('#action_modal').modal('show');
        });
        
        $('#sample_form').on('submit', function(event){
            event.preventDefault();
            if($('#action').val() == "Add"){
                var formData = {
                'trxid' : $('#trxid').val(),
                'date_sell' : $('#date_sell').val(),
                'nm_customer' : $('#nm_customer').val(),
                'kasir' : $('#kasir').val(),
                'grand_total' : $('#grand_total').val()
                
                }

                $.ajax({
                    url:"http://localhost:81/Nadyaaptr/kantor_nnd/api/Penjualan/create.php",
                    method:"POST",
                    data: JSON.stringify(formData),
                    success:function(data){
                        $('#action_button').attr('disabled', false);
                        $('#message').html('<div class="alert alert-success">'+data.message+'</div>');
                        $('#action_modal').modal('hide');
                        $('#sample_data').DataTable().destroy();
                        showAll();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }else if($('#action').val() == "Update"){
                var formData = {
                    'id' : $('#id').val(),
                    'trxid' : $('#trxid').val(),
                    'date_sell' : $('#date_sell').val(),
                    'nm_customer' : $('#nm_customer').val(),
                    'kasir' : $('#kasir').val(),
                    'grand_total' : $('#grand_total').val()
                    
                }

                $.ajax({
                    url:"http://localhost:81/Nadyaaptr/kantor_nnd/api/penjualan/update.php",
                    method:"PUT",
                    data: JSON.stringify(formData),
                    success:function(data){
                        $('#action_button').attr('disabled', false);
                        $('#message').html('<div class="alert alert-success">'+data.message+'</div>');
                        $('#action_modal').modal('hide');
                        $('#sample_data').DataTable().destroy();
                        showAll();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
            });
    });

    function showAll() {
        $.ajax({
            type: "GET",
            contentType: "application/json",
            url:"http://localhost:81/Nadyaaptr/kantor_nnd/api/penjualan/read.php",
            success: function(response) {
            // console.log(response);
                var json = response.body;
                var dataSet=[];
                for (var i = 0; i < json.length; i++) {
                    var sub_array = {
                        'trxid' : json[i].trxid,
                        'date_sell' : json[i].date_sell,
                        'nm_customer' : json[i].nm_customer,
                        'kasir' : json[i].kasir,
                        'grand_total' : json[i].grand_total,
                        'action' : '<button onclick="deleteOne(\''+json[i].trxid+'\')" class="btn btn-sm btn-danger">Delete</button>'
                    };
                    dataSet.push(sub_array);
                }
                $('#sample_data').DataTable({
                    data: dataSet,
                    columns : [
                        { data : "trxid" },
                        { data : "date_sell" },
                        { data : "nm_customer" },
                        { data : "kasir" },
                        { data : "grand_total" },
                        { data : "action" }
                    ]
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function showOne(id) {
        $('#dynamic_modal_title').text('Edit Data');
        $('#sample_form')[0].reset();
        $('#action').val('Update');
        $('#action_button').text('Update');
        $('.text-danger').text('');
        $('#action_modal').modal('show');

        $.ajax({
            type: "GET",
            contentType: "application/json",
            url:
            "http://localhost:81/Nadyaaptr/kantor_nnd/api/penjualan/read.php?id="+id,
            success: function(response) {
                $('#id').val(response.id);
                $('#trxid').val(response.trxid);
                $('#date_sell').val(response.date_sell).change();
                $('#nm_customer').val(response.nm_customer);
                $('#kasir').val(response.kasir);

            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function deleteOne(trxid) {
        alert('Yakin untuk hapus data ?');
        $.ajax({
            url:"http://localhost:81/Nadyaaptr/kantor_nnd/api/penjualan/delete.php",
            method:"DELETE",
            data: JSON.stringify({"trxid" : trxid}),
            success:function(data){
                $('#action_button').attr('disabled', false);
                $('#message').html('<div class="alert alert-success">'+data+'</div>');
                $('#action_modal').modal('hide');
                $('#sample_data').DataTable().destroy();
                showAll();
            },
            error: function(err) {
                console.log(err);
                $('#message').html('<div class="alert alert-danger">'+err.responseJSON+'</div>');  
            }
        });
    }
    </script>
</body>
</html>