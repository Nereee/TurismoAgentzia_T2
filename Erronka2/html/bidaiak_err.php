<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $izena = $_POST['izena'];
    $bidaiamota = $_POST['bidaiamota'];
    $hasieradata = $_POST['hasieradata'];
    $amaieradata = $_POST['amaieradata'];
    $herrialdea = $_POST['herrialdea'];
    $deskribapena = $_POST['deskribapena'];
    $kanpokozerbitzuak = $_POST['kanpokozerbitzuak'];


    if ($hasieradata >= $amaieradata) {
        echo "<script>alert('Errorea: Amaiera data hasiera datatik handia izan behar da.');</script>";
    } else {
        $date1 = new DateTime($hasieradata);
        $date2 = new DateTime($amaieradata);
        $interval = $date1->diff($date2);
        $egunak = $interval->days;

        $sql = "INSERT INTO bidaiak (izena, bidaiamota, hasieradata, amaieradata, egunak, herrialdea, deskribapena, kanpokozerbitzuak)
                VALUES ('$izena', '$bidaiamota', '$hasieradata', '$amaieradata', '$egunak', '$herrialdea', '$deskribapena', '$kanpokozerbitzuak')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Datuak ondo gorde dira.');</script>";
            echo "<script>window.location.href = 'menu_nagusia.php';</script>"; 
        } else {
            echo "<script>alert('Errorea datuak gordetzean: " . $conn->error . "');</script>";
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/css" rel="stylesheet" href="../css/styles.css" />
    <title>Bidaiak Erregistratu</title>
</head>

<body>
    <div class="bidaiakerre-div">
        <form id="bidaiakerre-form" class="bidaiakerre-form" method="POST">
            <h1>VIAJERO NÓMADA</h1>
            <br />
            <label for="izena">Izena:</label>
            <input type="text" id="izena" name="izena" required />
            <br />
            <label for="bidaiamota">Bidaia mota:</label>
            <select id="bidaiamota" name="bidaiamota">
                <option value="">--Hemen--</option>
                <?php
                // Datu baseko aukera (bidaiak)
                $sql = "SELECT bidai_kod, deskribapena FROM bidai_mota";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['bidai_kod'] . "'>" . $row['deskribapena'] . "</option>";
                    }
                }
                ?>
            </select>
            <br />
            <label for="hasieradata">Hasiera data:</label>
            <input type="date" id="hasieradata" name="hasieradata" required />
            <br />
            <label for="amaieradata">Amaiera data:</label>
            <input type="date" id="amaieradata" name="amaieradata" required />
            <br />
            <label for="egunak">Egunak:</label>
            <input type="text" id="egunak" name="egunak" readonly />
            <br />
            <label for="herrialdea">Herrialdea:</label>
            <select id="herrialdea" name="herrialdea">
                <option value="">--Hemen--</option>
                <?php
                // Datu baseko herrialdeak
                $sql = "SELECT herri_kod, herrialdea FROM herrialdeak";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['herri_kod'] . "'>" . $row['herrialdea'] . "</option>";
                    }
                }
                ?>
            </select>
            <br />
            <label for="deskribapena">Deskribapena:</label>
            <textarea name="deskribapena" id="deskribapena" cols="80" rows="10"></textarea>
            <br />
            <label for="kanpokozerbitzuak">Kanpoan geratzen diren zerbitzuak:</label>
            <textarea name="kanpokozerbitzuak" id="kanpokozerbitzuak" cols="80" rows="10"></textarea>
            <br />
            <button type="submit">GORDE</button>
        </form>
    </div>

    <script>
        document.getElementById('amaieradata').addEventListener('change', function() {
            const hasiera = document.getElementById('hasieradata').value;
            const amaiera = this.value;
            if (hasiera && amaiera) {
                const startDate = new Date(hasiera);
                const endDate = new Date(amaiera);
                const timeDifference = endDate - startDate;
                const days = timeDifference / (1000 * 3600 * 24);
                document.getElementById('egunak').value = days >= 0 ? days : 0;
            }
        });
    </script>
</body>

</html>