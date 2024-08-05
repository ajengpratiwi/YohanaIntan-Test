<!DOCTYPE html>
<html>
<head>
    <title>Penerjemah Bahasa Dagadu</title>
</head>
<body>
    <h1>Penerjemah Bahasa Dagadu</h1>

    <form method="post">
        <label for="kata">Masukkan kata atau kalimat:</label>
        <input type="text" id="kata" name="kata">
        <input type="submit" value="Terjemahkan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kataAsli = $_POST['kata'];

        // Pemetaan dari suku kata bahasa Jawa ke Dagadu
        $pemetaan = [
            'ha' => 'pa',
            'na' => 'dha',
            'ca' => 'ja',
            'ra' => 'ya',
            'ka' => 'nya',
            'da' => 'ma',
            'ta' => 'ga',
            'sa' => 'ba',
            'wa' => 'tha',
            'la' => 'nga',
            'pa' => 'ha',
            'dha' => 'na',
            'ja' => 'ca',
            'ya' => 'ra',
            'nya' => 'ka',
            'ma' => 'da',
            'ga' => 'ta',
            'ba' => 'sa',
            'tha' => 'wa',
            'nga' => 'la',
            'mu' => 'du'
        ];

        // Fungsi untuk menerjemahkan kata
        function terjemahkanDagadu($kata, $pemetaan) {
            $kataBaru = "";
            $sukuKata = preg_split('/(?<=[aiueo])(?=[b-df-hj-np-tv-z])/i', $kata);

            foreach ($sukuKata as $suku) {
                $suku = trim($suku);

                if (isset($pemetaan[$suku])) {
                    $kataBaru .= $pemetaan[$suku];
                } else {
                    // Jika suku kata tidak ada dalam pemetaan
                    $sukuBaru = '';
                    if (strlen($suku) > 1) {
                        $hurufPertama = $suku[0];
                        // Cari huruf pertama pada suku kata yang sesuai
                        foreach ($pemetaan as $asli => $substitusi) {
                            if (strpos($asli, $hurufPertama) === 0) {
                                $sukuBaru = $substitusi[0]; // Ambil huruf pertama dari hasil substitusi
                                break;
                            }
                        }
                    }
                    $kataBaru .= $sukuBaru;
                }
            }

            return $kataBaru;
        }

        $kataTerjemahan = terjemahkanDagadu($kataAsli, $pemetaan);
        echo "<p>Kata asli: " . htmlspecialchars($kataAsli) . "</p>";
        echo "<p>Kata terjemahan: " . htmlspecialchars($kataTerjemahan) . "</p>";
    }
    ?>
</body>
</html>
