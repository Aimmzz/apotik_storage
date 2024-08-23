<?php

include "../../lib/koneksi.php";

if (isset($_POST['data']))
{
    $nama = mysqli_real_escape_string($koneksi, trim($_POST['data']));
    $query = "SELECT id_obat, harga_jualsatuan FROM obat WHERE nama_obat = '".$nama."'";
    $sql = mysqli_query($koneksi, $query);
    $array = [];
    while($data = mysqli_fetch_assoc($sql))
    {
        $array['harga'] = $data['harga_jualsatuan'];
        $array['id_obat'] = $data['id_obat'];
    }
    $arr[] = $array;

    echo json_encode($arr);
}

?>