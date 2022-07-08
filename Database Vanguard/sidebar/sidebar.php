<input type="checkbox" id="check">
<!--header area start-->
<header>
    
    <div class="left_area">
        <label for="check">
            <i class="fa fa-bars" id="sidebar_btn"></i>
        </label>
        <h3>&nbsp; OGGLP <span>Database</span> </h3>
    </div>
    <div class="right_area">
        
    </div>
</header>
<!--header area end-->
<!--mobile navigation bar end-->
<!--sidebar start-->
<div class="sidebar">
    <div class="profile_info">
        <img src="https://i.imgur.com/iQpdHb2.jpg" class="profile_image" alt="">
        <h4>Williamson</h4>
    </div>
    <a href="#"><i class="fa fa-desktop"></i><span>Dashboard</span></a>
    <a href="index_learner.php" class="<?php if($table_name=='Learner'){echo 'active';}?>"><i class="fa fa-book-open-reader"></i></i><span>Learners</span></a>
    <a href="index_professor.php" class="<?php if($table_name=='Professor'){echo 'active';}?>"><i class="fa fa-user-tie"></i></i><span>Professors</span></a>
    <a href="index_course.php"  class="<?php if($table_name=='Course'){echo 'active';}?>"><i class="fa fa-table"></i><span>Courses</span></a>

</div>
<!--sidebar end-->

