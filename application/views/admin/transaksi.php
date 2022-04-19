<div class="container-fluid ">
	<br><br>
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Kode Transaksi</th>
							<th rowspan="2">Nama Lengkap</th>
							<th rowspan="2">Tempat Wisata</th>
							<th rowspan="2">Tanggal Kunjungan</th>
							<th colspan="3" class="text-center">Tiket</th>
							<th rowspan="2">Total Bayar</th>
							<th rowspan="2">Aksi</th>
						</tr>
                        <tr>
                            <th>Dewasa</th>
                            <th>Anak</th>
                            <th>Total</th>
                        </tr>
					</thead>
					<tbody>
                        <?php
                            $no=1; 
                            foreach($transaksi as $trs):
                            $totaltiket = $trs['dewasa']+ $trs['anak'];

                            //hitung total bayar
                            $anak = $trs['anak']*$trs['tiket_anak']; 
                            $dewasa = $trs['dewasa']*$trs['tiket_dewasa']; 
                            $total = $anak+$dewasa;
                        ?>
						<tr>
							<td><?= $no?></td>
							<td>INV<?= $trs['pk_transaksi_id']?>DT<?= $trs['created_date'];?></td>
							<td><?= $trs['nama_lengkap'];?></td>
							<td><?= $trs['nama_tempat'];?></td>
							<td><?= $trs['tanggal_kunjungan'];?></td>
							<td><?= $trs['dewasa'];?> Tiket</td>
							<td><?= $trs['anak'];?> Tiket</td>
							<td><?= $totaltiket;?> Tiket</td>
							<td><?= "Rp. ".number_format($total);?></td>
							<td class="text-center">
                                <?php if($trs['status'] == 'Y'):?>
                                    <span class="badge badge-success">Sukses</span>
                                    <br>
                                    <a href="<?= base_url('Admin/ubah_status/'.$trs['pk_transaksi_id']);?>" onclick="return confirm('Ubah Status?')">
                                            <button class="btn btn-sm"><i class="fa fa-cog"></i></button>
                                        </a>
                                <?php else:?>
                                        <span class="badge badge-danger">Belum Bayar</span>
                                        <a href="<?= base_url('Admin/ubah_status/'.$trs['pk_transaksi_id']);?>" onclick="return confirm('Ubah Status?')">
                                            <button class="btn btn-sm"><i class="fa fa-cog"></i></button>
                                        </a>
                                <?php endif;?>
                                <br>
                                <a href="<?= base_url('Admin/hapus/'.$trs['pk_transaksi_id']);?>" onclick="return confirm('Hapus Transaksi?')">
                                    <button class="btn btn-sm"><i class="fa fa-trash"></i></button>
                                </a>
                            </td>

						</tr>
                        <?php 
                            $no++;
                            endforeach;
                        ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
</div>
