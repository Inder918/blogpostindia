<?php
require_once "../../init.php";
require_once "../../session.php";
require_once "../../app/http/session/authanticate.php";

try{
	if(!empty($_POST['Image'])){
		if($id=$hash->get_id($_POST['Image'])){
			$sql="SELECT filename,post_id FROM pictures";
			if($files=$database->query($sql)){
			foreach ($files as $photo) : 
			?>
				<a href="https://blogpostindia.com/middelware/admin/edit?key=<?php _e($hash->hash_id($id)); ?>&val=<?php _e($photo['post_id']); ?>"><img  src="https://blogpostindia.com/Assets/images/<?php _e($photo['filename'])?>" height="100px" width="100px"></a>
			<?php 
			endforeach;
			}
		}else echo "not get";
	}if(!empty($_POST['Image_id'])){
				?><img src="https://blogpostindia.com/Assets/images/<?php _e(link_image($_POST['Image_id'])); ?>" width="600" height="500"><?php
	}

}catch(PDOException $e){
	echo $e->getMessage();
}

try{
	if (!empty($_GET['key']) && !empty($_GET['val'])) {
		$id=$hash->get_id($_GET['key']);$key=$_GET['val'];
		$sql="UPDATE post SET image_id=:key WHERE id=:id ";
		$stmt=$database->conn->prepare($sql);
		$stmt->bindParam(":key",$key,PDO::PARAM_INT);
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		if($stmt->execute()){
			header('Location:https://blogpostindia.com/view/admin/All-post');
		}
	}
}catch(PDOException $e){
	echo $e->getMessage();
}


try{
	if (is_string($_POST['Body']) || is_string($_POST['draftBody'])) {
		if(!empty($_POST['Body'])){
			$id=$hash->get_id($_POST['Body']);
			$sql="SELECT body FROM post WHERE id=:id LIMIT 1";
			$stmt=$database->conn->prepare($sql);
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			$stmt->execute();
			if($body=$stmt->fetch()) {
				?>
				<?php _e($body['body']);?><br><a href="https://blogpostindia.com/view/admin/edit-post?edit=<?php _e($hash->hash_id($id)); ?>" class="hello editIt btn btn-primary purple" id="<?php _e($hash->hash_id($id)); ?>">Edit</a>

		 		<?php
			}
		
		}if(!empty($_POST['draftBody'])){
			$id=$hash->get_id($_POST['draftBody']);
			$sql="SELECT body FROM draft WHERE id=:id LIMIT 1";
			$stmt=$database->conn->prepare($sql);
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			$stmt->execute();
			if($body=$stmt->fetch()) {
				?>
				<?php _e($body['body']);?><br><a href="https://blogpostindia.com/view/admin/edit-post?editdraft=<?php _e($hash->hash_id($id)); ?>" class="hello editIt btn btn-primary purple" id="<?php _e($hash->hash_id($id)); ?>">Edit</a>

		 		<?php
			}
		
		}
		
	}
	
}catch(PDOException $e){
	echo $e->getMessage();
}

try{
	if (!empty($_GET["delete"])) {
		$post= new post();
		$post->id= $hash->get_id($_GET["delete"]);
		$post->delete_row();
		redirect("https://blogpostindia.com/view/admin/All-post");
	}if (!empty($_GET["delete_image"])) {
		$pictures= new upload();
		$pictures->id= $hash->get_id($_GET["delete_image"]);
		$pictures->delete_row();
		redirect("https://blogpostindia.com/view/admin/media");
	}if (!empty($_GET["deleteContact"])) {
		$contact= new contact();
		$contact->id= $hash->get_id($_GET["deleteContact"]);
		$contact->delete_row();
		redirect("https://blogpostindia.com/view/admin/contactUs");
	}
	if (!empty($_GET["deleteDraft"])) {
		$draft= new draft();
		$draft->id= $hash->get_id($_GET["deleteDraft"]);
		$draft->delete_row();
		redirect("https://blogpostindia.com/view/admin/drafts");
	}
}catch(PDOException $e){
	echo $e->getMessage();
}







