<nav class='bg-white p-3 sticky top-0 mb-4 z-10 border-b border-[#D3D3D3]'>
    <ul class='flex justify-between items-center'>
        <li>
            <span class='bg-orange-300 w-10 h-10 block rounded-md'> 
                <img src="<?= base_url() ?>assets/img/peep.png" alt="" />
            </span>
        </li>
        <li class='font-bold text-lg'>
            Return to Vendor
        </li>
        <li class='cursor-pointer flex'>
            <a style="line-height: 0" href="<?= base_url('auth/logout'); ?>">
                <span class="material-symbols-rounded" style="font-size : 40px">
                    move_item
                </span>
            </a>
        </li>
    </ul>
</nav>