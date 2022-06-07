<?php

include_once('koneksi.php');

$query = mysqli_query($connect, "SELECT * FROM mahasiswa");

$data = array();

while ($row = mysqli_fetch_array($query)) {
    $nilai_ipk = $row['nilai_ipk'];
    if ( $nilai_ipk >= 2 && $nilai_ipk <= 2.75) {
        $grade = "Memuaskan";
    } else if  ( $nilai_ipk >= 2.76 && $nilai_ipk <= 3.50) {
        $grade = "Sangat Memuaskan";
    } else if  ( $nilai_ipk >= 3.51 && $nilai_ipk <= 4){
        $grade = "Cum Laude";
    } else {
        $grade = "Tidak Terdefinisi";
    }
array_push($data, array(
    'nama' => $row['nama'],
    'alamat' => $row['alamat'],
    'jurusan' => $row['jurusan'],
    'nilai_ipk' => $nilai_ipk,
    'grade'=> $grade
    ));
}
echo json_encode(array('data' => $data));

?>