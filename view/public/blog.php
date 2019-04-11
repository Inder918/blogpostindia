<?php
require '../../init.php';

require '../../includes/html/header.php';


if (!empty($_GET['id'])){

      $id=$hash->get_id($_GET['id']);
      $post=post::find_ById($id);

?>
<script type="text/javascript">
            $(".background-image").css({"background-image": "url(https://blogpostindia.com/Assets/images/<?php echo link_image($post->image_id);?>)", "background-size":"100% 100%","filter":"blur(8px)"});
            $(".header-font-image img").attr("src","https://blogpostindia.com/Assets/images/<?php echo link_image($post->image_id);?>");
            $(".thumbnail-image").css({"display":"block"});
            $(".header-title").html("<?php echo($post->title);?>");
            
    </script>
<div class="col-md-9 ">
        <div class="Author"><h5 class="text-red"> Author:<?php _e($post->author); ?></h4></div>
        <div class="bpiposttitle"><h2 class="text-purple"><?php _e($post->title); ?></h2></div>
        <div class="bpipostbody">
            <div class="col-md-11">
                <p class="paragraph"><?php _e($post->body); ?></p><br><br>
            </div>
        </div>
        <div class="bpipostcomment">
            <h3 class="text-primary">Comments</h3><br>
            <form action="#" method="post">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" name="user_name" class="form-control hover-border-purple" placeholder="your name" disabled>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="Email">Email*</label>
                        <input type="text" name="user_Email" class="form-control hover-border-purple" placeholder="your Email" disabled>
                    </div>
                </div>
                <div class="col-md-1"></div>
                
                <div class="col-md-11">
                    <div class="form-group">
                        <label for="Comment">Comment</label>
                        <textarea name="user_comment" class="form-control hover-border-purple" placeholder="Enter your comment" rows="6" disabled></textarea>
                    </div>
                    <input type="submit" name="user_submit" class="btn btn-primary" disabled>
                </div>
                <div class="col-md-1"></div>        
            </form>
        </div>
</div>
<br>



<?php

}
else{
    $page= !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $items_per_page=5;
    $total_items= post::count_all();
    $paginate= new pagination($page,$items_per_page,$total_items);

    try{
        $sql ="SELECT * FROM post";
        $sql .= " ORDER BY id DESC";
        $sql .=" LIMIT {$items_per_page}";
        $sql .=" OFFSET {$paginate->offset()}";
        $table=post::all_blog($sql);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
	if($table) : ?>
 <div class="col-md-9 ">
        <?php foreach ($table as $post) :?>
        <div class="media">
            <div class="media-left">
                <a style="text-decoration:none" href="https://blogpostindia.com/view/public/blog?id=<?php _e($hash->hash_id($post->id));?>"><img src="https://blogpostindia.com/Assets/images/<?php _e(link_image($post->image_id)); ?>" class="media-object img-rounded img-center"></a>
            </div>
            <div class="media-body">
                <div class="col-md-9">
                    <br>
                    <h5 class="media-heading " style="color:#f44336"><strong>Author:<?php _e(strtoupper($post->author)); ?></strong></h5>
                    <a style="text-decoration:none" href="https://blogpostindia.com/view/public/blog?id=<?php _e($hash->hash_id($post->id));?>"><h3 class="media-heading heading"><?php _e($post->title); ?></h3></a>
                    <p class="media-heading"><?php _e(get_num_of_string($post->body,40)); ?>...<a href="https://blogpostindia.com/view/public/blog?id=<?php _e($hash->hash_id($post->id));?>"><b>Read more >></b></a></p>
                </div>
            </div>
        </div>
        
        <?php 
            endforeach;
            endif; 

            if($paginate->total_page() >1 ){
                echo "<br><div class='row'><ul class='page' style='text-align:center'>";
                if($paginate->is_next()){
                echo "<li><a href='https://blogpostindia.com/view/public/blog?page={$paginate->next()}'>next</a></li>";
                }
                for($i=1;$i <= $paginate->total_page();$i++){
                    echo "<li ><a  href='https://blogpostindia.com/view/public/blog?page={$i}'>{$i}</a></li>";
                }
                
                
                
                if($paginate->is_previous()){
                    echo "<li ><a href='https://blogpostindia.com/view/public/blog?page={$paginate->previous()}'>previous</a></li>";
                }
                echo "</div></ul>";
            }

         ?>
</div><br>
<?php 

}
require '../../includes/html/sidebar.php';
require '../../includes/html/footer.php';