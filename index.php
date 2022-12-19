<?php
$insert =  false;
$update= false;
$deleted =  false;
//connect to the database
$servername = "localhost";
$username =  "root";
$password = "";
$database  = "notes";
//create a connection 
$conn  = mysqli_connect($servername, $username, $password, $database);
//Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect : " . mysqli_connect_error() . "<br>");
}
if (isset($_GET['delete'])) {
    $sno  =  $_GET['delete'];
    $sql = "DELETE FROM `notes` WHERE `notes`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "The record was created successfully! <br>";
            $deleted = true;
        } else {
            echo "This record was not deleted because of this error --->" . mysqli_error($conn);
        }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['snoEdit'])) {
        //updating
        $title =  $_POST["titleEdit"];
        $description = $_POST["descriptionEdit"];
        $sno =  $_POST['snoEdit'];
        //Sequel Query to be executed
        $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "The record was created successfully! <br>";
            $update = true;
        } else {
            echo "This record was not updated because of this error --->" . mysqli_error($conn);
        }
    } else {
        //inseritng
        $title =  $_POST["title"];
        $description = $_POST["desc"];
        //Sequel Query to be executed
        $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
        //Add a new trip to the trip table in the database
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "The record was created successfully! <br>";
            $insert = true;
        } else {
            echo "This record was not created because of this error --->" . mysqli_error($conn);
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <title>PHP CRUD</title>
</head>

<body>
    <!-- Edit modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
        Edit Modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal Bodys -->
                    <!-- modal form -->
                    <form method="post" action="/crud/index.php">
                        <div class="form-group">
                            <input type="hidden" name="snoEdit" id="snoEdit">
                            <label for="exampleInputEmail1">Note Title</label>
                            <input type="text" class="form-control" name="titleEdit" id="titleEdit" aria-describedby="emailHelp" placeholder="Enter your note Title">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small> -->
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Note Description</label>
                            <textarea class="form-control" name="descriptionEdit" id="descriptionEdit" rows="3"></textarea>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Update Note</button> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">iNotes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <?php
    if ($insert) {
        # code...
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success your record had Inserted !</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    if ($update) {
        # code...
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success your record had Updated !</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    if ($deleted) {
        # code...
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success your record had Deleted !</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    
    ?>
    
    <div class="container my-4">
        <h2>Add a Note</h2>
        <form method="post" action="/crud/index.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Note Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter your note Title">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small> -->
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Note Description</label>
                <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>
    <div class="container my-4">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S. No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `notes`";
                $result =  mysqli_query($conn, $sql);
                $no = 0;
                // we fetch  in a better way with while loop
                while ($row =  mysqli_fetch_assoc($result)) {
                    $no += 1;
                    echo "<tr>
                    <th scope='row'>" . $no . "</th>
                    <td>" . $row['title'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td><button href='/edit' class='edit btn btn-sn btn-primary' id=" . $row['sno'] . ">Edit</button> <button href='/edit' class='delete btn btn-sn btn-primary' id=d" . $row['sno'] . ">Delete</button></td>
                    </tr>";;
                }
                ?>

            </tbody>
        </table>
    </div>
    <hr>
    <!-- <h1>Hello, world!</h1> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener('click', (e) => {
                // console.log('edit ', e.target.parentNode.parentNode);
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName('td')[0].innerText;
                description = tr.getElementsByTagName('td')[1].innerText;
                // console.log(title);
                console.log(title, description);
                snoEdit.value = e.target.id;
                console.log(e.target.id);
                descriptionEdit.value = description;
                titleEdit.value = title;
                $('#editModal').modal('toggle');
            })
            
        })
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener('click', (e) => {
                // console.log('edit ', e.target.parentNode.parentNode);
                console.log(e.target.id);
                sno =  e.target.id.substr(1,);
                if (confirm("Are you sure want to delete your record!")) {
                    console.log("yes!");
                    window.location=`/crud/index.php?delete=${sno}`;
                    //create a form and post request to submit  a form
                } else {
                    console.log("No!");
                }
            })
            
        })
    </script>
</body>

</html>