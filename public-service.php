<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>

<?php
if (isset($_POST['add_submit'])) {

    $name = addslashes(trim($_POST['name']));
    $phone = addslashes(trim($_POST['phone']));
    
    $insertQuery = "INSERT INTO public_service (Name, Contact_no) VALUES ('$name', '$phone')";

    if (mysqli_query($conn, $insertQuery)) {

        echo "<script>alert('Public Service added successfully');location.href='public-service.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='public-service.php'</script>";
    }
    
}

if (isset($_POST['update'])) {

    $id = addslashes(trim($_POST['id']));
    $name = addslashes(trim($_POST['name']));
    $phone = addslashes(trim($_POST['phone']));
    $area = addslashes(trim($_POST['area']));
    $unittype = addslashes(trim($_POST['unittype']));

    
    $update = "UPDATE public_service SET Name = '$name', Contact_no = '$phone' where Public_service_id = '$id'";

    if (mysqli_query($conn, $update)) {

        echo "<script>alert('Public Service  updated successfully');location.href='public-service.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='public-service.php'</script>";
    }
    
}

if (isset($_POST['delete_submit'])) {

    $date = date('Y-m-d H:i:s');

    if (mysqli_query($conn, "DELETE from public_service WHERE Public_service_id = '$_POST[delete_id]'")) {

        echo "<script>alert('Public Service deleted successfully');location.href='public-service.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='public-service.php'</script>";
    }
}
?>



 <!-- welcome section -->
 <section class="welcome_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="service_detail">
            <h3>
            PSA
            </h3>
            <h2>
            Public Service
            </h2>
        </div>
        <div class="col-xl-5"></div>
        <div class="col-xl-3 mt-4">
            <div class="input-group w-100 mx-auto d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="bi bi-plus-square-fill me-2"></i>  Add Service</button>
            </div>
        </div>
      </div>
      <div class="row py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from public_service";
                $res = mysqli_query($conn,$sql);

                if(mysqli_num_rows($res) > 0){
                    $i = 1;
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td> $i</td>";
                        echo "<td>$row[Name]</td>";
                        echo "<td>$row[Contact_no]</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input autocomplete='off'  type='hidden' name='delete_id' value='$row[Public_service_id]'/>
                        <button type='submit' name='delete_submit' onClick='return confirm(" . '"Are you sure you want to delete?"' . ")' class='btn btn-danger shadow btn-xs sharp'><i class='bi bi-trash'></i></button>";
                        echo " <button type='button' data-toggle='modal' data-target='#update$row[Public_service_id]' class='btn btn-primary shadow btn-xs sharp'><i class='bi bi-pencil-square'></i></button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        $i++;

                    ?>
                    <div class="modal fade" id="update<?php echo $row["Public_service_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST">
                                <div class="modal-content" style="width: 500px;">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addLabel">Update public service</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Name']; ?>" required name="name">
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Contact No<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="phone" class="form-control" maxlength="100" value="<?php echo $row['Contact_no']; ?>" required name="phone">
                                            </div>
                                            
                                            <input autocomplete='off'  type="hidden" name="id" value="<?php echo $row['Public_service_id']; ?>" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                        <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php

                    }
                }
                ?>
            </tbody>
        </table>
      </div>
      
      <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-content" style="width: 500px;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addLabel">Add public service</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="name">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Contact no<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="phone" class="form-control" maxlength="100" required name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
  </section>
  <!-- end welcome section -->

<?php
require_once 'include/footer.php';
?>