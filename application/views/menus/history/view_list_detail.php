<?php 
    $array = [
        "title"=> "History Request",
    ];
    $this->load->view("layout/head.php",$array);
    $this->load->view("layout/nav.php",$array) 
?>

<div class="container">

<?php $this->load->view("component/back.php", ["backUrl" => getUrlBySegment(1)."/requestHistory"]) ?>

    <?php
        $array = [
            'isNavigatable' => false,
            'type' => $data[0]["TrnTypID"],
            'headerText' => $data[0]["DocNo"],
            'smallText' => $data[0]["DocDate"]
        ];
        $this->load->view("component/listCard", $array);
    ?>

    <?php
        foreach($data as $d){
    ?>
        <div class="p-4 rounded-xl bg-white m-2 border border-[#D3D3D3]" id="listCards">
            <div class="flex items-center justify-between">
                <span class="text-md text-[#F97B22]">
                    <?= $d["Record_Date"] ?>
                </span>
                <small class="text-zinc-500">
                    <?= $d["Record_Time"] ?>
                </small>
            </div>
            <div class="flex items-center justify-between mt-2">
                <span class="text-zinc-500">
                    <div class="flex justify-items-center text-sm mt-1">
                        <span class="material-symbols-rounded me-1" style="font-size: 18px">
                            folder_open
                        </span>
                        Dokumen referensi : <?= $d["Transaction_References"] ?>
                    </div>
                </span>
            </div>
            <div class="flex items-center justify-between mt-2 text-sm">
                <span class="text-zinc-500 flex justify-items-center mt-1">
                    <span class="material-symbols-rounded me-1" style="font-size: 18px">
                        box
                    </span>
                    <?= $d["Transaction_Item"] ?>
                </span>
                <span class="text-zinc-500">
                    <?= $d["Transaction_Quantity"] ?> PCS
                </span>
            </div>
            <div class="flex items-center justify-between mt-2 text-sm">
                <span class="text-zinc-500">
                    <?= $d["Original_Location"] ?>
                </span>
                <span class="text-zinc-500 material-symbols-rounded">
                    arrow_forward
                </span>
                <span class="text-zinc-500">
                    <?= $d["Target_Location"] ?>
                </span>
            </div>
        </div>
    <?php
        }
    ?>
    