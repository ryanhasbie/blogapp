<?php 
    $this->load->view('partials/header');
?>

<!-- Page Header-->
<?php 
    if (empty($blog['gambar'])) {
        $gambar = base_url().'assets/assets/img/post-bg.jpg';
    } else {
        $gambar = base_url().'uploads/' . $blog['gambar'];
    }
?>
<header class="masthead" style="background-image: url('<?php echo $gambar;?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $blog['judul']; ?></h1>
                            <span class="meta">
                                Posted by
                                <a href="#!">Ryan Hasbie</a>
                                on August 24, 2022
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?php echo $blog["konten"]; ?></p>
                    </div>
                </div>
            </div>
        </article>

<?php 
    $this->load->view('partials/footer');
?>

