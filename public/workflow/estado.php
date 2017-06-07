<?php
require_once 'conexion.php';
$workflow = $_POST['id_workflow'];
$asociado = $_POST['asociado'];
if ($asociado == null) {
    $query = "SELECT * FROM estado WHERE id_workflow ='$workflow' and final=0 ORDER BY estado.id_estado";
    $result = mysqli_query($link, $query);
    $data = array();
    if (mysqli_num_rows($result) > 0)
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($data, $row);
        }
    echo json_encode($data);
} else {
    $query = "SELECT * FROM estado WHERE id_workflow ='$workflow' AND id_estado!='$asociado' ORDER BY estado.id_estado";
    $result = mysqli_query($link, $query);
    $data = array();
    if (mysqli_num_rows($result) > 0)
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($data, $row);
        }
    echo json_encode($data);
}
