<?php
session_start();
?>

<html>

  <head>
    <title> Home | JD Home Cooks </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="css/index.css">

  <body>

    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">JD Home Cooks</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active" ><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>

          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
              (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
             </a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
              <li> <a href="managersignup.php"> Manager Sign-up</a></li>
              
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>
             
            </ul>
            </li>
          </ul>

<?php
}
?>
       </div>

      </div>
    </nav>

    <div class="wide">
      	<div class="col-xs-5 line"><hr></div>
        <div class="col-xs-2 logo"><img src="images/LogoImage.jpg"></div>
        <div class="col-xs-5 line"><hr></div>
        <div class="tagline">Good Food is Good Mood</div>
    </div>
    <br>
    <div class="orderblock">
    <h2>Feeling Hungry?</h2>
    <br>
    <center><a class="btn btn-success btn-lg" href="customerlogin.php" role="button" > Order Now </a></center>
    </div>


    <br>
    <br>
    

    <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>About Us</h4>
                <ul><a href="">Who We Are</a></ul>
                <ul><a href="">Blog</a></ul>
                <ul><a href="">Inevstor</a></ul>
                <ul><a href="">Relations</a></ul>
                <ul><a href="">Careers</a></ul>
                <ul><a href="">Team</a></ul>
            </div>
            <div class="col-md-3">
                <h4>Contact Us</h4>
                <ul>
                    <li>Email: dhruvi1611@gmail.com</li>
                    <li>Email: justin1212@gmail.com</li>
                    <li>Phone: +123-456-7890</li>
                    <li>Phone: +123-456-8278</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Partnership</h4>
                <ul>
                    <li><a href="#">Become a Partner</a></li>
                    <li><a href="#">Affiliate Program</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Terms & Policies</h4>
                <ul>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <ul class="social-icons">
                <h4>Social Links</h4>
                    <li><a href="#"><img src="images/insta.jpg" alt=""></i></a></li>
                    <li><a href="#"><img src="images/twitter.jpg" alt=""></i></a></li>
                    <li><a href="#"><img src="images/facebook.jpg" alt=""></i></a></li>
                    <!-- <li><a href="#"><img src="" alt=""></i></a></li> -->
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">© 2024 Your Website Name. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>


    
  
</body>
</html>