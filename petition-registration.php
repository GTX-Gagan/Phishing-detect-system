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

    $petition_type = addslashes(trim($_POST['petition_type']));
    $date_of_receipt = addslashes(trim($_POST['date_of_receipt']));
    $facts_of_petition = addslashes(trim($_POST['facts_of_petition']));
    $sent_to_district = addslashes(trim($_POST['sent_to_district']));
    $petitioner_name = addslashes(trim($_POST['petitioner_name']));
    $street = addslashes(trim($_POST['street']));
    $reference_number = addslashes(trim($_POST['reference_number']));
    $classification = addslashes(trim($_POST['classification']));
    $sent_to_unit = addslashes(trim($_POST['sent_to_unit']));
    $address = addslashes(trim($_POST['address']));
    $father_name = addslashes(trim($_POST['father_name']));
    $area = addslashes(trim($_POST['area']));
    $status = 'Pending';
    
    $insertQuery = "INSERT INTO petition_register (Petition_type, Reference_number, Classification, Date_of_receipt, Facts_of_petition, 
    Sent_to_district, Sent_to_unit, Petitioner_name, Address, Street, Father_name, Area, Status) VALUES ('$petition_type', '$reference_number', 
    '$classification', '$date_of_receipt', '$facts_of_petition', '$sent_to_district', '$sent_to_unit', '$petitioner_name', '$address', 
    '$street', '$father_name', '$area', '$status')";

    if (mysqli_query($conn, $insertQuery)) {

        echo "<script>alert('Petition registered successfully');location.href='petition-registration.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='petition-registration.php'</script>";
    }
    
}

if (isset($_POST['update'])) {

    $id = addslashes(trim($_POST['id']));
    $petition_type = addslashes(trim($_POST['petition_type']));
    $date_of_receipt = addslashes(trim($_POST['date_of_receipt']));
    $facts_of_petition = addslashes(trim($_POST['facts_of_petition']));
    $sent_to_district = addslashes(trim($_POST['sent_to_district']));
    $petitioner_name = addslashes(trim($_POST['petitioner_name']));
    $street = addslashes(trim($_POST['street']));
    $reference_number = addslashes(trim($_POST['reference_number']));
    $classification = addslashes(trim($_POST['classification']));
    $sent_to_unit = addslashes(trim($_POST['sent_to_unit']));
    $address = addslashes(trim($_POST['address']));
    $father_name = addslashes(trim($_POST['father_name']));
    $area = addslashes(trim($_POST['area']));

    
    $update = "UPDATE petition_register SET Petition_type = '$petition_type', Reference_number = '$reference_number', 
    Classification = '$classification', Date_of_receipt = '$date_of_receipt', Facts_of_petition = '$facts_of_petition',  
    Sent_to_district = '$sent_to_district', Sent_to_unit = '$sent_to_unit', Petitioner_name = '$petitioner_name', 
    Address = '$address', Street = '$street', Father_name = '$father_name', Area = '$area' 
    where Petition_register_id = '$id'";

    if (mysqli_query($conn, $update)) {

        echo "<script>alert('Petition registered updated successfully');location.href='petition-registration.php'</script>";
    } else {
        echo "<script>alert('Unable to process your request!');location.href='petition-registration.php'</script>";
    }
    
}

if (isset($_POST['delete_submit'])) {

    $date = date('Y-m-d H:i:s');

    if (mysqli_query($conn, "DELETE from petition_register WHERE Petition_register_id = '$_POST[delete_id]'")) {

        echo "<script>alert('Petition registered deleted successfully');location.href='petition-registration.php'</script>";
    } else {

        echo "<script>alert('Unable to process your request!');location.href='petition-registration.php'</script>";
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
            Petition register
            </h2>
        </div>
        <div class="col-xl-5"></div>
        <div class="col-xl-3 mt-4">
            <div class="input-group w-100 mx-auto d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="bi bi-plus-square-fill me-2"></i>  Add Petition register</button>
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
                        echo "<input autocomplete='off'  type='hidden' name='delete_id' value='$row[Petition_register_id]'/>
                        <button type='submit' name='delete_submit' onClick='return confirm(" . '"Are you sure you want to delete?"' . ")' class='btn btn-danger shadow btn-xs sharp'><i class='bi bi-trash'></i></button>";
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
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Petition type<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Petition_type']; ?>" required name="petition_type">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Date of receipt<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="date" class="form-control" maxlength="100" value="<?php echo $row['Date_of_receipt']; ?>" required name="date_of_receipt">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Facts of petition<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Facts_of_petition']; ?>" required name="facts_of_petition">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Sent to district<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Sent_to_district']; ?>" required name="sent_to_district">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Petitionar name<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Petitioner_name']; ?>" required name="petitioner_name">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Street<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Street']; ?>" required name="street">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Reference number<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Reference_number']; ?>" required name="reference_number">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Classification<span class="text-danger">*</span></label>
                                                <select class="form-control" required name="classification">
                                                <option value="Higher Current" <?php if ($row['Classification'] == 'Higher Current') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Higher Current</option>
                                                <option value="Lower Current" <?php if ($row['Classification'] == 'Lower Current') {
                                                                                                                echo 'selected';
                                                                                                            } ?>>Lower Current</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Sent to unit<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Sent_to_unit']; ?>" required name="sent_to_unit">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Address<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Address']; ?>" required name="address">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Father name<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Father_name']; ?>" required name="father_name">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Area<span class="text-danger">*</span></label>
                                                <input autocomplete='off' type="text" class="form-control" maxlength="100" value="<?php echo $row['Area']; ?>" required name="area">
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
      
      <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-content" style="width: 500px;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addLabel">Add petition</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Petition type<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="petition_type">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Date of receipt<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="date" class="form-control" maxlength="100" required name="date_of_receipt">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Facts of petition<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="facts_of_petition">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Sent to district<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="sent_to_district">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Petitionar name<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="petitioner_name">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Street<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="street">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Reference number<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="reference_number">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Classification<span class="text-danger">*</span></label>
                                <select class="form-control" required name="classification">
                                <option value="">Select any</option>
                                <option value="Higher Current">Higher Current</option>
                                <option value="Lower Current">Lower Current</option>
                                </select>
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Sent to unit<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="sent_to_unit">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Address<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="address">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Father name<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="father_name">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <label class="form-label">Area<span class="text-danger">*</span></label>
                                <input autocomplete='off' type="text" class="form-control" maxlength="100" required name="area">
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