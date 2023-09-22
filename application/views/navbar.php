<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Welcome to CodeIgniter</title>
	<link href="<?= base_url() ?>assets/dist/output.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="bg-[#EFEFEF]">

		<nav class='bg-white p-2 sticky top-0 mb-4 z-10'>
            <ul class='flex justify-between items-center'>
                <li>
                    <span class='bg-orange-300 w-10 h-10 block rounded-md'> 
                        <img src="<?= base_url() ?>assets/img/peep.png" alt="" />
                    </span>
                </li>
                <li class='font-bold text-lg'>
                    Return to Vendor
                </li>
                <li class='cursor-pointer' onClick={logout}>
					<span class="material-symbols-rounded" style="font-size : 40px">
						move_item
					</span>
                </li>
            </ul>
        </nav>

		<div class="container">

		<div class="ps-2 text-xl items-center font-bold flex">
			<span class="material-symbols-rounded pe-1" style="font-size : 20px">
				arrow_back
			</span>
			<span class="pb-1 font-bold">
				Kembali
			</span>
		</div>

		<div class="p-4 rounded-lg bg-white m-2 border border-[#D3D3D3]">

			<label class="block pb-3">
				<span class="block text-sm font-medium pb-1">
					Pilih item
				</span>
				<select class="js-example-data-ajax form-control" style="width: 100%" >
				</select>
			</label>

			<label class="block pb-3">
				<span class="block text-sm font-medium">
					Nomor dokumen referensi (RTV)
				</span>
				<input type="text" name="itemID" class="mt-1 p-3 text-[#929292] bg-[#EFEFEF] border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none block w-full rounded-md sm:text-sm" />
			</label>

			<label class="block pb-3">
				<span class="block text-sm font-medium">
					Tanggal return
				</span>
				<input type="date" name="itemID" class="mt-1 p-3 text-[#929292] bg-[#EFEFEF] border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none block w-full rounded-md sm:text-sm" />
			</label>

			<label class="block">
				<span class="block text-sm font-medium">
					Quantity
				</span>
				<div class="relative">
					<span class="absolute top-3 right-0 text-sm me-4 font-medium text-[#929292]" id="uom">
						
					</span>
					<input type="number" name="itemID" class="mt-1 p-3 text-[#929292] bg-[#EFEFEF] border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none block w-full rounded-md sm:text-sm" />
				</div>
			</label>
			
		</div>

		<div class="m-2 mt-4">
			<button class="bg-[#F97B22] border rounded-lg font-bold text-[#FEE8B0] w-full h-14 text-sm">
				Ajukan Request
			</button>
		</div>

		</div>

<script src="<?= base_url()?>/assets/js/main_select2.js"></script>
</body>
</html>
