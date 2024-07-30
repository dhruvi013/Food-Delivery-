<?php
session_start();

if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
}

?>


<html>

  <head>
    <title> Explore | Food JD Home Cooks </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/foodlist.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

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
            <li><a href="index.php">Home</a></li>
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
            <li class="active" ><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a></li>
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
              <li> <a href="#"> Admin Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>
              <li> <a href="#"> Admin Login</a></li>
            </ul>
            </li>
          </ul>

<?php
}
?>


        </div>

      </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <div class="item active">
      <img src="images/home1.jpg" style="width:100%; height:64%;">
      <div class="carousel-caption">
      </div>
      </div>
       
      <div class="item">
      <img src="images/home.jpg" style="width:100%;">
      <div class="carousel-caption">

      </div>
</div>

      <div class="item">
      <img src="images/slide001.jpg" style="width:100%;">
      <div class="carousel-caption">

      </div>
      </div>
      <div class="item">
      <img src="images/slide003.jpg" style="width:100%;">
      <div class="carousel-caption">
      </div>
      </div>
    
    </div>
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Welcome To JD Home Cooks</h1>      
    <p> "Indulge in the delicious comfort of homemade goodness, </p> 
    <p>where every dish is crafted with love and care" </p>
  </div>
</div>




<div class="container" style="width:95%;">

<!-- Display all Food from food table -->
<?php

require 'connection.php';
$conn = Connect();

$sql = "SELECT * FROM FOOD WHERE options = 'ENABLE' ORDER BY F_ID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  $count=0;

  while($row = mysqli_fetch_assoc($result)){
    if ($count == 0)
      echo "<div class='row'>";

?>
<div class="container" style="width:95%;">
    <div class="row">
        <?php
        // Start the loop to display food items
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-md-3 food-card">
            <div class="mypanel">
                <img src="<?php echo $row["images_path"]; ?>" class="img-responsive">
                <h4 class="text-dark"><?php echo $row["name"]; ?></h4>
                <h5 class="text-info"><?php echo $row["description"]; ?></h5>
                <h5 class="text-danger">&#8377; <?php echo $row["price"]; ?>/-</h5>
                <form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                    <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
                    <div class="input-group">
                        <input type="number" min="1" max="25" name="quantity" class="form-control" value="1">
                        <span class="input-group-btn">
                            <input type="submit" name="add" class="btn btn-success" value="Add to Cart">
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
</div>

<?php
$count++;
if($count==4)
{
  echo "</div>";
  $count=0;
}
}
?>

</div>
</div>
<?php
}
else
{
  ?>

  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Oops! No food is available.</h1> </label>
        <p>Stay Hungry...! :P</p>
      </center>
       
    </div>
  </div>

  <?php

}

?>

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