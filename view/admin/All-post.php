<?php 

require_once "../../init.php";
require_once "../../session.php";
require_once "../../app/http/session/authanticate.php";
require_once '../../includes/html/adminheader.php';
require_once '../../includes/html/adminsidebar.php';

if($table=post::find_all()) :

$number=1;
 ?>
 	<div class="container-fluid">
 		<b><h2>All Posts:</h2></b><hr>
 		<table class='table table-bordered table-striped'>
				<tr><th>S.No.</th><th>thumbnail</th><th>author</th><th>title</th><th>body</th><th>edit</th><th>delete</th></tr>
					<?php foreach ($table as $post) :?>
				<tr>
					<td><?php _e($number);?></td>
					<td><a href="#" class="send_image" id="<?php _e($hash->hash_id($post->id)); ?>"><img src="https://blogpostindia.com/Assets/images/<?php _e(link_image($post->image_id)); ?>" class="media-object img-rounded" id="thumbnail"  height="100px" width="100px" data-toggle="modal" data-target="#showimages"></a></td>
					<td><?php _e($post->author); ?></td>
					<td><?php _e($post->title); ?></td>
					<td> <?php _e(get_num_of_string($post->body,10));?>
						<a href="#" class="showbody" id="<?php _e($hash->hash_id($post->id));?>" >
							<b data-toggle="modal" data-target="#bodycontent"> Click to view</b>
						</a>
					</td>
					<td><a href="https://blogpostindia.com/view/admin/edit-post?edit=<?php _e($hash->hash_id($post->id)); ?>">edit</a></td>
					<td><a href="https://blogpostindia.com/middelware/admin/edit?delete=<?php _e($hash->hash_id($post->id)); ?>" onclick="return checkDelete()">delete</a></td>
				</tr>
     	<?php $number++; endforeach;?> 
     	</table>
 	</div>
<?php
     endif;
?>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>

<div id="showimages" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header blue">
				<button type="button" class="close right" data-dismiss="modal">&times;</button>
				<div class="container-fluid"><h3>Available Images</h3></div>
			</div>
			<h5 class="message"></h5>
			<?php $num=rand_num(); ?>
			<div class="container-fluid">
			
				<form id="thumb" action= "https://blogpostindia.com/middelware/admin/uploadPictures" method="post" enctype="multipart/form-data">
				<fieldset>
	              <legend> upload new:</legend>
	              <input id="num" type="hidden" name="number" value="<?php echo $num; ?>">
	                <div class="col-md-4"><input id="file" type="file" name="file" class="form-control images"></div>
	                <div class="col-md-6"><input id="discription
	                  " type="text" name="discription" class="form-control" placeholder="discription"></div>
	                <div class="col-md-1"><input type="submit" name="submit" value="upload" class="btn btn-danger"></div>
	                </fieldset>
	            </form>
	            
        	</div>
			<div id="imagebody" class="modal-body">
			</div>
		</div>
	</div>
</div>
<div id="bodycontent" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header blue">
				<button type="button" class="close right" data-dismiss="modal">&times;</button>
				<div class="container-fluid"><h3>body</h3></div>	
			</div>
			<div id="postbody" class="modal-body"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#thumb").on("submit",function(e){
			      e.preventDefault();
			      $.ajax({
			        url:"https://blogpostindia.com/middelware/admin/uploadPictures",
			        method: "POST",
			        data: new FormData(this), 
			        contentType:false,
			        processData:false,
			        success:function(data){
			          $('.message').html(data);
					  getimages();
			        }
			      });
			});
			function getimages(){
			$('.send_image').click(function(e){
				e.preventDefault();
				let image=$(this).attr('id');
					$.ajax({
						url:"https://blogpostindia.com/middelware/admin/edit",
						type:"post",
						data:{Image:image},
						success:function(data){
							$('#imagebody').html(data);
						}
					});
				});
			 }
			getimages();
			
				$('.showbody').click(function(e){
					e.preventDefault();
					let body=$(this).attr('id');
					$.ajax({
						url:"https://blogpostindia.com/middelware/admin/edit",
						type:"post",
						data:{Body:body},
						success:function(data){
							$('#postbody').html(data);
						}
					});
				});

	});
	 
</script>
<?php 
require '../../includes/html/adminfooter.php';