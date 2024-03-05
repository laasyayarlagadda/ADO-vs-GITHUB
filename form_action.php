<?php require_once("config.php");
if(isset($_POST['form_submit2']))
{
	$position=trim($_POST['position']);
	$fname=trim($_POST['fname']);
	$mname=trim($_POST['mname']);
	$lname=trim($_POST['lname']);
      $fathername=trim($_POST['fathername']);
	$mothername=trim($_POST['mothername']);
      $dob=trim($_POST['dob']);
	$gender=trim($_POST['gender']);
      $mobile=trim($_POST['mobile']);
      $email=trim($_POST['email']);
      $category=trim($_POST['category']);
      $nationality=trim($_POST['nationality']);
	$uid=trim($_POST['uid_no']);

            //address
      $currentadd=trim($_POST['currentadd']);
      $permanentadd=trim($_POST['permanentadd']);

      //Education
      $highboard=trim($_POST['highboard']);
      $highyear=trim($_POST['highyear']);
      $highpercent=trim($_POST['highpercent']);
      $interboard=trim($_POST['interboard']);
      $interyear=trim($_POST['interyear']);
      $interpercent=trim($_POST['interpercent']);
      $graduationboard=trim($_POST['graduationboard']);
      $graduationyear=trim($_POST['graduationyear']);
      $graduationpercent=trim($_POST['graduationpercent']);
      $postboard=trim($_POST['postboard']);
      $postyear=trim($_POST['postyear']);
      $postpercent=trim($_POST['postpercent']);
      $otherB=trim($_POST['otherB']);
      $otherY=trim($_POST['otherY']);
      $otherP=trim($_POST['otherP']);

      $file_name = $_FILES['resume']['name'];
      $file_tmp = $_FILES['resume']['tmp_name'];
      
     move_uploaded_file($file_tmp,"./cv/".$file_name);


     //experience

      $organisation1 = $_POST['organisation1'];
      $designation1 = $_POST['designation1'];
      // $salary = $_POST['Salary'];
      $from1= $_POST['from1'];
      $to1 = $_POST['to1'];
      $organisation2 = $_POST['organisation2'];
      $designation2 = $_POST['designation2'];
      // $salary = $_POST['Salary'];
      $from2= $_POST['from2'];
      $to2 = $_POST['to2'];
      $organisation3 = $_POST['organisation3'];
      $designation3 = $_POST['designation3'];
      // $salary = $_POST['Salary'];
      $from3= $_POST['from3'];
      $to3 = $_POST['to3'];

      //other Details
      $totalexp=trim($_POST['totalexp']);
	$interest=trim($_POST['interest']);
      $compknow=trim($_POST['compknow']);
      $otherinfo=trim($_POST['otherinfo']);

      $file_name1 = $_FILES['document1']['name'];
      $file_tmp1 = $_FILES['document1']['tmp_name'];
     move_uploaded_file($file_tmp1,"./additional/".$file_name1);

      $datee=trim($_POST['datee']);
	$place=trim($_POST['place']);


	
	// $pay_status='Paid'; 
	// $course_fees='6000'; 
	$reg_no='TS'.rand(99,10).time();
	$folder = "uploads/";
	//Photo 
$image_file=$_FILES['image']['name'];
 $file = $_FILES['image']['tmp_name'];
 $path = $folder . $image_file; 
 $target_file=$folder.basename($image_file);
  $file_name_array = explode(".", $image_file);
 $extension = end($file_name_array);
 $new_image_name = 'photo_'.rand() . '.' . $extension;

 //Sign 
$simage_file=$_FILES['simage']['name'];
 $sfile = $_FILES['simage']['tmp_name'];
 $spath = $folder . $simage_file; 
 $starget_file=$folder.basename($simage_file);
 $file_name_array = explode(".", $simage_file);
 $extension = end($file_name_array);
 $snew_image_name = 'sign_'.rand() . '.' . $extension;
if($file!='')
{
move_uploaded_file($file,  $folder . $new_image_name); 
}
if($sfile!='')
{
move_uploaded_file($sfile, $folder . $snew_image_name); 
}





	// $sql="INSERT into registrations(position,fname,mname,lname,fathername,mothername,gender,dob,address,category,course,email,mobile,reg_no,image,sign) VALUES(:name,:fname,:mname,:gender,:dob,:address,:category,:course,:email,:mobile,:pay_status,:course_fees,:reg_no,:image,:sign)";
	//     $stmt = $db->prepare($sql);
      $sql="INSERT into registrations(position,fname,mname,lname,fathername,mothername,dob,gender,mobile,email,category,nationality, `uid`, `image`, `sign`, `current add`, `permanentadd`, `highboard`, `highyear`, `highpercent`, `interboard`, `interyear`, `interpercent`, `graduationboard`, `graduationyear`, `graduationpercent`, `postboard`, `postyear`, `postpercent`, `otherB`, `otherY`, `otherP`, `cv`, `organisation1`, `designation1`, `from1`, `to1`, `organisation2`, `designation2`, `from2`, `to2`, `organisation3`, `designation3`, `from3`, `to3`, `totalexp`, `interest`, `compknow`, `additionalinfo`, `additionaldoc`, `date`, `place`) VALUES (:position,:fname,:lname,:mname,:fathername,:mothername,:dob,:gender,:mobile,:email,:category,:nationality,:uid_no,:image,:sign,:currentadd,:permanentadd,:highboard,:highyear,:highpercent,:interboard,:interyear,:interpercent,:graduationboard,:graduationyear,:graduationpercent,:postboard,:postyear,:postpercent,:otherB,:otherY,otherP,:cv,:organisation1,:designation1,:from1,:to1,:organisation2,:designation2,:from2,:to2,:organisation3,:designation3,:from3,:to3,:totalexp,:interest,:compknow,:otherinfo,:document1,:datee,:place)";
            $stmt = $db->prepare($sql);
      
      $stmt->bindParam(':position', $position, PDO::PARAM_STR);
      $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
      $stmt->bindParam(':mname', $mname, PDO::PARAM_STR);
      $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
      $stmt->bindParam(':fathername', $fathername, PDO::PARAM_STR);
      $stmt->bindParam(':mothername', $mothername, PDO::PARAM_STR);
      $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
      $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
      $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);
      $stmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);
      $stmt->bindParam(':uid_no', $uid, PDO::PARAM_STR);
      $stmt->bindParam(':reg_no', $reg_no, PDO::PARAM_STR);
      $stmt->bindParam(':image', $new_image_name, PDO::PARAM_STR);
      $stmt->bindParam(':sign', $snew_image_name, PDO::PARAM_STR);

      $stmt->bindParam(':currentadd', $currentadd, PDO::PARAM_STR);
      $stmt->bindParam(':permanentadd', $permanent, PDO::PARAM_STR);
      $stmt->bindParam(':highboard', $highboard, PDO::PARAM_STR);
      $stmt->bindParam(':highyear', $highyear, PDO::PARAM_STR);
      $stmt->bindParam(':highpercent', $highpercent, PDO::PARAM_STR);
      $stmt->bindParam(':interboard', $interboard, PDO::PARAM_STR);
      $stmt->bindParam(':interyear', $interyear, PDO::PARAM_STR);
      $stmt->bindParam(':interpercent', $interpercent, PDO::PARAM_STR);
      $stmt->bindParam(':graduationboard', $graduationboard, PDO::PARAM_STR);
      $stmt->bindParam(':graduationyear', $graduationyear, PDO::PARAM_STR);
      $stmt->bindParam(':graduationpercent', $graduationpercent, PDO::PARAM_STR);
      $stmt->bindParam(':postboard', $postboard, PDO::PARAM_STR);
      $stmt->bindParam(':postyear', $postyear, PDO::PARAM_STR);
      $stmt->bindParam(':postpercent', $postpercent, PDO::PARAM_STR);
      $stmt->bindParam(':otherB', $otherB, PDO::PARAM_STR);
      $stmt->bindParam(':otherY', $otherY, PDO::PARAM_STR);
      $stmt->bindParam(':otherP', $otherP, PDO::PARAM_STR);
      $stmt->bindParam(':resume', $file_name, PDO::PARAM_STR);

      $stmt->bindParam(':organisation1', $organisation1, PDO::PARAM_STR);
      $stmt->bindParam(':designation1', $designation1, PDO::PARAM_STR);
      $stmt->bindParam(':from1', $from1, PDO::PARAM_STR);
      $stmt->bindParam(':to1', $to1, PDO::PARAM_STR);
      $stmt->bindParam(':organisation2', $organisation2, PDO::PARAM_STR);
      $stmt->bindParam(':designation2', $designation2, PDO::PARAM_STR);
      $stmt->bindParam(':from2', $from2, PDO::PARAM_STR);
      $stmt->bindParam(':to2', $to2, PDO::PARAM_STR);
      $stmt->bindParam(':organisation3', $organisation3, PDO::PARAM_STR);
      $stmt->bindParam(':designation3', $designation3, PDO::PARAM_STR);
      $stmt->bindParam(':from3', $from3, PDO::PARAM_STR);
      $stmt->bindParam(':to3', $to3, PDO::PARAM_STR);
      $stmt->bindParam(':totalexp', $totalexp, PDO::PARAM_STR);
      $stmt->bindParam(':interest', $interest, PDO::PARAM_STR);
      $stmt->bindParam(':compknow', $compknow, PDO::PARAM_STR);
      $stmt->bindParam(':otherinfo', $otherinfo, PDO::PARAM_STR);
      $stmt->bindParam(':document1', $file_name1, PDO::PARAM_STR);
      $stmt->bindParam(':datee', $datee, PDO::PARAM_STR);
      $stmt->bindParam(':place', $place, PDO::PARAM_STR);

//       $stmt->execute();
//       $last_id = $db->lastInsertId();
//       if($last_id!='')
//       {
//     header("location:preview.php?id=".$reg_no);
//       }
//       else 
//       {
//       	echo 'Something went wrong';
//       }
$stmt = mysqli_query($db, $sql);
    
if($stmt){
    ?><div class="alert alert-success" role="alert">
      <strong>Your have successfully stored the data!!!</strong>
    </div>
    
    <?php
}
else{
    ?>
    <div class="alert alert-danger" role="alert">
      <strong>Failed!!!</strong>
    </div>
    <?php
}
}
?> 