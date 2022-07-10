<div class="emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="profile-info d-flex justify-content-center">
                    <img src="https://wordpressnostress.co.uk/wp-content/uploads/2014/09/training-course-icon-blue.png" id="dp" class="profile-img" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5 id="prof-name"></h5>
                    <div class="form-group">
                        <input type="text" class="form-control edit" name="name" placeholder="<?php echo $table_name ?> Name" required>
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <h6>Course</h6>
                    <p class="proile-rating"><span>Vanguard University</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                        <a href="#editModal" class="edit editModalBtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    </div> -->
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">

                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Course Code</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control edit" name="id" placeholder="<?php echo $table_name ?> Code" readonly>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="edit_course" class="btn btn-info" value="Save">
                </div>
            </div>
        </div>
</div>
</form>
</div>