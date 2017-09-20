//Add Cart
$(function() {
  $(".form-item").submit(function(e) 
  {
    e.preventDefault();
    var form_data = $(this).serialize(); //prepare form data for Ajax post
    $.ajax 
    ({
      url: "https://shop-hameow.rhcloud.com/shop/cartprocess",
      type: "POST",
      dataType: "json", //expect json value from server
      data: form_data
    }).done(function(data)
    {
      loadCart();
    })
  });
});

//Load Cart
function loadCart() {
  $(".cart").load("https://shop-hameow.rhcloud.com/shop/cartprocess", {"load_cart":1});
};

/* Should I use data HTML5? How should I uniquely identify each product */

//Remove Cart Item
$(".cart").on('click', 'span', function()
{
  var productCode = $(this).attr('class').split(' ')[0];
  $.post("https://shop-hameow.rhcloud.com/shop/cartprocess", {"remove_code":productCode}, function(data) {
    loadCart();
  });
});

loadCart();





/*
		$.post("http://localhost/wyl/salary/ajaxsalary",
        {
          name: "Donald Duck",
          city: "Duckburg"
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
*/