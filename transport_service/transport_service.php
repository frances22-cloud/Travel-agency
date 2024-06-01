
<!DOCTYPE html>
<html>
<head>	
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="tp-service.css">
  <link rel="stylesheet" href="users.css">
	<link rel="stylesheet" href="css/login.css">
	 <link rel="stylesheet" type="text/css" href="t_design.css">
	<title>Transport services</title>
</head>
<body>
<form action="process_transport.php" method="POST">
<div class="swiper-slide slide" style="background:url(images/img1.jpg) repeat">
  <div class="box-form">
            <div class="left">
                <div class="overlay">
                <h2>TRAVEL AGENCY</h2>
                </div>
            </div>
                <div class="right">
                <h2>Transport services </h2>
               
                <div class="inputs"> 
	<label for="name">Tranport Type:</label>
	<select id="name" name="transport_type" required>
   <option value="Bus">Bus</option>
   <option value="Flight">Flight</option>
   <option value="Train">Train</option>
   </select>
<br><br>
	<label for="name">Ticket type:</label>
	<select id="name" name="ticket_type" required>
  <option value="return">Return</option>
  <option value="one_way">One Way</option>
  </select>
<br><br>
	<label for="price">Service price:</label>
	<input type="double" name="service_price" id="price" placeholder="Enter amount" required>
  <label for="name">Company Name:</label>
  <input type="text" name="company_type_name" id="name" placeholder="Enter the company name" required>

  <label for="address">HQ address:</label>
  <input type="text" name="HQ_address" id="address" placeholder="Enter Your address" required>

  <label for="describe">Description:</label>
  <input type="text area" name="description" id="describe" placeholder="Enter your Description" required>

  <label for="name">Is_partner:</label>
  <input type="text" name="is_partner" id="name" placeholder="Enter partnership" required>
	<button><a href="">SAVE</a></button>
	
</div>
</div>
</div>
</form>
 
</body>
</html>