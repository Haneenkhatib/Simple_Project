<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <style type="text/css">
        span {
        color: red;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4 class="page-header" style="margin-top: 10px ; text-align: center">User Form</h4>
            <form style="margin-bottom: 50px" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <select name="title"  id="title" class="form-control">
                        <option>Select Title</option>
                        <option value="Mr">Mr <?php if(isset($_POST['title'])&& $_POST['title']=='Mr') echo "selected" ?></option>
                        <option value="Mrs">Mrs <?php if(isset($_POST['title'])&& $_POST['title']=='Mrs') echo "selected" ?></option>
                    </select>
                    <?php
                    if (isset($titleErr))
                        echo "<span>$titleErr</span>";
                    ?>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']?>">
                        <?php
                        if (isset($nameErr))
                            echo "<span>$nameErr</span>";
                        ?>

                </div>
                <div class="form-group">
                    <label>Gender : </label>
                    <input name="gender" type="radio" class="radio-inline" id="female" value="female"
                        <?php if(isset($_POST['gender'])&& $_POST['gender']=='female') echo "checked" ?>>
                    <label for="female"> Female </label>
                    <input name="gender"  type="radio" class="radio-inline" id="male" value="male"
                        <?php if(isset($_POST['gender'])&& $_POST['gender']=='male') echo "checked" ?>>
                    <label  for="male"> Male </label>
                    <?php
                    if(isset($genderErr)){
                        echo "<span>$genderErr</span>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Intrests : </label>
                    <label  class="checkbox-inline">
                        <input name="intr[]" type="checkbox" value="Football"  <?php if(isset($_POST['intr'])&& $_POST['intr']=='Football') echo "checked" ?>> Football
                    </label>
                    <label class="checkbox-inline">
                        <input name="intr[]" type="checkbox" value="Swimming"  <?php if(isset($_POST['intr'])&& $_POST['intr']=='Swimming') echo "checked" ?> > Swimming
                    </label>
                    <label class="checkbox-inline">
                        <input name="intr[]" type="checkbox" value="Running"  <?php if(isset($_POST['intr'])&& $_POST['intr']=='Running') echo "checked" ?>>  Running
                    </label>
                    <?php
                    if(isset($intrestsErr)){
                        echo "<span>$intrestsErr</span>";
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>