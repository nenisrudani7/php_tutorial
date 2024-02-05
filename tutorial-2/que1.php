<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      /* height: 100vh; */
      margin: 0;
      background-color: #f4f4f4;
    }

    .container {
      text-align: center;
      margin-bottom: 20px;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    span {
      font-size: 14px;
      color: red;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style> -->

</head>

<body>
  <div class="container"></div>
  <form action="que1.php" method="POST">
    Enter the name:
    <input type="text" name="nm1" id="nm"><br>
    <span id="nm_err"></span><br>

    Enter the Mobile No:
    <input type="text" name="mo1" id="mo"><br>
    <span id="mo_err"></span><br>

    Enter the Email:
    <input type="text" name="em1" id="em"><br>
    <span id="em_err"></span><br>

    Enter the Password:
    <input type="text" name="pw1" id="pw"><br>
    <span id="pw_err"></span><br>

    Confirm Password:
    <input type="text" name="cpw1" id="cpw"><br>
    <span id="cpw_err"></span><br>

    Gender:
    <input type="radio" name="gender" value="Male">Male <input type="radio" name="gender" value="Female">Female
    <br>
    <span id="cpw_err"></span><br>

    Hoobby:
    <input type="checkbox" name="hob[]" value="cricket">Cricket<input type="checkbox" name="hob[]" value="football">football<input type="checkbox" name="hob[]" value="doudgeball">doudgeball
    <br>
    <span id="cpw_err"></span><br>

    <input type="submit" value="submit" name="submit">
  </form>
  </div>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['nm1'];
  $mo_num = $_POST['mo1'];
  $email = $_POST['em1'];
  $password = $_POST['pw1'];

  echo "name :{$name} <br>";
  echo "mobile number: :{$mo_num} <br>";
  echo "email :{$email} <br>";
  echo "password :{$password} <br>";
  if(isset($_POST['hob'])){
    $hobbies = $_POST['hob'];
    foreach($hobbies as $i){
      echo "Hobby: {$i} <br>";
    }
  }

  if(isset($_POST['gender'])){
    $gender = $_POST['gender'];
    echo "Gender :{$gender} <br>";
  }
}
?>
