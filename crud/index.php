

<?php
require './connect.php';
if(isset($_SESSION['login'])){

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax-CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Internal CSS -->
    <style>

        body {
            background-color: #E6E6FA;
        }

        button {
            margin: 10px;
        }
    </style>
</head>

<body>


<?php require '../partials/_nav.php' ?>


<!-- Main container -->
    <div class="container">
        <h1 class="p-3 text-primary-emphasis text-uppercase text-center">PHP CRUD Operation</h1>

        <!-- Button for adding records -->
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#completeModal">
                Add New User
            </button>
        </div>
        <!-- end button -->
        <h2 class="text-danger">All Users</h2>


        <!-- Display data -->
        <div id="displayDataTable">
        </div>

        <!-- Pagination -->
        <!-- <div class="pagination">  
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        </div> -->
        <!-- Pagination End -->

 <!-- The Modal -->

        <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajax CRUD Operation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="firstName">First Name : </label>
                            <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" required>
                        </div>

                        <div class="form-group">
                            <label for="lastName">Last Name : </label>
                            <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Id : </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required>
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile : </label>
                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="addUser()">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->


        <!-- The Update Modal -->

        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Update Modal Header -->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update User Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!--Update Modal Body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="updateFirstName">First Name : </label>
                            <input type="text" name="firstName" id="updateFirstName" class="form-control" placeholder="First Name" required>
                        </div>

                        <div class="form-group">
                            <label for="updateLastName">Last Name : </label>
                            <input type="text" name="lastName" id="updateLastName" class="form-control" placeholder="Last Name" required>
                        </div>

                        <div class="form-group">
                            <label for="updateEmail">Email Id : </label>
                            <input type="email" name="email" id="updateEmail" class="form-control" placeholder="example@gmail.com" required>
                        </div>

                        <div class="form-group">
                            <label for="updateMobile">Mobile : </label>
                            <input type="text" name="mobile" id="updateMobile" class="form-control" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateDetails()">Update</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <input type="hidden" name="" id="hiddenData">

                    </div>
                </div>
            </div>
        </div>
        <!-- End Update Modal -->

    </div>
<!-- Main container End -->


  



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">

        $(document).ready(function() {
            displayData();
        });

        // Display data
        function displayData(page) {
            var displayData = "true";

            $.ajax({
                url: "display.php",
                type: 'post',
                data: {
                    // displaySend: displayData
                    page_no : page
                },
                success: function(data, status) {

                    $('#displayDataTable').html(data);
                }

            });
        }

        $(document).on("click",".pagination a", function(){
            var page = $(this).attr('id');
            // console.log(page);
            displayData(page);
        })

        function addUser() {
            // by using jQuery
            var firstNameAdd = $('#firstName').val();
            var lastNameAdd = $('#lastName').val();
            var emailAdd = $('#email').val();
            var mobileAdd = $('#mobile').val();

            $.ajax({
                url: "insert.php",
                type: 'post',
                data: {
                    firstnameSend: firstNameAdd,
                    lastnameSend: lastNameAdd,
                    emailSend: emailAdd,
                    mobileSend: mobileAdd
                },
                success: function(data, status) {
                    // Function to display data
                    // console.log(status)
                    $('#completeModal').modal('hide');
                    displayData();
                }

            });

        }



        // Delete User
        function DeleteUser(deleteid) {
           var conf=confirm("Are You sure?")
           if(conf==true){
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: {
                    deleteSend: deleteid
                },
                success: function(data, status) {
                    displayData();
                }
            });
           }
        }


        // Update function
        function GetUserDetails(updateid) {

            $('#hiddenData').val(updateid);

            $.post("update.php", {
                updateid: updateid
            }, function(data, success) {
                    var user = JSON.parse(data);
                    $('#updateFirstName').val(user.firstname);
                    $('#updateLastName').val(user.lastname);
                    $('#updateEmail').val(user.email);
                    $('#updateMobile').val(user.mobile);
                });
            $('#updateModal').modal('show');
        }

        // Onclick update function
        function updateDetails() {
            var updateFirstName = $('#updateFirstName').val();
            var updateLastName = $('#updateLastName').val();
            var updateEmail = $('#updateEmail').val();
            var updateMobile = $('#updateMobile').val();
            var hiddenData = $('#hiddenData').val();

            $.post("update.php", {
                updateFirstName: updateFirstName,
                updateLastName: updateLastName,
                updateEmail: updateEmail,
                updateMobile: updateMobile,
                hiddenData: hiddenData
            }, function(data, success) {
                $('#updateModal').modal('hide');
                displayData();

            });


        }
    </script>

</body>

</html>


<?php

}else{
  header('Location:../front/login.php');
  
}
?>