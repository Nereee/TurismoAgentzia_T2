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
                <?php
                //DATU BASETIK
                $sql = "select bidai_kod, deskribapena from bidai_mota";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['bidai_kod'] . "'>" . $row['deskribapena'] . "</option>";
                    }
                }
                $conn->close();
                ?>
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
            <button type="button" onclick="erakutsiFormularioa()">GORDE ZERBITZUA</button>
        </form>
    </div>

    <div id="extra-form" class="extra-form" style="display: none;">
        <form id="additional-form">
            <p id="extra-options"></p>
        </form>
    </div>

    <script>
        function erakutsiFormularioa() {
            const hautatua = document.querySelector('input[name="zerbitzu"]:checked');
            if (hautatua) {
                const formularioa = document.getElementById("extra-form");
                const aukeraGehigarriak = document.getElementById("extra-options");
                aukeraGehigarriak.innerHTML = "";

                if (hautatua.value === "hegaldia") {
                    aukeraGehigarriak.innerHTML = `
                        <label for="hegaldi-mota">Zein hegaldi mota?</label><br>
                        <div class="radio-group">
                            <input type="radio" id="joan" name="hegaldi-mota" value="joan" onchange="erakutsiHegaldiFormularioa()">
                            <label for="joan">Joan</label>
                            <input type="radio" id="joan-etorria" name="hegaldi-mota" value="joan-etorria" onchange="erakutsiHegaldiFormularioa()">
                            <label for="joan-etorria">Joan/Etorri</label>
                        </div>
                        <div id="hegaldi-form"></div>
                    `;
                } else if (hautatua.value === "ostatua") {
                    aukeraGehigarriak.innerHTML = `
                        <label for="hotel-name">Hotelaren izena:</label>
                        <input type="text" id="ostatua-izena" name="ostatua-izena" required>

                        <label for="hiria">Hiria:</label>
                        <input type="text" id="ostatua-hiria" name="ostatua-hiria" required>

                        <label for="prezioa">Prezioa(€):</label>
                        <input type="text" id="ostatua-prezioa" name="ostatua-prezioa" required>

                        <label for="hasieradata">Sarrera eguna:</label>
                        <input type="date" id="ostatua-sarrera" name="ostatua-sarrera">

                        <label for="irteguna">Irteera eguna:</label>
                        <input type="date" id="ostatua-irteguna" name="ostatua-irteguna">

                        <label for="logela-mota">Logela mota:</label>
                        <select id="ostatua-logmota" name="ostatua-logmota">
                            <option value="">--Hemen--</option>
                <?php
                //DATU BASETIK
                $sql = "select logela_kod, deskribapena from logela_mota";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['logela_kod'] . "'>" . $row['deskribapena'] . "</option>";
                    }
                }
                $conn->close();
                ?>
                        </select>
                        <br><br>
                        <button type="button">GORDE ZERBITZUA</button>
                    `;
                } else if (hautatua.value === "bestebatzuk") {
                    aukeraGehigarriak.innerHTML = `
                        <label for="beste-izena">Izena:</label>
                        <input type="text" id="beste-izena" name="beste-izena" required>

                        <label for="beste-data">Data:</label>
                        <input type="date" id="beste-data" name="beste-data" required>

                        <label for="beste-deskribapena">Deskribapena:</label>
                        <textarea name="beste-deskribapena" id="beste-deskribapena" cols="110" rows="5"></textarea>
                        <br><br>
                        <label for="beste-prezioa">Prezioa(€):
                        <input type="text" id="beste-prezioa" name="beste-prezioa" required>
                        <br><br>
                        <button type="button">GORDE ZERBITZUA</button>
                    `;
                }

                formularioa.style.display = "block";
            } else {
                alert("Mesedez, aukeratu zerbitzu bat.");
            }
        }

        function erakutsiHegaldiFormularioa() {
            const hegaldiMota = document.querySelector('input[name="hegaldi-mota"]:checked').value;
            const hegaldiForm = document.getElementById("hegaldi-form");

            let hegaldiJoana = `
                <label for="jatorrizkoaireportua">Jatorrizko Aireportua:</label>
                <select id="jatorrizkoaireportua" name="jatorrizkoaireportua">
                    <option value="">--Hemen--</option>
                <?php
                //DATU BASETIK
                $sql = "select aireportu_kod, hiria from aireportua";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['izena'] . "</option>";
                    }
                }
                $conn->close();
                ?>
                </select>

                <label for="helmuga-aireportua">Helmugako Aireportua:</label>
                <select id="helmuga-aireportua" name="helmuga-aireportua">
                    <option value="">--Hemen--</option>
                <?php
                //DATU BASETIK
                $sql = "select aireportu_kod, hiria from aireportua";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['izena'] . "</option>";
                    }
                }
                $conn->close();
                ?>
                </select>

                <label for="hegaldi-kodea">Hegaldi Kodea:</label>
                <input type="text" id="hegaldi-kodea" name="hegaldi-kodea" required>

                <label for="hegaldi-airelinea">Airelinea:</label>
                <select id="hegaldi-airelinea" name="hegaldi-airelinea">
                    <option value="">--Hemen--</option>
                <?php
                //DATU BASETIK
                $sql = "select airelinea_kod, izena,herrialdea from airelinea";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['airelinea_kod'] . "'>" . $row['izena'] . "'>" . $row['herrialdea'] . "</option>";
                    }
                }
                $conn->close();
                ?>
                </select>

                <label for="hegaldi-prezioa">Prezioa(€):</label>
                <input type="text" id="hegaldi-prezioa" name="hegaldi-prezioa" required>

                <label for="irteera-data">Irteera Data:</label>
                <input type="date" id="irteera-data" name="irteera-data">

                <label for="irteera-ordua">Irteera Ordua:</label>
                <input type="time" id="irteera-ordua" name="irteera-ordua">

                <label for="hegaldi-iraupena">Bidariaren Iraupena(orduetan):</label>
                <input type="text" id="hegaldi-iraupena" name="hegaldi-iraupena" required>
                <br><br>
                <button type="button">GORDE ZERBITZUA</button>
            `;

            let hegaldiItzulia = `
                <label for="itzulera-data">Itzulera Data:</label>
                <input type="date" id="itzulera-data" name="itzulera-data">

                <label for="itzulera-ordua">Itzulera Ordua:</label>
                <input type="time" id="itzulera-ordua" name="itzulera-ordua">

                <label for="hegaldibuel-iraupena">Bueltako Bidariaren Iraupena(orduetan):</label>
                <input type="text" id="hegaldibuel-iraupena" name="hegaldibuel-iraupena" required>

                <label for="hegaldibuel-kodea">Bueltako Hegaldi Kodea:</label>
                <input type="text" id="hegaldibuel-kodea" name="hegaldibuel-kodea" required>

                <label for="hegaldibuel-airelinea">Bueltako Airelinea:</label>
                <select id="hegaldibuel-airelinea" name="hegaldibuel-airelinea">
                    <option value="">--Hemen--</option>
                <?php
                //DATU BASETIK
                $sql = "select airelinea_kod, izena,herrialdea from airelinea";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['airelinea_kod'] . "'>" . $row['izena'] . "'>" . $row['herrialdea'] . "</option>";
                    }
                }
                $conn->close();
                ?>
                </select>
                <br>
                <button type="button">GORDE ZERBITZUA</button>
            `;

            if (hegaldiMota === "joan") {
                hegaldiForm.innerHTML = `<h3>Hegaldia (Joana)</h3>${hegaldiJoana}`;
            } else if (hegaldiMota === "joan-etorria") {
                hegaldiForm.innerHTML = `<h3>Hegaldia (Joan/Etorri)</h3>${hegaldiJoana}<br><h3>Itzulerako hegaldia</h3>${hegaldiItzulia}`;
            }
        }
    </script>
</body>

</html>