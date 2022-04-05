<?php if ($this->session->has_userdata('danger')) { ?>
<div class="alert alert-error alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-ban"></i> <?=strip_tags(str_replace('</p>', '', $this->session->flashdata('danger')));?>
</div>
<?php } ?>
