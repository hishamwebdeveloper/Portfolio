<?php
class shop extends Controller {
  protected function Index() 
  {
    $viewmodel = new ShopModel();
    $this->returnView($viewmodel->Index());
  }
  
  protected function CartProcess() 
  {
    if(isset($_POST["AddToCart"]))
    {
      //Add Cart
      $cart['ProductId'] = $_POST["ProductId"];
      $cart['ProductName'] = $_POST["ProductName"];
      $cart['ProductPrice'] = $_POST["ProductPrice"];
      $cart['ProductQty'] = $_POST["ProductQty"];
      
      if (isset($_SESSION["ShoppingCart"]))
      {
        if(isset($_SESSION["ShoppingCart"][$cart["ProductId"]]))
        {
          unset($_SESSION["ShoppingCart"][$cart["ProductId"]]);
        }
      }
      $_SESSION["ShoppingCart"][$cart["ProductId"]] = $cart;
      die(json_encode(count($_SESSION["ShoppingCart"])));
    }
    
    
    //Load Cart
    if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
    {
      if(isset($_SESSION["ShoppingCart"]) && count($_SESSION["ShoppingCart"])>0)
      {
        $cart = '<ul>';
        $totalPrice = 0;
        $total = 0;
        foreach($_SESSION["ShoppingCart"] as $shoppingcart)
        {
          $itemId = $shoppingcart["ProductId"];
          $itemName = $shoppingcart["ProductName"];
          $itemPrice = $shoppingcart["ProductPrice"];
          $itemQty = $shoppingcart["ProductQty"];
          
          $cart .= "<li> <span class=\"name\">$itemName</span>
          <span class=\"qty\">$itemQty</span>
          <span class=\"price\">$" . number_format($itemPrice,2) . "</span>
          <span class=\"$itemId close-button\">✖</span></li>";
          $subtotal = ($itemPrice*$itemQty);
          $total += $subtotal;
        }
        
        $cart .= "</ul>";
        $cart .= "<p>Total price: $<strong>" . number_format($total,2) . "</strong></p>";
        $cart .= "<p>Total items: <strong>" . count($_SESSION["ShoppingCart"]) . "</strong></p>"; 
        $cart .= "<form method=\"post\" action=" . ROOT_URL . "shop/checkout> <button>Checkout</button></form>";
        die($cart);
      }
      else
      {
        die('Cart is empty');
      }
    }
    
    //Remove Item From Cart
    if(isset($_POST["remove_code"]))
    {
      $ProductId = $_POST["remove_code"];
      
      if(isset($_SESSION["ShoppingCart"][$ProductId]))
      {
        unset($_SESSION["ShoppingCart"][$ProductId]);
      }
    }
    else
    {
      die(json_encode("Fail"));
    }
  }
}