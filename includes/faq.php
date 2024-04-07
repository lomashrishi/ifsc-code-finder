<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFSC Code FAQs</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <!-- Custom CSS for styling -->
    <style>
        .faq-item {
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .faq-header {
            padding: 15px;
            cursor: pointer;
            background-color: #f5f5f5;
            position: relative;
        }

        .faq-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }

        .faq-content {
            padding: 15px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="accordion" id="faqAccordion">

        <div class="faq-item">
            <div class="faq-header" id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <span class="faq-question">What is an IFSC code?</span>
                <i class="fas fa-chevron-down fa-lg faq-icon"></i>
            </div>
            <div id="collapseOne" class="accordion-collapse collapse show faq-content" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <p>An IFSC (Indian Financial System Code) is a unique code that identifies a specific bank branch in the National Electronic Funds Transfer (NEFT) network.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-header" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <span class="faq-question">How long is an IFSC code?</span>
                <i class="fas fa-chevron-down fa-lg faq-icon"></i>
            </div>
            <div id="collapseTwo" class="accordion-collapse collapse faq-content" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <p>An IFSC code is typically 11 characters long, comprising both alphabets and numerals.</p>
            </div>
        </div>

        <!-- Add more FAQ items here with unique ids and targets -->

    </div>
</div>

<!-- Bootstrap JS and Popper.js scripts (for Bootstrap components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Z13xOrE/Xa5zL6I6O7ZZERB2e6F7xP3iM1hlj8l8Kk9s1q6bfa0oLlZq5L0CqY6" crossorigin="anonymous"></script>

</body>
</html>
