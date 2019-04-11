<?php 

require_once "../../init.php";
require_once "../../session.php";
require_once "../../app/http/session/authanticate.php";
require_once '../../includes/html/adminheader.php';
require_once '../../includes/html/adminsidebar.php';

if($table=draft::find_all()) :

$number=1;
 ?>
 	<div class="container-fluid">
 		<b><h2>All drafts:</h2></b><hr>
 		<table class='table table-bordered table-striped'>
				<tr><th>S.No.</th><th>author</th><th>title</th><th>body</th><th>image_id</th><th>edit</th><th>delete</th></tr>
					<?php foreach ($table as $draft) :?>
				<tr>
					<td><?php _e($number);?></td>
					
					<td><?php _e($draft->author); ?></td>
					<td><?php _e($draft->title); ?></td>
					<td> <?php _e(get_num_of_string($draft->body,10));?>
						<a href="#" class="showbody" id="<?php _e($hash->hash_id($draft->id));?>" >
							<b data-toggle="modal" data-target="#bodycontent"> Click to view</b>
						</a>
					</td>
					<td><?php _e($draft->image_id); ?></td>
					<td><a href="https://blogpostindia.com/view/admin/edit-post?editdraft=<?php _e($hash->hash_id($draft->id)); ?>">edit</a></td>
					<td><a href="https://blogpostindia.com/middelware/admin/edit?deleteDraft=<?php _e($hash->hash_id($draft->id)); ?>" onclick="return checkDelete()">delete</a></td>
				</tr>
     	<?php $number++; endforeach;?> 
     	</table>
 	</div>
<?php
     endif;
?>
<div id="bodycontent" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header blue">
				<button type="button" class="close right" data-dismiss="modal">&times;</button>
				<div class="container-fluid"><h3>body</h3></div>	
			</div>
			<div id="draftbody" class="modal-body"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function checkDelete(){return confirm('Are you sure?');}
	$(document).ready(function(){
				$('.showbody').click(function(e){
					e.preventDefault();
					let body=$(this).attr('id');
					$.ajax({
						url:"https://blogpostindia.com/middelware/admin/edit",
						type:"post",
						data:{draftBody:body},
						success:function(data){
							$('#draftbody').html(data);
						}
					});
				});

	});
	 
</script>
<?php 
require '../../includes/html/adminfooter.php';