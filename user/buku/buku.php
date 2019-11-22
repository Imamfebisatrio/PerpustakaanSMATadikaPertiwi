
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>Judul</th>
                                            <th>NIS</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                           <th> Status</th>
                                           <th> Denda </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        session_start();

                                            $no = 1;
                                            $user = $_SESSION['NIS'] ;


                                            $sql = $koneksi->query("select * from tb_transaksi WHERE NIS = '$user' ");

                                            while ($data= $sql->fetch_assoc()) {

                                                

                                        ?>

                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data['judul'];?></td>
                                            <td><?php echo $data['NIS'];?></td>
                                            <td><?php echo $data['tgl_pinjam'];?></td>
                                            <td><?php echo $data['tgl_kembali'];?></td> 
                                            <td><?php echo $data['status'];?></td>
                                            
                                            
                                            <td><?php $denda = 1000;

                                                $tgl_dateline = $data['tgl_kembali'];
                                                $tgl_kembali = date('Y-m-d');

                                                $lambat = terlambat($tgl_dateline, $tgl_kembali);
                                                $denda1 = $lambat*$denda;

                                                if ($lambat>0) {
                                                    echo "
                                                            <font color='red'>$lambat Hari<br>(Rp $denda1)</font>

                                                        ";

                                                    }else{
                                                        echo $lambat ." Hari ";
                                                    }?></td>

                                        <?php  } ?>
                                    </tbody>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> 