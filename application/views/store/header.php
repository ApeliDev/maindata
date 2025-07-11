<?php



$wallet_id = $this->session->userdata('wallet_id');

$session_id = $this->session->userdata('session_id');

$phone_session = $this->session->userdata('phone');

$agent = $this->session->userdata('agent');
// $checkout_token = $this->session->userdata('checkout_token');


if(!$wallet_id || !$session_id|| !$phone_session)

{

    redirect('logout');

}
// if(!empty($checkout_token))
// {
//     redirect('payment_form');
// }

?>

<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <meta name="generator" content="">

    <title>STEPAKASH</title>



    <!-- manifest meta -->

    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="manifest" href="<?php echo base_url() ?>manifest.json" />


    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css"> -->

    <!-- Favicons -->


    <!-- <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/favicon180.png" sizes="180x180">

    <link rel="icon" href="<?php echo base_url() ?>assets/img/favicon32.png" sizes="32x32" type="image/png">

    <link rel="icon" href="<?php echo base_url() ?>assets/img/favicon16.png" sizes="16x16" type="image/png"> -->

    <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/img/stepak_180.png" sizes="180x180">

<link rel="icon" href="<?php echo base_url() ?>assets/img/stepak_32.png" sizes="32x32" type="image/png">

<link rel="icon" href="<?php echo base_url() ?>assets/img/stepak_16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


      <!-- Include html2canvas library -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <!-- Include jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


    <!-- swiper carousel css -->

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css">

    <!-- style css for this template -->

    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" id="style">



    <style>

    

        #whatsapp-icon {

    position: fixed;

    bottom: 70px;

    right: 70px;

    z-index: 1000; /* Make sure it's above other elements on the page */

    }

    

    #whatsapp-icon {

        width: 200px; /* Adjust the size as needed */

        height: 200px;

        border-radius: 50%;

        font-size: 24px;

    }

    

        .scrollable-list {

            max-height: 300px; /* Adjust the maximum height as needed */

            overflow-y: auto;

        }



/* Modal styling */

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Translucent background */
    z-index: 999;
}

.modal-dialog {
    position: absolute;
    max-width: 500px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0 auto;
}



.modal-content {
    border: none;
    height: 100%;
    margin: 5px; /* Adjust margin size as needed */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
}





/* Close button (X) styling */

.close {

    float: right;

    cursor: pointer;

    font-size: 24px;

    margin: -10px -10px 0 0;

}



/* Style for the deposit button */

#depositButton,#withdrawDerivBut,#depositMpesaBot,#withdrawMpesaBot {

    cursor: pointer;

}



.form-control {

    border-radius: 50px; /* Makes the inputs rounded */

    padding: 10px; /* Adds padding for spacing */

}



.btn-sm {

    padding: 10px 20px; /* Adjust button padding to make it smaller */

}

/* Add margins for spacing */

.mb-3 {

    margin-bottom: 1rem; /* Adjust as needed */

}

.text-center {

    text-align: center;

}

    </style>


<style>
    
    /* styles.css */
    .receipt {
    max-width: 500px;
    margin: 0 auto; /* Center horizontally */
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    box-sizing: border-box;
    margin-bottom: 10px; /* Reduce margin from bottom */
    position: relative; /* Positioning context for footer image */
}

.receipt-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.receipt-header img {
    height: 30px;
    width: auto;
}

.receipt-header h3 {
    margin: 0;
    font-size: 14px;
    color: #333;
}

.receipt-header p {
    margin: 5px 0;
    font-size: 18px;
    color: #666;
}

.receipt-body {
    margin-bottom: 20px;
}

.receipt-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.receipt-col {
    flex: 0 0 48%;
}

.receipt-item {
    margin-bottom: 10px;
}

.receipt-item label {
    font-weight: bold;
    color: #333;
    display: block;
    margin-bottom: 5px;
}

.receipt-item span {
    color: #666;
}

.receipt-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #666;
    font-size: 12px;
    position: relative; /* Ensure proper positioning for footer image */
}

.receipt-footer button {
    padding: 5px;
    border: none;
    background-color: transparent;
    cursor: pointer;
}

.receipt-footer button i {
    font-size: 24px;
}

.footer-image {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: auto;
}


    /* Example CSS to style the icon */

/* CSS for the verification badge */
.verification-badge {
    display: inline-block;
    width: 30px; /* Adjust size as needed */
    height: 30px; /* Adjust size as needed */
    border-radius: 50%; /* Round shape */
    background-color: #4CAF50; /* Greenish color */
    position: relative;
    overflow: hidden;
    color: #fff; /* Tick color */
    font-size: 20px; /* Adjust font size */
    font-weight: bold; /* Ensure the tick is bold */
    line-height: 30px; /* Center the tick vertically */
    text-align: center; /* Center the tick horizontally */
}

/* Pseudo-elements to create the zigzag pattern */
.verification-badge::before, .verification-badge::after {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 0 3px 3px;
    border-color: transparent transparent #fff transparent;
}

.verification-badge::before {
    top: 0;
    left: 0;
    transform: rotate(45deg);
}

.verification-badge::after {
    bottom: 0;
    right: 0;
    transform: rotate(-135deg);
}

/* CSS for the verification text */
.verification-text {
    display: block;
    color: #4CAF50; /* Greenish color */
    font-size: 14px; /* Adjust font size */
    text-align: center; /* Center the text */
}



    
        </style>

</head>



<body class="body-scroll" data-page="index">



    <!-- loader section -->

    <div class="container-fluid loader-wrap">

        <div class="row h-100">

            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">

                <div class="logo-wallet">

                    <div class="wallet-bottom">

                    </div>

                    <div class="wallet-cards"></div>

                    <div class="wallet-top">

                    </div>

                </div>

                <p class="mt-4"><span class="text-secondary">STEPAKASH</span><br><strong>Please

                        wait...</strong></p>

            </div>

        </div>

    </div>

    <!-- loader section ends -->



    <!-- Sidebar main menu -->

    <div class="sidebar-wrap  sidebar-overlay">

        <!-- Add pushcontent or fullmenu instead overlay -->

        <div class="closemenu text-muted">Close Menu</div>

        <div class="sidebar ">

            <!-- user information -->

            <div class="row my-3">

                <div class="col-12 profile-sidebar">

                    <div class="clearfix"></div>

                    <div class="circle small one"></div>

                    <div class="circle small two"></div>

                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"

                        viewBox="0 0 194.287 141.794" class="menubg">

                        <defs>

                            <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"

                                gradientUnits="objectBoundingBox">

                                <stop offset="0" stop-color="#09b2fd" />

                                <stop offset="1" stop-color="#6b00e5" />

                            </linearGradient>

                        </defs>

                        <path id="menubg"

                            d="M672.935,207.064c-19.639,1.079-25.462-3.121-41.258,10.881s-24.433,41.037-49.5,34.15-14.406-16.743-50.307-29.667-32.464-19.812-16.308-41.711S500.472,130.777,531.872,117s63.631,21.369,93.913,15.363,37.084-25.959,56.686-19.794,4.27,32.859,6.213,44.729,9.5,16.186,9.5,26.113S692.573,205.985,672.935,207.064Z"

                            transform="translate(-503.892 -111.404)" fill="url(#linear-gradient)" />

                    </svg>



                    <div class="row mt-3">

                        <div class="col-auto">

                          

                        </div>

                        <div class="col px-0 align-self-center">

                            <h5 class="mb-2">Wallet ID <?php echo  $this->session->userdata('wallet_id'); ?></h5>

                            <p class="text-muted size-12"><?php echo  $this->session->userdata('phone'); ?></p>

                        </div>

                    </div>

                </div>

            </div>



            <?php



             // Get the URI segments

        $segments = $this->uri->rsegment_array();



        // Get the last segment

        $lastSegment = end($segments);

            ?>



            <!-- user emnu navigation -->

            <div class="row">

                <div class="col-12">

                    <ul class="nav nav-pills">



                        <li class="nav-item">

                            <a class="nav-link <?php if($lastSegment == 'home') {echo 'active'; }?> " aria-current="page" href="<?php echo base_url() ?>home">

                                <div class="avatar avatar-40 icon"><i class="fa fa-home"></i></div>

                                <div class="col">Home</div>

                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>

                            </a>

                        </li>

                        

                        <li class="nav-item">

                            <a class="nav-link <?php if($lastSegment == 'transactions') {echo 'active'; }?>" 

                            aria-current="page" href="<?php echo base_url() ?>transactions">

                                <div class="avatar avatar-40 icon"><i class="fa fa-exchange"></i></div>

                                <div class="col">Transactions</div>

                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>

                            </a>

                        </li>



                       

                        <li class="nav-item">

                            <a class="nav-link <?php if($lastSegment == 'changepassword') {echo 'active'; }?>" 

                            aria-current="page" href="<?php echo base_url() ?>changepassword">

                                <div class="avatar avatar-40 icon"><i class="fa fa-key"></i></div>

                                <div class="col">Change Password</div>

                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>

                            </a>

                        </li>

                        

                        <li class="nav-item">

                            <a class="nav-link" 

                            aria-current="page" href="https://chat.whatsapp.com/JNOIFWboogv3TP7LynhE9e">

                                <div class="avatar avatar-40 icon"><i class="fab fa-whatsapp"></i></div>

                                <div class="col">Whatsapp Support</div>

                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>

                            </a>

                        </li>

                        <?php

                        if($agent != 1)
                        {  ?>
                        <li class="nav-item">

                            <a class="nav-link" 

                            aria-current="page" href="<?php echo base_url() ?>agency">

                                <div class="avatar avatar-40 icon"><i class="fa fa-user"></i></div>

                                <div class="col">Be an Agent & Earn</div>

                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>

                            </a>

                        </li>
                       <?php } ?>


                         
                        <li class="nav-item">

                            <a class="nav-link" href="<?php echo base_url() ?>logout" tabindex="-1">

                                <div class="avatar avatar-40 icon"><i class="fa fa-lock"></i></div>

                                <div class="col">Logout</div>

                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!-- Sidebar main menu ends -->





    <!-- Begin page -->

    <main class="h-100">



       <!-- Header -->



        <!-- Header -->

        <header class="header position-fixed">

            <div class="row">

                <div class="col-auto">

                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">

                        <i class="fa fa-list"></i>

                    </a>

                </div>

                <div class="col text-center">

                    <div class="logo-medium">

                        <img src="<?php echo base_url() ?>assets/img/stepak.png" width="130" alt="" />

                        <h5><span class="text-secondary fw-light"></span><br /></h5>

                    </div>

                </div>


                <div class="col-auto">

                <?php if ($agent == 1) : ?>
                    <span class="verification-badge">&#10003;</span>
                <?php endif; ?>
                </div>

                <div class="col-auto">

                    <a href="<?php echo base_url() ?>logout" target="_self" class="btn btn-light btn-44">

                        <i class="fa fa-lock"></i>

                        <span class=""></span>

                    </a>

                </div>

            </div>

        </header>