<html>
<body>
<?php
session_start();
      if($_SESSION['Status']=='student')
{
    header("Location: index.php");
}
//Establish Connection to DB
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentportal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 if($_POST)
{$Atitle=$_POST['Atitle'];
 $Abody=$_POST['Abody'];
 $Adate=$_POST['Adate'];
 $Atime=$_POST['Atime'];
 
     
    $sql = "INSERT INTO student_announcement (Aid,Atitle,Abody,Adate,Atime,Auser,Astatus)
 VALUES(NULL,'$Atitle','$Abody','$Adate', '$Atime', '".$_SESSION['Fname']."','a')";

    if ($conn->query($sql) === TRUE) 
        {
        
	header("location:admin.php");
        } 
    else {
        echo "Error updating record: " . $conn->error;
        }    

}
$conn->close();
?>


    <div class="w3-container">
  <form action="adminadd.php" method="post">
<button onclick="myFunction()" class="w3-button " style="padding-top:5px;float:right;"><b><i class="fa fa-close fa-2x"></i></b></button>
<input type="hidden" name="Aid">
    <div class="form-group" style="padding-top:30px;font-size:24px">
      <label for="Heading">Title Heading :</label>
      <input type="text" class="form-control" style="font-size:24px" id="posthead" name="Atitle" >
    </div>
<div class="form-group " style="font-size:18px" >
      <label for="Description">Post Details:</label>
      
<?php
    echo"$_SESSION[uname]";
date_default_timezone_set("Asia/Kuala_Lumpur");
 $date = date('Y-m-d');
 $time = date('h:ia');
echo '<input type="text" class="form-control" style="font-size:18px" id="postdes"  value="'.$date.' '.$time.'" readonly>';
echo '<input type="hidden" class="form-control" style="font-size:18px" id="postdes"  name="Adate" value="'.$date.'" >';
    echo '<input type="hidden" class="form-control" style="font-size:18px" id="postdes"  name="Atime" value="'.$time.'" >';

?>

    </div>
 <div class="form-group " >
      <label for="Content">Content:</label>
      <textarea name="Abody" rows="15" cols="30" class="form-control" id="content" style="font-size:20px" maxlength="1000" ></textarea>
    </div>
<br>
   <div class="form-group"><button  onclick="return clicked()" class="w3-button w3-padding-large w3-white w3-border "><b>DONE »</b></button> </div>
        
</form>
</div>
<script>
function clicked() {
    return confirm('Are you sure to Save?');
}
</script>


</body>
</html>
