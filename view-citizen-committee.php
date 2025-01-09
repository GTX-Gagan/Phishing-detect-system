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


$sql = "SELECT * from citizen_commitee";


if (isset($_GET['f_search'])) {

    if (!empty($f_text)) {

        $keywords = "%" . $f_text . "%";

        $sql .= " where (Name LIKE '$keywords' OR Citizen_type LIKE '$keywords' OR Area LIKE '$keywords' OR State LIKE '$keywords')";
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
                <input autocomplete="off" placeholder="Name/Area/Citizen" value="<?php echo $f_text; ?>" style="min-height: 2.3rem;padding: 0.25rem 0.5rem;font-size: 0.76563rem;border-radius: 0.5rem;border: 1px solid #CCCCCC;" type="text" name="f_text">
                <button class="btn btn-primary btn-sm" name="f_search">Search</button>
                <a class="btn btn-outline-danger btn-sm" href="view-citizen-committee.php">Clear</a>
                <a class="btn btn-outline-success btn-sm" href="print-citizen.php">Print</a>
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
                <th scope="col">Name</th>
                <th scope="col">Father name</th>
                <th scope="col">Citizen type</th>
                <th scope="col">Area</th>
                <th scope="col">Age</th>
                <th scope="col">Religion</th>
                <th scope="col">Address</th>
                <th scope="col">State</th>
                <th scope="col">District</th>
                <th scope="col">pincode</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Station</th>
                <th scope="col">City</th>

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
                        echo "<td>$row[Name]</td>";
                        echo "<td>$row[Father_name]</td>";
                        echo "<td>$row[Citizen_type]</td>";
                        echo "<td>$row[Area]</td>";
                        echo "<td>$row[Age]</td>";
                        echo "<td>$row[Religion]</td>";
                        echo "<td>$row[Address]</td>";
                        echo "<td>$row[State]</td>";
                        echo "<td>$row[District]</td>";
                        echo "<td>$row[Pincode]</td>";
                        echo "<td>$row[Phone]</td>";
                        echo "<td>$row[Email]</td>";
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
                        echo "<td>$row[City]</td>";
                        echo "</tr>";

                        $i++;

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