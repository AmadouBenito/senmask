<?php
if (!$this->session->userdata('logged_in')) {
    redirect('Welcome/connexion');
}
?>
<?php $this->load->view('head'); ?>

<body id="page-top">
    <!-- Navigation-->
    <?php $this->load->view('nav_admin'); ?>
    <?php $this->load->view('header_admin'); ?>
    <div class="container">
        

    

    </div>
    <!--container end.//-->
    <?php $this->load->view('footer'); ?>
</body>


</html>