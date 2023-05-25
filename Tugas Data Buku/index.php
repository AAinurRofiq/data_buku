<?php
  $status = isset($_GET['status']) ? $_GET['status'] : '' ;
  $filename = "data.txt";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Perpustakaan</title>
</head>
<body>
      <h1</h1>
      <ul>
        <li>
          <a class="active" href="index.php">Data Buku</a>
        </li>
        <li>
          <a href="tambah.php">Tambah Buku</a>
        </li>
        <?php 
          $success_message = '';
          $error_message = '';

          if ($status == 'ok') {
            $success_message = 'Data Buku berhasil diupdate';
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
        <h2>Data Buku</h2>
        <a href="tambah.php"><button type="button">TAMBAH BUKU</button></a>
        <div class="table">
          <table  border= "1">
            <thead>
              <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun terbit</th>
                <th>Kategori</th>
                <th>Jumlah Halaman</th>
                <th>Cover</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach(file($filename) as $line) : 
              $data = explode("--", $line);
              ?>
              <tr>
                <td><?= $data[0]; ?></td>
                <td><?= $data[1]; ?></td>
                <td><?= $data[2]; ?></td>
                <td><?= $data[3]; ?></td>
                <td><?= $data[4]; ?></td>
                <td><?= $data[5]; ?></td>
                <td><?= $data[6]; ?></td>
                <td><img src="./<?= $data[7]; ?>" width="100" alt="gambar" class="cover_img" /></td>
                <td>
                  <div class="action">
                    <a href="<?php echo "update.php?id=".$data[0]; ?>" class="button update"> Update</a>
                    <a href="<?php echo "delete.php?id=".$data[0]; ?>" class="button delete"> Delete</a>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
</body>
</html>