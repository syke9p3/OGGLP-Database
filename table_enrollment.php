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
								<th>Learner</th>
								<th>Course</th>
								<th>Professor</th>
								<th>Date Start</th>
								<th>Date End</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							//Server Connection
							include 'conn.php';

							$sql = "SELECT e_learner_id, e_course_code, e_professor_id ,learner_name,course_name,professor_name,date_start,date_end FROM enrollment, learner, course, professor WHERE e_learner_id = l_learner_id AND e_course_code = c_course_code AND e_professor_id = p_professor_id;";


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
										<td>
											<p style="font-weight: bold"><?php echo $row["learner_name"]; ?></p>
											<div><?php echo $row["e_learner_id"]; ?></div>

										</td>
										<td>
											<p style="font-weight: bold"><?php echo $row["course_name"]; ?></p>
											<div><?php echo $row["e_course_code"]; ?></div>
										</td> <!-- 1 -->
										<td>
											<p style="font-weight: bold"><?php echo $row["professor_name"]; ?></p>
											<div><?php echo $row["e_professor_id"]; ?></div>
										</td> <!-- 3 -->
										<td><?php echo $row["date_start"]; ?></td> <!-- 4 -->
										<td><?php echo $row["date_end"]; ?></td> <!-- 6 -->

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
<!-- View Modal HTML -->
<div id="viewModal" class="modal fade">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content modal-fullscreen">

			<div class="modal-header">
				<h4 class="modal-title">View <?php echo $table_name ?></h4>
				<button id="closeBtn" type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: relative; right:2%">&times;</button>
			</div>

			<?php include "view_learner.php" ?>

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
							<div class="col-md-4">
								<div class="form-group">
									<label for="name" class="form-label">Learner</label>
									<select class="form-select form-control" name="learner-id" placeholder="Select Learner" required>
										<option selected disabled>Learner Name</option>
										<?php

										include 'conn.php';

										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										}

										$sql = "SELECT l_learner_id, learner_name FROM learner";

										$i = 0;

										$sql_run = $conn->query($sql);
										$data = $sql_run->fetch_all(MYSQLI_ASSOC);

										if ($sql_run) {
											foreach ($sql_run as $option) {

										?>
												<option value="<?php echo $option['l_learner_id'] ?>"><?php echo $option['learner_name'] ?></option>

										<?php
												$i++;
											}
										}
										?>

									</select>
								</div>
							</div>
							<div class="col-md-4">
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
							<div class="col-md-6">
								<div class="form-group">
									<label for="id" class="form-label">Date Start</label>
									<input type="date" class="form-control" name="date-start" placeholder=" yyyy-mm-dd" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="id" class="form-label">Date End</label>
									<input type="date" class="form-control" name="date-end" placeholder=" yyyy-mm-dd" required>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" name="add_enrollment" class="btn btn-success" value="Add">
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
		<div class="modal-content modal-fullscreen">
			<form class="form" action="editRecord.php" method="POST">

				<div class="modal-header">
					<h4 class="modal-title">Edit <?php echo $table_name ?></h4>
					<button id="closeBtn" type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: relative; right:2%">&times;</button>
				</div>

				<div class="modal-body row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="name" class="form-label">Learner</label>
									<input type="text" class="form-control edit" name="learner-name" readonly>
									<input type="text" class="d-none form-control edit" name="learner-id">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="id" class="form-label">Course</label>
									<input type="text" class="form-control edit" name="course-name" readonly>
									<input type="text" class="d-none form-control edit" name="course-id">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="id" class="form-label">Professor</label>
									<select class="form-select form-control edit" name="prof-id" required>
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
							<div class="col-md-6">
								<div class="form-group">
									<label for="id" class="form-label">Date Start</label>
									<input type="date" class="form-control edit" name="date-start" id="date-start" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="id" class="form-label">Date End</label>
									<input type="date" class="form-control edit" name="date-end" required>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" name="edit_enrollment" class="btn btn-info" value="Save">
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
						<label for="learner-id" class="form-label">Learner ID</label>
						<input type="text" class="form-control delete" name="learner-id" readonly>
					</div>

					<div class="form-group">
						<label for="course-id" class="form-label">Course ID</label>
						<input type="text" class="form-control delete" name="course-id" readonly>
					</div>

					<p class="text-warning"><small>This action cannot be undone.</small></p>


				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="delete_enrollment" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	function myFunction() {
		document.getElementById("myDate").value = "2014-02-09";
	}
	$(document).ready(function() {

		// Activate tooltip
		$('[data-toggle="tooltip"]').tooltip();

		$('.editModalBtn').on('click', function(e) {
			$('#edit-modal').modal('show');
			e.preventDefault();

			$tr = this.closest('tr');

			$learner_name_val = $tr.getElementsByTagName('td')[0].firstElementChild.innerHTML;
			$learner_id_val = $tr.getElementsByTagName('td')[0].lastElementChild.innerHTML;
			$course_name_val = $tr.getElementsByTagName('td')[1].firstElementChild.innerHTML;
			$course_id_val = $tr.getElementsByTagName('td')[1].lastElementChild.innerHTML;
			$prof_name_val = $tr.getElementsByTagName('td')[2].firstElementChild.innerHTML;
			$prof_id_val = $tr.getElementsByTagName('td')[2].lastElementChild.innerHTML;
			$date_start_val = $tr.getElementsByTagName('td')[3].innerHTML;
			$date_end_val = $tr.getElementsByTagName('td')[4].innerHTML;

			$(".edit[name='learner-id']").val($learner_id_val);
			$(".edit[name='learner-name']").val($learner_name_val);
			$(".edit[name='course-id']").val($course_id_val);
			$(".edit[name='course-name']").val($course_name_val);
			$(".edit[name='prof-id']").val($prof_id_val);
			$(".edit[name='prof-name']").val($prof_name_val);
			$(".edit[name='date-start']").val($date_start_val);
			$(".edit[name='date-end']").val($date_end_val);

		});

		$('.deleteModalBtn').on('click', function(e) {
			$('#delete-modal').modal('show');
			e.preventDefault();

			$tr = this.closest('tr');

			$learner_id_val = $tr.getElementsByTagName('td')[0].lastElementChild.innerHTML;
			$course_id_val = $tr.getElementsByTagName('td')[1].lastElementChild.innerHTML;

			$(".delete[name='learner-id']").val($learner_id_val);
			$(".delete[name='course-id']").val($course_id_val);

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