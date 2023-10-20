<?php 
    $array = [
        "title"=> "Transfer Barang",
    ];
    $this->load->view("layout/head.php",$array); 
    $this->load->view("layout/nav.php",$array) 
?>

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

        <div class="bg-[#FEE8B0] p-3 rounded-lg text-black w-full flex items-center border border-black mb-3 text-center">
            <label class="block grow">
                <span class="block text-xs font-normal">
                    Quantity Stock
                </span>
                <span class="block text-sm font-bold pb-1 mt-1">
                    <?= $QtyStock ?>
                </span>
            </label>

            <label class="block grow">
                <span class="block text-xs font-normal">
                    Quantity Request
                </span>
                <span class="block text-sm font-bold pb-1 mt-1">
                    <?= $QtyReqBal ?>
                </span>
            </label>
        </div>

        <div class="bg-[#FEE8B0] p-3 rounded-lg text-black w-full flex items-center border border-black mb-3 text-center">
            <label class="block grow">
                <span class="block text-xs font-normal">
                    Dari Lokasi
                </span>
                <span class="block text-sm font-bold pb-1 mt-1">
                    <?= $OriLoc ?>
                </span>
            </label>

            <span class="material-symbols-rounded">
                arrow_forward
            </span>

            <label class="block grow">
                <span class="block text-xs font-normal">
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

    <div class="p-4 rounded-lg bg-white m-2 mt-4 border border-[#D3D3D3]">
        <label class="block">
			<span class="block text-sm font-normal">
				Masukkan nomor Gate Pass
			</span>
			<input type="text" id="gatePass" class="mt-1 p-3 text-[#575757] bg-[#EFEFEF] border border-slate-300 placeholder-slate-400 focus:outline-none block w-full rounded-md sm:text-sm" />
		</label>
    </div>

    <div class="m-2 mt-4">
        <button class="bg-[#F97B22] border rounded-lg font-bold text-[#FEE8B0] w-full h-14 text-sm" id="CTA">
            Berikan Item
        </button>
    </div>

</div>

<script>

    function navigateToUrl(link) {
        window.location.replace(link);
    }

    function issueItemRequest() {
        var issuedDocNo = "<?php echo $DocNo; ?>";
        var issuedItemID = "<?php echo $TrnItemID; ?>";
        var issuedReferencedDocNumber = document.getElementById("gatePass").value;

        var baseLink = "http://192.168.20.251/return_to_vendor";
        
        if (!issuedReferencedDocNumber) {
            alert("Pastikan nomor gatepass sudah di-isi")
            return
        }

        $.ajax({
            url : baseLink + "/welcome/clientIssueItem",
            data : {
                issuedDocNo : issuedDocNo,
                issuedItemID : issuedItemID,
                issuedReferencedDocNumber : issuedReferencedDocNumber
            }
        })
        .done(function (data){
            navigateToUrl("<?php echo base_url()."welcome/transferForm"; ?>");
        })
    }

    //Prevent multiple repeating API requests
    var saveTimeout = false;
    $("#CTA").on("click", function (e) {
        if(saveTimeout) clearTimeout(saveTimeout);
        saveTimeout = setTimeout(function() {
            issueItemRequest();
        }, 500);
    })
</script>