<?php 
     session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    // $page = 'home';
    include 'includes/header.php';
    include 'includes/connection.php';
    
 ?>
 <style>

    table{
        background-color: aliceblue;
        border-radius: 20px;
        font-family: 'Poppins', sans-serif;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
    .ontop{
        height: 70px;
    }
 </style>
  <section class="content">  
     <div class="student-wrapper">
        <div class="ontop"></div>
                <div class="col-md-12 p-4">
                        <div class="table-responsive">
                            <table id="dtBasicExample" class="table table-borderless table-hover text-center"style="font-size: 12px;">
                                <thead style="height: 40px">
                                    <tr>
                                        <th>Accession no.</th>
                                        <th>Title</th>
                                        <th>Author(s)</th>
                                        <th>Copyright Year</th>
                                        <th>School name</th>
                                        <th>Books Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                     $res = mysqli_query($link, "SELECT books.accession_number, books.title, books.authors, books.copyright, school.school_name, books.book_status 
                                     FROM books
                                     INNER JOIN school
                                     ON books.school_id = school.school_id");
                                     
                                     while ($row = mysqli_fetch_array($res)):  ?>

                                    <tr>
                                        <td><?php  echo $row["accession_number"];  ?> </td>    
                                        <td><?php  echo $row["title"];  ?> </td>    
                                        <td><?php  echo $row["authors"];  ?> </td>    
                                        <td><?php  echo $row["copyright"];  ?> </td>    
                                        <td><?php  echo $row["school_name"];  ?> </td>    
                                        <td><?php  echo $row["book_status"];  ?> </td>    
                                        <td>
                                            <button type="button" id="editBtn" class="btn btn-primary editBtn" data-id="<?php echo $row["accession_number"] ?>">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row["accession_number"] ?>">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <!-- Modal with form -->
                                            <div class="modal text-center modal fade" id="delete<?php echo $row["accession_number"] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><font color="red">Notice!</font></h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <h5>Are you sure you want to delete this book?</h6>
                                                                    <a href="delete-book.php?id= <?php echo $row["accession_number"] ?>"><button type="button" class="btn btn-danger">Yes!</button></a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>    
                                    </tr>

                                        <?php endwhile; ?>
                                        

                                </tbody>
                            </table>
                            
                        </div>

                        <div id="myModal" class="modal fade">
                                    <?php
                                       
                                        if(!isset($_GET['accession_number'])){

                                        }else{
                                            
                                            $an = $_GET['accession_number'];
                                            $res5 = mysqli_query($link, "SELECT * FROM books WHERE accession_number=$an ");
                                        
                                    ?>
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Viewing of Books</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form>
                                                    <?php while ($row_book = mysqli_fetch_assoc($res5)):  ?>
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="name">Accession no.*</label>
                                                                    <input type="text" class="form-control" id="accession_number" name="accession_number" value="<?php echo $row_book['accession_number'] ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">ISBN*</label>
                                                                    <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $row_book['isbn'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">ISBN*</label>
                                                                    <input type="text" class="form-control" id="issn" name="issn" value="<?php echo $row_book['issn'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">LCCN*</label>
                                                                    <input type="text" class="form-control" id="lccn" name="lccn" value="<?php echo $row_book['lccn'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">Title*</label>
                                                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row_book['title'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Authors*</label>
                                                                    <input type="text" class="form-control" id="authors" name="authors" value="<?php echo $row_book['authors'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Publish Date*</label>
                                                                    <input type="date" class="form-control" id="publish_date" name="publish_date" value="<?php echo $row_book['publish_date'] ?>">
                                                                </div> 
                                                            </div> 


                                                            <div class="col-md-4">
                                                            <div class="form-group">
                                                                    <label for="name">Publisher*</label>
                                                                    <input type="text" class="form-control" id="publiher" name="publisher" value="<?php echo $row_book['publisher'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Book Category*</label>
                                                                    <input type="text" class="form-control" id="book_category" name="book_category" value="<?php echo $row_book['book_category'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Book Status*</label>
                                                                    <select class="form-control" id="book_status" name="book_status" value="<?php echo $row_book['book_status'] ?>" >
                                                                        <option >AVAILABLE</option>
                                                                        <option >NOT AVAILABLE</option>
                                                                    </select>
                                         
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">Material Type*</label>
                                                                    <input type="text" class="form-control" id="material_type" name="material_type" value="<?php echo $row_book['material_type'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Book Remarks*</label>
                                                                    <input type="text" class="form-control" id="book_remarks" name="book_remarks" value="<?php echo $row_book['book_remarks'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Edition*</label>
                                                                    <input type="text" class="form-control" id="edition" name="edition" value="<?php echo $row_book['edition'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Book Cover*</label>
                                                                    <select class="form-control" id="book_cover" name="book_cover" value="<?php echo $row_book['book_cover'] ?>" >
                                                                        <option >Hard Bound</option>
                                                                        <option >Soft Bound</option>
                                                                        <option >Paper Back</option>
                                                                    </select>
                                                                </div> 
                                                             </div> 

                                                                <div class="col-md-4">
                                                            <div class="form-group">
                                                                    <label for="name">Book Section*</label>
                                                                    <input type="text" class="form-control" id="book_section" name="book_section" value="<?php echo $row_book['book_section'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Subject*</label>
                                                                    <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $row_book['subject'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Book Shelves*</label>
                                                                    <input type="text" class="form-control" id="book_shelved" name="book_shelved" value="<?php echo $row_book['book_shelved'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">Copyright Year*</label>
                                                                    <input type="date" class="form-control" id="copyright" name="copyright" value="<?php echo $row_book['copyright'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Extent*</label>
                                                                    <input type="text" class="form-control" id="extent" name="extent" value="<?php echo $row_book['extent'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Size*</label>
                                                                    <input type="text" class="form-control" id="size" name="size" value="<?php echo $row_book['size'] ?>">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="name">Place*</label>
                                                                    <input type="text" class="form-control" id="place" name="place" value="<?php echo $row_book['place'] ?>">
                                                                </div> 
                                                            
                                                            
                                                    <?php endwhile  ;}?>
                                              

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                    </div>
                </div>
			</div>			
            </div>			
		</div>

    
	</div>
    

  <script>
   
    $(".editBtn").on('click', function (e) {
            var accession_number = $(this).attr('data-id');
            console.log(accession_number);
            location.href="inc/edit_bookFunction.php?accession_number="+ accession_number;
        });
            
        $(document).ready(function () {
            $('#dtBasicExample').DataTable({
                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
            });
            $('.dataTables_length').addClass('bs-select');
        });

    $(document).ready(function () {

        const queryString = window.location.search; 
        const urlParams = new URLSearchParams(queryString);
        const md = urlParams.get('modalDisplay');
        console.log(md);
        if(md == "true") {
            $("#myModal").modal('show');
        }
    });

</script>
<?php 
		include 'includes/footer.php';
	 ?>
  </section>