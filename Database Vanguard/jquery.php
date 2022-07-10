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
					"search": "<i class='fa fa-search'></i>&nbsp;&nbsp;",
				}
			});
    
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			$('.editModalBtn').on('click', function(e) {
                    $('#edit-modal').modal('show');
                    e.preventDefault();

                    $tr = this.closest('tr');

                    $id_val = $tr.getElementsByTagName('td')[0].innerHTML;
                    $name_val = $tr.getElementsByTagName('td')[1].innerHTML;
                    $price_val = $tr.getElementsByTagName('td')[2].innerHTML;

                    $(".edit[name='id']").val($id_val);
                    $(".edit[name='name']").val($name_val);
                    $(".edit[name='price']").val($price_val);

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