<?php
require 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jatorria = $_POST['hegaldia-jatorria'];
    $helmuga = $_POST['hegaldia-helmuga'];
    $kodea = $_POST['hegaldia-kodea'];
    $prezioa = $_POST['hegaldia-prezioa'];

    $sql = "INSERT INTO hegaldiak (jatorria, helmuga, kodea, prezioa) VALUES ('$jatorria', '$helmuga', '$kodea', '$prezioa')";

    if ($conn->query($sql) === TRUE) {
        echo "Zerbitzua gorde da!";
    } else {
        echo "Errorea: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../css/styles.css">
    <title>Zerbitzuak Erregistratu</title>
</head>

<body>
    <div class="zerbitzuakerre-div">
        <form id="zerbitzuakerre-form" class="zerbitzuakerre-form">
            <h1>VIAJERO NÓMADA</h1>
            <br>
            <label for="aukeratubidaia">Aukeratu bidaia:</label>
            <select id="bidaiamota" name="bidaiamota">
                <option value="">--Hemen--</option>
            </select>
            <br>
            <p>
                <label for="zeinzerbitzu">Zein zerbitzu erregistratu behar duzu?</label>
                <br><br>
            <div class="radio-group">
                <input type="radio" id="hegaldia" name="zerbitzu" value="hegaldia">
                <label for="hegaldia">Hegaldia</label>
                <input type="radio" id="ostatua" name="zerbitzu" value="ostatua">
                <label for="ostatua">Ostatua</label>
                <input type="radio" id="bestebatzuk" name="zerbitzu" value="bestebatzuk">
                <label for="bestebatzuk">Beste Batzuk</label>
            </div>
            </p>
            <br>
        </form>
    </div>

    <div id="extra-form" class="extra-form" style="display: none;">
        <form id="additional-form"></form>
    </div>

    <div id="hegaldia-form" style="display: none;">
        <label for="hegaldi-mota">Zein hegaldi mota?</label><br>
        <input type="radio" id="joan" name="hegaldi-mota" value="joan">
        <label for="joan">Joan</label>
        <input type="radio" id="joan-etorria" name="hegaldi-mota" value="joan-etorria">
        <label for="joan-etorria">Joan/Etorri</label>
        <div id="hegaldi-extra"></div>
        <br>
    </div>

    <div id="joan-form" style="display: none;">
        <h3>Joan</h3><br>
        <label for="hegaldia-jatorria">Jatorrizko Aireportua:</label>
        <select id="hegaldia-jatorria" name="hegaldia-jatorria">
            <option value="">--Hemen--</option>
            <?php
            //DATU BASETIK
            $sql = "SELECT aireportu_kod, hiria FROM aireportua";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['aireportu_kod'] . "'>" . $row['hiria'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select>

        <label for="hegaldia-helmuga">Helmugako Aireportua:</label>
        <select id="hegaldia-helmuga" name="hegaldia-helmuga">
            <option value="">--Hemen--</option>
            <?php
            //DATU BASETIK
            $sql = "SELECT aireportu_kod, hiria FROM aireportua";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['aireportu_kod'] . "'>" . $row['hiria'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select>

        <label for="hegaldia-kodea">Hegaldi kodea:</label>
        <input type="text" id="hegaldia-kodea" name="hegaldia-kodea" required>

        <label for="hegaldia-airelinea">Airelinea:</label>
        <select id="hegaldia-airelinea" name="hegaldia-airelinea">
            <option value="">--Hemen--</option>
            <?php
            //DATU BASETIK
            $sql = "SELECT airelinea_kod, izena FROM airelinea";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['airelinea_kod'] . "'>" . $row['izena'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select>

        <label for="hegaldia-prezioa">Prezioa(€):</label>
        <input type="number" id="hegaldia-prezioa" name="hegaldia-prezioa" required>

        <label for="hegaldia-irteera">Irteera data:</label>
        <input type="date" id="hegaldia-irteera" name="hegaldia-irteera" required>

        <label for="hegaldia-ordua">Irteera ordua:</label>
        <input type="time" id="hegaldia-ordua" name="hegaldia-ordua" required>

        <label for="hegaldia-iraupena">Bidaiaren iraupena (orduetan):</label>
        <input type="text" id="hegaldia-iraupena" name="hegaldia-iraupena" required>

        <br><br>
        <button type="submit">GORDE ZERBITZUA</button>
    </div>

    <div id="joan-etorria-form" style="display: none;">
        <h3>Joan/Etorri</h3><br>
        <label for="hegaldia-jatorria">Jatorrizko Aireportua:</label>
        <select id="hegaldia-jatorria" name="hegaldia-jatorria">
            <option value="">--Hemen--</option>
            <?php
            //DATU BASETIK
            $sql = "SELECT aireportu_kod, hiria FROM aireportua";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['aireportu_kod'] . "'>" . $row['hiria'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select>

        <label for="hegaldia-helmuga">Helmugako Aireportua:</label>
        <select id="hegaldia-helmuga" name="hegaldia-helmuga">
            <option value="">--Hemen--</option>
            <?php
            //DATU BASETIK
            $sql = "SELECT aireportu_kod, hiria FROM aireportua";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['aireportu_kod'] . "'>" . $row['hiria'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select>

        <label for="hegaldia-kodea">Hegaldi kodea:</label>
        <input type="text" id="hegaldia-kodea" name="hegaldia-kodea" required>

        <label for="hegaldia-airelinea">Airelinea:</label>
        <select id="hegaldia-airelinea" name="hegaldia-airelinea">
            <option value="">--Hemen--</option>
            <?php
            //DATU BASETIK
            $sql = "SELECT airelinea_kod, izena FROM airelinea";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['airelinea_kod'] . "'>" . $row['izena'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select>

        <label for="hegaldia-prezioa">Prezioa(€):</label>
        <input type="number" id="hegaldia-prezioa" name="hegaldia-prezioa" required>

        <label for="hegaldia-irteera">Irteera data:</label>
        <input type="date" id="hegaldia-irteera" name="hegaldia-irteera" required>

        <label for="hegaldia-irteeraordua">Irteera ordua:</label>
        <input type="time" id="hegaldia-irteeraordua" name="hegaldia-irteeraordua" required>

        <label for="hegaldia-iraupena">Bidaiaren iraupena (orduetan):</label>
        <input type="text" id="hegaldia-iraupena" name="hegaldia-iraupena" required>

        <h3>Etorria</h3><br>
        <label for="hegaldia-itzulera">Itzulera data:</label>
        <input type="date" id="hegaldia-itzulera" name="hegaldia-itzulera" required>

        <label for="hegaldia-itzuleraordua">Itzulera ordua:</label>
        <input type="time" id="hegaldia-itzuleraordua" name="hegaldia-itzuleraordua" required>

        <label for="hegaldia-iraupenabuelta">Bueltako bidaiaren iraupana (orduetan):</label>
        <input type="text" id="hegaldia-iraupenabuelta" name="hegaldia-iraupenabuelta" required>

        <label for="hegaldia-kodeabuelta">Bueltako hegaldi kodea:</label>
        <input type="text" id="hegaldia-kodeabuelta" name="hegaldia-kodeabuelta" required>

        <label for="hegaldia-airelineabuelta">Bueltako airelinea:</label>
        <select id="hegaldia-airelinea" name="hegaldia-airelinea">
            <option value="">--Hemen--</option>
            <?php
            //DATU BASETIK
            $sql = "SELECT airelinea_kod, izena FROM airelinea";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['airelinea_kod'] . "'>" . $row['izena'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>
        <button type="submit">GORDE ZERBITZUA</button>

    </div>

    <div id="ostatua-form" style="display: none;">
        <label for="ostatua-izena">Hotelaren izena:</label>
        <input type="text" id="ostatua-izena" name="ostatua-izena" required>

        <label for="ostatua-hiria">Hiria:</label>
        <input type="text" id="ostatua-hiria" name="ostatua-hiria" required>

        <label for="ostatua-prezioa">Prezioa(€):</label>
        <input type="text" id="ostatua-prezioa" name="ostatua-prezioa" required>

        <label for="ostatua-sarrera">Sarrera eguna:</label>
        <input type="date" id="ostatua-sarrera" name="ostatua-sarrera" required>

        <label for="ostatua-irteera">Irteera eguna:</label>
        <input type="date" id="ostatua-irteera" name="ostatua-irteera" required>

        <label for="ostatua-logela">Logela mota:</label>
        <select id="ostatua-logela" name="ostatua-logela">
            <option value="">--Hemen--</option>
            <?php
            //DATU BASETIK
            $sql = "SELECT logela_kod, deskribapena FROM logela_mota";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['logela_kod'] . "'>" . $row['deskribapena'] . "</option>";
                }
            }
            ?>
        </select>

        <br>
        <button type="submit">GORDE ZERBITZUA</button>
    </div>

    <div id="bestebatzuk-form" style="display: none;">
        <label for="beste-izena">Izena:</label>
        <input type="text" id="beste-izena" name="beste-izena" required>

        <label for="bestebatzuk-data">Data:</label>
        <input type="date" id="bestebatzuk-data" name="bestebatzuk-data" required>

        <label for="bestebatzuk-deskribapena">Deskribapena:</label>
        <textarea name="deskribapena" id="bestebatzuk-deskribapena" cols="80" rows="10"></textarea>
        <br>
        <label for="bestebatzuk-prezioa">Prezioa(€):</label>
        <input type="text" id="bestebatzuk-prezioa" name="bestebatzuk-prezioa" required>

        <br>
        <button type="submit">GORDE ZERBITZUA</button>
    </div>

    <script>
        document.querySelectorAll('input[name="zerbitzu"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const formularioa = document.getElementById("extra-form");
                const aukeraGehigarriak = document.getElementById("additional-form");
                aukeraGehigarriak.innerHTML = "";
                formularioa.style.display = "block";

                if (this.value === "hegaldia") {
                    aukeraGehigarriak.innerHTML = document.getElementById("hegaldia-form").innerHTML;
                    document.querySelectorAll('input[name="hegaldi-mota"]').forEach(hegaldiRadio => {
                        hegaldiRadio.addEventListener('change', function() {
                            const hegaldiFormulario = document.getElementById("hegaldi-extra");
                            hegaldiFormulario.innerHTML = "";
                            if (this.value === "joan") {
                                hegaldiFormulario.innerHTML = document.getElementById("joan-form").innerHTML;
                            } else if (this.value === "joan-etorria") {
                                hegaldiFormulario.innerHTML = document.getElementById("joan-etorria-form").innerHTML;
                            }
                        });
                    });
                } else if (this.value === "ostatua") {
                    aukeraGehigarriak.innerHTML = document.getElementById("ostatua-form").innerHTML;
                } else if (this.value === "bestebatzuk") {
                    aukeraGehigarriak.innerHTML = document.getElementById("bestebatzuk-form").innerHTML;
                }
            });
        });
    </script>

</body>

</html>