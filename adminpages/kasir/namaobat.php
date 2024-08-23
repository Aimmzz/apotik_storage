<?php

include "../../lib/koneksi.php";

if (isset($_POST['data']))
{
    $id = mysqli_real_escape_string($koneksi, trim($_POST['data']));
    $query = "SELECT id_obat,nama_obat FROM obat WHERE id_obat = '".$id."'";
    $sql = mysqli_query($koneksi, $query);
    $array = [];
    while($data = mysqli_fetch_assoc($sql))
    {
        $array['id_obat'] = $data['id_obat'];
        $array['nama_obat'] = $data['nama_obat'];
    }
    $arr[] = $array;

    echo json_encode($arr);
}

?>