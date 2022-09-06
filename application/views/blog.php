<?php 
    $this->load->view('partials/header')
?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Selamat Datang</h1>
                            <span class="subheading">Di Catatan Harian Ryan Hasbie</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <?php echo $this->session->flashdata('message'); ?>

                    <form>
                        <input type="text" name="find">
                        <button type="submit">Search</button>
                    </form>

                    <?php foreach ($blogs as $blog) : ?>
                    <div class="post-preview">
                            <h2 class="post-title">
                                <a href="<?php echo site_url('blog/detail/'. $blog['url']);?>">
                                    <?php echo $blog['judul'];?>
                                </a>
                            </h2>
                            <p class="post-meta">
                                Posted by
                                <a href="#!">Ryan Hasbie</a>
                                on <?php echo $blog['tanggal']; ?>
                                <?php if(isset($_SESSION['username'])) : ?>
                                <a href="<?php echo site_url ('blog/edit/'. $blog['id']); ?>"> Ubah </a>
                                <a href="<?php echo site_url('blog/delete/' . $blog['id']); ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');"> Hapus </a>
                                <?php endif; ?>
                            </p>
                            <p><?php echo $blog['konten']; ?></p>
                    </div>
                    <?php endforeach; ?>
                    <?php  echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
<?php 
    $this->load->view('partials/footer')
?>
        












