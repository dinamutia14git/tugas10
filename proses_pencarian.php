<?php

$data_buku = [
    [
        "judul" => "Dignitate",
        "penulis" => "Hana Margaretha",
        "harga" => "Rp 150.000,-",
        "cover" => "buku1.jpg"
    ],
    [
        "judul" => "Senior",
        "penulis" => "Katakokoh",
        "harga" => "Rp 88.000,-",
        "cover" => "buku2.jpg"
    ],
    [
        "judul" => "Im In Danger",
        "penulis" => "Zaimatul Hurriyyah",
        "harga" => "Rp 80.000,-",
        "cover" => "buku3.jpg"
    ],
    [
        "judul" => "Mariposa",
        "penulis" => "Luluk HF",
        "harga" => "Rp 85.000,-",
        "cover" => "buku4.jpg"
    ],
    [
        "judul" => "Mozachiko",
        "penulis" => "Poppi Pertiwi",
        "harga" => "Rp 90.000,-",
        "cover" => "buku5.jpg"
    ],
];

if ($_POST){
    $item_cari = $_POST['input_judul'];
    $array_hasil_pencarian = array();

    $i=0;
    foreach($data_buku as $item){
        if(strstr($item['judul'], $item_cari)){
            $array_hasil_pencarian[$i]['judul'] = $item['judul'];
            $array_hasil_pencarian[$i]['penulis'] = $item['penulis'];
            $array_hasil_pencarian[$i]['harga'] = $item['harga'];
            $array_hasil_pencarian[$i]['cover'] = $item['cover'];
            $i++;
        } // end of if
    } // end of foreach

    if (count($array_hasil_pencarian) == 0){
        $paramBooks = "";
    } else{
        $paramBooks = json_encode($array_hasil_pencarian);
    }

    header("Location: index.php?books=" . $paramBooks . "&judul=" . $item_cari);

} // end of Post