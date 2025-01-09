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
    $city = addslashes(trim($_POST['city']));
    $area = addslashes(trim($_POST['area']));
    $unittype = addslashes(trim($_POST['unittype']));
    
    $insertQuery = "INSERT INTO station_details (Name, City, Area, Type) VALUES ('$name', '$city', '$area', '$unittype')";

    if (mysqli_query($conn, $insertQuery)) {

        echo "<script>alert('Station added successfully');location.href='station-details.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='station-details.php'</script>";
    }
    
}

if (isset($_POST['update'])) {

    $id = addslashes(trim($_POST['id']));
    $name = addslashes(trim($_POST['name']));
    $city = addslashes(trim($_POST['city']));
    $area = addslashes(trim($_POST['area']));
    $unittype = addslashes(trim($_POST['unittype']));

    
    $update = "UPDATE station_details SET Name = '$name', City = '$city', Area = '$area', Type = '$unittype' where Station_id = '$id'";

    if (mysqli_query($conn, $update)) {

        echo "<script>alert('Station  updated successfully');location.href='station-details.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='station-details.php'</script>";
    }
    
}

if (isset($_POST['delete_submit'])) {

    $date = date('Y-m-d H:i:s');

    if (mysqli_query($conn, "DELETE from station_details WHERE Station_id = '$_POST[delete_id]'")) {

        echo "<script>alert('Police deleted successfully');location.href='station-details.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='station-details.php'</script>";
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
            Station Details
            </h2>
        </div>
        <div class="col-xl-5"></div>
        <div class="col-xl-3 mt-4">
            <div class="input-group w-100 mx-auto d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="bi bi-plus-square-fill me-2"></i>  Add Station</button>
            </div>
        </div>
      </div>
      <div class="row py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Area</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from station_details";
                $res = mysqli_query($conn,$sql);

                if(mysqli_num_rows($res) > 0){
                    $i = 1;
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td> $i</td>";
                        echo "<td>$row[Name]</td>";
                        echo "<td>$row[City]</td>";
                        echo "<td>$row[Area]</td>";
                        echo "<td>$row[Type]</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input autocomplete='off'  type='hidden' name='delete_id' value='$row[Station_id]'/>
                        <button type='submit' name='delete_submit' onClick='return confirm(" . '"Are you sure you want to delete?"' . ")' class='btn btn-danger shadow btn-xs sharp'><i class='bi bi-trash'></i></button>";
                        echo " <button type='button' data-toggle='modal' data-target='#update$row[Station_id]' class='btn btn-primary shadow btn-xs sharp'><i class='bi bi-pencil-square'></i></button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        $i++;

                    ?>
                    <div class="modal fade" id="update<?php echo $row["Station_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST">
                                <div class="modal-content" style="width: 500px;">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addLabel">Update police</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Station name<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Name']; ?>" required name="name">
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">City<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['City']; ?>" required name="city">
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Area<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Area']; ?>" required name="area">
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Unit type<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Type']; ?>" required name="unittype">
                                            </div>
                                            
                                            <input autocomplete='off'  type="hidden" name="id" value="<?php echo $row['Station_id']; ?>" />
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
                        <h1 class="modal-title fs-5" id="addLabel">Add station</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Station name<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="name">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">City<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="city">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Area<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="area">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Unit type<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="unittype">
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