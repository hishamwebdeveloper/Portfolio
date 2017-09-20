<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Shop</title>
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
  </head>
  <body>
    <header>
      <nav>
        <ul id="left-menu">
          <li><a href="<?php echo ROOT_URL;?>">Home</a></li>
          <li><a href="<?php echo ROOT_URL;?>about">About</a></li>
          <li><a href="<?php echo ROOT_URL;?>contact">Contact</a></li>
          <li><a href="<?php echo ROOT_URL;?>shop">Shop</a></li>
        </ul>

        <ul id="right-menu">
          <?php if(isset($_SESSION['is_logged_in'])) : ?>
          <li>Welcome, <?php echo htmlspecialchars($_SESSION['UserData']['FirstName']); ?></li>
          <li><a href="<?php echo ROOT_URL; ?>logout">Logout</a></li>
          <?php else : ?>
          <li><a href="<?php echo ROOT_URL;?>login">Login</a></li>
          <li><a href="<?php echo ROOT_URL;?>register">Register</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>
    
    <div id="container">
      <h1>Products</h1>      
      
      <div id="product-list">
      <?php foreach($viewmodel as $products): ?>
        <div class="image-container">
          <div class="thumbnail">
            <img src="../../../<?php echo $products['ProductImage'];?>" />
          </div>
          <h3><?php echo $products['ProductName'];?></h3>
          <p><?php echo $products['ProductDesc'];?></p>
          <p>$<?php echo number_format($products['ProductPrice'],2);?></p>
          <form class="form-item">
            <label>Qty:</label>
            <select name="ProductQty">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <input type="hidden" name="AddToCart" value="AddToCart" />
            <input type="hidden" name="ProductId" value="<?php echo $products['ProductId'];?>" />
            <input type="hidden" name="ProductName" value="<?php echo $products['ProductName'];?>" />
            <input type="hidden" name="ProductPrice" value="<?php echo $products['ProductPrice'];?>" />
            <button type="submit">Add to cart</button>
          </form>
        </div>
      <?php endforeach; ?>
      </div>
      
      <div class="cart-container">
        <h4>Shopping Cart</h4>
        <div class="cart">
        </div>
      </div>
      
    </div>
    <footer></footer>

    <script src="<?php echo ROOT_PATH;?>assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo ROOT_PATH;?>assets/js/shopping-cart.js"></script>
  </body>
</html>