<?php 
$this->load->view('partials/header');
?>
<!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Halo, Ryan. Silahkan Login!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
<div class="container">

        <?php echo $this->session->flashdata('message'); ?>

        <h1>Login</h1>
        <?php echo form_open(); ?>
        <?php echo form_label('Username'); ?>
        <br>
        <?php echo form_input('username', null); ?>
        <br>
        <?php echo form_label('Password'); ?>
        <br>
        <?php 
        $data = [
            "type" => "password",
            "name" => "password",
            "value" => null
        ];
        echo form_input($data);
        ?>
        <br><br>
        <button type="submit">Login</button>
        <?php echo form_close(); ?>
</div>

<?php 
$this->load->view('partials/footer');
?>