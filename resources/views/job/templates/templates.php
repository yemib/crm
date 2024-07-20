<script id="serviceActionTemplate" type="text/x-jsrender">
    <a target="_blank" href="/admin/view_job/{{:id}}" class="btn btn-info"><i class="fas fa-eye card-view-icon"></i></a>
    <a data-id="{{:id}}"  data-toggle="modal" data-target="#instantmessage"  href="#" class="btn btn-info addMessageModal">Reminder Message</a>
    <a    target="_blank" href="/admin/job_invoices/{{:id}}" class="btn btn-info">Add Invoice</a>
   <a title="<?php echo __('messages.common.edit') ?>
    " class="btn btn-warning action-btn has-icon edit-btn" data-id="{{:id}}" href="#" data-toggle="modal" data-target="#addModal">
    <i class="fa fa-edit"></i> </a>
   <a title="<?php echo __('messages.common.delete') ?>
    " class="btn btn-danger action-btn has-icon delete-btn" data-id="{{:id}}" href="#"> <i class="fa fa-trash"></i> </a>

</script>

