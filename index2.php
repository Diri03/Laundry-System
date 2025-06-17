<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .mb-3 {
        margin-bottom: 0.5rem;
    }
</style>

<body>
    <form action="proses.php" method="post">
        <div class="mb-3">
            <label for="kendaraan">Kendaraan</label><br>
            <select name="kendaraan" id="kendaraan" onchange="toggleInput(this.value)">
                <option value="">Pilih kendaraan</option>
                <option value="Mobil">Mobil</option>
                <option value="Motor">Motor</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Nama</label><br>
            <input type="text" name="nama">
        </div>
        <div class="mb-3">
            <label for="">Warna</label><br>
            <input type="text" name="warna">
        </div>
        <div class="mb-3">
            <label for="">Details</label><br>
        </div>
        <div class="mb-3">
            <input type="text" name="jenis" id="jenis" style="display: none;">
            <input type="number" name="jml_pintu" id="jml_pintu" style="display: none;">
        </div>
        <div class="mb-3">
            <button type="submit" name="kirim">Kirim</button>
        </div>
    </form>
    <br><br><br>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Warna</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Suzuki</td>
                <td>Merah</td>
                <td>Jenis Motor: Beat</td>
            </tr>
        </tbody>
    </table>

    <script>
        function toggleInput(value) {
            document.getElementById("jenis").style.display = value === "Motor" ? "block" : "none";
            document.getElementById("jml_pintu").style.display = value === "Mobil" ? "block" : "none";
        }
    </script>

</body>
</html>