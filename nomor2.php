<h3>Menentukan Bilangan Genap atau Ganjil</h3>

    <!-- Form untuk input angka -->
    <form method="post" action="">
        <label for="number">Input =</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Periksa">
    </form>

    <?php
    // Mengecek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil nilai dari form
        $number = intval($_POST['number']);

        // Mengecek apakah bilangan genap atau ganjil
        if ($number % 2 == 0) {
            echo '<p>Output = "Bilangan Genap"</p>';
        } else {
            echo '<p>Output = "Bilangan Ganjil"</p>';
        }
    }
    ?>
</body>