<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flour House</title>
  
  <style>
 

    body.fixed-header .menu-content {
        background-image: url('R (1).jpg');
      background-size: cover;
      margin-top: 150px; /* Adjust the margin as needed */
    }
    /* main-header start */
    [data-target="#mainMenu"] {
      position: relative;
      z-index: 999;
    }

    #mainMenu li > a {
      font-size: 20px;
      letter-spacing: 1px;
      color: #fff;
      font-weight: 400;
      position: relative;
      z-index: 1;
      text-decoration: none;
    }

    .main-header.fixed-nav #mainMenu li > a {
      color: #fff;
      text-decoration: none;
    }

    #mainMenu li:not(:last-of-type) {
      margin-right: 30px;
    }

    #mainMenu li > a::before {
      position: absolute;
      content: "";
      width: calc(100% - 1px);
      height: 1px;
      background: #fff;
      bottom: -6px;
      left: 0;
      -webkit-transform: scale(0, 1);
      -ms-transform: scale(0, 1);
      transform: scale(0, 1);
      -webkit-transform-origin: right center;
      -ms-transform-origin: right center;
      transform-origin: right center;
      z-index: -1;
      -webkit-transition: transform 0.5s ease;
      transition: transform 0.5s ease;
    }

    #mainMenu li > a:hover::before,
    #mainMenu li > a.active::before {
      -webkit-transform: scale(1, 1);
      -ms-transform: scale(1, 1);
      transform: scale(1, 1);
      -webkit-transform-origin: left center;
      -ms-transform-origin: left center;
      transform-origin: left center;
    }

    .main-header.fixed-nav #mainMenu li > a::before {
      background: #000;
    }

    .main-header {
        
      position: fixed;
      top: 25px;
      left: 0;
      z-index: 99;
      width: 100%;
      -webkit-transition: all 0.4s ease;
      transition: all 0.4s ease;
    }

    .main-header.fixed-nav {
      top: 0;
      background: #fff;
      -webkit-box-shadow: 0 8px 12px -8px rgba(0, 0, 0, 0.09);
      box-shadow: 0 8px 12px -8px rgba(0, 0, 0, 0.09);
      -webkit-transition: all 0.4s ease;
      transition: all 0.4s ease;
    }

    .main-header.fixed-nav .navbar-brand > img:last-of-type {
      display: block;
    }

    .main-header.fixed-nav .navbar-brand > img:first-of-type {
      display: none;
    }

    .navbar-brand {
      color: #fff;
    }

    .main-header .navbar-brand img {
      max-width: 40px;
      animation: fadeInLeft 0.4s both 0.4s;
    }

    /* main-header end */
    @media (max-width: 991px) {
      /*header starts*/
      .collapse.in {
        display: block !important;
        padding: 0;
        clear: both;
      }

      .navbar-toggler {
        margin: 0;
        padding: 0;
        width: 40px;
        height: 40px;
        position: absolute;
        top: 25px;
        right: 0;
        border: none;
        border-radius: 0;
        outline: none !important;
      }

      .main-header .navbar {
        float: none;
        width: 100%;
        padding-left: 0;
        padding-right: 0;
        text-align: center;
      }

      .main-header .navbar-nav {
        margin-top: 70px;
      }

      .main-header .navbar-nav li .nav-link {
        text-align: center;
        padding: 20px 15px;
        border-radius: 0px;
      }

      .main-header .navbar-toggler .icon-bar {
        background-color: #fff;
        margin: 0 auto 6px;
        border-radius: 0;
        width: 30px;
        height: 3px;
        position: absolute;
        right: 0;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
      }

      .main-header .navbar .navbar-toggler .icon-bar:first-child {
        margin-top: 3px;
      }

      .main-header .navbar-toggler .icon-bar-1 {
        width: 10px;
        top: 0px;
      }

      .main-header .navbar-toggler .icon-bar-2 {
        width: 16px;
        top: 12px;
      }

      .main-header .navbar-toggler .icon-bar-3 {
        width: 20px;
        top: 21px;
      }

      .main-header .current .icon-bar {
        margin-bottom: 5px;
        border-radius: 0;
        display: block;
      }

      .main-header .current .icon-bar-1 {
        width: 18px;
      }

      .main-header .current .icon-bar-2 {
        width: 30px;
      }

      .main-header .current .icon-bar-3 {
        width: 10px;
      }

      .main-header .navbar-toggler:hover .icon-bar {
        background-color: #fff;
      }

      .main-header .navbar-toggler:focus .icon-bar {
        background-color: #fff;
      }
      /*header ends*/
    }
    .menu-content {
   
    justify-content: space-between;
    flex-wrap: wrap;
    padding: 20px;
    color: black;
    /*background-image: url('https://i.pinimg.com/originals/06/c9/a2/06c9a21787ddb83f3ede7e02c5657eba.jpg');*/
 
   /* background-size: cover;*/
}

    .location-input,
    .phone-input {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .location-input:focus,
    .phone-input:focus {
        outline: none;
        border-color: #3498db; /* Change focus border color as needed */
    }



.menu-item {
    width: 58%;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.menu-item:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

.menu-item img {
    max-width: 100%;
    height: 150px;
    object-fit: cover;
}

.menu-item:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    pointer-events: none;
}

.menu-item-details {
 
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: black;
    z-index: 1;
    transition: transform 0.3s ease;
   font-style: italic;
}

.menu-item:hover .menu-item-details {
    transform: translate(-50%, -50%) scale(1.2);
}

.menu-item h3 {
    margin-top: 0;
}

.menu-item p {
    margin: 10px 0;
}



        h1 {
            color: #ffcc00;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
        body {
       
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        font-family: 'Arial', sans-serif; /* Change the font family */
        color: #ccc; /* Set text color to white */
        margin: 0;
        padding: 0;
    }
 
    .w3-container {
        max-width: 800px; /* Limit the width of the container */
        margin: 0 auto; /* Center the container */
        padding: 20px;
        background-color: black; /* Add a semi-transparent background */
        border-radius: 10px; /* Add rounded corners to the container */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add a subtle box shadow */
        background-image: url('https://www.foodchow.com/blog/wp-content/uploads/2020/07/main-qimg-0e76f1b1c34d47052d6e766b1bbc152b.jpg');
   background-size: cover;
    }

    h1 {
        color: #ffcc00; /* Set the heading color to yellow */
    }

    p {
        font-size: 16px; /* Set the default paragraph font size */
    }

    .w3-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #ffcc00; /* Set button background color to yellow */
        color: #000000; /* Set button text color to black */
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #ffd633; /* Change button color on hover */
    }
footer{
    color: wheat;
}
 .gg{
background-image: url('https://th.bing.com/th/id/R.fbb9a1a12067c88ae34e4c6de64e8907?rik=DohqK1smykdXPw&pid=ImgRaw&r=0');

font-size: 22px;

} 
.gg1{
font-family:sans-serif ;
font-weight: bold;
}
.container1{
    background-color: black;
    font-style: italic;
    font-size: 20px;
   
}
.ooo{
  text-align: center;
  font-size: 30px;
  font-weight: bolder;
}
.oo{
  text-align: center;
  font-size: 36px;
  font-weight: bolder;
}

  footer {
    background-color: #333;
    color: #fff;
    padding: 30px 0;
  }

  footer h3 {
    color: #ffcc00;
  }

  footer a {
    color: #ffcc00;
    text-decoration: none;
    margin-right: 15px;
  }

  footer hr {
    border-color: #666;
  }

  footer p {
    font-size: 14px;
  }

  </style>
</head>

<body>
    
  <header class="main-header">
    
    <div class="container">
      <nav class="navbar navbar-expand-lg main-nav px-0">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar icon-bar-1"></span>
          <span class="icon-bar icon-bar-2"></span>
          <span class="icon-bar icon-bar-3"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
          <ul class="navbar-nav ml-auto text-uppercase f1">
          
            <li>
              <a href="#home" class="active active-first">home</a>
            </li>
            <li>
              <a href="#about">about us</a>
            </li>
            <li>
              <a href="#menu">menu</a>
            </li>
            <li>
              <a href="#contact">contact us</a>
            </li>
            
          </ul>
        </div>
      </nav>
    </div>

  </header>
  <section id="home"><div class="gg">
  <br > </br>
<br></br>
<br> </br>


<br> </br>
 <div class="ooo"><br>━━━━━━━━━━━━━━━━ </br></div>
<div class="oo">Enjoy Our Food Experience </div>
<div class="ooo"> ━━━━━━━━━━━━━━━━ </div>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
  </section></div>
  <section id="menu">
 
  <?php

include 'config.php';
// Existing getMenuItems function
function getMenuItems()
{
    global $conn;

    // Display location and phone number form fields outside the loop
    echo '<h2>Enter Your Information to order food or call us at 📞1899</h2>';
    echo '<form action="order_process.php" method="post">';
    echo 'Location: <input type="text" name="location" class="location-input" required><br>';
    echo 'Phone Number: <input type="text" name="phone_number" class="phone-input" required><br>';
    echo '<hr>';

    // Fetch and display menu items
    $sql = "SELECT * FROM menu_items";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<h2>Menu</h2>';
        echo '<div class="menu-container">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="menu-item">';
            // Display menu item details
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>' . $row['description'] . '<br>Price: $' . $row['price'] . '</p>';

            // Display image if available
            if (!empty($row['image_url'])) {
                echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '" class="menu-item-image">';
            }

            // Add order form for each menu item
            echo '<input type="checkbox" name="item_ids[]" value="' . $row['id'] . '"> Select';
            echo ' Quantity: <input type="number" name="quantities[]" value="1" min="1" class="quantity-input">';
            echo '</div>';
        }
        echo '</div>';
        // Order button outside the loop
        echo '<button type="submit" class="order-button" name="order">Place Order</button>';
        echo '</form>';
    } else {
        echo "No menu items available.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- Add your CSS styles here -->
    <style>
        /* Styles for the order button and quantity input */
        .order-button {
            background-color: #ffcc00;
            color: #000000;
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 24px;
            margin-top: 20px;
        }

        .quantity-input {
            width: 50px;
            padding: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
    </style>
</head>


   
        <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your head content, like stylesheets, etc. -->
</head>
<body>

    <!-- Include your header content if needed -->

    <section id="menu">
        <section class="menu-content">
          
        <div class="menu-item-details"></div>
            <?php getMenuItems(); ?>
           
        </section>

    </section>

    <!-- Include your footer content if needed -->

</body>
</html>

    </section>
</section>


<section id="about">  <div class="container1">
       
        <img src="https://th.bing.com/th/id/R.f560046c5430b26c1c48f34ee5e1f337?rik=IHeQK6wbFjQZaA&pid=ImgRaw&r=0" alt="Restaurant Image">
        <div class="gg1"><h1>About Flour House</h1></div>
        <p>Welcome to Flour House, where culinary artistry meets a warm and inviting atmosphere. Nestled in the heart of tyre, our restaurant is a celebration of flavors, creativity, and community.</p>

        <p>At Flour House, we believe in the power of good food to bring people together. Our chefs are passionate about crafting dishes that not only delight the taste buds but also tell a story. Every ingredient is carefully selected, and every recipe is a labor of love.</p>

        <p>But Flour House is more than just a restaurant; it's a place to create memories. Whether you're here for a casual meal with friends, a romantic dinner, or a special celebration, our warm and attentive staff is dedicated to making your experience unforgettable.</p>

        <p>Join us on a gastronomic adventure, where passion meets plate and every bite tells a story. We look forward to welcoming you to Flour House, where exceptional food and genuine hospitality come together.</p>

        <p>Follow us on <a href="https://instagram.com/flourhouse" target="_blank">Instagram</a> and <a href="https://facebook.com/flourhouse" target="_blank">Facebook</a> for updates and behind-the-scenes glimpses into our kitchen!</p>
    </div></section>

    <!-- /.container -->
 <section id="contact"><div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <form action="process_contact.php" method="post">
   
        <p><input class="w3-input w3-padding-16" type="text" placeholder="name" required name="name"></p>
        <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>
        <p><input class="w3-input w3-padding-16" type="text" placeholder="message" required name="message"></p>
        <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form></section>
</body>
<!-- Add this code at the end of your HTML body -->

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Contact Us</h3>
        <p>Email: flourhouse@gmail.com</p>
        <p>Phone:1899</p>
      </div>
      <div class="col-md-6">
        <h3>Connect With Us</h3>
        <!-- Add your social media links here -->
        <a href="https://facebook.com/flourhouse" target="_blank">Facebook</a>
        <a href="https://twitter.com/flourhouse" target="_blank">Twitter</a>
        <a href="https://instagram.com/flourhouse" target="_blank">Instagram</a>
      </div>
    </div>
    <hr>
    <div class="text-center">
      <p>&copy; 2023 Flour House. All rights reserved. </p>
    </div>
  </div>
</footer>

</html>

