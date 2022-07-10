<?php include('message.php'); ?>

<div class="content">
	<div class="container-xl">
		<div class="table-x">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Manage <b><?php echo $table_name ?>s</b></h2>
						</div>

						<div class="col-sm-6">

							<a href="#addModal" class="btn btn-success" data-toggle="modal" data-bs-target="#addModal"><i class="material-icons">&#xE147;</i> <span>Add New <?php echo $table_name ?></span></a>
							<!-- <a href="#deleteModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
						</div>
					</div>

				</div>
				<div class="table-main-wrapper">

					<table class="table table-striped table-hover table-fluid" id="Table">

						<thead>
							<div class="menu">

								<div class="menu-filters">
									<!-- Records and Search -->
								</div>
							</div>

							<tr>
								<!-- <th>
										<span class="custom-checkbox">
											<input type="checkbox" id="selectAll">
											<label for="selectAll"></label>
										</span>
									</th> -->
								<th>Course</th>
								<th>Professor</th>
								<th>Cost</th>
								<th>Months</th>
								<th>Hours Per Session</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							//Server Connection
							include 'conn.php';

							$sql = "SELECT cp_course_code, cp_professor_id ,course_name,professor_name, course_months, hours_per_session, cost FROM course_professor_details, course, professor WHERE cp_course_code = c_course_code AND cp_professor_id = p_professor_id;";


							$sql_run = $conn->query($sql);
							$data = $sql_run->fetch_all(MYSQLI_ASSOC);


							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							//Pagination
							// include 'pagination.php';

							if ($sql_run) {
								// output data of each row
								foreach ($sql_run as $row) {

							?>
									<tr>
										<!-- <td>
										<span class="custom-checkbox">
											<input type="checkbox" id="checkbox1" name="options[]" value="1">
											<label for="checkbox1"></label>
										</span>
									</td> -->

										<td id="course-id">
											<p style="font-weight: bold"><?php echo $row["course_name"]; ?></p>
											<div><?php echo $row["cp_course_code"]; ?></div>
										</td>
										<td id="prof-id">
											<p style="font-weight: bold"><?php echo $row["professor_name"]; ?></p>
											<div><?php echo $row["cp_professor_id"]; ?></div>
										</td> <!-- 3 -->
										<td id="cost"><?php echo $row["cost"]; ?></td> <!-- 6 -->
										<td id="months"><?php echo $row["course_months"]; ?></td> <!-- 4 -->
										<td id="hours"><?php echo $row["hours_per_session"]; ?></td> <!-- 6 -->


										<td>
											<!-- <a href="#viewModal" class="view viewModalBtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xE8F4;</i></a> -->
											<a href="#editModal" class="edit editModalBtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
											<a href="#deleteModal" class="delete deleteModalBtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
										</td>
									</tr>
							<?php
								}
							} else {
								echo "0 results";
							}
							$conn->close();
							?>
						</tbody>
					</table>
				</div>

				<div class="clearfix">
					<!-- <hr> -->
					<div id="hint-text" class="hint-text">
						<!-- dataTable_info in JQuery -->
					</div>
					<ul class="pagination">
						<!-- dataTable_pagination in JQuery -->
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Add Modal HTML -->
<div id="addModal" class="modal fade">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content  modal-fullscreen">
			<form class="form" action="createRecord.php" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Add <?php echo $table_name ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>

				<div class="modal-body row">
					<div class="col-md-2"></div>
					<div class="col-md-8">

						<div class="row">

							<div class="col-md-8">
								<div class="form-group">
									<label for="id" class="form-label">Course</label>
									<select class="form-select form-control" name="course-id" placeholder="Select Learner" required>
										<option selected disabled>Course Name</option>

										<?php

										include 'conn.php';

										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										}

										$sql = "SELECT c_course_code, course_name FROM course";

										$sql_run = $conn->query($sql);
										$data = $sql_run->fetch_all(MYSQLI_ASSOC);

										if ($sql_run) {
											foreach ($sql_run as $option) {

										?>
												<option value="<?php echo $option['c_course_code'] ?>"><?php echo $option['course_name'] ?>
												</option>

										<?php

											}
										}
										?>
									</select>
								</div>

							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="id" class="form-label">Professor</label>
									<select class="form-select form-control" name="prof-id" placeholder="Select Learner" required>
										<option selected disabled>Professor Name</option>
										<?php

										include 'conn.php';

										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										}

										$sql = "SELECT p_professor_id, professor_name FROM professor";


										$sql_run = $conn->query($sql);
										$data = $sql_run->fetch_all(MYSQLI_ASSOC);

										if ($sql_run) {
											foreach ($sql_run as $option) {

										?>
												<option value="<?php echo $option['p_professor_id'] ?>"><?php echo $option['professor_name'] ?>
													<!-- <div>
														</?php echo $option['professor_name'] ?>
													</div> -->


												</option>

										<?php
												$i++;
											}
										}
										?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="col-md-12">
									<label for="cost" class="form-label">Cost</label>

									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-coins style= font-size:1rem"></i></div>
										</div>
										<input type="number" class="form-control edit" name="cost" placeholder="Payment in Peso">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="col-md-12">
									<label for="months" class="form-label">Months</label>

									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-calendar-days style= font-size:1rem"></i></div>
										</div>
										<input type="number" class="form-control edit" name="months" placeholder="Course Months">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="col-md-12">
									<label for="hours" class="form-label">Hours Per Session</label>

									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-clock style= font-size:1rem"></i></div>
										</div>
										<input type="number" class="form-control edit" name="hours" placeholder="Hours Per Session">
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" name="add_cpdetail" class="btn btn-success" value="Add">
						</div>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content  modal-fullscreen">
			<form class="form" action="editRecord.php" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Edit <?php echo $table_name ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>

				<div class="modal-body row">
					<div class="col-md-2"></div>
					<div class="col-md-8">

						<div class="row">

							<div class="col-md-8">
								<div class="form-group">
									<label for="course-id" class="form-label">Course</label>
									<input type="text" class="form-control edit" name="course-name" readonly>
									<input type="text" class="d-none form-control edit" name="course-id">
								</div>

							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="prof-id" class="form-label">Professor</label>
									<input type="text" class="form-control edit" name="prof-name" readonly>
									<input type="text" class="d-none form-control edit" name="prof-id">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="col-md-12">
									<label for="cost" class="form-label">Cost</label>

									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-coins style= font-size:1rem"></i></div>
										</div>
										<input type="number" class="form-control edit" name="cost" placeholder="Payment in Peso">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="col-md-12">
									<label for="months" class="form-label">Months</label>

									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-calendar-days style= font-size:1rem"></i></div>
										</div>
										<input type="number" class="form-control edit" name="months" placeholder="Course Months">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="col-md-12">
									<label for="hours" class="form-label">Hours Per Session</label>

									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text" style="height: 38px; width:40px"><i class="fa fa-clock style= font-size:1rem"></i></div>
										</div>
										<input type="number" class="form-control edit" name="hours" placeholder="Hours Per Session">
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" name="edit_cpdetail" class="btn btn-primary" value="Save">
						</div>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form" action="deleteRecord.php" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Delete <?php echo $table_name ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this Records?</p>

					<div class="form-group">
						<label for="course-id" class="form-label">Course ID</label>
						<input type="text" class="form-control delete" name="course-id" readonly>
					</div>

					<div class="form-group">
						<label for="prof-id" class="form-label">Professor ID</label>
						<input type="text" class="form-control delete" name="prof-id" readonly>
					</div>

					<p class="text-warning"><small>This action cannot be undone.</small></p>


				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="delete_cpdetail" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	
	$(document).ready(function() {

		// Activate tooltip
		$('[data-toggle="tooltip"]').tooltip();

		$('.editModalBtn').on('click', function(e) {
			$('#edit-modal').modal('show');
			e.preventDefault();

			$tr = this.closest('tr');

			$course_name_val = $tr.getElementsByTagName('td')[0].firstElementChild.innerHTML;
			$course_id_val = $tr.getElementsByTagName('td')[0].lastElementChild.innerHTML;
			$prof_name_val = $tr.getElementsByTagName('td')[1].firstElementChild.innerHTML;
			$prof_id_val = $tr.getElementsByTagName('td')[1].lastElementChild.innerHTML;
			$cost_val = $tr.getElementsByTagName('td')[2].innerHTML;
			$months_val = $tr.getElementsByTagName('td')[3].innerHTML;
			$hours_val = $tr.getElementsByTagName('td')[4].innerHTML;			
			
			$(".edit[name='course-id']").val($course_id_val);
			$(".edit[name='course-name']").val($course_name_val);
			$(".edit[name='prof-id']").val($prof_id_val);
			$(".edit[name='prof-name']").val($prof_name_val);
			$(".edit[name='cost']").val($cost_val);
			$(".edit[name='months']").val($months_val);
			$(".edit[name='hours']").val($hours_val);

		});

		$('.deleteModalBtn').on('click', function(e) {
			$('#delete-modal').modal('show');
			e.preventDefault();

			$tr = this.closest('tr');

			$course_id_val = $tr.getElementsByTagName('td')[0].lastElementChild.innerHTML;
			$prof_id_val = $tr.getElementsByTagName('td')[1].lastElementChild.innerHTML;

			$(".delete[name='course-id']").val($course_id_val);
			$(".delete[name='prof-id']").val($prof_id_val);

			$del_input = document.querySelector(".delete[name='id']");
			console.log($del_input.innerHTMl);

		});

		// Select/Deselect checkboxes
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function() {
			if (this.checked) {
				checkbox.each(function() {
					this.checked = true;
				});
			} else {
				checkbox.each(function() {
					this.checked = false;
				});
			}
		});
		checkbox.click(function() {
			if (!this.checked) {
				$("#selectAll").prop("checked", false);
			}
		});

	});
</script>