
<meta http-equiv="refresh" content="0; url=<?= base_url('/'); ?>">

<div class="panel panel-default">
  <table>
      <tr>
          <td>
              No Transaksi
          </td>
          <td>:</td>
          <td>INV<?= $detailpesan['pk_transaksi_id']?>DT<?= $detailpesan['created_date'];?></td>
      </tr>
      <tr>
          <td>
              Nama Lengkap
          </td>
          <td>:</td>
          <td><?= $detailpesan['nama_lengkap']?></td>
      </tr>
      <tr>
          <td>
              No KTP
          </td>
          <td>:</td>
          <td><?= $detailpesan['no_identitas']?></td>
      </tr>
      <tr>
          <td>
              No HP
          </td>
          <td>:</td>
          <td><?= $detailpesan['no_hp']?></td>
      </tr>
      <tr>
          <td>
              Tempat Wisata
          </td>
          <td>:</td>
          <td><?= $detailpesan['nama_tempat']?></td>
      </tr>
      <tr>
          <td>
              Tanggal Kunjungan
          </td>
          <td>:</td>
          <td><?= $detailpesan['tanggal_kunjungan']?></td>
      </tr>
      <tr>
          <td>
              Tiket Dewasa
          </td>
          <td>:</td>
          <td><?= $detailpesan['dewasa']?></td>
      </tr>
      <tr>
          <td>
              Tiket Anak
          </td>
          <td>:</td>
          <td><?= $detailpesan['anak']?></td>
      </tr>
      <tr>
          <td>
              Total Tiket
          </td>
          <td>:</td>w
          <td><?= $detailpesan['dewasa'] + $detailpesan['anak']?></td>
      </tr>
      <?php 
        //hitung total bayar
        $anak = $detailpesan['anak']*$detailpesan['tiket_anak']; 
        $dewasa = $detailpesan['dewasa']*$detailpesan['tiket_dewasa']; 
        $total = $anak+$dewasa;
      ?>
      <tr>
          <td>
              Total Pembayaran
          </td>
          <td>:</td>
          <td><?= "Rp. ".number_format($total); ?></td>
      </tr>
  </table>
</div>
</div>
<script>
    window.print();
</script>