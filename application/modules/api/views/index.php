<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url('assets/vendors/datatables/DataTables-1.10.16/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
    </head>
<body>
<div class="content">
    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-color panel-info">
                    <div class="panel-heading" style="background: #252B34;">
                        <h3 class="panel-title" style="font-weight:bold;color:white;">CRUD Ignited Datatables</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd"><i class="glyphicon glyphicon-plus"> </i> Tambah</button>
                            </div>
                            <div class="col-md-3">
                                    <input type="text" class="form-control" name="s_nama" placeholder="Filter Nama" style="float:right"/>
                            </div>
                            <div class="col-md-3">
                                    <input type="text" class="form-control" name="s_kategori" placeholder="Filter Kategori" style="float:right"/>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" name="filter" id="filter" type="button"><i class="glyphicon glyphicon-search"> </i> Filter</button>
                            </div>
                        </div>
                    <br>
                        <table id='tableku' class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</div>


<!-- Modal Add Produk-->
    <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <form id="add-row-form" action="<?php echo base_url().'index.php/welcome/add'?>" method="post">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Tambah</h4>
                   </div>
                   <div class="modal-body">
                       <div class="form-group">
                           <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                       </div>
                       <div class="form-group">
                           <select name="kategori" class="form-control" placeholder="Kategori" required>
                                <?php foreach ($kategori->result() as $row) :?>
                                    <option value="<?php echo $row->id;?>"><?php echo $row->kategori;?></option>
                                <?php endforeach;?>
                            </select>
                       </div>
                        <div class="form-group">
                           <input type="text" name="stok" class="form-control" placeholder="Stok" required>
                        </div>
                        <div class="form-group">
                           <input type="text" name="harga" class="form-control" placeholder="Harga" required>
                        </div>

                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="add-row" class="btn btn-success">Save</button>
                   </div>
                    </div>
            </div>
        </form>
    </div>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  </body>
</html>

<!-- Modal Update Produk-->
    <div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <form id="edit-row-form" action="<?php echo base_url().'index.php/welcome/update'?>" method="post">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Update</h4>
                   </div>
                   <div class="modal-body">
                    <label>Kode Barang</label>
                       <div class="form-group">
                           <input type="text" name="kode_barang" id="u_kode" class="form-control" placeholder="Kode Barang" required readonly>
                       </div>
                    <label>Nama Barang</label>
                       <div class="form-group">
                           <input type="text" name="nama_barang" id="u_nama" class="form-control" placeholder="Nama Barang" required>
                       </div>
                    <label>Kategori</label>
                       <div class="form-group">
                           <select name="kategori" class="form-control" placeholder="Kategori" id="u_kategori" required>
                                <?php foreach ($kategori->result() as $row) :?>
                                    <option value="<?php echo $row->id;?>" ><?php echo $row->kategori;?></option>
                                <?php endforeach;?>
                            </select>
                       </div>
                    <label>Stok</label>
                        <div class="form-group">
                           <input type="text" name="stok" id="u_stok" class="form-control" placeholder="Stok" required>
                        </div>
                    <label>Harga</label>
                        <div class="form-group">
                           <input type="text" name="harga" id="u_harga" class="form-control" placeholder="Harga" required>
                        </div>

                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="update-row" class="btn btn-success">Save</button>
                   </div>
                    </div>
            </div>
        </form>
    </div>


<script src="<?php echo base_url()?>assets/vendors/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/vendors/datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>
 <script type="text/javascript">
   $(document).ready( function (){
                //datatables
                $('#tableku').DataTable({ 
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo base_url('index.php/welcome/json'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": 'nama', width:100},
                        {"data": 'harga',render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": 'stok', width:100},
                        {"data": 'kategori_barang', width:100},
                        {"data": 'view', width:100}
                    ]
 
                });

                // Edit Table
                 $('#tableku').on('click','.edit',function(){
                    var kode=$(this).data('kode');
                    var nama=$(this).data('nama');
                    var harga=$(this).data('harga');
                    // var kategori=$(this).data('u_kategori');
                    var idkategori=$(this).data('idkategori');
                    var stok=$(this).data('stok');

                    $('#myModalUpdate').modal('show');
                    $('#u_kode').val(kode);
                    $('#u_nama').val(nama);
                    $('#u_harga').val(harga);
                    $('#u_stok').val(stok);
                    $('[name="kategori"]').val(idkategori);
                });

            });
                

</script>