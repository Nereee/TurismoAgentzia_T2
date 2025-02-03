<?php
require 'connexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link type="text/css" rel="stylesheet" href="../css/styles.css" />
  <title>Bidaiak Erregistratu</title>
</head>

<body>
  <div class="bidaiakerre-div">
    <form id="bidaiakerre-form" class="bidaiakerre-form">
      <h1>VIAJERO NÓMADA</h1>
      <br />
      <label for="izena">Izena:</label>
      <input type="text" id="izena" name="izena" required />
      <br />
      <label for="bidaiamota">Bidaia mota:</label>
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
      <br />
      <label for="hasieradata">Hasiera data:</label>
      <input type="date" id="hasieradata" name="hasieradata" />
      <br />
      <label for="amaieradata">Amaiera data:</label>
      <input type="date" id="amaieradata" name="amaieradata" />
      <br />
      <label for="egunak">Egunak:</label>
      <input type="text" id="egunak" name="egunak" />
      <br />
      <label for="herrialdea">Herrialdea:</label>
      <select id="herrialdea" name="herrialdea">
        <option value="">--Hemen--</option>
        <?php
        //DATU BASETIK
        $sql = "select herri_kod, herrialdea from herrialdeak";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['herri_kod'] . "'>" . $row['herrialdea'] . "</option>";
          }
        }
        $conn->close();
        ?>
      </select>
      <br />
      <label for="deskribapena">Deskribapena:</label>
      <textarea
        name="deskribapena"
        id="deskribapena"
        cols="80"
        rows="10"></textarea>
      <br />
      <label for="kanpokozerbitzuak">Kanpoan geratzen diren zerbitzuak:</label>
      <textarea
        name="kanpokozerbitzuak"
        id="kanpokozerbitzuak"
        cols="80"
        rows="10"></textarea>
      <br />
      <button type="submit">Sartu</button>
    </form>
  </div>
</body>

</html>