<?php $this->load->view("layout/head.php") ?>
<?php $this->load->view("layout/nav.php") ?>
		
<?php
	include('application/views/component/modal.php');
?>

<div class="container">

	<?php $this->load->view("component/back.php", ["backUrl" => getUrlBySegment(1)]) ?>

	<div class="p-4 rounded-lg bg-white m-2 border border-[#D3D3D3]">

		<label class="block pb-3">
			<span class="block text-sm font-medium pb-1">
				Pilih item
			</span>
			<select class="selectpicker" name="reqItem" style="width: 100%" >
			</select>
		</label>

		<label class="block pb-3">
			<span class="block text-sm font-medium">
				Nomor dokumen referensi (RTV)
			</span>
			<input type="text" name="docNumber" class="mt-1 p-3 text-[#575757] bg-[#EFEFEF] border border-slate-300 placeholder-slate-400 focus:outline-none block w-full rounded-md sm:text-sm" />
		</label>

		<label class="block pb-3">
			<span class="block text-sm font-medium">
				Tanggal return
			</span>
			<input type="date" name="reqDate" class="mt-1 input-date p-3 text-[#575757] bg-[#EFEFEF] border border-slate-300 placeholder-slate-400 w-full focus:outline-0 rounded-md sm:text-sm" />
		</label>

		<label class="block pb-3">
			<span class="block text-sm font-medium">
				Quantity
			</span>
			<div class="flex items-center">
				<input type="number" name="reqQty" class="mt-1 p-3 min-w-[10px] text-[#575757] bg-[#EFEFEF] border border-e-0 border-slate-300 placeholder-slate-400 focus:outline-none block rounded-s-md text-sm grow" />
				<span class="grow-0 mt-1 p-3 border-t border-b items-center border-slate-300 text-sm font-medium text-[#575757] bg-[#EFEFEF]" id="uom">
					UOM
				</span>
				<button class="grow-0 mt-1 p-3 focus:outline-none border flex justify-items-center bg-[#EFEFEF] border-slate-300 rounded-r-md text-sm w-max text-[#F97B22]" style="line-height : 0;" id="checkStock">
					<span class="material-symbols-rounded sm:pe-1" style="font-size:20px">
						check_circle
					</span>
					<span class="sm:block hidden leading-5">Cek stock</span>
				</button>
			</div>
			<div class="bg-[#FEE8B0] p-5 mt-2 rounded-lg text-black w-full flex items-center border border-black hidden" style="box-shadow: 3px 3px" id="stockVerified">
				<span class="material-symbols-rounded pe-3">
					verified
				</span>
				<div>
					<span class="text-sm">Stock tersedia di</span>
					<h3 class="font-bold text-2xl" id="verifyText"> </h3>
				</div>
				<div class="grow text-end flex flex-col">
					<span class="text-sm" id="verifyQtyPerPack">  </span>
					<span class="font-bold text-lg" id="verifyStock">  </span>
				</div>	
			</div>
		</label>

		<label class="block">
			<span class="block text-sm font-medium">
				Remarks (Tujuan request)
			</span>
			<div class="relative">
				<span class="absolute top-3 right-0 text-sm me-4 font-medium text-[#575757]" id="uom">
					
				</span>
				<textarea name="remarks" class="mt-1 p-3 text-[#575757] bg-[#EFEFEF] border border-slate-300 placeholder-slate-400 focus:outline-none block w-full rounded-md sm:text-sm" rows="4"></textarea>
			</div>
		</label>
		
	</div>

	<div class="m-2 mt-4">
		<button class="bg-[#F97B22] border rounded-lg font-bold text-[#FEE8B0] w-full h-14 text-sm" id="CTA">
			Ajukan Request
		</button>
	</div>
</div>

<?php
	include("application/views/layout/customJs.php")
?>
</body>
</html>
