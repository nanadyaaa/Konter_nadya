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
    <title>barang - Kantor_nnd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container">
        <div id="message">
        </div>
        <h1 class="mt-4 mb-4 text-center ">BARANG CRUD</h1>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-sm-9">BARANG</div>
                    <div class="col col-sm-3">
                        <button type="button" id="add_data" class="btn
                        btn-success btn-sm float-end">Add</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="sample_data">
                        <thead>
                            <tr>
                                <th>kd_brg</th>
                                <th>nm_brg</th>
                                <th>hrg_brg</th>
                                <th>stock</th>
                                <th>jenis_brg</th>
                                <th>action</th>
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
                                <label class="form-label">kd_brg</label>
                                <input type="text" kd_brg="name" id="kd_brg" class="form-control" />
                                <span id="name_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">nm_brg</label>
                                <input type="nm_brg " name="nm_brg" id="nm_brg" class="form-control" />
                                <span id="nm_brg_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">hrg_brg</label>
                                    <input type="hrg_brg" name="hrg_brg" id="hrg_brg" class="form-control" />
                                    <span id="hrg_brg_error" class="text-danger"></span>
                                </div>
                                <div class="mb-3">
                                <label class="form-label">stock</label>
                                    <input type="stock" name="stock" id="stock" class="form-control" />
                                    <span id="stock_error" class="text-danger"></span>
                                </div>
                                <div class="mb-3">
                                <label class="form-label">jenis_brg</label>
                                <select id="jenis_brg" class="form-select">
                                <option selected>Choose...</option>
                                <option value="consumable">Consumable</option>
                                <option value="storeable">Storable</option>
                                </select>
                                <span id="jenis_brg_error" class="text-danger"></span>
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
            $('#dynamic_modal_title').text('Add Data');
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
                'kd_brg' : $('#kd_brg').val(),
                'nm_brg' : $('#nm_brg').val(),
                'hrg_brg' : $('#hrg_brg').val(),
                'stock' : $('#stock').val(),
                'jenis_brg' : $('#jenis_brg').val()
                }

                $.ajax({
                    url:"http://localhost:81/Nadyaaptr/kantor_nnd/api/barang/create.php",
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
                    'kd_brg' : $('#kd_brg').val(),
                    'nm_brg' : $('#nm_brg').val(),
                    'hrg_brg' : $('#hrg_brg').val(),
                    'stock' : $('#stock').val(),
                    'jenis_brg' : $('#jenis_brg').val()
                }

                $.ajax({
                    url:"http://localhost:81/Nadyaaptr/kantor_nnd/api/barang/update.php",
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
            url:"http://localhost:81/Nadyaaptr/kantor_nnd/api/barang/read.php",
            success: function(response) {
            // console.log(response);
                var json = response.body;
                var dataSet=[];
                for (var i = 0; i < json.length; i++) {
                    var sub_array = {
                        'kd_brg' : json[i].kd_brg,
                        'nm_brg' : json[i].nm_brg,
                        'hrg_brg' : json[i].hrg_brg,
                        'stock' : json[i].stock,
                        'jenis_brg' : json[i].jenis_brg,
                        'action' : '<button onclick="showOne('+json[i].id+')" class="btn btn-sm btn-warning">Edit</button>'+
                        '<button onclick="deleteOne('+json[i].id+')" class="btn btn-sm btn-danger">Delete</button>'
                    };
                    dataSet.push(sub_array);
                }
                $('#sample_data').DataTable({
                    data: dataSet,
                    columns : [
                        { data : "kd_brg" },
                        { data : "nm_brg" },
                        { data : "hrg_brg" },
                        { data : "stock" },
                        { data : "jenis_brg" },
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
            "http://localhost:81/Nadyaaptr/kantor_nnd/api/barang/read.php?id="+id,
            success: function(response) {
                $('#id').val(response.id);
                $('#kd_brg').val(response.kd_brg);
                $('#nm_brg').val(response.nm_brg);
                $('#hrg_brg').val(response.hrg_brg);
                $('#stock').val(response.stock);
                $('#jenis_brg').val(response.jenis_brg).change();
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function deleteOne(id) {
        alert('Yakin untuk hapus data ?');
        $.ajax({
            url:"http://localhost:81/Nadyaaptr/kantor_nnd/api/barang/delete.php",
            method:"DELETE",
            data: JSON.stringify({"id" : id}),
            success:function(data){
                $('#action_button').attr('disabled', false);
                $('#message').html('<div class="alert alert-success">'+data+'</div>');
                $('#action_modal').modal('hide');
                $('#sample_data').DataTable().destroy();
                showAll();
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
    </script>
</body>
</html>