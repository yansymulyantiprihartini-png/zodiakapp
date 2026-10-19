<?php
$zodiak = "";
$hasil = "";
$tanggal_lahir = "";

function getZodiak($day, $month) {
    if (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) return "Capricorn";
    if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) return "Aquarius";
    if (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) return "Pisces";
    if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) return "Aries";
    if (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) return "Taurus";
    if (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) return "Gemini";
    if (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) return "Cancer";
    if (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) return "Leo";
    if (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) return "Virgo";
    if (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) return "Libra";
    if (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) return "Scorpio";
    return "Sagittarius";
}

if (isset($_POST['tanggal'])) {
    $tanggal_lahir = $_POST['tanggal'];
    $date = new DateTime($tanggal_lahir);
    $day = $date->format('d');
    $month = $date->format('m');
    $zodiak = getZodiak($day, $month);
    
    // Format tanggal Indonesia kayak punya lu
    $hasil = $date->format('j F Y');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cek Zodiak</title>
<style>
body{font-family:Arial,sans-serif;background:#0f0f0f;color:white;display:flex;justify-content:center;align-items:center;min-height:100vh;margin:0}
.card{background:#1a1a1a;padding:30px;border-radius:20px;width:90%;max-width:400px;text-align:center;box-shadow:0 10px 30px rgba(0,0,0,0.5)}
h1{font-size:24px;margin-bottom:10px} p{color:#aaa;margin-bottom:20px}
input[type=date]{width:100%;padding:15px;border-radius:10px;border:none;background:#2a2a2a;color:white;margin-bottom:15px}
button{width:100%;padding:15px;border-radius:10px;border:none;background:#e0ff00;color:black;font-weight:bold;font-size:16px;cursor:pointer}
.result{margin-top:20px;text-align:left;background:#2a2a2a;padding:20px;border-radius:15px}
.tag{background:#333;padding:5px 10px;border-radius:20px;font-size:12px;margin-right:5px}
</style>
</head>
<body>
<div class="card">
<?php if ($zodiak == ""): ?>
    <h1>Hari ini, semesta punya cerita.</h1>
    <p>Masukkan tanggal lahirmu dan lihat apa kata bintang.</p>
    <form method="POST">
        <input type="date" name="tanggal" required value="2010-01-06">
        <button type="submit">Cek zodiak</button>
    </form>
<?php else: ?>
    <h1>Halo, <?= $zodiak ?>.</h1>
    <p><?= $hasil ?></p>
    <div class="result">
        <p><span class="tag">Ramalan Cinta</span></p>
        <p>Hari ini energi kamu lagi kuat banget. Cocok buat ngomongin perasaan.</p>
        <br>
        <p><span class="tag">Keuangan</span></p>
        <p>Ada rezeki kecil datang tak terduga. Jangan boros dulu ya.</p>
    </div>
    <br>
    <form method="GET"><button type="submit">Cek lagi</button></form>
<?php endif; ?>
</div>
</body>
</html>
