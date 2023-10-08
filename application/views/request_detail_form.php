<?php $this->load->view("layout/head.php") ?>
<?php $this->load->view("layout/nav.php") ?>

<div class="container">

<?php $this->load->view("component/back.php", ["backUrl" => getUrlBySegment(1)."/transferForm"]) ?>

    <div class="p-4 rounded-lg bg-white m-2 border border-[#D3D3D3]">

		<label class="block pb-3">
			<span class="block text-sm font-normal pb-1">
				Item ID
			</span>
			<span class="block text-sm font-bold pb-1 mt-1">
				<?= $TrnItemID ?>
			</span>
		</label>

		<label class="block pb-3">
			<span class="block text-sm font-normal">
				Nomor dokumen referensi (RTV)
			</span>
			<span class="block text-sm font-bold pb-1 mt-1">
				<?= $DocNo ?>
			</span>
		</label>

		<label class="block pb-3">
			<span class="block text-sm font-normal">
				Tanggal return
			</span>
			<span class="block text-sm font-bold pb-1 mt-1">
				<?= $DocDate ?>
			</span>
		</label>

        <div class="flex">
            <label class="block pb-3 grow">
                <span class="block text-sm font-normal">
                    Quantity Stock
                </span>
                <span class="block text-sm font-bold pb-1 mt-1">
                    <?= $QtyStock ?>
                </span>
            </label>

            <label class="block pb-3 grow">
                <span class="block text-sm font-normal">
                    Quantity Request
                </span>
                <span class="block text-sm font-bold pb-1 mt-1">
                    <?= $QtyReqBal ?>
                </span>
            </label>
        </div>

        <div class="flex">
            <label class="block pb-3 grow">
                <span class="block text-sm font-normal">
                    Dari Lokasi
                </span>
                <span class="block text-sm font-bold pb-1 mt-1">
                    <?= $OriLoc ?>
                </span>
            </label>

            <label class="block pb-3 grow">
                <span class="block text-sm font-normal">
                    Ke Lokasi
                </span>
                <span class="block text-sm font-bold pb-1 mt-1">
                    <?= $ToLoc ?>
                </span>
            </label>
        </div>

		<label class="block">
			<span class="block text-sm font-normal">
				Remarks (Tujuan request)
			</span>
			<span class="block text-sm font-bold pb-1 mt-1">
				<?= $Remarks ?>
			</span>
		</label>
		
	</div>

</div>