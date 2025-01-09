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

    $is_police = addslashes(trim($_POST['is_police']));
    $type = addslashes(trim($_POST['type']));
    $injury = addslashes(trim($_POST['injury']));
    $state = addslashes(trim($_POST['state']));
    $nationality = addslashes(trim($_POST['nationality']));
    $gender = addslashes(trim($_POST['gender']));
    $area = addslashes(trim($_POST['area']));
    $city = addslashes(trim($_POST['city']));
    $mean = addslashes(trim($_POST['mean']));
    
    $insertQuery = "INSERT INTO victim_details (is_police, type, type_of_injury, nationality, mean, state, city, area, gender) VALUES 
    ('$is_police', '$type', '$injury', '$nationality', '$mean', '$state', '$city', '$area', '$gender')";

    if (mysqli_query($conn, $insertQuery)) {

        echo "<script>alert('Victim details added successfully');location.href='victim-details.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='victim-details.php'</script>";
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
            Victim Details
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
                    <label class="form-label">Is police<span class="text-danger">*</span></label>
                    <select class="form-control" required name="is_police">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    </select>
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Type<span class="text-danger">*</span></label>
                    <select class="form-control" required name="type">
                    <option value="">Select</option>
                    <option value="Identified">Identified</option>
                    <option value="Unidentified">Unidentified</option>
                    </select>
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Type of injury<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="injury">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Nationality<span class="text-danger">*</span></label>
                    <select class="form-control" required name="nationality">
                    <option value="">Select</option>
                    <option value="Indian">Indian</option>
                    <option value="Foreigner">Foreigner</option>
                    </select>
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Gender<span class="text-danger">*</span></label>
                    <select class="form-control" required name="gender">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>
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
                    <label class="form-label">State<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="state">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Mean<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="mean">
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