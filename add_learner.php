<div class="emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="profile-info d-flex justify-content-center">
                    <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" id="dp" class="profile-img" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <div class="form-group">
                        <input type="text" class="form-control " name="name" placeholder="<?php echo $table_name ?> Name" required>
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <h6>Learner</h6>
                    <p class="proile-rating"><span>Vanguard University</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">

                </div>
            </div>
            <div class="col-md-8 ">
                <div class="tab-content profile-tab" id="myTabContent">

                    <div class="tab-pane fade show active  m-2" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container mb-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Learner Id</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control " name="id" placeholder="Learner ID" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-user"></i></div>
                                        </div>
                                        <select class="form-select form-control" name="gender" placeholder="</?php echo $table_name ?> Gender" required>
                                            <option selected disabled>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Birthday</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control " name="bday" placeholder="<?php echo $table_name ?> Birthday" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control " name="address" placeholder="<?php echo $table_name ?> Address" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-envelope" style="font-size:1rem"></i></div>
                                        </div>
                                        <input type="email" class="form-control " name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Alt Email</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-envelope" style="font-size:1rem"></i></div>
                                        </div>
                                        <input type="email" class="form-control " name="altEmail">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Home Phone Number</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-phone" style="font-size:1rem"></i></div>
                                        </div>
                                        <input type="text" class="form-control " name="homeNum">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Cellphone Number</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-phone" style="font-size:1rem"></i></div>
                                        </div>
                                        <input type="text" class="form-control " name="cellNum">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Other Number</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-phone" style="font-size:1rem"></i></div>
                                        </div>
                                        <input type="text" class="form-control " name="otherNum">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="m-10">
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" name="add_learner" class="btn btn-info" value="Save">
                            </div>
                        </div>


                    </div>



                </div>
            </div>
        </div>
    </form>
</div>