<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Pencarian</title>
</head>
<body>
    <main>
        <a href="index.php">Refresh</a>
        <h2>Pencarian Data Buku</h2>

        <form action="proses_pencarian.php" method="post">
            <label for="input_judul">Judul</label>
            <input type="text" name="input_judul" id="input_judul" value="<?php
            if(isset($_GET['judul'])){
                echo $_GET['judul'];
            }
            ?>">

            <input type="submit" value="cari">
        </form>

        <section id="result_container">
            <?php
            if (isset($_GET['books'])){
                if ($_GET['books'] == ""){
                    echo "<h4 class='warning-message'>Data buku tidak ditemukan !!<h4>";
                }// end of tidak ditemukan
                else{
                    $books_item = json_decode($_GET['books'], true);

                    foreach($books_item as $item){
                        echo "<div class='item-container'>";
                        echo "<img src='images/" . $item['cover'] . "'>";
                            echo "<div class='item-description'>";
                            echo "<h4>Judul :</h4>";
                            echo "<h4 class='value'>" . $item['judul'] . "</h4>";

                            echo "<h4>Penulis :</h4>";
                            echo "<h4 class='value'>" . $item['penulis'] . "</h4>";

                            echo "<h4>Harga :</h4>";
                            echo "<h4 class='value'>" . $item['harga'] . "</h4>";
                            echo "</div>";
                            echo "<div class='clear-fix'></div>";
                        echo "</div>";
                    }
                }// end of jika ditemukan
            }// end of isset
            ?>
        </section>
    </main>
</body>
</html>