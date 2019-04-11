    <div id="bpisidebar" class="col-md-3 ">
            <form action="#" method="post" id="sidesubscribe" class="form-group">
                <input class="form-control sidestyle" type="text" name="Email" placeholder="Your Email" >
                <input class="btn btn-purple btn-Email" type="submit" name="submit" value=" SUBSCRIBE!" disabled><br><br>
            </form>
            <div id="sidesearch" class="form-group">
                <input class="form-control sidestyle col-sm-9" type="search" name="search" placeholder="Search" >
                <button class="btn btn-purple col-sm-2 " name="search_query" style="padding:5px 5px;" disabled><span class="glyphicon glyphicon-search"></span></button>
            </div>
            <div class="recent-post">
                <h4><b>Recent Posts</b></h4>
            <?php 
            try{
                $sql ="SELECT * FROM post";
                $sql .= " ORDER BY id DESC";
                $table=post::all_blog($sql);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            foreach ($table as $key): 
                ?>
                <h5><b><a href="https://blogpostindia.com/view/public/blog.php?id=<?php _e($hash->hash_id($key->id)); ?>"><?php _e($key->title); ?></a></b></h5>
            <?php endforeach; ?>
        </div>
    </div>   