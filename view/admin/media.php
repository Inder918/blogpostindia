<?php
require_once '../../init.php';
require_once '../../session.php';
require_once "../../app/http/session/authanticate.php";
require_once '../../includes/html/adminheader.php';
require_once '../../includes/html/adminsidebar.php';

$table=upload::find_all();
$number=1;
?>
<div class="container-fluid">
	<div class="message"></div>
	<form id="thumb" action= "https://blogpostindia.com/middelware/admin/upload.php" method="post" enctype="multipart/form-data">
	           <fieldset>
	           <legend> upload new:</legend>
	           <input id="num"type="hidden" name="number" value="<?php echo rand_num();?>">
	             <div class="col-md-4"><input id="file" type="file" name="file" class="form-control images"></div>
	             <div class="col-md-6"><input id="discription
	               " type="text" name="discription" class="form-control" placeholder="discription"></div>
	             <div class="col-md-1"><input type="submit" name="submit" value="upload" class="btn btn-danger"></div> 
	           </fieldset>
	</form><br>
	<div class="container-fluid">
 		<fieldset><legend>All Media:</legend></fieldset>
 		<table class='table table-bordered table-striped'>
				<tr><th>S.No.</th><th>filename</th><th>filename</th><th>discription</th><th>type</th><th>size</th><th>image_id</th><th>delete</th></tr>
					<?php foreach ($table as $pictures) :?>
				<tr>
					<td><?php _e($number);?></td>
					<td><a href="#" class="send_image" id="<?php _e($pictures->post_id); ?>"><img src="https://blogpostindia.com/Assets/images/<?php _e(link_image($pictures->post_id)); ?>" class="media-object img-rounded" id="thumbnail"  height="100px" width="100px" data-toggle="modal" data-target="#showimage"></a></td>
					<td><?php _e($pictures->filename); ?></td>
					<td><?php _e($pictures->discription); ?></td>
					<td> <?php _e($pictures->type);?></td>
					<td> <?php _e($pictures->size);?></td>
					<td> <?php _e($pictures->post_id);?></td>
					<td><a href="https://blogpostindia.com/middelware/admin/edit.php?delete_image=<?php _e($hash->hash_id($pictures->id)); ?>" onclick="return checkDelete()">delete</a></td>
				</tr>
     	<?php $number++; endforeach;?> 
     	</table>
 	</div>
</div>
<div id="showimage" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="full-image" style="top:100;position: relative;"></div>
		</div>
	</div>
</div>
<script type="text/javascript">$(document).ready(function(){$('.send_image').click(function(e){e.preventDefault();image_id=$(this).attr('id'),$.ajax({url:"https://blogpostindia.com/middelware/admin/edit.php",type:"POST",data: {Image_id:image_id},success:function(data){$('.full-image').html(data);}});});$("#thumb").on("submit",function(e){e.preventDefault();$.ajax({url:"https://blogpostindia.com/middelware/admin/upload.php",method: "POST",data: new FormData(this), contentType:false,processData:false,success:function(data){$('.message').html(data);}});});});function checkDelete(){return confirm('Are you sure?');}</script>
<?php
require_once '../../includes/html/adminfooter.php';