<h2>Silakan masukan angka</h2>
    <form method="post" action="">
        <label for="n">Input n:</label>
        <input type="number" id="n" name="n" min="1" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST['n'];
        function cetakBilangan($n) {
            $bilangan = [];
            for ($i = 1; $i <= $n; $i++) {
                $bilangan[] = $i;
            }
            
            $output = implode(',', $bilangan);
            
            echo "<p>Output: $output</p>";
        }

        cetakBilangan($n);
    }
    ?>
</body>
</html>