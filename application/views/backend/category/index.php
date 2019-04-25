
<?php echo $header;?>
<div class="container" style="width:100%;margin:0px;padding:0px;">
	<div class="col-lg-3">
		<?php echo $sidebar;?>
	</div>
	<div class="col-lg-9">
		<?php
		  if ($this->session->flashdata('updated')){
                echo '<div class="alert alert-success showalert" id="showalert">';
                echo $this->session->flashdata('updated');
                echo "</div>";
            }


		?>
		<table class="table table-responsive table-hover">
			<thead>
				<tr>
					<th>Category ID</th>
					<th>Title</th>
					<th>Author</th>
					<th>CreatedAt</th>
					<th style="width: 30%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($result as $item){
					$str='
					<a class="btn btn-info" href="'.base_url('category/'.$item->id).'"> &nbsp;<i class="fas fa-retweet"></i> show</a>
			        <a class="btn btn-primary" href="'.base_url('category/edit/'.$item->id).'"> <i class="fas fa-edit"></i> &nbsp;Edit</a>
					<form id="myform" method="DELETE" action="'.base_url().'category/delete/'.$item->id.'" class="pull-right">			          
			          <button type="button" value="'.$item->id.'" class="btn btn-danger btnDelete"> &nbsp;<i class="fas fa-trash-alt"></i>Delete</button>
			        </form>';

					echo '
					<tr>
						<td>'.$item->id.'</td>
						<td>'.$item->title.'</td>
						<td>'.$item->creator_id.'</td>
						<td>'.substr($item->created_at,0,11).'</td>
						<td>'.$str.'</td>
					</tr>
					';
				}

				?>
			</tbody>
		</table>
		</table>
	</div>
</div>
<?php echo $footer;?>