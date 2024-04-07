<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="IFSC Code Finder - Your Trusted Source for Indian Bank Codes Find Indian Financial System Codes (IFSC) for banks across India with ease. Our IFSC Code Finder simplifies online transactions and banking operations">
  <meta name="keywords" content="IFSC CODE,BANK,IFSC,FINDER">
  <meta name="author" content="LOMASH- RISHI ">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
    <title>Contact-Us || IFSC-Code-Finder</title>
</head>
<body>
<?php
include("../includes/header.php");
?>



<div class="cform text-center bg-info">

<form id="myForm" action="message.php" method="post">
        <label for="name"><b>Name:</b></label><br>
        <input type="text" id="name" name="name" required placeholder="Enter Your Full Name" ><br><br>

        <label for="email"><b>Email ID:</b></label><br>
        <input type="email" id="email" name="email" required placeholder="Enter Your Email-ID" ><br><br>

        <label for="message"><b>Message:</b></label><br>
        <textarea id="message" name="message" rows="5" required  placeholder="Enter Your Query...." ></textarea><br><br>

        <button type="submit" name ="submit" class="btn btn-success"><b>Send</b></button>

    </form>
 </div>

<?php
include("../includes/footer.php");
?>    
</body>
</html>