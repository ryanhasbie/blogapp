<?php
$this->load->view('partials/header.php');
?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Tambah Data Artikel</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<!-- End Page Header -->

<!-- form -->
<div class="container">
    <h1>Tambah Artikel</h1>
    <div class="alert alert-warning">
            <?php echo validation_errors();  ?>
    </div>
<?php echo form_open_multipart(); ?>
    <label>Judul</label>
    <br>
    <?php echo form_input('judul', set_value('judul')); ?>
    <br>
    <label>Konten</label>
    <br>
    <?php echo form_textarea('konten', set_value('konten')); ?>
    <br>
    <label>Url</label>
    <br>
    <?php echo form_input('url', set_value('url')); ?>
    <br>
    <label>Gambar</label>
    <br>
    <?php echo form_upload('gambar', set_value('gambar')); ?>
    <br><br>
    <button type="submit">Tambah Data</button>
<?php echo form_close(); ?>
</div>
<!-- End Form -->
<?php
$this->load->view('partials/footer.php');
?>
