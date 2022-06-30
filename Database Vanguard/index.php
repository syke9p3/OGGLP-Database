<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Sidebar\sidebar.css">
	<link rel="stylesheet" href="table.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>
    
</head>
<body>

    <?php include 'Sidebar\sidebar.php' ?>
	<!-- php include Courses.php -->
	<?php $table_name = 'Course'?>

    <div class="content">
		<div class="container-xl">
			<div class="table-responsive">
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2>Manage <b><?php echo $table_name?>s</b></h2>
							</div>
							
							<div class="col-sm-6">
								<a href="#addModal" class="btn btn-success" data-toggle="modal" data-bs-target="#addModal"><i class="material-icons">&#xE147;</i> <span>Add New <?php echo $table_name?></span></a>
								<a href="#deleteModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
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
									<th>
										<span class="custom-checkbox">
											<input type="checkbox" id="selectAll">
											<label for="selectAll"></label>
										</span>
									</th>
									<th>ID</th>
									<th>Name</th>
									<th>Price</th>
									<th>Professors</th>
									<th>Learners</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php
										//Server Connection
										include 'conn.php';
										//Pagination
										include 'pagination.php';
						
										if ($sql_run) {
										// output data of each row
											foreach($sql_run as $row) {
									?>
								<tr>
									<td>
										<span class="custom-checkbox">
											<input type="checkbox" id="checkbox1" name="options[]" value="1">
											<label for="checkbox1"></label>
										</span>
									</td>
									<td><?php echo $row["salesman_number"]; ?></td>
									<td><?php echo $row["salesman_name"]; ?></td>
									<td class="price-column"><?php echo $row["total_sales"]; ?></td><!-- P is in CSS::before  -->
									<td><?php echo $row["commission"]; ?></td>
									<td><?php echo $row["total_sales"]; ?></td>
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
							<input type="number" class="form-control" min=0 name="id" placeholder="<?php echo $table_name?> ID" required>
						</div>

						<div class="form-group">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" name="name" placeholder="<?php echo $table_name?> Name" required>
						</div>

						<div class="form-group">
							<label for="price" class="form-label">Price</label>
							<input type="number" min=0 class="form-control" name="price" placeholder="<?php echo $table_name?> Price" required>
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
		<div class="modal-dialog">
			<div class="modal-content">
			<form class="form" action="editRecord.php" method="POST">

					<div class="modal-header">						
						<h4 class="modal-title">Edit <?php echo $table_name?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<label for="id" class="form-label">ID</label>
							<input type="number" class="form-control edit" min=0 name="id" placeholder="<?php echo $table_name?> ID" readonly>
						</div>

						<div class="form-group">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control edit" name="name" placeholder="<?php echo $table_name?> Name" required>
						</div>

						<div class="form-group">
							<label for="price" class="form-label">Price</label>
							<input type="number" min=0 class="form-control edit" name="price" placeholder="<?php echo $table_name?> Price" required>
						</div>                
									
					</div>

					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="edit_course" class="btn btn-info" value="Save">
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
						<h4 class="modal-title">Delete <?php echo $table_name?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete this Records?</p>

						<div class="form-group">
							<label for="id" class="form-label">ID</label>
							<input type="number" class="form-control delete" min=0 name="id" placeholder="<?php echo $table_name?> ID" readonly>
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

	<!-- <div class="card">
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	</div>
	<div class="card">
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	</div>
	<div class="card">
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	</div> -->
				
	<script>
		$(document).ready(function(){

			//Data Tables
			$('#Table').DataTable({


				initComplete: (settings, json)=>{
					$("div.menu-filter").append($(".dataTables_filter"));
					$("div.menu-length").append($(".dataTables_length"));
					
					$("div#hint-text").append($(".dataTables_info"));
					$("ul.pagination").append($(".dataTables_paginate"));

					$(".dataTables_filter[type='search']").addClass("form-control form-control-sm");
				},

				"language": {
					"search": "Find: ",
				}
			});
    
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			$('.editModalBtn').on('click', function(e) {
                    $('#edit-modal').modal('show');
                    e.preventDefault();

                    $tr = this.closest('tr');

                    $id_val = $tr.getElementsByTagName('td')[1].innerHTML;
                    $name_val = $tr.getElementsByTagName('td')[2].innerHTML;
                    $price_val = $tr.getElementsByTagName('td')[3].innerHTML;

                    $(".edit[name='id']").val($id_val);
                    $(".edit[name='name']").val($name_val);
                    $(".edit[name='price']").val($price_val);

                });

			$('.deleteModalBtn').on('click', function(e) {
                    $('#delete-modal').modal('show');
                    e.preventDefault();

                    $tr = this.closest('tr');

                    $id_val = $tr.getElementsByTagName('td')[1].innerHTML;

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

</body>
</html>