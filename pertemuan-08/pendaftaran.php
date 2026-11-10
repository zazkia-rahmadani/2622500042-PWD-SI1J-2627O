<?php
$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $dessert = htmlspecialchars($_POST['dessert']);

    if (
        !empty($nama) &&
        !empty($email) &&
        !empty($telepon) &&
        !empty($alamat)
    ) {
        $pesan = "Pendaftaran berhasil! Selamat bergabung di MANISE, "
            . $nama . " ♡";
    } else {
        $pesan = "Mohon lengkapi semua data!";
    }
}
?>

<section class="registration">

    <h2>Customer Registration ♡</h2>

    <p>
        Daftarkan dirimu untuk mendapatkan informasi
        terbaru mengenai MANISE Dessert Cake.
    </p>

    <?php if (!empty($pesan)) : ?>
        <div class="message">
            <?php echo $pesan; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=pendaftaran"
        class="registration-form">

        <label>Nama Lengkap</label>
        <input type="text" name="nama"
            placeholder="Masukkan nama lengkap" required>

        <label>Email</label>
        <input type="email" name="email"
            placeholder="Masukkan email" required>

        <label>Nomor Telepon</label>
        <input type="tel" name="telepon"
            placeholder="Masukkan nomor telepon" required>

        <label>Alamat</label>
        <textarea name="alamat"
            placeholder="Masukkan alamat lengkap"
            required></textarea>

        <label>Favorite Dessert</label>

        <select name="dessert" required>
            <option value="">-- Pilih Dessert --</option>
            <option value="Strawberry Cake">Strawberry Cake</option>
            <option value="Chocolate Cake">Chocolate Cake</option>
            <option value="Tiramisu">Tiramisu</option>
            <option value="Red Velvet">Red Velvet</option>
        </select>

        <button type="submit">Daftar Sekarang ♡</button>

        <button type="reset" class="reset-button">
            Reset Form
        </button>

    </form>

</section>