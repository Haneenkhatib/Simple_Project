<?php
extract($_POST);
$titleErr=$nameErr=$genderErr=$intrestsErr="";
if(isset($_POST['save'])){

    if(empty($_POST['name'])){
        $nameErr=' Enter your name';
    }
    if(empty($_POST['title'])){
        $titleErr=' Enter Title';
    }
    if(empty($_POST['gender'])){
        $genderErr=' select Gender';
    }if(empty($_POST['intr'])){
        $intrestsErr=' select Intrests';
    }

    if($genderErr||$intrestsErr||$nameErr||$titleErr){
        include 'Form.php';
    }
}else{
    include'Form.php';
}
if(isset($_POST['save'])){
    if (empty($titleErr)&&empty($nameErr)&&empty($genderErr)&&empty($intrestsErr)){
        require_once 'DBConnection.php';
        require_once 'User.php';
        $in=implode(',', $_POST['intr']);
        $user=new User($_POST['name'],$_POST['title'],$_POST['gender'],$in);
        $name=$user->getName();
        $title=$user->getTitle();
        $gender=$user->getGender();
        $intrests=$user->getIntrests();

        $sql="insert into user_s(name,title,gender,intresets) values('$name','$title'
            ,'$gender','$intrests')";
        if ($con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        require_once 'display.php';
    }
}