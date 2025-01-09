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
    $designation = addslashes(trim($_POST['designation']));
    $gender = addslashes(trim($_POST['gender']));
    $dob = addslashes(trim($_POST['dob']));
    $stationid = addslashes(trim($_POST['stationid']));

    
    $insertQuery = "INSERT INTO police_details (Station_id, Designation, Gender, Date_of_birth, Police_name) VALUES ('$stationid', '$designation', '$gender', '$dob', '$name')";

    if (mysqli_query($conn, $insertQuery)) {

        echo "<script>alert('Police  added successfully');location.href='police-details.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='police-details.php'</script>";
    }
    
}

if (isset($_POST['update'])) {

    $id = addslashes(trim($_POST['id']));
    $name = addslashes(trim($_POST['name']));
    $designation = addslashes(trim($_POST['designation']));
    $gender = addslashes(trim($_POST['gender']));
    $dob = addslashes(trim($_POST['dob']));
    $stationid = addslashes(trim($_POST['stationid']));

    
    $update = "UPDATE police_details SET Station_id = '$stationid', Designation = '$designation', Gender = '$gender', Date_of_birth = '$dob', Police_name = '$name' where Police_id = '$id'";

    if (mysqli_query($conn, $update)) {

        echo "<script>alert('Police  updated successfully');location.href='police-details.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='police-details.php'</script>";
    }
    
}

if (isset($_POST['delete_submit'])) {

    $date = date('Y-m-d H:i:s');

    if (mysqli_query($conn, "DELETE from police_details WHERE Police_id = '$_POST[delete_id]'")) {

        echo "<script>alert('Police deleted successfully');location.href='police-details.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='police-details.php'</script>";
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
            Police Details
            </h2>
        </div>
        <div class="col-xl-5"></div>
        <div class="col-xl-3 mt-4">
            <div class="input-group w-100 mx-auto d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="bi bi-plus-square-fill me-2"></i>  Add Police</button>
            </div>
        </div>
      </div>
      <div class="row py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Designation</th>
                <th scope="col">Gender</th>
                <th scope="col">DOB</th>
                <th scope="col">Police Name</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from police_details";
                $res = mysqli_query($conn,$sql);

                if(mysqli_num_rows($res) > 0){
                    $i = 1;
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td> $i</td>";
                        echo "<td>$row[Designation]</td>";
                        echo "<td>$row[Gender]</td>";
                        echo "<td>$row[Date_of_birth]</td>";
                        echo "<td>$row[Police_name]</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input autocomplete='off'  type='hidden' name='delete_id' value='$row[Police_id]'/>
                        <button type='submit' name='delete_submit' onClick='return confirm(" . '"Are you sure you want to delete?"' . ")' class='btn btn-danger shadow btn-xs sharp'><i class='bi bi-trash'></i></button>";
                        echo " <button type='button' data-toggle='modal' data-target='#update$row[Police_id]' class='btn btn-primary shadow btn-xs sharp'><i class='bi bi-pencil-square'></i></button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        $i++;

                    ?>
                    <div class="modal fade" id="update<?php echo $row["Police_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
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
                                                <select class="form-select" name="stationid">
                                                    <option value="">Select Station</option>
                                                    <?php
                                                    $qry = "SELECT * FROM station_details";
                                                    $resul = mysqli_query($conn, $qry);

                                                    if ($resul) {
                                                        while ($row_station = mysqli_fetch_assoc($resul)) {
                                                            $stationid = $row_station['Station_id'];
                                                            $station_name = $row_station['Name'];
                                                            $selected = ($stationid == $row['Station_id']) ? 'selected' : '';
                                                            echo "<option value='$stationid' $selected>$station_name</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Designation<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Designation']; ?>" required name="designation">
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Date of birth<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="date" class="form-control" value="<?php echo $row['Date_of_birth']; ?>" required name="dob">
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Police name<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Police_name']; ?>" required name="name">
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Gender<span class="text-danger">*</span></label>
                                                <select class="form-select" name="gender">
                                                <option value="">Select gender</option>
                                                <option value="Male" <?php if ($row['Gender'] == 'Male') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Male</option>
                                                <option value="Female" <?php if ($row['Gender'] == 'Female') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Female</option>
                                                <option value="Other" <?php if ($row['Gender'] == 'Other') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Other</option>
                                                </select>
                                            </div>
                                            <input autocomplete='off'  type="hidden" name="id" value="<?php echo $row['Police_id']; ?>" />
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
                        <h1 class="modal-title fs-5" id="addLabel">Add police</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Station name<span class="text-danger">*</span></label>
                                <select class="form-select" name="stationid">
                                    <option value="">Select Station</option>

                                    <?php
                                    $qry = "SELECT * FROM station_details";
                                    $resul = mysqli_query($conn, $qry);

                                    if ($resul) {
                                        while ($row_station = mysqli_fetch_assoc($resul)) {
                                            $stationid = $row_station['Station_id'];
                                            $station_name = $row_station['Name'];
                                            echo "<option value='$stationid'>$station_name</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Designation<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="designation">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Date of birth<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="date" class="form-control" maxlength="100" required name="dob">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Police name<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="name">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label class="form-label">Gender<span class="text-danger">*</span></label>
                                <select class="form-select" name="gender">
                                <option value="">Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                </select>
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