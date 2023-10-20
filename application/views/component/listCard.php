<div class="group" 
    <?php
        if ($isNavigatable) {
            echo 'onclick=navigateToUrl("'.$link.'")';
        }
    ?>
>
    <div class="p-4 rounded-xl bg-white m-2 border border-[#D3D3D3] flex  items-center group-hover:scale-90 duration-200">
        <div class="type bg-[#F97B22] rounded-xl p-3 text-[#FEE8B0] font-bold text-xl me-4">
            <?= $type ?>
        </div>
        <div class="flex flex-col grow">
            <span class="grow font-bold text-lg"> <?= $headerText ?> </span>
            <small class="text-[#7C9070]"> <?= $smallText ?></small>
        </div>
        <?php
            if ($isNavigatable) {
        ?>
            <span class="material-symbols-rounded"> chevron_right </span>
        <?php
            }
        ?>
    </div>
</div>

<?php
    if ($isNavigatable) {
?>
    <script>
        function navigateToUrl(link) {
            window.location.replace(link);
        }
    </script>
<?php
    };
?>