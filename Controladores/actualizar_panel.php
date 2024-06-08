
<?php

include_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get the JSON object from the body
    $json = file_get_contents('php://input');
    // decode the JSON object with this structure:
    $data = json_decode($json);

    // iterate over the JSON object to check if comision is a number string and check if it is from 0 to 100
    foreach ($data as $row) {
        $comision = $row->comision;
        $nombre = $row->nombre;
        if (!is_numeric($comision) || $comision < 0 || $comision > 100) {
            // return a message and a 400 status code
            http_response_code(400);
            echo "La comisión de la empresa: " . $row->nombre . ", no es un número o no está entre 0 y 100";
            exit;
        }
    }

    foreach ($data as $row) {
        // get the values from the JSON object
        $id_empresa = $row->id_empresa;
        $estado_aprobacion = $row->estado_aprobacion;
        $comision = $row->comision;

        // update the database with the values from the JSON object
        $query = "UPDATE Empresas SET FK_estado_aprobacion = '$estado_aprobacion', comision = '$comision' WHERE id_empresa = '$id_empresa'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            http_response_code(500);
            die('Query Failed.');
        }
    }
    
    http_response_code(201);
    echo "Se actualizaron los datos de las empresas";
}
?>
 


