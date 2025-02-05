<?php
require 'connexion.php';
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
                <?php
                $sql = "SELECT bidai_kod, deskribapena FROM bidai_mota";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['bidai_kod'] . "'>" . $row['deskribapena'] . "</option>";
                    }
                }
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
        </form>
    </div>

    <div id="extra-form" class="extra-form" style="display: none;">
        <form id="additional-form"></form>
    </div>

    <div id="hegaldia-form" style="display: none;">
        <label for="hegaldi-mota">Zein hegaldi mota?</label><br><br>
        <input type="radio" id="joan" name="hegaldi-mota" value="joan">
        <label for="joan">Joan</label>
        <input type="radio" id="joan-etorria" name="hegaldi-mota" value="joan-etorria">
        <label for="joan-etorria">Joan/Etorri</label>
        <div id="hegaldi-extra"></div>
        <br>
    </div>

    <div id="joan-form" style="display: none;">
        <h3>HEGALDIA (JOANA)</h3><br>
        <label for="hegaldia-jatorria">Jatorrizko Aireportua:</label>
        <select id="hegaldia-jatorria" name="hegaldia-jatorria">
            <option value="">--Hemen--</option>
            <?php
            $sql = "SELECT aireportu_kod, hiria FROM aireportua";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['aireportu_kod'] . "'>" . $row['hiria'] . "</option>";
                }
            }
            ?>
        </select>
        <label for="hegaldia-helmuga">Helmugako Aireportua:</label>
        <select id="hegaldia-helmuga" name="hegaldia-helmuga">
            <option value="">--Hemen--</option>
            <?php
            $sql = "SELECT aireportu_kod, hiria FROM aireportua";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['aireportu_kod'] . "'>" . $row['hiria'] . "</option>";
                }
            }
            ?>
        </select>

        <label for="hegaldia-kodea">Hegaldi kodea:</label>
        <input type="text" id="hegaldia-kodea" name="hegaldia-kodea" required>

        <label for="hegaldia-airelinea">Airelinea:</label>
        <select id="hegaldia-airelinea" name="hegaldia-airelinea">
            <option value="">--Hemen--</option>
            <?php
            $sql = "SELECT airelinea_kod, izena FROM airelinea";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['airelinea_kod'] . "'>" . $row['izena'] . "</option>";
                }
            }
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
        <h3>HEGALDIA (JOANA)</h3>
        <label for="hegaldia-jatorria">Jatorrizko Aireportua:</label>
        <select id="hegaldia-jatorria" name="hegaldia-jatorria">
            <option value="">--Hemen--</option>
            <?php
            $sql = "SELECT aireportu_kod, hiria FROM aireportua";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['aireportu_kod'] . "'>" . $row['hiria'] . "</option>";
                }
            }
            ?>
        </select>
        <label for="hegaldia-helmuga">Helmugako Aireportua:</label>
        <select id="hegaldia-helmuga" name="hegaldia-helmuga">
            <option value="">--Hemen--</option>
            <?php
            $sql = "SELECT aireportu_kod, hiria FROM aireportua";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['aireportu_kod'] . "'>" . $row['hiria'] . "</option>";
                }
            }
            ?>
        </select>

        <label for="hegaldia-kodea">Hegaldi kodea:</label>
        <input type="text" id="hegaldia-kodea" name="hegaldia-kodea" required>

        <label for="hegaldia-airelinea">Airelinea:</label>
        <select id="hegaldia-airelinea" name="hegaldia-airelinea">
            <option value="">--Hemen--</option>
            <?php
            $sql = "SELECT airelinea_kod, izena FROM airelinea";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['airelinea_kod'] . "'>" . $row['izena'] . "</option>";
                }
            }
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
        <h3>HEGALDIA (JOAN/ETORRIA)</h3>
        <label for=hegaldia-itzuleradata>Itzulera Data:</label>
        <input type="date" id="hegaldia-itzulera" name="hegaldia-itzulera" required>

        <label for="hegaldia-itzuleraordua">Itzulera Ordua</label>
        <input type="time" id="hegaldia-itzuleraordua" name="hegaldia-itzuleraordua" required>

        <label for="hegaldia-iraupenabuelta">Bueltako Bidaiaren Iraupena (orduetan):</label>
        <input type="text" id="hegaldia-iraupenabuelta" name="hegaldia-iraupenabuelta" required>

        <label for="hegaldia-kodeabuelta">Bueltako Hegaldi Kodea:</label>
        <input type="text" id="hegaldia-kodeabuelta" name="hegaldia-kodeabuelta" required>

        <label for="hegaldia-airelineabuelta">Bueltako Airelinea:</label>
        <select id="hegaldia-airelineabuelta" name="hegaldia-airelineabuelta">
            <option value="">--Hemen--</option>
            <?php
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

        <h3>OSTATUA</h3>
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

        <h3>BESTE BATZUK</h3>
        <label for="beste-izena">Izena:</label>
        <input type="text" id="beste-izena" name="beste-izena" required>

        <label for="bestebatzuk-data">Data:</label>
        <input type="date" id="bestebatzuk-data" name="bestebatzuk-data" required>

        <label for="bestebatzuk-deskribapena">Deskribapena:</label>
        <textarea name="deskribapena" id="bestebatzuk-deskribapena" cols="107" rows="7"></textarea>
        <br>
        <label for="bestebatzuk-prezioa">Prezioa(€):</label>
        <input type="text" id="bestebatzuk-prezioa" name="bestebatzuk-prezioa" required>

        <br>
        <button type="submit">GORDE ZERBITZUA</button>
        <br>
    </div>
    <div id="taula" class="taula">
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const zerbitzuRadios = document.querySelectorAll('input[name="zerbitzu"]');
            const hegaldiRadios = document.querySelectorAll('input[name="hegaldi-mota"]');

            const hegaldiaForm = document.getElementById("hegaldia-form");
            const joanForm = document.getElementById("joan-form");
            const joanEtorriForm = document.getElementById("joan-etorria-form");
            const ostatuaForm = document.getElementById("ostatua-form");
            const besteBatzukForm = document.getElementById("bestebatzuk-form");
            const taulaDiv = document.getElementById('taula');

            function EzkutatuFormGuztiak() {
                hegaldiaForm.style.display = "none";
                joanForm.style.display = "none";
                joanEtorriForm.style.display = "none";
                ostatuaForm.style.display = "none";
                besteBatzukForm.style.display = "none";
            }

            function EzkutatuFormHegaldi() {
                joanForm.style.display = "none";
                joanEtorriForm.style.display = "none";
            }

            zerbitzuRadios.forEach(radio => {
                radio.addEventListener("change", function() {
                    EzkutatuFormGuztiak();
                    if (this.value === "hegaldia") {
                        hegaldiaForm.style.display = "block";
                    } else if (this.value === "ostatua") {
                        ostatuaForm.style.display = "block";
                    } else if (this.value === "bestebatzuk") {
                        besteBatzukForm.style.display = "block";
                    }
                });
            });

            hegaldiRadios.forEach(radio => {
                radio.addEventListener("change", function() {
                    EzkutatuFormHegaldi();
                    if (this.value === "joan") {
                        joanForm.style.display = "block";
                    } else if (this.value === "joan-etorria") {
                        joanEtorriForm.style.display = "block";
                    }
                });
            });

            document.getElementById('zerbitzuakerre-form').addEventListener('submit', function(event) {
                event.preventDefault();

                const bidaiamota = document.getElementById('bidaiamota').options[document.getElementById('bidaiamota').selectedIndex].text;
                const zerbitzu = document.querySelector('input[name="zerbitzu"]:checked') ? document.querySelector('input[name="zerbitzu"]:checked').value : '';

                const hegaldiaJatorria = document.getElementById('hegaldia-jatorria').options[document.getElementById('hegaldia-jatorria').selectedIndex].text;
                const hegaldiaHelmuga = document.getElementById('hegaldia-helmuga').options[document.getElementById('hegaldia-helmuga').selectedIndex].text;
                const hegaldiaKodea = document.getElementById('hegaldia-kodea').value;
                const hegaldiaAirelinea = document.getElementById('hegaldia-airelinea').options[document.getElementById('hegaldia-airelinea').selectedIndex].text;
                const hegaldiaPrezioa = document.getElementById('hegaldia-prezioa').value;
                const hegaldiaIrteera = document.getElementById('hegaldia-irteera').value;
                const hegaldiaOrdua = document.getElementById('hegaldia-ordua').value;
                const hegaldiaIraupena = document.getElementById('hegaldia-iraupena').value;

                const ostatuaIzena = document.getElementById('ostatua-izena').value;
                const ostatuaHiria = document.getElementById('ostatua-hiria').value;
                const ostatuaPrezioa = document.getElementById('ostatua-prezioa').value;
                const ostatuaSarrera = document.getElementById('ostatua-sarrera').value;
                const ostatuaIrteera = document.getElementById('ostatua-irteera').value;
                const ostatuaLogela = document.getElementById('ostatua-logela').options[document.getElementById('ostatua-logela').selectedIndex].text;

                const bestebatzukIzena = document.getElementById('beste-izena').value;
                const bestebatzukData = document.getElementById('bestebatzuk-data').value;
                const bestebatzukDeskribapena = document.getElementById('bestebatzuk-deskribapena').value;
                const bestebatzukPrezioa = document.getElementById('bestebatzuk-prezioa').value;

                let tableHtml = `
            <table border="1">
                <thead>
                    <tr>
                        <th>Bidaia mota</th>
                        <th>Zerbitzu</th>
                        <th>Jatorrizko Aireportua</th>
                        <th>Helmugako Aireportua</th>
                        <th>Hegaldi Kodea</th>
                        <th>Airelinea</th>
                        <th>Prezioa (€)</th>
                        <th>Irteera Data</th>
                        <th>Irteera Ordua</th>
                        <th>Bidaiaren Iraupena</th>
                        <th>Ostatua Izena</th>
                        <th>Ostatua Hiria</th>
                        <th>Ostatua Prezioa (€)</th>
                        <th>Sarrera Eguna</th>
                        <th>Irteera Eguna</th>
                        <th>Logela Mota</th>
                        <th>Izena (Beste Zerbitzuak)</th>
                        <th>Data (Beste Zerbitzuak)</th>
                        <th>Deskribapena (Beste Zerbitzuak)</th>
                        <th>Prezioa (Beste Zerbitzuak) (€)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>${bidaiamota}</td>
                        <td>${zerbitzu}</td>
                        <td>${hegaldiaJatorria}</td>
                        <td>${hegaldiaHelmuga}</td>
                        <td>${hegaldiaKodea}</td>
                        <td>${hegaldiaAirelinea}</td>
                        <td>${hegaldiaPrezioa}</td>
                        <td>${hegaldiaIrteera}</td>
                        <td>${hegaldiaOrdua}</td>
                        <td>${hegaldiaIraupena}</td>
                        <td>${ostatuaIzena}</td>
                        <td>${ostatuaHiria}</td>
                        <td>${ostatuaPrezioa}</td>
                        <td>${ostatuaSarrera}</td>
                        <td>${ostatuaIrteera}</td>
                        <td>${ostatuaLogela}</td>
                        <td>${bestebatzukIzena}</td>
                        <td>${bestebatzukData}</td>
                        <td>${bestebatzukDeskribapena}</td>
                        <td>${bestebatzukPrezioa}</td>
                    </tr>
                </tbody>
            </table>
        `;

                document.getElementById('taula').innerHTML = tableHtml;


            });
        });
    </script>


</body>

</html>