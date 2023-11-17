<!-- edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    
    <?php
    require './config/db.php';

    // Periksa apakah parameter ID disertakan dalam URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Ambil data produk berdasarkan ID
        $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id=$id");
        $row = mysqli_fetch_assoc($result);

        if ($row) {
    ?>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?=$row['id'];?>">
                <label for="name">Nama Produk:</label>
                <input type="text" name="name" value="<?=$row['name'];?>" required><br>

                <label for="price">Harga:</label>
                <input type="text" name="price" value="<?=$row['price'];?>" required><br>

                <input type="submit" value="Simpan">
            </form>
    <?php
        } else {
            echo "Produk tidak ditemukan.";
        }
    } else {
        echo "ID produk tidak disertakan.";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
    
        // Update data produk
        $query = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
        $result = mysqli_query($db_connect, $query);
    
        if ($result) {
            echo "<h5>Data produk berhasil diupdate</h5> <a href=show.php>kembali ke tabel Data Produk</a>";
            
        } else {
            echo "Gagal mengupdate data produk: " . mysqli_error($db_connect);
        }
    }
    ?>

</body>
</html>
