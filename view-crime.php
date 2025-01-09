<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>

<?php
if (empty($_GET['f_text'])) {

    $f_text = "";
} else {

    $f_text = $_GET['f_text'];
}


$sql = "SELECT * from crime_details";


if (isset($_GET['f_search'])) {

    if (!empty($f_text)) {

        $keywords = "%" . $f_text . "%";

        $sql .= " where (Fir_no LIKE '$keywords' OR Status LIKE '$keywords' OR Crime_Name LIKE '$keywords' OR Fir_date LIKE '$keywords')";
    }
}

if (isset($_POST['update'])) {

    $id = addslashes(trim($_POST['id']));
   
    $status = addslashes(trim($_POST['status']));

    
    $update = "UPDATE crime_details SET status = '$status' where Crime_details_id = '$id'";

    if (mysqli_query($conn, $update)) {

        echo "<script>alert('Crime  updated successfully');location.href='view-crime.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='view-crime.php'</script>";
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
            View crime
            </h2>
        </div>
        <div class="col-xl-6"></div>
        <div class="col-xl-4 mt-4">
            <form>
                <input autocomplete="off" placeholder="Fir No/Status/Crime/Date" value="<?php echo $f_text; ?>" style="min-height: 2.3rem;padding: 0.25rem 0.5rem;font-size: 0.76563rem;border-radius: 0.5rem;border: 1px solid #CCCCCC;" type="text" name="f_text">
                <button class="btn btn-primary btn-sm" name="f_search">Search</button>
                <a class="btn btn-outline-danger btn-sm" href="view-crime.php">Clear</a>
            </form>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Fir No</th>
                <th scope="col">District</th>
                <th scope="col">Subdivision</th>
                <th scope="col">Police Station</th>
                <th scope="col">Fir Date</th>
                <th scope="col">Act</th>
                <th scope="col">Section</th>
                <th scope="col">Place Of occurance</th>
                <th scope="col">Witness</th>
                <th scope="col">Crime name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($conn,$sql);

                if(mysqli_num_rows($res) > 0){
                    $i = 1;
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td> $i</td>";
                        echo "<td>$row[Fir_no]</td>";
                        echo "<td>$row[District]</td>";
                        echo "<td>$row[Subdivision]</td>";
                        echo "<td>$row[Police_station_id]</td>";
                        echo "<td>$row[Fir_date]</td>";
                        echo "<td>$row[Act]</td>";
                        echo "<td>$row[Section]</td>";
                        echo "<td>$row[Place_of_occurance]</td>";
                        echo "<td>$row[Witness]</td>";
                        echo "<td>$row[Crime_Name]</td>";
                        echo "<td>$row[status]</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo " <button type='button' data-toggle='modal' data-target='#update$row[Crime_details_id]' class='btn btn-primary shadow btn-xs sharp'><i class='bi bi-pencil-square'></i></button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        $i++;
                        ?>
                        <div class="modal fade" id="update<?php echo $row["Crime_details_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST">
                                    <div class="modal-content" style="width: 500px;">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="addLabel">Update status</h1>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-12 mb-3">
                                                    <label class="form-label">Status<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="status">
                                                    <option value="">Select status</option>
                                                    <option value="Investigate" <?php if ($row['status'] == 'Investigate') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>Investigate</option>
                                                    <option value="Approved" <?php if ($row['status'] == 'Approved') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>Approved</option>
                                                    <option value="Closed" <?php if ($row['status'] == 'Closed') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>Closed</option>
                                                    </select>
                                                </div>
                                                
                                                <input autocomplete='off'  type="hidden" name="id" value="<?php echo $row['Crime_details_id']; ?>" />
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
    </div>
  </section>
  <!-- end welcome section -->

<?php
require_once 'include/footer.php';
?>