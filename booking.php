
<?php 

    session_start();
    require_once('connection.php');
 
    $vehicleid=$_GET['id'];
    
    $sql="select *from vehicles where VEHICLE_ID='$vehicleid'";
    $cname = mysqli_query($con,$sql);
    $email = mysqli_fetch_assoc($cname);
    
    $value = $_SESSION['email'];
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $uemail=$rows['EMAIL'];
    $vehicleprice=$email['PRICE'];
    if(isset($_POST['book'])){
       
        $bplace=mysqli_real_escape_string($con,$_POST['place']);
        $bdate=date('Y-m-d',strtotime($_POST['date']));;
        $dur=mysqli_real_escape_string($con,$_POST['dur']);
        $phno=mysqli_real_escape_string($con,$_POST['ph']);
        $des=mysqli_real_escape_string($con,$_POST['des']);
        $rdate=date('Y-m-d',strtotime($_POST['rdate']));
         
        if(empty($bplace)|| empty($bdate)|| empty($dur)|| empty($phno)|| empty($des)|| empty($rdate)){
            echo '<script>alert("please fill the place")</script>';

        }
        else{
            if($bdate<$rdate){
            $price=($dur*$vehicleprice);
            $sql="insert into booking (VEHICLE_ID,EMAIL,BOOK_PLACE,BOOK_DATE,DURATION,PHONE_NUMBER,DESTINATION,PRICE,RETURN_DATE) values($vehicleid,'$uemail','$bplace','$bdate',$dur,$phno,'$des',$price,'$rdate')";
            $result = mysqli_query($con,$sql);
            
            if($result){
                
                $_SESSION['email'] =$uemail;
                header("Location: payment.php");
            }
            else{
                echo '<script>alert("please check the connection")</script>';
            }
        }
        else{
            echo  '<script>alert("please enter a correct rturn date")</script>';
        }
    
        }
    }
    
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEHICLE BOOKING</title>
    <!-- <link  rel="stylesheet" href=""> -->
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>



</head>
<body  background=images/book.jpg>
<style>
*{
    margin: 0;
    padding: 0;

}

div.main{
    width: 400px;
    margin: 100px auto 0px auto;
}
.btnn{
    width: 240px;
    height: 40px;
    background: #0000ff; /* Changed to blue */
    border: none;
    margin-top: 30px;
    margin-left: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
}

.btnn:hover{
    background: #fff;
    color:blue;
}

.btnn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

h2{
    text-align: center;
    padding: 20px;
    font-family: sans-serif;

}
div.register {
    background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.3);
    color: #fff;
    padding-bottom: 20px; /* Add space at the bottom of the form */
}

form#register{
    margin: 40px;

}

label{
    font-family: sans-serif;
    font-size: 18px;
    font-style: italic;
}

input#name{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}

input#dfield{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}

input#datefield{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}

*{
    margin: 0;
    padding: 0;

}
.hai{
    width: 100%;
    height: 0px;
    
    
}
.main {
    width: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 50%);
    background-position: center;
    background-size: cover;
    margin-bottom: 100px; /* Adjust this value for more or less gap */
}
.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}

.icon{
    width:200px;
    float: left;
    height : 70px;
}

.logo{
    color: blue;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float:left;
    padding-top: 10px;

}
.menu{
    width: 400px;
    float: left;
    height: 70px;

}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
}

ul li{
    list-style: none;
    margin-left: 80px;
    margin-top: 20px;
    font-size: 14px;
    color: black;

}

ul li a{
    text-decoration: none;
    color:white;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;

}

ul li a:hover{
    color:blue;

}

.nn{
    width: 100px;
    background: #0000ff; /* Changed to blue */
    border: none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: white;
    transition: 0.4s ease;
}


.nn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.circle{
    border-radius:48%;
    width:65px;
}

.phello{
    width: 200px;
    margin-left: -50px;
    padding: 0px;
}
footer {
    background-color: rgba(0, 0, 0, 0.6); /* Make footer semi-transparent */
    color: white;
    text-align: center;
    padding: 20px 0;
    position: relative;
    bottom: 0;
    width: 100%;
}

footer p {
    margin: 0;
    font-size: 14px;
    font-family: Arial, sans-serif;
}

footer .socials {
    margin-top: 10px;
}

footer .socials a {
    text-decoration: none;
    color: white;
    font-size: 24px;
    margin: 0 10px;
    transition: 0.3s ease;
}

footer .socials a:hover {
    color: #1e90ff; /* Blue color on hover */
}




</style>




    
       <div class="hai">
            <div class="navbar">
                <div class="icon">
                    <h2 class="logo">VeloRent</h2>
                </div>
                <div class="menu" >
                    <ul>
                        <li ><a href="vehiclesdetails.php">HOME</a></li>
                        <li><a href="aboutus2.html">ABOUT</a></li>
                        <li><a href="#">DESIGN</a></li>
                        <li><a href="contactus2.html">CONTACT</a></li>
                        <li><button class="nn"><a href="index.html">LOGOUT</a></button></li>
                        <li><img src="images/profile.png" class="circle" alt="Alps"></li>
                    <li><p class="phello">HELLO! &nbsp;<a id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p></li>

                    
                    </ul>
                </div>
            </div>
       </div>
                
                
         <div class="main"> 
        
        <div class="register">
            <h2>BOOKING</h2>
        <form id="register" method="POST"  >
            <h2>VEHICLE NAME : <?php echo "".$email['VEHICLE_NAME']?></h2>
            <label>BOOKING PLACE : </label>
            <br>
            <input type="text" name="place"
            id="name" placeholder="Enter Your Destination">
            <br><br>

            <label>BOOKING DATE : </label>
            <br>
            <input type ="date" name="date"
            id="datefield" min='1899-01-01' max='2000-13-13'  placeholder="ENTER THE DATE FOR BOOKING">
            <br><br>

            <label>DURATION : </label>
            <br>
            <input type ="number" name="dur" min="1" max="30" 
            id="name" placeholder="Enter Rent Period (in days)">
            <br><br>

            <label>PHONE NUMBER : </label>
            <br>
            <input type="tel" name="ph" maxlength="10"
            id="name" placeholder="Enter Your Phone Number">
            <br><br>
            
            <label>DESTINATION : </label>
            <br>
            <input type="text" name="des"
            id="name" placeholder="Enter Your Destination">
            <br><br>

            <label>Return date : </label>
            <br>
            <input type ="date" name="rdate"
            id="dfield"  min='1899-01-01' placeholder="Enter The Return Date">
            <br><br>
            <input type="submit"  class="btnn" value="BOOK" name="book" >
            
        </form>
        </div>
    </div>
    
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
             dd = '0' + dd
        }
        if (mm < 10) {
              mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("min", today);
        document.getElementById("datefield").setAttribute("max", today);


    </script>
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
             dd = '0' + dd
        }
        if (mm < 10) {
              mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("dfield").setAttribute("min", today);
        


    </script>
    
     
<footer>
    <p>&copy; 2024 VeloRent. All Rights Reserved.</p>
  
    <div class="socials">
        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
    </div>
</footer>

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    
    
</body>
</html>