<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="description" content="IFSC Code Finder - Your Trusted Source for Indian Bank Codes Find Indian Financial System Codes (IFSC) for banks across India with ease. Our IFSC Code Finder simplifies online transactions and banking operations">
  <meta name="keywords" content="IFSC CODE,BANK,IFSC,FINDER">
  <meta name="author" content="LOMASH- RISHI ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="../css/style.css">

  
    <!-- css link -->

    <title> [IFSC-Code-Finder] Indian Financial System Code </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<!-- Google Ads -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2890376583994166"
     crossorigin="anonymous"></script>

</head>
<body class="">
<?php
include("includes/header.php"); ?>

<div class="container pb-3 rounded mt-3 bg-light">
    <hr>
<div class="container-fluid mt-2 bg-warning border border-dark rounded">
        <form class="row justify-content-center" method="post" action="index.php" id="theForm">
            <div class="container m-3">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Ifsc Code For More Information..." name='ifsc'>
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="formSubmit" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <b>Search</b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </form>
    </div>
<hr/>
  <!-- Search Results-->
<div class=" alert alert-primary text-center text-lg-start" >
<?php
if(isset($_POST['ifsc'])) 
{
	$ifsc = $_POST['ifsc'];
	$json = @file_get_contents(
		"https://ifsc.razorpay.com/".$ifsc);
	$arr = json_decode($json);

	if(isset($arr->BRANCH))
{
        $ifsc = $_POST['ifsc'];
		
		echo '<div class=" result text-center bg-white text-dark border border-dark rounded">';

        echo "<H6><u><b>IFSC Number Checking Result-> <i>$ifsc</i> </b></u></H6>";

		echo "<b>Bank NAME:- </b>".$arr->BANK;
		echo "<br/>";
		echo "<b>Branch NAME:- </b>".$arr->BRANCH;
		echo "<br/>";
		echo "<b>Centre NAME:- </b>".$arr->CENTRE;
		echo "<br/>";
		echo "<b>District NAME:- </b>".$arr->DISTRICT;
		echo "<br/>";
		echo "<b>State NAME:- </b>".$arr->STATE;
		echo "<br/>";
		echo "<b/>Address:- </b>".$arr->ADDRESS;
		echo "<br/>";

		echo '</div>';
	}

	else {
		echo '<div class="alert alert-danger text-center">';
		echo "Invalid IFSC Code Please Enter Valid IFSC Code...";
		echo '</div>';
	}
}	

?>

</div>
<img src="img/topban.jpeg" alt="BannerImg" class="img-fluid border border-dark rounded" >









<h1 class="page-title text-center c-section__headline mb-4" itemprop="headline">
                    India IFSC Code Search & Finder Tools</h1>
<div class=" alert text-center text-lg-center border border-dark rounded " >
<?php include("includes/ifsc_search.php"); ?>
</div>

<h1 class="page-title text-center c-section__headline mb-4" itemprop="headline"> Bank IFSC Code FAQs</h1>
<?php include("includes/faq.php"); ?>

<!-- Slider images -->
<div class="mt-3">
<?php include("includes/slider.php"); ?>
</div>
<!-- close main contaoner div close  -->
</div>



<?php include("includes/footer.php"); ?>
</body>
</html>