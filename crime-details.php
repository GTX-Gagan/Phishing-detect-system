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

    $stationid = addslashes(trim($_POST['stationid']));
    $crime_name = addslashes(trim($_POST['crime_name']));
    $fir_no = addslashes(trim($_POST['fir_no']));
    $place_of_occurance = addslashes(trim($_POST['place_of_occurance']));
    $subdivision = addslashes(trim($_POST['subdivision']));
    $fir_date = addslashes(trim($_POST['fir_date']));
    $act = addslashes(trim($_POST['act']));
    $district = addslashes(trim($_POST['district']));
    $section = addslashes(trim($_POST['section']));
    $witness = addslashes(trim($_POST['witness']));
    $status = 'Investigate';
    
    $insertQuery = "INSERT INTO crime_details (Fir_no, District, Subdivision, Police_station_id, Fir_date, Act, Section, Place_of_occurance, 
    Witness, Crime_Name, status) VALUES ('$fir_no', '$district', '$subdivision', '$stationid', '$fir_date', '$act', 
    '$section', '$place_of_occurance', '$witness', '$crime_name', '$status')";

    if (mysqli_query($conn, $insertQuery)) {

        echo "<script>alert('Citizen added successfully');location.href='crime-details.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='crime-details.php'</script>";
    }
    
}

?>
<style>
    .container-fluid{
        width: 90%;
    }
</style>


 <!-- welcome section -->
 <section class="welcome_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="service_detail">
            <h3>
            PSA
            </h3>
            <h2>
            Crime Details
            </h2>
        </div>
        <div class="col-xl-4"></div>
        <div class="col-xl-4 mt-4">
            <form>
                
            </form>
        </div>
      </div>
    </div>
    <div class="container-fluid">
        <form method ="POST">
            <div class="row">
                <div class="col-xl-4 mb-3">
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
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Crime name<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="crime_name">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Fir no<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="number" class="form-control" maxlength="100" required name="fir_no">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Place of occurance<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="place_of_occurance">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Subdivision<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="subdivision">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Fir date<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="date" class="form-control" maxlength="100" required name="fir_date">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Act<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="act">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Section<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="section">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">District<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="district">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Witness<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="witness">
                </div>
            </div>
            <button type="submit" name="add_submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </section>
  <!-- end welcome section -->

<?php
require_once 'include/footer.php';
?>