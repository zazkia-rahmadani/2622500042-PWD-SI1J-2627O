<?php
$sukses = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = trim($_POST['nama'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $telepon = trim($_POST['telepon'] ?? '');
    $alamat  = trim($_POST['alamat'] ?? '');
    $dessert = trim($_POST['dessert'] ?? '');

    if (strlen($nama) < 3) {
        $errors[] = "Nama minimal 3 karakter.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }
    if (!preg_match('/^[0-9]{9,15}$/', $telepon)) {
        $errors[] = "Nomor telepon harus 9-15 digit angka.";
    }
    if (strlen($alamat) < 10) {
        $errors[] = "Alamat terlalu pendek.";
    }
    if ($dessert === '') {
        $errors[] = "Silakan pilih dessert favorit.";
    }

    if (empty($errors)) {
        $sukses = true;
    }
}
?>

<h2>Pendaftaran</h2>

<?php if ($sukses): ?>

    <div class="hasil-sukses">
        <h3>🎉 Pendaftaran Berhasil!</h3>
        <p>Terima kasih, <?= htmlspecialchars($nama) ?>. Berikut data yang kamu kirim:</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>: <?= htmlspecialchars($nama) ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: <?= htmlspecialchars($email) ?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>: <?= htmlspecialchars($telepon) ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= nl2br(htmlspecialchars($alamat)) ?></td>
            </tr>
            <tr>
                <td>Dessert Favorit</td>
                <td>: <?= htmlspecialchars($dessert) ?></td>
            </tr>
        </table>
        <p><a href="index.php?page=pendaftaran">Daftar lagi</a></p>
    </div>

<?php else: ?>

    <?php if (!empty($errors)): ?>
        <div class="hasil-error">
            <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form class="registration-form" method="POST" action="index.php?page=pendaftaran">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan nama"
            value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan email"
            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

        <label>Nomor Telepon</label>
        <input type="text" name="telepon" placeholder="Masukkan nomor telepon"
            value="<?= htmlspecialchars($_POST['telepon'] ?? '') ?>">

        <label>Alamat</label>
        <textarea name="alamat" placeholder="Masukkan alamat lengkap"><?= htmlspecialchars($_POST['alamat'] ?? '') ?></textarea>

        <label>Favorite Dessert</label>
        <select name="dessert">
            <option value="">-- Pilih Dessert --</option>
            <option value="Red Velvet Cake">Red Velvet Cake</option>
            <option value="Tiramisu">Tiramisu</option>
            <option value="Cheesecake">Cheesecake</option>
        </select>

        <button type="submit">Daftar Sekarang ♡</button>
        <button type="reset">Reset Form</button>
    </form>

<?php endif; ?>