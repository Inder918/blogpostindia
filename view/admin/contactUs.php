<?php 
require '../../init.php';
require '../../session.php';
require '../../includes/html/adminheader.php';
require '../../includes/html/adminsidebar.php';
$table=contact::find_all();
$number=1; 
?>
<div class="container-fluid">
 		<fieldset><legend >Contact Us: <b style="color:red">do not open any url here...</b></legend></fieldset>
 		<table class='table table-bordered table-striped'>
				<tr><th>S.No.</th><th>name</th><th>Email</th><th>Subject</th><th>Comment</th><th>delete</th></tr>
					<?php foreach ($table as $contact) :?>
				<tr>
					<td><?php _e($number);?></td>
					<td><?php _e($contact->name);?></td>
					<td><?php _e($contact->email); ?></td>
					<td><?php _e($contact->subject); ?></td>
					<td> <?php _e($contact->comment);?></td>
					<td><a href="https://blogpostindia.com/middelware/admin/edit.php?deleteContact=<?php _e($hash->hash_id($contact->id)); ?>" onclick="return checkDelete()">delete</a></td>
				</tr>
     	<?php $number++; endforeach;?> 
     	</table>
 	</div>
 	<script language="JavaScript" type="text/javascript">
		function checkDelete(){
		    return confirm('Are you sure?');
		}
	</script>
<?php
require '../../includes/html/adminfooter.php';
 ?>