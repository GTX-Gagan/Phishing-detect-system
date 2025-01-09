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

if (isset($_POST['update'])) {

    $id = addslashes(trim($_POST['id']));
    $status = addslashes(trim($_POST['status']));
    
    $update = "UPDATE petition_register SET Status = '$status' where Petition_register_id = '$id'";

    if (mysqli_query($conn, $update)) {

        echo "<script>alert('Petition updated successfully');location.href='petition-endrosement.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='petition-endrosement.php'</script>";
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
            Petition endrosement
            </h2>
        </div>
        <div class="col-xl-5"></div>
        <div class="col-xl-3 mt-4">
            <div class="input-group w-100 mx-auto d-flex justify-content-end">
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
                <th scope="col">Petition type</th>
                <th scope="col">Reference No</th>
                <th scope="col">Classification</th>
                <th scope="col">Date</th>
                <th scope="col">Facts of petition</th>
                <th scope="col">District</th>
                <th scope="col">Unit</th>
                <th scope="col">Petitionar name</th>
                <th scope="col">Address</th>
                <th scope="col">Street</th>
                <th scope="col">Father Name</th>
                <th scope="col">Area</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from petition_register";
                $res = mysqli_query($conn,$sql);

                if(mysqli_num_rows($res) > 0){
                    $i = 1;
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td> $i</td>";
                        echo "<td>$row[Petition_type]</td>";
                        echo "<td>$row[Reference_number]</td>";
                        echo "<td>$row[Classification]</td>";
                        echo "<td>$row[Date_of_receipt]</td>";
                        echo "<td>$row[Facts_of_petition]</td>";
                        echo "<td>$row[Sent_to_district]</td>";
                        echo "<td>$row[Sent_to_unit]</td>";
                        echo "<td>$row[Petitioner_name]</td>";
                        echo "<td>$row[Address]</td>";
                        echo "<td>$row[Street]</td>";
                        echo "<td>$row[Father_name]</td>";
                        echo "<td>$row[Area]</td>";
                        echo "<td>$row[Status]</td>";

                        echo "<td>";
                        echo "<form method='post'>";
                        echo " <button type='button' data-toggle='modal' data-target='#update$row[Petition_register_id]' class='btn btn-primary shadow btn-xs sharp'><i class='bi bi-pencil-square'></i></button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        $i++;

                    ?>
                    <div class="modal fade" id="update<?php echo $row["Petition_register_id"]; ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST">
                                <div class="modal-content" style="width: 500px;">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addLabel">Update Petition</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Status<span class="text-danger">*</span></label>
                                                <select class="form-control" required name="status">
                                                <option value="Pending" <?php if ($row['Status'] == 'Pending') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Pending</option>
                                                <option value="Rejected" <?php if ($row['Status'] == 'Rejected') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Rejected</option>
                                                <option value="Completed" <?php if ($row['Status'] == 'Completed') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Completed</option>
                                                </select>
                                            </div>
                                            
                                            <input autocomplete='off'  type="hidden" name="id" value="<?php echo $row['Petition_register_id']; ?>" />
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