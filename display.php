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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
      <h2 class="page-header" style="margin-top: 10px ; text-align: center">Users Information</h2>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Title</th>
            <th>Gender</th>
            <th>Intrests</th>
              <th>Options</th>
          </tr>
        </thead>
        <tbody>
        <?php
        require_once 'DBConnection.php';

        $sql = "SELECT * FROM user_s";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //var_dump($row);
           $userid= $row['id'];
        echo"
        <tr id='row$userid' >
            <td id='id_val$userid'>".$userid."</td>
            <td id='name_val$userid'>".$row['name']."</td>
            <td id='title_val$userid'>".$row['title']."</td>
            <td id='gender_val$userid'>".$row['gender']."</td>
            <td id='intresets_val$userid'>".$row['intresets']."</td>
             <td id='col$userid'>
             
             <button type='button' class='btn-danger' id='edit_button$userid' name='delete'onclick='deleteRow(".$userid.")'>Delete</button>
             <button type='button' class='btn-primary' id='save_button$userid' name='edit'id='edit_button$userid' onclick='editRow(".$userid.")'>Edit</button></td>
        </tr>
        ";

        }
        }
        ?>
        </tbody>
      </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>

        function deleteRow(id) {
            if(confirm("Are you sure you want to delete this Record?")){
                $.ajax
                ({
                    type:'post',
                    url:"delete.php",
                    data:{
                        delete_row:'delete_row',
                        row_id:id
                    },
                    success:function(data) {
                        $("#row" + id).remove();

                    }
                });
            }
        }
        function editRow(id)
        {
            console.log(id)
            var name=document.getElementById("name_val"+id).innerHTML;
            var title=document.getElementById("title_val"+id).innerHTML;
            var gender=document.getElementById("gender_val"+id).innerHTML;
            var intresets=document.getElementById("intresets_val"+id).innerHTML;

            document.getElementById("name_val"+id).innerHTML="<input type='text' id='name_text"+id+"' value='"+name+"'>";
            document.getElementById("title_val"+id).innerHTML="<input type='text' id='title_text"+id+"' value='"+title+"'>";
            document.getElementById("gender_val"+id).innerHTML="<input type='text' id='gender_text"+id+"' value='"+gender+"'>";
            document.getElementById("intresets_val"+id).innerHTML="<input type='text' id='intresets_text"+id+"' value='"+intresets+"'>";

            // document.getElementById("edit_button"+id).style.display="none";
            console.log(id);

        document.getElementById("col"+id).innerHTML="<input type='button' class='btn-primary' id='save_button'value='save'onclick='save_row("+id+")' >";
        }

        function save_row(id)
        {
            // console.log(id);
            // console.log($("#name_text"+id).val());
            var name=document.getElementById("name_text"+id).value;
            var title=document.getElementById("title_text"+id).value;
            var gender=document.getElementById("gender_text"+id).value;
            var intresets=document.getElementById("intresets_text"+id).value;
            console.log(title);
            console.log(intresets);
            console.log(gender);
            console.log(name);
           $.ajax
            ({
                type:'post',
                url:'edit.php',
                // dataType: "json",
                data:{
                    edit_row:'edit_row',
                    row_id:id,
                    name_val:name,
                    title_val:title,
                    gender_val:gender,
                    intresets_val:intresets
                },
                success:function(response) {
                    // console.log(response);
                    // if(response=='success')
                    // {
                    //     document.getElementById("name_val"+id).innerHTML=name;
                        document.getElementById("title_val"+id).innerHTML=title;
                        document.getElementById("gender_val"+id).innerHTML=gender;
                        document.getElementById("intresets_val"+id).innerHTML=intresets;

                        document.getElementById("edit_button"+id).style.display="block";
                        document.getElementById("save_button"+id).style.display="block";
                        document.getElementById("save_button"+id).style.display="none";
                     // }
                }
            });
        }



    </script>
</body>

</html>