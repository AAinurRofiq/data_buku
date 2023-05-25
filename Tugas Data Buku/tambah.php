<?php 
  $status = '';
  $filename = fopen("data.txt","a+");
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang_buku = $_POST['pengarang_buku'];
    $penerbit_buku = $_POST['penerbit_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori_buku = $_POST ['kategori_buku'];
    $halaman_buku = $_POST ['halaman_buku'];
    $cover_buku = $_FILES['cover_buku'];

    $nama_file = $kode_buku.'_'.$cover_buku['name'];
    $tmp = $cover_buku['tmp_name'];

    $directory_upload = "cover/";

    $upload_file = move_uploaded_file($tmp, $directory_upload.$nama_file);
    if (!$upload_file) echo "<script>alert('gagal menyimpan gambar cover!')</script>";

    $data = '';
    $data .= $kode_buku."--";
    $data .= $judul_buku."--";
    $data .= $pengarang_buku."--";
    $data .= $penerbit_buku."--";
    $data .= $tahun_terbit."--";
    $data .= $kategori_buku."--";
    $data .= $halaman_buku."--";
    $data .= $directory_upload.$nama_file."\n";
    

    $saved = fwrite($filename, $data);

    if($saved == false) $status = 'err';
    else $status = 'ok';
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TAMBAH BUKU</title>
  </head>

  <body>
        <h1>Tes</h1>
          <ul>
            <li>
              <a href="index.php">Kembali</a>
            </li>
          </ul>
      </nav>

      <?php 
          $success_message = '';
          $error_message = '';

          if ($status == 'ok') {
            $success_message = 'Data Buku berhasil ditambahkan';
          } elseif ($status == 'deleted') {
            $success_message = 'Data Buku berhasil dihapus';
          } elseif ($status == 'err') {
            $error_message = 'Data Buku gagal diupdate';
          }
          
          if (!empty($success_message)) {
            echo '<br><div class="alert alert-success" role="alert">' . $success_message . '</div>';
          } elseif (!empty($error_message)) {
            echo '<br><div class="alert alert-danger" role="alert">' . $error_message . '</div>';
          }
        ?>

          <h2>TAMBAH BUKU</h2>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form">
              <label for="kode_buku">Kode Buku</label>
              <input type="text" class="input_text" name="kode_buku" id="kode_buku" placeholder="Kode Buku..." required>
            </div>

            <div class="form">
              <label for="judul_buku">Judul</label>
              <input type="text" class="input_text" name="judul_buku" id="judul_buku" placeholder="Judul Buku..." required>
            </div>

            <div class="form">
              <label for="pengarang_buku">Pengarang</label>
              <input type="text" class="input_text" name="pengarang_buku" id="pengarang_buku" placeholder="Pengarang..." required>
            </div>

            <div class="form">
              <label for="penerbit_buku">Penerbit</label>
              <input type="text" class="input_text" name="penerbit_buku" id="penerbit_buku" placeholder="Penerbit..." required>
            </div>

            <div class="form">
              <label for="tahun_terbit">Tahun Terbit</label>
              <input type="number" class="input_text" name="tahun_terbit" id="tahun_terbit" placeholder="Tahun Terbit..." required>
            </div>

            <div class="form">
              <label for="kategori_buku">Kategori Buku</label>
              <input type="text" class="input_text" name="kategori_buku" id="kategori_buku" placeholder="kategori Buku..." required>
            </div>

            <div class="form">
              <label for="halaman_buku">Jumlah Halaman Buku</label>
              <input type="text" class="input_text" name="halaman_buku" id="halaman_buku" placeholder="Jumlah Halaman Buku..." required>
            </div>

            <div class="form">
              <label for="cover_buku">Cover Buku</label>
              <input type="file" class="input_text" name="cover_buku" id="cover_buku" required>
            </div>           
            
            <button type="submit" class="button tambah">Simpan</button>
          </form>
        </main>
    </div>
    </div>
  </body>
</html>