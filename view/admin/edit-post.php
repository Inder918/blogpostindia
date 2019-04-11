<?php 

require_once "../../init.php";
require_once "../../session.php";
require_once "../../app/http/session/authanticate.php";
require_once '../../includes/html/adminheader.php';
require_once '../../includes/html/adminsidebar.php';


  if (!empty($_GET['edit']) || !empty($_GET['editdraft'])) {
    if($_GET['edit']){
        $id=$hash->get_id($_GET['edit']);
        $post=post::find_ById($id);
      }if($_GET['editdraft']){
        $id=$hash->get_id($_GET['editdraft']);
        $post=draft::find_ById($id);
      }
      $num=rand_num(); 
  
      ?>
<div class="container-fluid">
        <div class="col-md-7">
          <div class="text-red text-center message"></div>
          <form id="postIt" action="https://blogpostindia.com/middelware/admin/updatePost" method="post" enctype="multipart/form-data">
            <fieldset>
            <legend>post:</legend>
                <input id="number" type="hidden" name="number" value="<?php _e($post->image_id); ?>">
                <input type="hidden" name="edit" value="<?php _e($hash->hash_id($id)); ?>">
                <div class="form-group">
                  <label>title</label>
                <input id="title" class="form-control"type="text" name="title" placeholder="title" value="<?php _e($post->title); ?>">
                </div>
                <div class="form-group">
                <label>author</label>
                <input id="author" class="form-control" type="text" name="author" value="<?php _e($post->author); ?>">
                </div>
                <div class="form-group">
                <label>body</label>
                <textarea id="body" class="form-control" col="10" rows="12" name="body"><?php _e($post->body); ?></textarea>
                </div>
                <input class="btn btn-success" type="submit" id="submit" name="submit" value="update Post">
                <button id="postBlog" class="btn btn-success" type="submit">publish</button>
                <button id="saveBlog" class="btn btn-danger" style="float: right">update draft</button>
            </fieldset>
          </form>
        </div>
        <div id="side"class="col-md-5">
            <form id="thumb" action= "https://blogpostindia.com/middelware/admin/uploadPictures" method="post" enctype="multipart/form-data">
              <fieldset>
              <legend>thumbnails:</legend>
              <input id="num"type="hidden" name="number" value="<?php echo $num;?>">
                <div class="col-md-4"><input id="file" type="file" name="file" class="form-control images"></div>
                <div class="col-md-6"><input id="discription
                  " type="text" name="discription" class="form-control" placeholder="discription"></div>
                <div class="col-md-1"><input type="submit" name="submit" value="upload" class="btn btn-danger"></div> 
              </fieldset>
            </form>
            <br>
            <div id="thumbnails"></div>
        </div>
        </div>
 
    <script type="text/javascript">

        $(document).ready(function(){
          var param= new URLSearchParams(window.location.search);
            if(param.has('editdraft')){
              $('#submit').css({"display":"none"});
            }else{$("#saveBlog").css({"display":"none"});$("#postBlog").css({"display":"none"});}
          $("#saveBlog").on('click',function(e){
            e.preventDefault();
            tinyMCE.triggerSave();
            var Title=$("#title").val();var Num=$("#number").val();var Author= $("#author").val();var Body= $("#body").val();
            $.ajax({
              url:"https://blogpostindia.com/middelware/admin/draft",
              method: "POST",
              data: {title:Title,number:Num,author:Author,body:Body}, 
              success:function(data){
                  $('.message').html(data);
                }
            });
          });
          $("#postIt").on('submit',function(e){
            e.preventDefault();
            tinyMCE.triggerSave();
            var Title=$("#title").val();var Num=$("#number").val();var Author= $("#author").val();var Body= $("#body").val();
            $.ajax({
              url:"https://blogpostindia.com/middelware/admin/createBlog",
              method: "POST",
              data: {title:Title,number:Num,author:Author,body:Body}, 
              success:function(data){
                if(data){
                  $('.message').html("draft posted on main site...<a href='https://blogpostindia.com/view/admin/All-post'>click to redirect</a>");
                }
                }
            });
          });
          $("#thumb").on("submit",function(e){
            e.preventDefault();
            $.ajax({
              url:"https://blogpostindia.com/middelware/admin/uploadPictures",
              method: "POST",
              data: new FormData(this), 
              contentType:false,
              processData:false,
              success:function(data){
                all_images();
              }
            });
          });

          function all_images(){
            let images= "<?php _e($hash->hash_id($id)); ?>";
            $.ajax({
              url:"https://blogpostindia.com/middelware/admin/edit",
              type: 'post',
              data:{Image:images},
              success:function(data){
                $('#thumbnails').html(data);
              }
            });
          }
          all_images();
          
        });




  </script>



      <?php
    }else {
      echo '<div class="container text-red">Please Select Post Which Post You want to Edit..!! <a href="https://blogpostindia.com/view/admin/All-post">Click to Redirect</a></div>';
    }


require '../../includes/html/adminfooter.php';


