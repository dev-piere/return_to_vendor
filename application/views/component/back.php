<a href="<?= base_url((isset($backUrl)) ? $backUrl : ''); ?>" onclick="return $(this).find('.iconBack').html(`<?php $this->load->view('component/spinner') ?>`)">
    <div class="ps-2 flex items-center mb-3 iconBack">
        <span class="material-symbols-rounded pe-1" style="font-size : 20px">
            arrow_back
        </span>
        <span class="text-xl pb-1 font-bold">Kembali</span>
    </div>
</a>