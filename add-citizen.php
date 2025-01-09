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
    $citizen_type = addslashes(trim($_POST['citizen_type']));
    $state = addslashes(trim($_POST['state']));
    $religion = addslashes(trim($_POST['religion']));
    $caste = addslashes(trim($_POST['caste']));
    $area = addslashes(trim($_POST['area']));
    $city = addslashes(trim($_POST['city']));
    $district = addslashes(trim($_POST['district']));
    $name = addslashes(trim($_POST['name']));
    $age = addslashes(trim($_POST['age']));
    $address = addslashes(trim($_POST['address']));
    $phone = addslashes(trim($_POST['phone']));
    $pincode = addslashes(trim($_POST['pincode']));
    $father_name = addslashes(trim($_POST['father_name']));
    $beat_no = addslashes(trim($_POST['beat_no']));
    $email = addslashes(trim($_POST['email']));
    
    $insertQuery = "INSERT INTO citizen_commitee (Beat_no, Name, Father_name, Citizen_type, Area, Age, Religion, Caste, Address, State, 
    District, Pincode, Phone, Email, Station_id, City) VALUES ('$beat_no', '$name', '$father_name', '$citizen_type', '$area', '$age', 
    '$religion', '$caste', '$address', '$state', '$district', '$pincode', '$phone', '$email', '$stationid', '$city')";

    if (mysqli_query($conn, $insertQuery)) {

        echo "<script>alert('Citizen added successfully');location.href='add-citizen.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='add-citizen.php'</script>";
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
            Citizen committee
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
                    <label class="form-label">Citizen type<span class="text-danger">*</span></label>
                    <select class="form-control" name="citizen_type">
                    <option value="">Select type</option>
                    <option value="Senior citizen">Senior citizen</option>
                    <option value="Normal">Normal</option>
                    </select>
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">State<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="state">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Religion<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="religion">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Caste<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="caste">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Area<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="area">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">City<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="city">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">District<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="district">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Name<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="name">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Age<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="number" class="form-control" maxlength="100" required name="age">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Address<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="address" class="form-control" maxlength="100" required name="address">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Phone<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="phone" class="form-control" maxlength="100" required name="phone">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Pincode<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="number" class="form-control" maxlength="100" required name="pincode">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Father name<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="father_name">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Beat No<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="number" class="form-control" maxlength="100" required name="beat_no">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Email<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="email" class="form-control" maxlength="100" required name="email">
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