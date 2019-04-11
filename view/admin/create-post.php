<?php 

require_once "../../init.php";
require_once "../../session.php";
require_once "../../app/http/session/authanticate.php";
require_once '../../includes/html/adminheader.php';
require_once '../../includes/html/adminsidebar.php';

$result=upload::find_all();
$num=rand_num();
?>
  
    
      <div class="container-fluid">
        <div class="col-md-7">
          <div class="text-red text-center message"></div>
          <form action="https://blogpostindia.com/middelware/admin/createBlog" method="post" enctype="multipart/form-data">
            <fieldset>
            <legend>post: <b class="text-red">save to draft before publish any blog...</b></legend>
                <input id="number" type="hidden" name="number" value="<?php echo($num); ?>">
        
                <div class="form-group">
                  <label>title</label>
                <input id="title" class="form-control " type="text" name="title" placeholder="title">
                </div>
                <div class="form-group">
                <label>author</label>
                <input id="author" class="form-control" type="text" name="author" placeholder="author name">
                </div>
                <div class="form-group">
                <label>body</label>
                <textarea id="body" class="form-control" col="10" rows="12" name="body"></textarea>
                </div>
                <input class="btn btn-success" type="submit" id="submit" name="submit" value="publish">
                <button id="saveBlog" class="btn btn-danger" style="float: right">save to draft</button>
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
            <div id="thumbnails">
              <?php foreach ($result as $images) : ?>
              <img  src="https://blogpostindia.com/Assets/images/<?php echo $images->filename; ?>" width="70px" height="70px" >
              <?php endforeach; ?>
            </div>
        </div>
        </div> 
    <script type="text/javascript">
			  $(document).ready(function(){
          $("#saveBlog").on('click',function(e){
            e.preventDefault();
            tinyMCE.triggerSave();
            var Title=$("#title").val();var Num=$("#number").val();var Author= $("#author").val();var Body= $("#body").val();
            $.ajax({
              url:"https://blogpostindia.com/middelware/admin/draft",
              method: "POST",
              data: {title:Title,number:Num,author:Author,body:Body,}, 
              success:function(data){
                  $('.message').html(data);
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
			          $('#thumbnails').html('<?php foreach ($result as $images) : ?><img  src="https://blogpostindia.com/Assets/images/<?php echo $images->filename; ?>" width="70px" height="70px" ><?php endforeach; ?>');
			        }
			      });
			    });
        });
	</script>
<?php
require '../../includes/html/adminfooter.php';