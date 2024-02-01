<!DOCTYPE html>
<html lang="en">
<?php
// Parametri di connessione al database
$servername = "10.10.20.11";
$username = "web";
$password = "Password&1";
$database = "archiviodb";

// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $database);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_links ORDER BY id DESC";
$resource = $conn->query($sql);

while ($row = $resource->fetch_assoc()) {
    $result[] = $row;
}
$conn->close();
?>

<head>
    <title>Tabella archivio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <div class="row" id="container">
        <?php foreach ($result as $k => $v) : ?>
            <div class="box-container">
                <div class="title" style="color: blue">
                    <?php echo $result[$k]['title']; ?>
                </div>
                <div class="description">
                    <?php echo $result[$k]["description"]; ?>
                </div>
                <div class="category">
                    <?php echo $result[$k]["category"]; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</body>

</html>