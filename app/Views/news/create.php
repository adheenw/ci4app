<h2><?= esc($title) ?></h2>

<!-- fungsi yang digunakan untuk menampilkan kesalahan terkait perlindungan CSRF kepada pengguna.  -->
<?= session()->getFlashdata('error') ?>
<!-- fungsi yang disediakan oleh Form Helper digunakan untuk melaporkan kesalahan terkait validasi form. -->
<?= validation_list_errors() ?>

<form action="/news" method="post">

    <!-- membantu melindungi aplikasi dari serangan CSRF. -->
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?= set_value('title') ?>">
    <br>

    <label for="body">Text</label>
    <!-- set_value() fungsi yang disediakan oleh Form Helper digunakan untuk menampilkan data masukan lama ketika terjadi kesalahan. -->
    <textarea name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Create news item">
</form>