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
                    <h5 class="prof-name"></h5>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <h6>Professor</h6>
                    <p class="proile-rating"><span>Vanguard University</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <table>
                    <tr>
                        <td class="prof-id d-none"></td>
                        <td class="prof-name d-none"></td>
                        <td><a href="#editModal" class="edit editModalBtn col-md-2 btn btn-primary d-flex align-items-center justify-content-center" data-toggle="modal">Edit&nbsp;<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>

                    </tr>
                </table>
            </div>
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
                                <label>Professor Id</label>
                            </div>
                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control edit" name="name" placeholder="<?php echo $table_name ?> Name" required><p class="">123 456 7890</p> -->

                                <p class="prof-id"></p>
                            </div>
                        </div>



                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p>10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p>230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p>6 months</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br />
                                <p>Your detail description</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </form>
</div>