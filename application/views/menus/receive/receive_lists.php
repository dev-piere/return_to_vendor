<?php $this->load->view("layout/head.php") ?>
<?php $this->load->view("layout/nav.php") ?>
		
<div class="container">

    <?php $this->load->view("component/back.php", ["backUrl" => getUrlBySegment(1)]) ?>

    <div class="p-4 rounded-xl bg-white m-2 border-[#D3D3D3] border-b-2 flex items-center">
        <span class="material-symbols-rounded me-4">
            search
        </span>
        <input type="text" class="h-full grow focus:outline-0"  id="searchBar">
        <span class="material-symbols-rounded">
            filter_list 
        </span>
    </div>

    <div id="listCards">

    </div>

</div>

<script>
    function loadRequests(filter) {
        var isFirst = 0;
        $.ajax({
            url: "http://localhost/return_to_vendor/welcome/getClientReceives",
            data: {
                searchBy : filter
            }
        })
        .done(function (data) {
            $("#listCards").html(data);
        })
    }

    //Prevent multiple repeating API requests
    var saveTimeout = false;
    $("#searchBar").on("keyup", function (e) {
        if(saveTimeout) clearTimeout(saveTimeout);
        saveTimeout = setTimeout(function() {
            loadRequests(e.currentTarget.value)
        }, 500);
    })

    $(document).ready(() => {
        loadRequests("")
    })

</script>