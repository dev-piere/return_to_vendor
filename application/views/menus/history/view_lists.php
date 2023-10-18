<?php $this->load->view("layout/head.php") ?>
<?php $this->load->view("layout/nav.php") ?>

<div class="container">

<?php $this->load->view("component/back.php", ["backUrl" => getUrlBySegment(1)]) ?>

    <div class="p-4 rounded-lg bg-white m-2 border border-[#D3D3D3]">