<a href="<?= $navigate; ?>" class="group sm:cursor-pointer" onclick="return $(this).find('.titleMenu').html(`<?php $this->load->view('component/spinner'); ?>`)">
    <div class="bg-white border border-b-2 rounded-lg flex flex-col p-3 h-44 group-active:rotate-2 group-active:scale-90 duration-200">
        <img src="<?= $image; ?>" alt="HR System" class="h-24 m-auto group-active:-rotate-2 group-active:scale-[1.8] group-active:-translate-y-4 group-active:duration-500 duration-300 group-hover:-translate-y-3">
        <span class="text-sm font-bold text-center mx-auto group-active:hidden titleMenu"><?= $titleCard; ?></span>
    </div>
</a>