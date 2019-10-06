function addToCart(name, price, id){

	var name = name;
	var price = price;
	var id = id;

	$.ajax({
		method: "POST",
		url: "addtocart.php",
		data: { id: id, name: name, price: price },
		success: function(data) {
			document.getElementById('cart').innerHTML = data
		}
	})
}
