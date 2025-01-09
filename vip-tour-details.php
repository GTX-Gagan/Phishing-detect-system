<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>
<style>
    .container-fluid{
        width: 90%;
    }
</style>

<?php
if (isset($_POST['add_submit'])) {

    $stationid = addslashes(trim($_POST['stationid']));
    $name = addslashes(trim($_POST['name']));
    $proposed_date_of_departure = addslashes(trim($_POST['proposed_date_of_departure']));
    $arrival_unit = addslashes(trim($_POST['arrival_unit']));
    $place_of_arrival = addslashes(trim($_POST['place_of_arrival']));
    $date_of_arrival = addslashes(trim($_POST['date_of_arrival']));
    $visiting_places = addslashes(trim($_POST['visiting_places']));
    $mode_of_journey = addslashes(trim($_POST['mode_of_journey']));
    $type_of_security = addslashes(trim($_POST['type_of_security']));

    
    $insertQuery = "INSERT INTO vip_tour_details (Vip_name, Proposed_date_of_departure, Arrival_unit, Place_of_arrival, Date_of_arrival, 
    Visiting_places, Mode_of_journey, Type_of_security, Station_id) VALUES ('$name', '$proposed_date_of_departure', '$arrival_unit', '$place_of_arrival', 
    '$date_of_arrival', '$visiting_places', '$mode_of_journey', '$type_of_security', '$stationid')";

    if (mysqli_query($conn, $insertQuery)) {

        echo "<script>alert('Vip tour  added successfully');location.href='vip-tour-details.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='vip-tour-details.php'</script>";
    }
    
}

if (isset($_POST['update'])) {

    $id = addslashes(trim($_POST['id']));
    $stationid = addslashes(trim($_POST['stationid']));
    $name = addslashes(trim($_POST['name']));
    $proposed_date_of_departure = addslashes(trim($_POST['proposed_date_of_departure']));
    $arrival_unit = addslashes(trim($_POST['arrival_unit']));
    $place_of_arrival = addslashes(trim($_POST['place_of_arrival']));
    $date_of_arrival = addslashes(trim($_POST['date_of_arrival']));
    $visiting_places = addslashes(trim($_POST['visiting_places']));
    $mode_of_journey = addslashes(trim($_POST['mode_of_journey']));
    $type_of_security = addslashes(trim($_POST['type_of_security']));

    
    $update = "UPDATE vip_tour_details SET Vip_name = '$name', Proposed_date_of_departure = '$proposed_date_of_departure', 
    Arrival_unit = '$arrival_unit', Place_of_arrival = '$place_of_arrival', Date_of_arrival = '$date_of_arrival',  
    Visiting_places = '$visiting_places', Mode_of_journey = '$mode_of_journey', Type_of_security = '$type_of_security', Station_id = '$stationid' where Vip_tour_details_id = '$id'";

    if (mysqli_query($conn, $update)) {

        echo "<script>alert('Vip tour  updated successfully');location.href='vip-tour-details.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='vip-tour-details.php'</script>";
    }
    
}

if (isset($_POST['delete_submit'])) {

    $date = date('Y-m-d H:i:s');

    if (mysqli_query($conn, "DELETE from vip_tour_details WHERE Vip_tour_details_id = '$_POST[delete_id]'")) {

        echo "<script>alert('Vip tour deleted successfully');location.href='vip-tour-details.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='vip-tour-details.php'</script>";
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
            Vip tour details
            </h2>
        </div>
        <div class="col-xl-5"></div>
        <div class="col-xl-3 mt-4">
            <div class="input-group w-100 mx-auto d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="bi bi-plus-square-fill me-2"></i>  Add Vip</button>
            </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Vip name</th>
                <th scope="col">Proposed date of departure</th>
                <th scope="col">Arrival_unit</th>
                <th scope="col">Place of arrival</th>
                <th scope="col">Date of arrival</th>
                <th scope="col">Visiting places</th>
                <th scope="col">Mode of journey</th>
                <th scope="col">Type of security</th>
                <th scope="col">Station</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from vip_tour_details";
                $res = mysqli_query($conn,$sql);

                if(mysqli_num_rows($res) > 0){
                    $i = 1;
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td> $i</td>";
                        echo "<td>$row[Vip_name]</td>";
                        echo "<td>$row[Proposed_date_of_departure]</td>";
                        echo "<td>$row[Arrival_unit]</td>";
                        echo "<td>$row[Place_of_arrival]</td>";
                        echo "<td>$row[Date_of_arrival]</td>";
                        echo "<td>$row[Visiting_places]</td>";
                        echo "<td>$row[Mode_of_journey]</td>";
                        echo "<td>$row[Type_of_security]</td>";
                        echo "<td>";
                        $staid = $row['Station_id'];
                        $qry = "SELECT * FROM station_details WHERE Station_id = '$staid'";
                        $result = mysqli_query($conn, $qry);

                        if ($result) { 
                            if (mysqli_num_rows($result) > 0) {
                                $row2 = mysqli_fetch_assoc($result);
                                $station = $row2['Name'];
                            }
                        }
                        echo "$station</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input autocomplete='off'  type='hidden' name='delete_id' value='$row[Vip_tour_details_id]'/>
                        <button type='submit' name='delete_submit' onClick='return confirm(" . '"Are you sure you want to delete?"' . ")' class='btn btn-danger shadow btn-xs sharp'><i class='bi bi-trash'></i></button>";
                        echo " <button type='button' data-toggle='modal' data-target='#update$row[Vip_tour_details_id]' class='btn btn-primary shadow btn-xs sharp'><i class='bi bi-pencil-square'></i></button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        $i++;

                    ?>
                    <div class="modal fade" id="update<?php echo $row["Vip_tour_details_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST">
                                <div class="modal-content" style="width: 500px;">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addLabel">Update Vip</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Station name<span class="text-danger">*</span></label>
                                                <select class="form-control" name="stationid">
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
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Vip name<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Vip_name']; ?>" required name="name">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Proposed date of departure<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Proposed_date_of_departure']; ?>" required name="proposed_date_of_departure">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Arrival unit<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Arrival_unit']; ?>" required name="arrival_unit">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Place of arrival<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Place_of_arrival']; ?>" required name="place_of_arrival">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Date of arrival<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Date_of_arrival']; ?>" required name="date_of_arrival">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Visiting places<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Visiting_places']; ?>" required name="visiting_places">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Mode of journey<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Mode_of_journey']; ?>" required name="mode_of_journey">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Type of security<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Type_of_security']; ?>" required name="type_of_security">
                                            </div>
                                            
                                            <input autocomplete='off'  type="hidden" name="id" value="<?php echo $row['Vip_tour_details_id']; ?>" />
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
                        <h1 class="modal-title fs-5" id="addLabel">Add Vip</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Station name<span class="text-danger">*</span></label>
                                <select class="form-control" name="stationid">
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
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Vip name<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="name">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Proposed date of departure<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="proposed_date_of_departure">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Arrival unit<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="arrival_unit">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Place of arrival<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="place_of_arrival">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Date of arrival<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="date_of_arrival">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Visiting places<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="visiting_places">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Mode of journey<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="mode_of_journey">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Type of security<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="type_of_security">
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