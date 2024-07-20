<style>
    .imagefooter {
/* filter: brightness(60%); */
background-color: transparent;.image {
  background-color: transparent;
}

}
    </style>

<div class="row mx-0 productFooter">
    <div class="col-md-12">
       Copyright  &copy; <?php echo e(date('Y')); ?>. All rights reserved. | This website is engineered by
      <a  href="https://wungaro.com"  target="_blank"> <img  class="imagefooter"  style=""
       src="/Logos/Wungaro.png"
       width="100" height="20">  </a>
       <a>
       <img style="" class="imagefooter"
       src="/Logos/12xLogo.png"
        alt="" width="74" height="36">
       </a>
       
        <?php if(config('app.show_version')): ?>
            <span class="float-right version_name">v0.0.1</span>
        <?php endif; ?>
    </div>


</div>

<?php /**PATH C:\websites\crm\crm\resources\views/layouts/footer.blade.php ENDPATH**/ ?>