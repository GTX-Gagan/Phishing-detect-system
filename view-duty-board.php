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


$sql = "SELECT * from duty_board";


if (isset($_GET['f_search'])) {

    if (!empty($f_text)) {

        $keywords = "%" . $f_text . "%";

        $sql .= " where (District LIKE '$keywords' OR Unit_type LIKE '$keywords')";
    }
}
?>

<style>
     .container-flu {
        display: flex;
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
    }
    .map {
        background-image: url('images/dkmap.png'); 
        background-position: center; 
        background-size: contain;
        width: 520px;
        height: 450px;
    }
    .input1 {
        position: absolute;
        bottom: 245px;
        right: 680px;
    }
    .input2 {
        position: absolute;
        bottom: 252px;
        right: 580px;
    }
    .input3 {
        position: absolute;
        bottom: 60px;
        right: 470px;
    }
    .input4 {
        position: absolute;
        bottom: 356px;
        right: 815px;
        
    }
    .input5 {
        position: absolute;
        bottom: 282px;
        right: 785px;
    }
    .input6 {
        position: absolute;
        bottom: 303px;
        right: 675px;
    }
    .input7 {
        position: absolute;
        bottom: 295px;
        right: 805px;
    }
    .input8 {
        position: absolute;
        bottom: 300px;
        right: 535px;
    }
    .row input {
        width: 100px;
        height: 20px;
    } 
    
</style>

<section class="welcome_section layout_padding maping">
    <div class="container-flu">
        <div class="row">
            <div class="map">
                <?php
                $date = date('Y m d');
                $qry = "SELECT p.Police_name from police_details p, duty_board d where 
                p.Police_id = d.Police_id AND d.Place = 'Bantwal' AND '$date' BETWEEN d.From_date AND d.To_date";
                 $resu = mysqli_query($conn,$qry);

                 if(mysqli_num_rows($resu) > 0){
                    while($row1 = mysqli_fetch_array($resu)){

                    ?>
                <input class="form-control input1" type="text" placeholder="Bantwal" value="<?php echo $row1['Police_name']; ?>">
                    <?php
                    }
                 }
                 ?>

                 <?php
                $qry = "SELECT p.Police_name from police_details p, duty_board d where 
                p.Police_id = d.Police_id AND d.Place = 'Puttur' AND '$date' BETWEEN d.From_date AND d.To_date";
                 $resu = mysqli_query($conn,$qry);

                 if(mysqli_num_rows($resu) > 0){
                    while($row1 = mysqli_fetch_array($resu)){

                    ?>
                <input class="form-control input2" type="text" placeholder="Puttur" value="<?php echo $row1['Police_name']; ?>">
                    <?php
                    }
                 }
                 ?>

                 <?php
                $qry = "SELECT p.Police_name from police_details p, duty_board d where 
                p.Police_id = d.Police_id AND d.Place = 'Sulia' AND '$date' BETWEEN d.From_date AND d.To_date";
                 $resu = mysqli_query($conn,$qry);

                 if(mysqli_num_rows($resu) > 0){
                    while($row1 = mysqli_fetch_array($resu)){

                    ?>
                <input class="form-control input3" type="text" placeholder="Sulia" value="<?php echo $row1['Police_name']; ?>">
                    <?php
                    }
                 }
                 ?>

                 <?php
                $qry = "SELECT p.Police_name from police_details p, duty_board d where 
                p.Police_id = d.Police_id AND d.Place = 'Mulki' AND '$date' BETWEEN d.From_date AND d.To_date";
                 $resu = mysqli_query($conn,$qry);

                 if(mysqli_num_rows($resu) > 0){
                    while($row1 = mysqli_fetch_array($resu)){

                    ?>
                <input class="form-control input4" type="text" placeholder="Mulki" value="<?php echo $row1['Police_name']; ?>">
                    <?php
                    }
                 }
                 ?>

                 <?php
                $qry = "SELECT p.Police_name from police_details p, duty_board d where 
                p.Police_id = d.Police_id AND d.Place = 'Ullal' AND '$date' BETWEEN d.From_date AND d.To_date";
                 $resu = mysqli_query($conn,$qry);

                 if(mysqli_num_rows($resu) > 0){
                    while($row1 = mysqli_fetch_array($resu)){

                    ?>
                <input class="form-control input5" type="text" placeholder="Ullal" value="<?php echo $row1['Police_name']; ?>">
                    <?php
                    }
                 }
                 ?>

                 <?php
                $qry = "SELECT p.Police_name from police_details p, duty_board d where 
                p.Police_id = d.Police_id AND d.Place = 'Moodbidri' AND '$date' BETWEEN d.From_date AND d.To_date";
                 $resu = mysqli_query($conn,$qry);

                 if(mysqli_num_rows($resu) > 0){
                    while($row1 = mysqli_fetch_array($resu)){

                    ?>
                <input class="form-control input6" type="text" placeholder="Moodbidri" value="<?php echo $row1['Police_name']; ?>">
                    <?php
                    }
                 }
                 ?>

                 <?php
                $qry = "SELECT p.Police_name from police_details p, duty_board d where 
                p.Police_id = d.Police_id AND d.Place = 'Mangalore' AND '$date' BETWEEN d.From_date AND d.To_date";
                 $resu = mysqli_query($conn,$qry);

                 if(mysqli_num_rows($resu) > 0){
                    while($row1 = mysqli_fetch_array($resu)){

                    ?>
                <input class="form-control input7" type="text" placeholder="Mangalore" value="<?php echo $row1['Police_name']; ?>">
                    <?php
                    }
                 }
                 ?>

                 <?php
                $qry = "SELECT p.Police_name from police_details p, duty_board d where 
                p.Police_id = d.Police_id AND d.Place = 'Belthangady' AND '$date' BETWEEN d.From_date AND d.To_date";
                 $resu = mysqli_query($conn,$qry);

                 if(mysqli_num_rows($resu) > 0){
                    while($row1 = mysqli_fetch_array($resu)){
                    ?>
                    <input class="form-control input8" type="text" placeholder="Belthangady" value="<?php echo $row1['Police_name']; ?>">
                    <?php
                    }
                 }
                 ?>
                
                
            </div>
        </div>
    </div>
</section> 
<!-- welcome section -->
 <section class="welcome_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="service_detail">
            <h3>
            PSA
            </h3>
            <h2>
            Duty board
            </h2>
        </div>
        <div class="col-xl-4"></div>
        <div class="col-xl-4 mt-4">
            <form>
                <input autocomplete="off" placeholder="Unit Type/District" value="<?php echo $f_text; ?>" style="min-height: 2.3rem;padding: 0.25rem 0.5rem;font-size: 0.76563rem;border-radius: 0.5rem;border: 1px solid #CCCCCC;" type="text" name="f_text">
                <button class="btn btn-primary btn-sm" name="f_search">Search</button>
                <a class="btn btn-outline-danger btn-sm" href="view-duty-board.php">Clear</a>
                <a class="btn btn-outline-success btn-sm" href="print-duty-board.php">Print</a>
            </form>
        </div>
      </div>
      <div class="row py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Police</th>
                <th scope="col">District</th>
                <th scope="col">Unit type</th>
                <th scope="col">Places</th>
                <th scope="col">From date</th>
                <th scope="col">To date</th>
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
                        echo "<td>";
                        $polid = $row['Police_id'];
                        $qry = "SELECT * FROM police_details WHERE Police_id = '$polid'";
                        $result = mysqli_query($conn, $qry);

                        if ($result) { 
                            if (mysqli_num_rows($result) > 0) {
                                $row2 = mysqli_fetch_assoc($result);
                                $station = $row2['Police_name'];
                            }
                        }
                        echo "$station</td>";
                        echo "<td>$row[District]</td>";
                        echo "<td>$row[Unit_type]</td>";
                        echo "<td>$row[Place]</td>";
                        echo "<td>$row[From_date]</td>";
                        echo "<td>$row[To_date]</td>";
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