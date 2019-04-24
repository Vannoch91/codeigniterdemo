<?php echo $header;?>
<div class="container" style="width:100%;margin:0px;padding:0px;">
    <div class="col-lg-3">
        <?php echo $sidebar;?>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Item</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="<?php echo base_url('category');?>"> Back</a>
                </div>
            </div>
        </div>


        <form method="post" action="<?php echo base_url('category/update/'.$result->id);?>">
            <?php


            if ($this->session->flashdata('errors')){
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('errors');
                echo "</div>";
            }


            ?>


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" value="<?php echo $result->title; ?>">
                    </div>
                </div>
               
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>


        </form>
    </div>
    <!--end lg9-->
</div>
<?php echo $footer;?>