<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:0px solid #e3e3e3;
      width:690px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border: 1px solid black;
      border-collapse: collapse;
      font-family: arial;
      font-size: 13px;
      /*color:#5E5B5C;*/
    }
 
    thead th{
      text-align: left;
      border-right: 1px solid black;
      padding: 4px;
    }
 
    tbody td{
      border-top: 1px solid black;
      border-right: 1px solid black;
      padding: 4px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }

    #just{
      text-align: justify;
      text-justify: inter-word;
    }

    #right{
      text-align: right;
      /*text-justify: inter-word;*/
    }
  </style>
</head>
<body>
  <div id="outtable">
    <!-- <table> -->
      <center>
          <b>KANTOR PELAYANAN PAJAK PRATAMA CILEGON <br>
          SEKSI BIDANG EKSTENSI</b><br>
        <i style="font-size: 10px;">Jl. Jenderal Ahmad Yani No. 126, Sukmajaya, Cilegon</i><br>
        <i style="font-size: 10px;">Telp (0721) 470209</i>
      </center>
      <hr style="margin-bottom: 30px;">
      <center>
        <font>
          <b><u>Jadwal Karyawan Kegiatan Sosialisasi Surat Pemberitahuan (SPT) Tahunan</u></b><br>
          Nomor : <?php echo $nomor; ?>
        </font>
      </center>

      <div id="just" style="margin-top: 60px; margin-bottom: 20px; font-size: 14px; ">
          Yang bertanda tangan dibawah ini Kepala Seksi Bidang Ekstensi KPP Pratama Cilegon dengan ini memberikan tugas kepada : 
      </div>
    <!-- </table> -->

      <table align="center" style="margin-bottom: 20px;">
        <thead>
          <tr>
            <th>No</th>
            <th class="normal">Nik</th>
            <th class="normal">Nama</th>
            <th class="normal">No Telp</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          <?php foreach($users as $user => $val): ?>
            <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $val["nik"]; ?></td>
            <td><?php echo $val["nama"]; ?></td>
            <td><?php echo $val["notelp"]; ?></td>
            </tr>
          <?php $no++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div id="just" style=" margin-bottom: 20px; font-size: 14px; ">
          Untuk dapat melakukan kegiatan penyuluhan kegiatan Sosialisai Surat Pemberitahuan (SPT) Tahunan kepada masyarakat pada: <br>
          Hari, Tanggal &emsp; &emsp; :  <?php echo $hari.", ".$tanggal ?><br>
          Tempat &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;: <?php echo $tempat; ?>
      </div>

      <div id="just" style=" margin-bottom: 20px; font-size: 14px; ">
          Demikian jadwal ini diberikan agar dilakukan dengan sebaik-baiknya, Terima Kasih.
      </div>

      <div id="right" style=" margin-bottom: 20px; font-size: 14px; ">
          Cilegon, <?php echo $datenow; ?> <br>
          Kepala Seksi Bidang Ekstensi <br><br><br><br>
          Trisno Mangunkusumo
      </div>

   </div>
</body>
</html>