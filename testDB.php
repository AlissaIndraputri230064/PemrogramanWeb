<?php
    $host = "localhost:8111";
    $database = "test_db";
    $user = "root";
    $password = "";

    $dsn = "mysql:host=$host;dbname=$database";
    try {
        // Instansiasi Objek PDO
        $conn = new PDO($dsn, $user, $password);
        // Exception jika ada error
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Berhasil Terhubung ke Database!";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $statement = $conn->query("SELECT * FROM countries");
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Country</title>
    </head>
    <body>
        <h1>Daftar Populasi Negara</h1>
        <ul>
            <?php
                foreach ($rows as $row) {
                    echo "<li>" . $row["name"] . " = " . $row["population"] . "</li>";
                }
            ?>
        </ul>
    </body>
</html>