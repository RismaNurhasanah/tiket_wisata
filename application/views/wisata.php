<!-- Header-->
<section class="py-5">
	<div class="container ">
		<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
			<?php 
            $no=1;
            foreach($wisata as $ws):?>
			<div class="col mb-5">
				<div class="card h-100">
					<!-- Product image-->
					<img class="card-img-top" src="<?= $ws['foto']?>" alt="..." width="100%" />
					<!-- Product details-->
					<div class="card-body p-4">
						<div class="text-center">
							<!-- Product name-->
							<h5 class="fw-bolder"><?= $ws['nama_tempat']?></h5>
                            <span class="badge badge-success"><?= $ws['lokasi']?></span>
							<!-- Product price-->
						</div>
                        <br>
                        <b>
						Tiket Dewasa : Rp. <?= number_format($ws['tiket_dewasa'])?>
                        <br>
						Tiket Anak : Rp. <?= number_format($ws['tiket_anak'])?>
                        </b>
					</div>

					<hr>
					<!-- Product actions-->
					<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
						<div class="text-center">
							<a id="setdetail" class="btn btn-outline-dark btn text-dark mt-auto" 
                                data-toggle="modal"
								data-target="#exampleModal"
                                data-tempat="<?= $ws['nama_tempat']?>"    
                                data-foto="<?= $ws['foto']?>"    
                                data-deskripsi="<?= $ws['deskripsi']?>"    
                                data-embed="<?= $ws['embed']?>"    
                            >Info</a>
							<a  id="pesanwisata" class="btn btn-outline-dark btn-primary text-white mt-auto" 
                                data-toggle="modal"
								data-target="#pesan"
                                data-chooseidwisata="<?= $ws['wisata_id']?>"    
                                data-choosewisata="<?= $ws['nama_tempat']?>"    
                                data-choosetiketdewasa="<?= $ws['tiket_dewasa']?>"        
                            >Pesan</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<?php endforeach;?>
		</div>
	</div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tentang <b id="tempat"> </b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="foto" alt="" class="img-thumbnail">
                <br>
                <br>
                <p class="text-justify" id="deskripsi"></p>
                <iframe id="hasilembed" width="100%" height="200px" src="" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pesan" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulir Pemesanan <b id="tempat"> </b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('Home/save_transaksi');?>" method="POST">
              <table class="table table-borderless">
                  <tr>
                      <td>Nama Lengkap</td>
                      <td>:</td>
                      <td><input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required></td>
                  </tr>
                  <tr>
                      <td>Nomor Identitas (KTP)</td>
                      <td>:</td>
                      <td><input type="number" name="no_ktp" id="no_ktp" class="form-control" required></td>
                  </tr>
                  <tr>
                      <td>Nomor HP</td>
                      <td>:</td>
                      <td><input type="number" name="no_hp" id="no_hp" class="form-control" required></td>
                  </tr>
                  
                  <tr>
                      <td>Tempat Wisata</td>
                      <td>:</td>
                      <td><input type="text" readonly name="pesan_tempatwisata" id="pesan_tempatwisata" class="form-control" required></td>
                  </tr>
                  <input type="hidden" name="wisataid" id="wisataid">
                  <tr>
                      <td>Tanggal Kunjungan</td>
                      <td>:</td>
                      <td><input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" value="<?= date('Y-m-d');?>" class="form-control" required></td>
                  </tr>
                  <tr>
                      <td>Pengunjung Dewasa</td>
                      <td>:</td>
                      <td><input type="number" name="pengunjung_dewasa" id="pengunjung_dewasa" width="10"  class="form-control" required></td>
                  </tr> 
                  <tr>
                      <td>Pengunjung Anak</td>
                      <td>:</td>
                      <td><input type="number" name="pengunjung_anak" id="pengunjung_anak" class="form-control"></td>
                  </tr>
                  <tr>
                      <td>Harga Tiket</td>
                      <td>:</td>
                      <td><span id="pesan_tiketdewasa"></span></td>
                  </tr> 
              </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" value="Pesan" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>


<script>
$( document ).ready(function() {
    $(document).on('click','#setdetail', function() {
        var tempat      = $(this).data('tempat');
        var foto        = $(this).data('foto');
        var deskripsi   = $(this).data('deskripsi');
        var embed       = $(this).data('embed');

        $('#tempat').text(tempat);
        document.getElementById("foto").src = foto;
        $('#deskripsi').text(deskripsi);
        // $('#hasilembed').src(embed);
        document.getElementById("hasilembed").src = embed;
    })

    $(document).on('click','#pesanwisata', function() {
        var tempat      = $(this).data('choosewisata');
        var tempatid    = $(this).data('chooseidwisata');
        var tiketdewasa = $(this).data('choosetiketdewasa');
        $('#pesan_tempatwisata').val(tempat);
        $('#wisataid').val(tempatid);
        $('#pesan_tiketdewasa').text("Rp."+tiketdewasa);
    })

});
</script>
