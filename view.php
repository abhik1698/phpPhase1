<html>
   <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <title>Quotation</title>
   </head>
   <body>
      <center>
         <h1>Welcome to PHOmeTO</h1>
      </center>
      <form method="post" action="" enctype="multipart/form-data">
         <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "phometo";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            $email = $_GET['req_email'];
            
            $sql = "SELECT name, email, gender, dp FROM profile where email= '$email'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()){
                    $name = $row["name"];
                    $email = $row["email"];
                    $gender =  $row["gender"];
                    $dp = $row['dp'];
                }                
            }
            else {
                echo "0 results";
            }
            $conn->close();
            ?>
         <div class="container" style="padding:15px;">
            <center>
               <!--<img class="img-circle" src="" alt="Upload Image oninput="document.getElementById('dp').src = document.getElementById('dp_upload').src;""/>-->
               <img class="img-circle" id="dp" src="<?php echo $dp;?>" style="width:200px;height:200px;border:0;" />
               <div style="padding:15px;">
                  <h2 ><?php echo $name; ?></h2>
                  <h2 ><?php echo $email; ?></h2>
                  <h2 ><?php echo $gender; ?></h2>
               </div>
               <button>Edit Profile</button>
            </center>
         </div>
      </form>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </body>
</html>