<?php $this->load->view("layout/head.php") ?>
<?php $this->load->view("layout/nav.php") ?>
		
<?php
	include('component/modal.php');
?>

<div class="xl:w-2/4 m-auto">
    <section class="p-2">
        <div class="container">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2">
                <?php
                    $this->load->view('component/cardMenu', ['navigate' => base_url('welcome/requestForm'), 'image' => base_url('assets/png/guy-working-on-a-computer.png'), 'titleCard' => 'Buat Request']);

                    $this->load->view('component/cardMenu', ['navigate' => '#', 'image' => base_url('assets/img/history folder.png'), 'titleCard' => 'History Request']);

                    $this->load->view('component/cardMenu', ['navigate' => base_url('welcome/transferForm'), 'image' => base_url('assets/img/hand trolley rear view.png'), 'titleCard' => 'Transfer Barang']);

                    $this->load->view('component/cardMenu', ['navigate' => base_url('welcome/receiveForm'), 'image' => base_url('assets/img/hand trolley.png'), 'titleCard' => 'Terima Barang']);
                ?>
            </div>
        </div>
    </section>
</div>