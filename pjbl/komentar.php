<?php
include "koneksi.php";

// Check if the form is submitted
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $komentar = $_POST['comment'];

    // Insert data into the database
    $query = "INSERT INTO `tbl_komentar` (`id`, `komentar`, `id_user`) VALUES ('', '$komentar', '$username')";
    $hasil = mysqli_query($conn, $query);

    if($hasil) {
        echo "Komentar berhasil disimpan.";
        header("Location: komentar.php"); // Ganti dengan nama halaman yang sesuai
        exit();
    } else {
        echo "Gagal menyimpan komentar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <link rel="stylesheet" href="komentar.css">
    <link rel="stylesheet" href="guest.css">
</head>
<body>

<nav>
    <div class="navbar-kiri">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsupportedcontent">
            <div class="brand" align="center">
                <a href="">Keanekaragaman Wayang</a><br />
            </div>
        </button>
        <ul class="menu" style="padding-left: 0px">
            <li><a href="user.html" class="list-menu">Home</a></li>
            <li><a href="video.html" class="list-menu">Video</a></li>
            <li><a href="quiz1.html" class="list-menu">Quiz</a></li>
        </ul>
    </div>
</nav>

<div id="comments">
    <h2>Komentar</h2>
    <table>
        <!-- Formulir Komentar Baru -->
        <h3>Tambah Komentar Baru</h3>
        <form id="commentForm" method="post">
            <tr>
                <td><label for="username">Nama Pengguna:</label></td>
                <td><input type="text" id="username" name="username" required></td>
            </tr>

            <tr>
                <td><label for="comment">Komentar:</label></td>
                <td><textarea id="comment" name="comment" rows="4" required></textarea></td>
            </tr>

            <tr>
                <td><input type="submit" name="submit"></td>
            </tr>
        </form>
    </table>
    <?php
    // Query to fetch comments from the database
    $query = "SELECT * FROM tbl_komentar";
    $hasil = mysqli_query($conn, $query);

    // Display comments
    while ($data = mysqli_fetch_array($hasil)) {
        ?>
        <div class="comment">
            <strong><?php echo $data['id_user']; ?></strong>
            <p><?php echo $data['komentar']; ?></p>
        </div>
        <?php
    }
    ?>
</body>
</html>
