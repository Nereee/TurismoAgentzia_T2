<?php
require 'connexion.php';
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
    <header>
        <div class="headerlogout-div">
            <img class="logo" src="../img/logo.jpg" alt="Logo" width="170" height="110">
            <h1>VIAJERO NÓMADA<h1>
                    <button class="bueltatu" onclick="window.location.href='menu.html'">
                        ⬅
                    </button>
                    <button class="logout" onclick="window.location.href='../index.html'">
                        LOG OUT
                    </button>
        </div>
    </header>
    <main>
        <div class="bidaiakerre-div">
            <form id="bidaiakerre-form" class="bidaiakerre-form" method="POST">
                <h1>BIDAIAK ERREGISTRATU</h1>
                <br />
                <label for="izena">Izena:</label>
                <input type="text" id="izena" name="izena" required />
                <br />
                <label for="bidaiamota">Bidaia mota:</label>
                <select id="bidaiamota" name="bidaiamota">
                    <option value="">--Hemen--</option>
                    <?php
                    //DATU BASETIK
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
                    //DATU BASETIK
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
                <textarea name="deskribapena" id="deskribapena" cols="80" rows="7"></textarea>
                <br />
                <label for="kanpokozerbitzuak">Kanpoan geratzen diren zerbitzuak:</label>
                <textarea name="kanpokozerbitzuak" id="kanpokozerbitzuak" cols="80" rows="7"></textarea>
                <br /><br>
                <button type="submit">GORDE</button>
            </form>


        </div>
        <div id="taula" class="taula">

        </div>
    </main>

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

        document.getElementById('bidaiakerre-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const izena = document.getElementById('izena').value;
            const bidaiamota = document.getElementById('bidaiamota').options[document.getElementById('bidaiamota').selectedIndex].text;
            const hasieraData = document.getElementById('hasieradata').value;
            const amaieraData = document.getElementById('amaieradata').value;
            const egunak = document.getElementById('egunak').value;
            const herrialdea = document.getElementById('herrialdea').options[document.getElementById('herrialdea').selectedIndex].text;
            const deskribapena = document.getElementById('deskribapena').value;
            const kanpokozerbitzuak = document.getElementById('kanpokozerbitzuak').value;

            let tableHtml = `
                <table>
                    <thead>
                        <tr>
                            <th>Izena</th>
                            <th>Bidaia mota</th>
                            <th>Hasiera data</th>
                            <th>Amaiera data</th>
                            <th>Egunak</th>
                            <th>Herrialdea</th>
                            <th>Deskribapena</th>
                            <th>Kanpoan geratzen diren zerbitzuak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>${izena}</td>
                            <td>${bidaiamota}</td>
                            <td>${hasieraData}</td>
                            <td>${amaieraData}</td>
                            <td>${egunak}</td>
                            <td>${herrialdea}</td>
                            <td>${deskribapena}</td>
                            <td>${kanpokozerbitzuak}</td>
                        </tr>
                    </tbody>
                </table>
            `;

            document.getElementById('taula').innerHTML = tableHtml;
        });
    </script>
</body>

</html>