<?php echo $header;?>
<div class="container" style="width:100%;margin:0px;padding:0px;">
    <div class="col-lg-3">
        <?php echo $sidebar;?>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Item</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="<?php echo base_url('category');?>"> Back</a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <?php echo $result->title; ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>AuthorID:</strong>
                    <?php echo $result->creator_id; ?>
                </div>
            </div>
        </div>
   
    </div>
</div>
<?php echo $footer;?>