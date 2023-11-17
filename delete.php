<!-- delete.php -->
<?php
require './config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data produk berdasarkan ID
    $result = mysqli_query($db_connect, "DELETE FROM products WHERE id=$id");

    if ($result) {
        echo "Data produk berhasil dihapus. <a href='index.php'>Kembali ke Daftar Produk</a>";
    } else {
        echo "Gagal menghapus data produk: " . mysqli_error($db_connect);
    }
} else {
    echo "ID produk tidak disertakan.";
}
?>
