<?php include('message.php'); ?>

    <div class="content">
		<div class="container-xl">
			<div class="table-x">
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2>Manage <b><?php echo $table_name?>s</b></h2>
							</div>
							
							<div class="col-sm-6">
								<a href="#addModal" class="btn btn-success" data-toggle="modal" data-bs-target="#addModal"><i class="material-icons">&#xE147;</i> <span>Add New <?php echo $table_name?></span></a>
								<!-- <a href="#deleteModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
							</div>
						</div>
							
					</div><div class="table-main-wrapper">

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
									<th>Course Code</th>
									<th>Course Name</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php
										//Server Connection
										include 'conn.php';

										$sql = "SELECT * FROM course";
										$sql_run = $conn->query($sql);
										$data = $sql_run->fetch_all(MYSQLI_ASSOC);

										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										}
										//Pagination
										// include 'pagination.php';
						
										if ($sql_run) {
										// output data of each row
											foreach($sql_run as $row) {
									?>
								<tr>
									<!-- <td>
										<span class="custom-checkbox">
											<input type="checkbox" id="checkbox1" name="options[]" value="1">
											<label for="checkbox1"></label>
										</span>
									</td> -->
									<td><?php echo $row["c_course_code"]; ?></td>
									<td style="font-weight: bold"><?php echo $row["course_name"]; ?></td>
									
									<td>
										<a href="#viewModal" class="view viewModalBtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xE8F4;</i></a>
										<a href="#editModal" class="edit editModalBtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
										<a href="#deleteModal" class="delete deleteModalBtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
									</td>
								</tr>
								<?php
										}
						
										} else { echo "0 results"; }
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


				<?php include "view_course.php" ?>

			</div>
		</div>
	</div>
	<!-- Add Modal HTML -->
	<div id="addModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form" action="createRecord.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Add <?php echo $table_name?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					
					<div class="modal-body">

						<div class="form-group">
							<label for="id" class="form-label">ID</label>
							<input type="text" class="form-control" min=0 name="id" placeholder="<?php echo $table_name?> ID" required>
						</div>

						<div class="form-group">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" name="name" placeholder="<?php echo $table_name?> Name" required>
						</div>
					</div>

					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="add_course" class="btn btn-success" value="Add">
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

			<?php include "edit_course.php" ?>
			
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
						<h4 class="modal-title">Delete <?php echo $table_name?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete this Records?</p>

						<div class="form-group">
							<label for="id" class="form-label">ID</label>
							<input type="text" class="form-control delete" min=0 name="id" placeholder="<?php echo $table_name?> ID" readonly>
						</div>

						<p class="text-warning"><small>This action cannot be undone.</small></p>

						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="delete_course" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){

			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			$('.viewModalBtn').on('click', function(e) {
				$('#view-modal').modal('show');
				e.preventDefault();

				$tr = this.closest('tr');

				$id_val = $tr.getElementsByTagName('td')[0].innerHTML;
				$name_val = $tr.getElementsByTagName('td')[1].innerHTML;

				$(".course-name").append($name_val);
				$(".course-id").append($id_val);



		});

		$('#closeBtn').on('click', function(e) {
			$(".course-name").empty();
			$(".course-id").empty();

		})

			$('.editModalBtn').on('click', function(e) {
                    $('#edit-modal').modal('show');
                    e.preventDefault();

                    $tr = this.closest('tr');

                    $id_val = $tr.getElementsByTagName('td')[0].innerHTML;
                    $name_val = $tr.getElementsByTagName('td')[1].innerHTML;

                    $(".edit[name='id']").val($id_val);
                    $(".edit[name='name']").val($name_val);

                });

			$('.deleteModalBtn').on('click', function(e) {
                    $('#delete-modal').modal('show');
                    e.preventDefault();

                    $tr = this.closest('tr');

                    $id_val = $tr.getElementsByTagName('td')[0].innerHTML;

					$(".delete[name='id']").val($id_val);

                    $del_input = document.querySelector(".delete[name='id']");
					console.log($del_input.innerHTMl);

                });	
			
			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function(){
				if(this.checked){
					checkbox.each(function(){
						this.checked = true;                        
					});
				} else{
					checkbox.each(function(){
						this.checked = false;                        
					});
				} 
			});
			checkbox.click(function(){
				if(!this.checked){
					$("#selectAll").prop("checked", false);
				}
			});

		});
	</script>