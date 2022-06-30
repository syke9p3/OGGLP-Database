
<style>

            body {
                background-color: white;
            }
            
            a{
                cursor: pointer;
                text-decoration: none;
                color: inherit;
            }

            a:hover {
                color: blue;
            }

            nav {
                padding: 0.25rem;
            }

            .btn-link {
                text-decoration: none;
            }

            .btn-link .text-danger:hover {
                color: rgb(244, 0, 0);
            }  

            .search-field {
            
                width: 20rem;
                max-width: 95%;
                /* background-color: #7e7e7e28; */
                /* border-radius: 100px; */
                border: none; 
                padding: 8px 35px 8px 35px;
                align-items: center;
                font-size: 12px;
        }

            .table-container {
                margin-top: 1rem;
                box-shadow: 0 5px 5px rgba(0, 0, 0, 0.15);
                border-radius: 0 0 1rem 1rem;
            }

            .price-col:before {
                content: 'P '; 
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .rd {
                background-color: #6c757d33;
                padding: 0.25rem;
                margin: 0;
                border-radius: 5px;
                
            }
            
        </style>

<hr>
    <div class="container">

      <div class="starter-template">
       
      </div>


      <main class="">
                <!-- TABLE CONTAINER-->
                <div class="table-container container table-responsive shadow-4 bg-white overflow-hidden p-4">
                    <div class="table-container-title d-flex justify-content-between align-items-center s">
                        <h2 class="p-sm-1">Courses</h2>
                        <button class="btn btn-primary btn-sm p-2 ps-4 pe-4 fw-bold" data-bs-toggle="modal" data-bs-target="#insert-modal"><b>+</b>ADD</button>
                    </div>

                    <table class="table table-fluid mr-0" id="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "salesman");

                            include 'conn.php';

                            $limit = 5;
                            $page = isset($_GET['page'])  ? $_GET['page'] : 1;
                            $start = ($page - 1) * $limit;
                            $sql = "SELECT * FROM salesman LIMIT $start, $limit";
                            $sql_run = $conn->query($sql);
                            $data = $sql_run->fetch_all(MYSQLI_ASSOC);

                            $sql1 = "SELECT count(salesman_number) AS id FROM salesman";
                            $sql_run1 = $conn->query($sql1);

                            $count = $sql_run1->fetch_all(MYSQLI_ASSOC);
                            $total = $count[0]['id'];
                            $pages = ceil($total / $limit); 

                            $previous = $page - 1;
                            $next = $page + 1; 
                            
                            if ($sql_run) {
                            // output data of each row
                                foreach($sql_run as $row) {
                        ?>
                                    <tr>
                                        <td class="">
                                            <p class="fw-bold"><?php echo $row["salesman_number"] ?></p>
                                        </td>
                                        <td class="">
                                            <div class="name-container d-flex flex-column justify-content-between">
                                                <p class="fw-bold"><?php echo $row["salesman_name"]; ?></p>
                                                <p class="text-muted mb-0"><?php echo $row["commission"]; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="price-col"><?php echo $row["total_sales"]; ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column align-items-start justify-content-center justify-self-stretch">
                                                <button class="btn btn-link btn-sm p-1 fw-bold editbtn" id="edit-button">EDIT</button>
                                                <!-- data-bs-toggle="modal" data-bs-target="#edit-modal" -->
                                                
                                                <button class="btn btn-link btn-sm p-1 fw-bold text-danger deletebtn" id="delete-button">DELETE</button>
                                            </div>

                                        </td>
                                    </tr>
                                    
                        <?php            
                                }
                                
                            } else { echo "0 results"; }
                            $conn->close();
                        ?>
                    </table>

                    <div class="pt-4">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation" class=" d-flex flex-column">
                                <p>Page <?php echo "$page" ?> of <?php echo "$pages" ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <ul class="pagination align-items-center ">
                                        <li class="page-item">
                                            <a href="index2.php?page=<?=1?>" class="page-link text-white bg-primary">
                                                <span>&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a href="index2.php?page=<?=$previous?>" class="page-link">
                                                <span>&lt; Previous</span>
                                            </a>
                                        </li>
                                        <?php for($i=1;$i<=$pages;$i++) : ?>
                                        <li class=""><a class="page-link" href="index2.php?page=<?=$i?>"><?= $i ?></a></li>
                                        <?php endfor; ?>
                                        <li class="page-item">
                                            <a href="index2.php?page=<?=$next?>" class="page-link">
                                                <span>Next &gt;</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a href="index2.php?page=<?=$pages?>" class="page-link text-white bg-primary">
                                                <span>&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <select class="select" name="" id="">
                                        <option value="none" selected disabled hidden>Rows</option>
                                        <option value="none">Rows</option>

                                    </select>
                                </div>
                                
                            </nav>
                        </div>
                    </div>

                    
                </div>
            </main>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
