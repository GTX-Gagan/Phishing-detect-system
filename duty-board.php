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

    $policeid = addslashes(trim($_POST['policeid']));
    $district = addslashes(trim($_POST['district']));
    $unittype = addslashes(trim($_POST['unittype']));
    $f_date = addslashes(trim($_POST['f_date']));
    $t_date = addslashes(trim($_POST['t_date']));
    $place = addslashes(trim($_POST['place']));
    
    $insertQuery = "INSERT INTO duty_board (Police_id, District, Unit_type, From_date, To_date, Place) VALUES ('$policeid', '$district', '$unittype', 
    '$f_date', '$t_date', '$place')";

    if (mysqli_query($conn, $insertQuery)) {

        echo "<script>alert('Duty added successfully');location.href='duty-board.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='duty-board.php'</script>";
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
            Duty Board
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
                    <label class="form-label">Police name<span class="text-danger">*</span></label>
                    <select class="form-control" name="policeid" required>
                        <option value="">Select Police</option>

                        <?php
                        $qry = "SELECT * FROM police_details";
                        $resul = mysqli_query($conn, $qry);

                        if ($resul) {
                            while ($row_station = mysqli_fetch_assoc($resul)) {
                                $policeid = $row_station['Police_id'];
                                $police_name = $row_station['Police_name'];
                                echo "<option value='$policeid'>$police_name</option>";
                            }
                        }
                        ?>

                    </select>
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">District<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="district">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Unit type<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="unittype">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">From Date<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="date" class="form-control" maxlength="100" required name="f_date">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">To Date<span class="text-danger">*</span></label>
                    <input autocomplete='off' type="date" class="form-control" maxlength="100" required name="t_date">
                </div>
                <div class="col-xl-4 mb-3">
                    <label class="form-label">Place<span class="text-danger">*</span></label>
                    <select class="form-control" name="place" required>
                        <option value="">Select Police</option>
                        <option value="Bantwal">Bantwal</option>
                        <option value="Puttur">Puttur</option>
                        <option value="Sulia">Sulia</option>
                        <option value="Mulki">Mulki</option>
                        <option value="Ullal">Ullal</option>
                        <option value="Moodbidri">Moodbidri</option>
                        <option value="Mangalore">Mangalore</option>
                        <option value="Belthangady">Belthangady</option>

                    </select>
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