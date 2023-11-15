<?php
include "config.php";
$id = $_GET["id"];

// Fetch existing data
$sql = "SELECT * FROM `forms` WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
   echo "Error fetching data: " . $stmt->errorInfo()[2];
   exit;
}

if (isset($_POST["submit"])) {
   $last_name = $_POST["last_name"];
   $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
   $first_name = $_POST["first_name"];
   $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
   $middle_name = $_POST["middle_name"];
   $middle_name = filter_var($middle_name, FILTER_SANITIZE_STRING);
   $date_of_consultation = $_POST["date_of_consultation"];
   $date_of_consultation = filter_var($date_of_consultation, FILTER_SANITIZE_STRING);
   $family_serial_num = $_POST["family_serial_num"];
   $family_serial_num = filter_var($family_serial_num, FILTER_SANITIZE_STRING);
   $house_num = $_POST["house_num"];
   $house_num = filter_var($house_num, FILTER_SANITIZE_STRING);
   $barangay = $_POST["barangay"];
   $barangay = filter_var($barangay, FILTER_SANITIZE_STRING);
   $city = $_POST["city"];
   $city = filter_var($city, FILTER_SANITIZE_STRING);
   $province = $_POST["province"];
   $province = filter_var($province, FILTER_SANITIZE_STRING);
   $civil_status = $_POST["civil_status"];
   $civil_status = filter_var($civil_status, FILTER_SANITIZE_STRING);
   $birthday = $_POST["birthday"];
   $birthday = filter_var($birthday, FILTER_SANITIZE_STRING);
   $age = $_POST["age"];
   $age = filter_var($age, FILTER_SANITIZE_STRING);
   $height = $_POST["height"];
   $height = filter_var($height, FILTER_SANITIZE_STRING);
   $weight = $_POST["weight"];
   $weight = filter_var($weight, FILTER_SANITIZE_STRING);
   $educational_attainment = $_POST["educational_attainment"];
   $educational_attainment = filter_var($educational_attainment, FILTER_SANITIZE_STRING);
   $mobile_number = $_POST["mobile_number"];
   $mobile_number = filter_var($mobile_number, FILTER_SANITIZE_STRING);
   $allergy = $_POST["allergy"];
   $allergy = filter_var($allergy, FILTER_SANITIZE_STRING);
   $disability = $_POST["disability"];
   $disability = filter_var($disability, FILTER_SANITIZE_STRING);
   $drug = $_POST["drug"];
   $drug = filter_var($drug, FILTER_SANITIZE_STRING);
   $handicap = $_POST["handicap"];
   $handicap = filter_var($handicap, FILTER_SANITIZE_STRING);
   $impairment = $_POST["impairment"];
   $impairment = filter_var($impairment, FILTER_SANITIZE_STRING);
   $last_men_period = $_POST["last_men_period"];
   $last_men_period = filter_var($last_men_period, FILTER_SANITIZE_STRING);
   $tetanus_toxoid = $_POST["tetanus_toxoid"];
   $tetanus_toxoid = filter_var($tetanus_toxoid, FILTER_SANITIZE_STRING);
   $gravidity = $_POST["gravidity"];
   $gravidity = filter_var($gravidity, FILTER_SANITIZE_STRING);
   $estimated_due = $_POST["estimated_due"];
   $estimated_due = filter_var($estimated_due, FILTER_SANITIZE_STRING);
   $parity = $_POST["parity"];
   $parity = filter_var($parity, FILTER_SANITIZE_STRING);
   $term = $_POST["term"];
   $term = filter_var($term, FILTER_SANITIZE_STRING);
   $pre_term = $_POST["pre_term"];
   $pre_term = filter_var($pre_term, FILTER_SANITIZE_STRING);
   $live_birth = $_POST["live_birth"];
   $live_birth = filter_var($live_birth, FILTER_SANITIZE_STRING);
   $abortion = $_POST["abortion"];
   $abortion = filter_var($abortion, FILTER_SANITIZE_STRING);
   $menarche = $_POST["menarche"];
   $menarche = filter_var($menarche, FILTER_SANITIZE_STRING);
   $period_duration = $_POST["period_duration"];
   $period_duration = filter_var($period_duration, FILTER_SANITIZE_STRING);
   $birth_control_method = $_POST["birth_control_method"];
   $birth_control_method = filter_var($birth_control_method, FILTER_SANITIZE_STRING);
   $menopause = $_POST["menopause"];
   $menopause = filter_var($menopause, FILTER_SANITIZE_STRING);
   $what_age = $_POST["what_age"];
   $what_age = filter_var($what_age, FILTER_SANITIZE_STRING);
   $syphilis_result = $_POST["syphilis_result"];
   $syphilis_result = filter_var($syphilis_result, FILTER_SANITIZE_STRING);
   $penicillin_treatment = $_POST["penicillin_treatment"];
   $penicillin_treatment = filter_var($penicillin_treatment, FILTER_SANITIZE_STRING);
   $test_class_hiv = $_POST["test_class_hiv"];
   $test_class_hiv = filter_var($test_class_hiv, FILTER_SANITIZE_STRING);
   $prenatal_visits = $_POST["prenatal_visits"];
   $prenatal_visits = filter_var($prenatal_visits, FILTER_SANITIZE_STRING);

   $sql = "UPDATE `forms` SET `last_name`='$last_name',`first_name`='$first_name',`middle_name`='$middle_name',`date_of_consultation`='$date_of_consultation',`family_serial_num`='$family_serial_num',`house_num`='$house_num',`barangay`='$barangay',`city`='$city',`province`='$province',`civil_status`='$civil_status',`birthday`='$birthday',`age`='$age',`height`='$height',`weight`='$weight',`educational_attainment`='$educational_attainment',
   `mobile_number`='$mobile_number',`allergy`='$allergy',`disability`='$disability',`drug`='$drug',`handicap`='$handicap',`impairment`='$impairment',`last_men_period`='$last_men_period',`tetanus_toxoid`='$tetanus_toxoid',`gravidity`='$gravidity',`estimated_due`='$estimated_due',`parity`='$parity',`term`='$term',`pre_term`='$pre_term',`live_birth`='$live_birth',`abortion`='$abortion',`menarche`='$menarche',`period_duration`=
   '$period_duration',`birth_control_method`='$birth_control_method',`menopause`='$menopause',`what_age`='$what_age',`syphilis_result`='$syphilis_result',`penicillin_treatment`='$penicillin_treatment',`test_class_hiv`='$test_class_hiv',`prenatal_visits`='$prenatal_visits' WHERE id = $id";

   $result = $conn->query($sql);

   if ($result) {
      header("Location: index.php?msg=Data updated successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>edit</title>

   <!-- font link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- css file link  -->
   <link rel="stylesheet" href="css/style.css">


</head>

<body>
   <section class="data_forms">
      <form action="" method="POST">
         <h3>Pregnant Info</h3>

         <div class="flex">
            <div class="flex">
               <div class="inputBox">
                  <span>Last Name:</span>
                  <input type="text" name="last_name" placeholder="enter your last name" class="box"
                     value="<?php echo $row['last_name']; ?>" readonly>
               </div>
               <div class="inputBox">
                  <span>First Name:</span>
                  <input type="text" name="first_name" placeholder="enter your first name" class="box"
                     value="<?php echo $row['first_name']; ?>" readonly>
               </div>
               <div class="inputBox">
                  <span>Middle Name:</span>
                  <input type="text" name="middle_name" placeholder="enter your middle name" class="box"
                     value="<?php echo $row['middle_name']; ?>"readonly>
               </div>
               <div class="inputBox">
                  <span>Date of Consultation:</span>
                  <input type="date" name="date_of_consultation" class="box"
                     value="<?php echo $row['date_of_consultation']; ?>" readonly>
               </div>
               <div class="inputBox">
                  <span>Family Serial Number:</span>
                  <input type="text" name="family_serial_num" class="box"
                     value="<?php echo $row['family_serial_num']; ?>"readonly>
               </div>
               <div class="inputBox">
                  <span>House No.:</span>
                  <input type="text" name="house_num" placeholder="e.g. block lot street" class="box"
                     value="<?php echo $row['house_num']; ?>"readonly>
               </div>
               <div class="inputBox">
                  <span>Barangay:</span>
                  <input type="text" name="barangay" class="box" value="<?php echo $row['barangay']; ?>" readonly>
               </div>
               <div class="inputBox">
                  <span>City :</span>
                  <input type="text" name="city" value="San Jose Del Monte" class="box" readonly>
               </div>
               <div class="inputBox">
                  <span>Province :</span>
                  <input type="text" name="province" value="Bulacan" class="box" readonly>
               </div>
               <div class="inputBox">
                  <span>Civil Status:</span>
                  <input type="text" name="civil_status" class="box" value="<?php echo $row['civil_status']; ?>" readonly>
               </div>
               <div class="inputBox">
                  <span>Birthday:</span>
                  <input type="date" name="birthday" class="box" value="<?php echo $row['birthday']; ?>" readonly>
               </div>
               <div class="inputBox">
                  <span>Age:</span>
                  <input type="number" name="age" class="box" placeholder="Please enter your age"
                     value="<?php echo $row['age']; ?>" readonly>
               </div>
               <div class="inputBox">
                  <span>Height (cm):</span>
                  <input type="number" name="height" step="0.1" placeholder="Please enter your height"
                     value="<?php echo $row['height']; ?>" class="box" readonly>
               </div>
               <div class="inputBox">
                  <span>Weight (kg):</span>
                  <input type="number" name="weight" step="0.01" placeholder="Please enter your weight"
                     value="<?php echo $row['weight']; ?>" class="box" readonly>
               </div>
               <div class="inputBox">
                  <span>Educational Attainment:</span>
                  <input type="text" name="educational_attainment" class="box"
                     value="<?php echo $row['educational_attainment']; ?>" readonly>
               </div>
               <div class="inputBox">
                  <span>Mobile No:</span>
                  <input type="text" name="mobile_number" value="+63" maxlength="13" class="box"
                     value="<?php echo $row['mobile_number']; ?>" readonly>
               </div>
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
         </div>
         </div>
            

            <h4>PATIENT ALERT</h4>
            <div class="flex">
               <div class="inputBox">
                  <span>Allergy:</span>
                  <input type="text" name="allergy" class="box" value="<?php echo $row['allergy']; ?>" readonly>
               </div>

               <div class="inputBox">
                  <span>Disability:</span>
                  <input type="text" name="disability" class="box" value="<?php echo $row['disability']; ?>" readonly>
               </div>

               <div class="inputBox">
                  <span>Drug:</span>
                  <input type="text" name="drug" class="box" value="<?php echo $row['drug']; ?>" readonly>
               </div>

               <div class="inputBox">
                  <span>Handicap:</span>
                  <input type="text" name="handicap" class="box" value="<?php echo $row['handicap']; ?>" readonly>
               </div>

               <div class="inputBox">
                  <span>Impairment:</span>
                  <input type="text" name="impairment" class="box" value="<?php echo $row['impairment']; ?>" readonly>
                  </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
         </div>
         </div>

         <h5>PRENATAL</h5>
         <div class="flex">
            <div class="inputBox">
               <span>Last Menstruation Period:</span>
               <input type="date" name="last_men_period" class="box" value="<?php echo $row['last_men_period']; ?>"
               readonly>
            </div>
            <div class="inputBox">
               <span>Tetanus Toxoid:</span>
               <input type="text" name="tetanus_toxoid" class="box" value="<?php echo $row['tetanus_toxoid']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>Gravidity:</span>
               <input type="text" name="gravidity" class="box" placeholder="number of times that get pregnant"
                  value="<?php echo $row['gravidity']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>Estimated Date of Confinement:</span>
               <input type="date" name="estimated_due" class="box" value="<?php echo $row['estimated_due']; ?>"
               readonly>
            </div>
            <div class="inputBox">
               <span>Parity:</span>
               <input type="text" name="parity" class="box" placeholder="number of times that has given birth"
                  value="<?php echo $row['parity']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>Term:</span>
               <input type="text" name="term" class="box" value="<?php echo $row['term']; ?>" readonly>
            </div>

            <div class="inputBox">
               <span>Preterm:</span>
               <input type="text" name="pre_term" class="box" placeholder="number of times that has given early birth"
                  value="<?php echo $row['pre_term']; ?>"readonly>
            </div>
            <div class="inputBox">
               <span>Livebirth:</span>
               <input type="text" name="live_birth" class="box" placeholder="number of livebirth"
                  value="<?php echo $row['live_birth']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>Abortion:</span>
               <input type="text" name="abortion" class="box" placeholder="number of abortion"
                  value="<?php echo $row['abortion']; ?>" readonly>
            </div>
         </div>
         </div>

         <h6>PRENATAL</h6>
         <div class="flex">
            <div class="inputBox">
               <span>Menarche (Age of first menstruation):</span>
               <input type="text" name="menarche" class="box" value="<?php echo $row['menarche']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>Period Duration (in days):</span>
               <input type="text" name="period_duration" class="box" value="<?php echo $row['period_duration']; ?>"
               readonly>
            </div>
            <div class="inputBox">
               <span>Birth Control Method:</span>
               <input type="text" name="birth_control_method" class="box" value="<?php echo $row['birth_control_method']; ?>"readonly>
            </div>
            <div class="inputBox">
               <span>Menopause:</span>
               <input type="text" name="menopause" class="box" value="<?php echo $row['menopause']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>If yes, at what age:</span>
               <input type="text" name="what_age" class="box" value="<?php echo $row['what_age']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>Syphilis Result:</span>
               <input type="text" name="syphilis_result" class="box" value="<?php echo $row['syphilis_result']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>Penicillin Treatment:</span>
               <input type="text" name="penicillin_treatment" class="box" value="<?php echo $row['penicillin_treatment']; ?>"
               readonly>
            </div>
            <div class="inputBox">
               <span>Test class HIV:</span>
               <input type="text" name="test_class_hiv" class="box" value="<?php echo $row['test_class_hiv']; ?>" readonly>
            </div>
            <div class="inputBox">
               <span>Prenatal Visits:</span>
               <input type="text" name="prenatal_visits" class="box" value="<?php echo $row['prenatal_visits']; ?>" readonly>
            </div>
         </div>



         <!-- Repeat this for other form fields... -->

         <div>
            <a href="index.php" class="btn btn-danger">Back</a>
         </div>
      </form>
   </section>
   <script src="js/script.js"></script>
</body>

</html>