<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App Using PHP-OOP, PDO-Mysql $ Ajax</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://appuals.com/wp-content/litespeed/localres/aHR0cHM6Ly9jb2RlLmpxdWVyeS5jb20vjquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>

<body>
    <!-- start nav  -->

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#"><i class="fa-brands fa-google"></i>&nbsp; MishraTech</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end nav  -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center text-danger font-weight-normal my-3">CRUD Application Using PHP-OOP ,PDO-Mysql ,
                    Bootstrap 4 , Ajax , Datatable SweetAlert2</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary">All users in database!</h4>

            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal"
                    data-target="#addModal">
                    <i class="fas fa-user-plus fa-lg"></i>&nbsp;&nbsp;Add New User</button>
                <a href="action.php?export=excel" class="btn btn-success m-1 float-right"><i class="fas fa-table fa-lg"></i>&nbsp;Export to
                    Excel</a>

            </div>
        </div>
        <hr class="my-2 ">

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">
                    <h3 class="text-center text-success" style="margin-top: 150px">Loading...</h3>

                </div>
            </div>
        </div>
    </div>


    <!-- add new user modal start  -->

    <!-- add new user modal start  -->

    <!-- The Modal -->
    <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body my-4 mx-4 px-4">
                    <form action="" method="POST" id="form-data">
                        <div class="form-group">
                            <input type="text" name="fname" id="fname" class="form-control"
                                placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" id="lname" class="form-control"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="number" id="number" class="form-control"
                                placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="insert" id="insert" class="form-control btn btn-success"
                                value="Add User">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <!-- add new user modal end -->



    <!-- edit user data modal start -->

    <!-- The Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit User Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body my-4 mx-4 px-4">
                    <form action="" method="POST" id="edit-form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <input type="text" name="fname" id="fnamee" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" id="lnamee" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="emaill" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="number" id="numberr" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" id="update" class="form-control btn btn-primary"
                                value="Update">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
   
    <!-- edit user data modal end -->

    <!-- show details modal start -->
     <!-- show details modal end -->



    <!-- The User info Modal Start  -->
    <div class="modal" id="infoModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body"  >
                    <div class="tect-center">
                   
                </div>
                <div class="info text-center font-size-28 font-weight-700" id="id1" >
                     User id is <span id="inner_id" style="color:red"></span>
                </div>
                <div class="info text-center" id="fname">
                     User First Name  is <span id="inner_fname" style="color:red"></span>
                </div>
                <div class="info text-center" id="lname">
                User Last Name  is <span id="inner_lname" style="color:red"></span>
                </div>
                <div class="info text-center" id="email">
                User Email  is <span id="inner_email" style="color:red"></span>
                </div>
                <div class="info text-center font-strong" id="phone">
                User Phone NO - <span id="inner_phone" style="color:red"></span>
                </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
     <!-- The User info Modal Start  -->
   
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <!-- Popper JS 
    -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
    // <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        // let table = new DataTable('#myTable');



        function showAllusers() {
            $.ajax({
                url: "action.php",
                type: "POST",
                data: {
                    action: "view"
                },
                success: function(response) {
                    // console.log(response);
                    $("#showUser").html(response);
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }
        showAllusers();

        // insert ajax request
        $("#insert").click(function(e) {
            if ($("#form-data")[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: $("#form-data").serialize() + "&action=insert",
                    success: function(response) {

                        Swal.fire({
                            title: "user added successfully",
                            type: "success",
                        })
                        $("#addModal").modal('hide');
                        $("#form-data")[0].reset();
                        showAllusers();
                    }
                });
            }
        });


        // Edit user get user data by using json  for update 
        $("body").on("click", ".editBtn", function(e) {
            e.preventDefault();
            var edit_id = $(this).attr('id');
            $.ajax({
                url: "action.php",
                type: "POST",
                data: {
                    edit_id: edit_id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    console.log(data);
                    console.log(data[0].id);

                    $("#id").val(data[0].id);
                    $("#fnamee").val(data[0].firstname);
                    $("#lnamee").val(data[0].lastname);
                    $("#emaill").val(data[0].email);
                    $("#numberr").val(data[0].phone);
                },
                error: function(xhr, status, error) {
                    console.log("AJAX request error:", error);
                }
            });
        });



        // update ajax request
        $("#update").click(function(e) {
            if ($("#edit-form-data")[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: $("#edit-form-data").serialize() + "&action=update",
                    success: function(response) {

                        console.log(response);

                        Swal.fire({
                            title: "user data updated successfully",
                            type: "success",
                        })
                        $("#editModal").modal('hide');
                        $("#edit-form-data")[0].reset();
                        showAllusers();
                    }
                });
            }
        });


        //Delete  ajax request 
        $("body").on("click", ".delBtn", function(e) {

            e.preventDefault();
            var tr = $(this).closest('tr');
            del_id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                  console.log("hihi");

                    $.ajax({
                        url:"action.php",
                        type:"POST",
                        data:{del_id:del_id},
                        success:function(response) {
                           
                          tr.css('background-color','#ff6666');
                          swal.fire(
                            'Deleted!',
                            'User delted successfully!',
                            'Success'
                          )
                          showAllusers();

                        }
                    });

                }
            });
        });


        // show information of the user 
         // Edit user get user data by using json  for update 
        $("body").on("click", ".infoBtn", function(e) {
            e.preventDefault();
            var info_id = $(this).attr('id');
            $.ajax({
                url: "action.php",
                type: "POST",
                data: {
                    info_id: info_id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    console.log(data);
                    // console.log(data[0].id);

                     $("#inner_id").text(data[0].id);
                    $("#inner_fname").text(data[0].firstname);
                    $("#inner_lname").text(data[0].lastname);
                    $("#inner_email").text(data[0].email);
                    $("#inner_phone").text(data[0].phone);
                    
                    // $("#emaill").val(data[0].email);
                    // $("#numberr").val(data[0].phone);
                },
                error: function(xhr, status, error) {
                    console.log("AJAX request error:", error);
                }
            });
        });


    });
    </script>


</body>

</html>