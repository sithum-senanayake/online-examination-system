<?php

include('php/config.php');

session_start();

if(!isset($_SESSION['user_email'])){
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css file link-->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/exam_information.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <title>Home</title>

</head>
<body>

    <!--Navigation Content-->
    <nav>
        <div class="nav-bar">
            <img src="images/logo.png" class="logo">
            
            <ul>
                <li><a href="index.php" style="color: orange;">Home</a></li>
                <li><a href="exam_registration.php">Registration</a></li>
                <li><a href="exam_results.php">Results</a></li>
                <li><a href="exam_information.php">Information</a></li>
                <li><a href="attempt_exam.php">Attempt Exam</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>

            <!--displaying user email and directing to user profile-->
            <?php

            $logOut = "<a href='logout.php' class='logout'>Log Out</a>";

            if(isset($_SESSION['account']) && $_SESSION['account'] == "employee"){

                echo('  <p>
                        <a href="employee_profile.php" class="user-display">
                                '.$_SESSION['user_email'].'
                        </a> </p>');
                echo($logOut);

            }elseif(isset($_SESSION['account']) && $_SESSION['account'] == "exam_admin"){
                
                echo('  <p>
                        <a href="exam_admin_profile.php" class="user-display">
                                '.$_SESSION['user_email'].'
                        </a> </p>');
                echo($logOut);

            }elseif(isset($_SESSION['account']) && $_SESSION['account'] == "admin"){
                
                echo('  <p>
                        <a href="admin_profile.php" class="user-display" style="text-transform: uppercase;">
                        Admin Profile</a> </p>');
                echo($logOut);
            }

            ?>
            
        </div>

    </nav>

<!--Index Content-->
    <div class = "banner-index">
        <div class="content">
            <h1>Welcome to Spark Enterpise</h1>
            <p>Online Examination System for Employees</p>
        </div>
    </div>

    <!-- Welcome Section Content -->
    <section class="section">
      <p>
        <center><h1 class="heading">Welcome!</h1></center>
        <br><br>
        Upgrade your skills, stay ahead of the curve, and unlock new opportunities with our user-friendly Online Examination System. Our platform offers a wide range of exams tailored specifically for employees like you.
        <br><br>
        With easy access and a convenient interface, you can take exams anytime, anywhere, using any device with an internet connection. Choose from a variety of exams covering different topics and disciplines to suit your professional goals.
        <br><br>
        Our secure platform ensures the confidentiality of your personal information and exam results. We also employ anti-cheating mechanisms to maintain fairness and credibility.
        <br><br>
        Get instant results and detailed feedback to understand your strengths and areas for improvement. Use this feedback to create a personalized learning plan and drive your professional development.
        <br><br>
        Join us today and take the first step towards enhancing your skills and advancing your career. Start exploring our exams now and empower yourself with knowledge!          
        <br><br>
      </p>
    </section>

    <!-- Exam Information Content -->
    <div class="available-exams">

    <h1 class="heading">Exam Informations</h1>

    <div class="box-container">

    <div class="box">
        <center><img src="images/BA_img.jpg" alt=""></center>
        <h3>Bussiness Analyst</h3>
        <p>A business analyst plays a crucial role in identifying and analyzing business needs, facilitating effective communication between stakeholders, and developing solutions to enhance organizational processes.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Business_analyst">More Information</a>
    </div>

    <div class="box">
        <center><img src="images/Payment_img.jpg" alt=""></center>
        <h3>Payment Management</h3>
        <p>Payment management involves overseeing and optimizing the payment processes within an organization, ensuring timely and secure transactions, and implementing strategies to minimize financial risks.</p>
        <br><a class="btn" href="https://oboloo.com/blog/what-is-payment-management-definition/">More Information</a>
    </div>

    <div class="box">
        <center><img src="images/PM_img.jpg" alt=""></center>
        <h3>Project Management</h3>
        <p>Project management encompasses planning, organizing, and coordinating resources to successfully complete a project within defined scope, timeline, and budget, while managing risks and ensuring stakeholder satisfaction.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Project_management">More Information</a>
    </div>

    <div class="box">
        <center><img src="images/IELTS.jpg" alt=""></center>
        <h3>IELTS</h3>
        <p>IELTS (International English Language Testing System) is a globally recognized English proficiency test that assesses the language skills of individuals who aim to study, work, or migrate to English-speaking countries.</p>
        <br><a class="btn" href="https://www.ielts.org/about-ielts/what-is-ielts">More Information</a>
    </div>

    <div class="box">
        <center><img src="images/Accounting.jpg" alt=""></center>
        <h3>Accounting</h3>
        <p>Accounting involves recording, analyzing, and interpreting financial information to support decision-making and provide insights into the financial health and performance of an organization.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Accounting">More Information</a>
    </div>

    <div class="box">
        <center><img src="images/HR_Manager.webp" alt=""></center>
        <h3>HR Management</h3>
        <p>HR management focuses on effectively managing human resources within an organization, including tasks such as recruitment, performance management, employee relations, and fostering a positive work culture.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Human_resource_management">More Information</a>
    </div>

    <div class="box">
        <center><img src="images/Finance.webp" alt=""></center>
        <h3>Finance Management</h3>
        <p>Finance management involves making informed financial decisions, managing investments, analyzing financial data, and ensuring the efficient utilization of funds to achieve the organization's financial goals and maximize shareholder value.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Financial_management">More Information</a>
    </div>

    <div class="box">
        <center><img src="images/Marketing.jpg" alt=""></center>
        <h3>Marketing Management</h3>
        <p>Marketing management encompasses strategies and tactics to identify and reach target markets, promote products or services, build brand awareness, analyze consumer behavior, and drive customer engagement and satisfaction.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Marketing_management">More Information</a>
    </div>

    <div class="box">
        <center><img src="images/Leadership.webp" alt=""></center>
        <h3>Leadership Skills</h3>
        <p>Leadership skills involve the ability to inspire, motivate, and guide individuals or teams towards achieving common goals, fostering innovation, making informed decisions, and effectively managing change and conflicts amoung employees.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Leadership">More Information</a>
    </div>

</div>


</div>   

<!-- Location Content - from google maps -->
<section class="location">
    <div class="section-title">
        <h1 class="h1">Location</h1>
        <h4 class="h4map">Spark Enterprise</h4>
    </div>
    <div class="map"> <!--google maps link-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.193344432502!2d79.95449056714044!3d6.914698446804928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1685550835799!5m2!1sen!2slk" width="100%" height="450" style="border:0; border-radius:25px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<!--Footer Content-->
<footer class="footer">
     <div class="container">
        <div class="row">
            
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="exam_registration.php">Exam Registration</a></li>
                    <li><a href="exam_results.php">Exam Results</a></li>
                    <li><a href="exam_information.php">Exam Information</a></li>
                    <li><a href="attempt_exam.php">Attempt Exam</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4>Contact Us</h4>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Gamil</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Account</h4>
                <ul>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
     </div> <br>
     <center><p>IWT Final Project - 2023</p></center>
  </footer>

</body>
</html>