<?php
include("../connection/connection.php");

// for insert
if(isset($_POST['InsertRecord'])){
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Paswword = $_POST['Password'];
$Departments = $_POST['Department'];
$ImageName = $_FILES['Image']['name'];
$ImageTmpObj = $_FILES['Image']['tmp_name'];
$Extension= pathinfo($ImageName,PATHINFO_EXTENSION);
$FilePath="../images/".$ImageName;
if($Extension=="jpg" || $Extension =="png" || $Extension =="jpeg" || $Extension =="webp"){
    if(move_uploaded_file($ImageTmpObj,$FilePath)){
        $query = $pdo ->prepare("insert into details(Name,Email,Password,Did,Image) values(:nm,:ne,:np,:nd,:ni)");
        $query->bindParam("nm",$Name);
        $query->bindParam("ne",$Email);
        $query->bindParam("np",$Paswword);
        $query->bindParam("nd",$Departments);
        $query->bindParam("ni",$ImageName);
        $query->execute();
        echo "<script>alert('record enter successfully')</script>";
       

    }
}
}
// update 
if(isset($_POST['UpdateRecord'])){
    $id = $_POST['Sid'];
    $Name = $_POST['Name'];
$Email = $_POST['Email'];
$Paswword = $_POST['Password'];
$Departments = $_POST['Department'];
if(!empty($_FILES['Image']['name'])){
    $ImageName = $_FILES['Image']['name'];
$ImageTmpObj = $_FILES['Image']['tmp_name'];
$Extension= pathinfo($ImageName,PATHINFO_EXTENSION);
$FilePath="../images/".$ImageName;
if($Extension=="jpg" || $Extension =="png" || $Extension =="jpeg" || $Extension =="webp"){
    if(move_uploaded_file($ImageTmpObj,$FilePath)){
        $query = $pdo ->prepare("update details set Name=:nm,Email=:ne,Password=:np,Did=:nd,Image=:ni where Id =:pid");
        $query->bindParam("pid",$id);
        $query->bindParam("nm",$Name);
        $query->bindParam("ne",$Email);
        $query->bindParam("np",$Paswword);
        $query->bindParam("nd",$Departments);
        $query->bindParam("ni",$ImageName);
        $query->execute();
        echo "<script>alert('record Update successfully');
        location.assign('details.php');
        </script>";
       

    }
}
}else{

    $query = $pdo ->prepare("update details set Name=:nm,Email=:ne,Password=:np,Did=:nd where Id =:pid");
    $query->bindParam("pid",$id);
    $query->bindParam("nm",$Name);
    $query->bindParam("ne",$Email);
    $query->bindParam("np",$Paswword);
    $query->bindParam("nd",$Departments);
    $query->execute();
    echo "<script>alert('record Update successfully');
    location.assign('details.php');
    </script>";

}
}
?>