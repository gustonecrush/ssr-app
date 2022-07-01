<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Rujukan</title>
    <style>
      * {
        color: black;
      }
    </style>
</head>
<body>

    <img src="assets/img/logo.png" alt="" style="margin-left: -20px;">
    <h1 style="color: black; margin-top: -5px;">Surat Rujukan Online</h1>
    <p>Created In : {{ $tgl_pembuatan }}</p>
    <hr>
    <ul>
      <li>Nama Pasien  : {{ $nama_pasien }}</li>
      <li>No BPJS : {{ $no_bpjs }}</li>
      <li>TTL : {{ $ttl }}</li>
      <li>Gender : {{ $gender }}</li>
      <li>Umur : {{ $umur }}</li>
      <li>Golongan Darah : {{ $golongan_darah }}</li>
      <li>Pekerjaan : {{ $pekerjaan }}</li>
      <li>Alamat : {{ $alamat }}</li>
      <li>Orang Tua : 
        <ol>
          <li>Nama Ayah : {{ $nama_ayah }}</li>
          <li>Nama Ibu : {{ $nama_ibu }}</li>
        </ol>
      </li>
    </ul>
    
    
</body>
</html>