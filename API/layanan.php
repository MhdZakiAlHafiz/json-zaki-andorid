<?php 
$host = 'localhost';
$db_name = 'laundry_apps';
$username = 'root'; 
$password = ''; 

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die(json_encode(["message" => "Connection failed: " . $conn->connect_error]));
}
?>


<?php
header("Content-Type: application/json");
include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $sql = "SELECT * FROM layanan";
        $result = $conn->query($sql);
        if ($result) {
            $services = $result->fetch_all(MYSQLI_ASSOC);
            $response = [
                'status'  => true,
                'message' => 'Data retrieved successfully',
                'data'    => $services
            ];
        } else {
            $response = [
                'status'  => false,
                'message' => 'Failed to retrieve data'
            ];
        }
        echo json_encode($response);
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $nama = $data['nama'];
        $harga = $data['harga'];

        $sql = "INSERT INTO layanan (nama, harga) VALUES ('$nama', '$harga')";
        if ($conn->query($sql) === TRUE) {
            $response = [
                'status'  => true,
                'message' => 'Data Berhasil Ditambahkan'
            ];
        } else {
            $response = [
                'status'  => false,
                'message' => 'Data Gagal Ditambahkan'
            ];
        }
        echo json_encode($response);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'];
        $nama = $data['nama'];
        $harga = $data['harga'];

        $sql = "UPDATE layanan SET nama='$nama', harga='$harga' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $response = [
                'status'  => true,
                'message' => 'Data Berhasil Diupdate'
            ];
        } else {
            $response = [
                'status'  => false,
                'message' => 'Gagal Mengupdate Data'
            ];
        }
        echo json_encode($response);
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'];

        $sql = "DELETE FROM layanan WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $response = [
                'status'  => true,
                'message' => 'Data Berhasil Dihapus'
            ];
        } else {
            $response = [
                'status'  => false,
                'message' => 'Gagal Menghapus Data'
            ];
        }
        echo json_encode($response);
        break;

    default:
        echo json_encode([
            'status'  => false,
            'message' => 'Method tidak dikenali'
        ]);
        break;
}

$conn->close();
?>
