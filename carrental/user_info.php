<?php
session_start();
include('includes/config.php');

// Function to generate unique transaction ID
function generateTransactionID() {
	return strtoupper(uniqid('TRX-', true)); // Generates a unique transaction ID starting with "TRX-"
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get form data
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone_code = $_POST['phone_code'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$BookingNumber = $_POST['BookingNumber'];
	$citizenship = $_POST['citizenship'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$district = $_POST['district'];
	$occupation = $_POST['occupation'];
	$nationality = $_POST['nationality'];
	$city = $_POST['city'];
	$remarks = $_POST['remarks'];

	// Generate transaction ID
	$transaction_id = generateTransactionID();

	// Store the transaction ID in the session
	// $_SESSION['transaction_id'] = $transaction_id;

	// Create PDO connection
	try {
		$stmt = $dbh->prepare("INSERT INTO user_info (transaction_id, first_name, last_name, email, phone_code, phone, dob,BookingNumber, citizenship,country, state, district, occupation, nationality, city, remarks) 
		VALUES (:transaction_id, :first_name, :last_name, :email, :phone_code, :phone, :dob, :BookingNumber,:citizenship,:country, :state, :district, :occupation, :nationality, :city, :remarks)");

		// Bind parameters
		$stmt->bindParam(':transaction_id', $transaction_id);
		$stmt->bindParam(':first_name', $first_name);
		$stmt->bindParam(':last_name', $last_name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':phone_code', $phone_code);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':dob', $dob);
		$stmt->bindParam(':BookingNumber', $BookingNumber);
		$stmt->bindParam(':citizenship', $citizenship);
		$stmt->bindParam(':country', $country);  
		 $stmt->bindParam(':state', $state);
		$stmt->bindParam(':district', $district);
		$stmt->bindParam(':occupation', $occupation);
		$stmt->bindParam(':nationality', $nationality);
		$stmt->bindParam(':city', $city);
		$stmt->bindParam(':remarks', $remarks);

		// Execute the query
		if ($stmt->execute()) {
			echo '<script>alert("Data inserted successfully! Transaction ID: ' . $transaction_id . ' NOW CLICK TO NEXT BTN");</script>';
		} else {
			echo '<script>alert("Failed to insert data.");</script>';
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}
?>



<!-- janaki -->


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Info</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f4f8;
			margin: 0;
			padding: 0;
		}

		.marquee-container {
			background-color: #007bff;
			color: white;
			padding: 10px;
			font-weight: bold;
		}

		.container {
			width: 90%;
			max-width: 800px;
			margin: 30px auto;
			padding: 30px;
			background-color: #ffffff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			border-radius: 10px;
		}

		h2 {
			text-align: center;
			margin-bottom: 20px;
			color: #333;
		}

		.form-group {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			margin-bottom: 15px;
		}

		.input-field {
			flex: 1 1 48%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
			box-sizing: border-box;
		}

		select.input-field,
		input.input-field {
			width: 100%;
		}

		.phone-group {
			display: flex;
			gap: 10px;
		}

		.phone-code {
			flex: 0 0 30%;
		}

		.phone-number {
			flex: 1;
		}

		.button-container {
			text-align: center;
			margin-top: 20px;
		}

		.button {
			padding: 12px 25px;
			background-color: #28a745;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			margin: 0 10px;
			transition: background-color 0.3s ease;
		}

		.button:hover {
			background-color: #218838;
		}

		@media (max-width: 600px) {
			.input-field {
				flex: 1 1 100%;
			}

			.phone-group {
				flex-direction: column;
			}
		}
	</style>
</head>
<body>

	<!-- Marquee Section -->
	<div class="marquee-container">
		<marquee>Welcome! Please enter your details to proceed with the payment. All fields are required.</marquee>
	</div>

	<!-- User Information Form -->
	<div class="container">
		<h2>Enter Your Information</h2>
		<!-- <form action="payment.php" method="POST" id="userInfoForm"> -->
		<form action="user_info.php" method="POST" id="userInfoForm">
			<div class="form-group">
				<input type="text" name="first_name" id="first_name" placeholder="First Name" class="input-field" required>
				<input type="text" name="last_name" id="last_name" placeholder="Last Name" class="input-field" required>
			</div>

			<div class="form-group">
				<input type="email" name="email" id="email" placeholder="Email" class="input-field" required>
			</div>

			<div class="form-group phone-group">
				<select name="phone_code" id="phone_code" class="input-field phone-code" required>
					<option value="+91">+91 (India)</option>
					<option value="+1">+1 (USA)</option>
				</select>
				<input type="tel" name="phone" id="phone" placeholder="Phone Number" class="input-field phone-number" required>
			</div>

			<div class="form-group">
				<input type="date" name="dob" id="dob" class="input-field" required>
				<input type="bigint" name="BookingNumber" id="BookingNumber" placeholder="BookingNumber" class="input-field" required>
			
				<input type="text" name="citizenship" id="citizenship" placeholder="Citizenship Number" class="input-field" required>
			</div>


				</select>
			<div class="form-group">
		
	          <select name="country" id="country" class="input-field" required>

					<option value="">Select Country</option>
					<option value="afghanistan">Afghanistan</option>
					<option value="australia">Australia</option>
					<option value="bangladesh">Bangladesh</option>
					<option value="brazil">Brazil</option>
					<option value="canada">Canada</option>
					<option value="china">China</option>
					<option value="france">France</option>
					<option value="germany">Germany</option>
					<option value="india">India</option>
					<option value="indonesia">Indonesia</option>
					<option value="pakistan">Pakistan</option>
					<option value="russia">Russia</option>
					<option value="saudi_arabia">Saudi Arabia</option>
					<option value="singapore">Singapore</option>
					<option value="south_africa">South Africa</option>
					<option value="south_korea">South Korea</option>
					<option value="sri_lanka">Sri Lanka</option>
					<option value="thailand">Thailand</option>
				    <option value="uae">United Arab Emirates</option>
				    <option value="uk">United Kingdom</option>
				    <option value="usa">United States</option>
					
	            </select>
            </div>
	<div class="form-group">
	   
	   <select name="state" id="state" class="input-field" required>

					<option value="">Select State</option>
					<option value="andhra_pradesh">Andhra Pradesh</option>
					<option value="arunachal_pradesh">Arunachal Pradesh</option>
					<option value="assam">Assam</option>
					<option value="bihar">Bihar</option>
					<option value="chhattisgarh">Chhattisgarh</option>
					<option value="goa">Goa</option>
					<option value="gujarat">Gujarat</option>
					<option value="haryana">Haryana</option>
					<option value="himachal_pradesh">Himachal Pradesh</option>
					<option value="jharkhand">Jharkhand</option>
					<option value="karnataka">Karnataka</option>
					<option value="kerala">Kerala</option>
					<option value="madhya_pradesh">Madhya Pradesh</option>
					<option value="maharashtra">Maharashtra</option>
					<option value="manipur">Manipur</option>
					<option value="meghalaya">Meghalaya</option>
					<option value="mizoram">Mizoram</option>
					<option value="nagaland">Nagaland</option>
					<option value="odisha">Odisha</option>
					<option value="punjab">Punjab</option>
					<option value="rajasthan">Rajasthan</option>
					<option value="sikkim">Sikkim</option>
					<option value="tamil_nadu">Tamil Nadu</option>
					<option value="telangana">Telangana</option>
					<option value="tripura">Tripura</option>
					<option value="uttar_pradesh">Uttar Pradesh</option>
					<option value="uttarakhand">Uttarakhand</option>
					<option value="west_bengal">West Bengal</option>
		</select>
    </div>

	<div class="form-group">
	            
				<select name="district" id="district" class="input-field" required>
				
					 <option value="">Select District</option>
						<option value="angul">Angul</option>
						<option value="balangir">Balangir</option>
						<option value="balasore">Balasore</option>
						<option value="bargarh">Bargarh</option>
						<option value="bhadrak">Bhadrak</option>
						<option value="boudh">Boudh</option>
						<option value="cuttack">Cuttack</option>
						<option value="deogarh">Deogarh</option>
						<option value="dhenkanal">Dhenkanal</option>
						<option value="gajapati">Gajapati</option>
						<option value="ganjam">Ganjam</option>
						<option value="jagatsinghpur">Jagatsinghpur</option>
						<option value="jajpur">Jajpur</option>
						<option value="jharsuguda">Jharsuguda</option>
						<option value="kalahandi">Kalahandi</option>
						<option value="kandhamal">Kandhamal</option>
						<option value="kendrapara">Kendrapara</option>
						<option value="keonjhar">Keonjhar</option>
						<option value="khordha">Khordha</option>
						<option value="koraput">Koraput</option>
						<option value="malkangiri">Malkangiri</option>
						<option value="mayurbhanj">Mayurbhanj</option>
						<option value="nabarangpur">Nabarangpur</option>
						<option value="nayagarh">Nayagarh</option>                         
						<option value="nuapada">Nuapada</option>
						<option value="puri">Puri</option>
						<option value="rayagada">Rayagada</option>
						<option value="sambalpur">Sambalpur</option>
						<option value="sonepur">Sonepur</option>
						<option value="sundargarh">Sundargarh</option>
						<option value="ahmednagar">Ahmednagar</option>
						<option value="akola">Akola</option>
	                    <option value="amravati">Amravati</option>
						<option value="aurangabad">Aurangabad</option>
						<option value="beed">Beed</option>
						<option value="bhandara">Bhandara</option>
				        <option value="buldhana">Buldhana</option>
					    <option value="chandrapur">Chandrapur</option>
						<option value="dhule">Dhule</option>
						<option value="gadchiroli">Gadchiroli</option>
						<option value="gondia">Gondia</option>
						<option value="hingoli">Hingoli</option>
						<option value="jalgaon">Jalgaon</option>
						<option value="jalna">Jalna</option>
						<option value="kolhapur">Kolhapur</option>
						<option value="latur">Latur</option>
						<option value="mumbai_city">Mumbai City</option>
						<option value="mumbai_suburban">Mumbai Suburban</option>
						<option value="nagpur">Nagpur</option>
						<option value="nanded">Nanded</option>
						<option value="nandurbar">Nandurbar</option>
						<option value="nashik">Nashik</option>
						<option value="osmanabad">Osmanabad</option>
						<option value="palghar">Palghar</option>
						<option value="parbhani">Parbhani</option>
						<option value="pune">Pune</option>
						<option value="raigad">Raigad</option>
						<option value="ratnagiri">Ratnagiri</option>
						<option value="sangli">Sangli</option>
						<option value="satara">Satara</option>
						<option value="sindhudurg">Sindhudurg</option>
						<option value="solapur">Solapur</option>
						<option value="thane">Thane</option>
						<option value="wardha">Wardha</option>
						<option value="washim">Washim</option>
						<option value="yavatmal">Yavatmal</option>
						<option value="ahmednagar">Ahmednagar</option>
						<option value="akola">Akola</option>
						<option value="amravati">Amravati</option>
						<option value="aurangabad">Aurangabad</option>
						<option value="beed">Beed</option>
						<option value="bhandara">Bhandara</option>
						<option value="buldhana">Buldhana</option>
						<option value="chandrapur">Chandrapur</option>
						<option value="dhule">Dhule</option>
						<option value="gadchiroli">Gadchiroli</option>
						<option value="gondia">Gondia</option>
						<option value="hingoli">Hingoli</option>
						<option value="jalgaon">Jalgaon</option>
						<option value="jalna">Jalna</option>
						<option value="kolhapur">Kolhapur</option>
						<option value="latur">Latur</option>
						<option value="mumbai_city">Mumbai City</option>
						<option value="mumbai_suburban">Mumbai Suburban</option>
						<option value="nagpur">Nagpur</option>
						<option value="nanded">Nanded</option>
						<option value="nandurbar">Nandurbar</option>
						<option value="nashik">Nashik</option>
						<option value="osmanabad">Osmanabad</option>
						<option value="palghar">Palghar</option>
						<option value="parbhani">Parbhani</option>
						<option value="pune">Pune</option>
						<option value="raigad">Raigad</option>
						<option value="ratnagiri">Ratnagiri</option>
						<option value="sangli">Sangli</option>
						<option value="satara">Satara</option>
						<option value="sindhudurg">Sindhudurg</option>
						<option value="solapur">Solapur</option>
						<option value="thane">Thane</option>
						<option value="wardha">Wardha</option>
						<option value="washim">Washim</option>
						<option value="yavatmal">Yavatmal</option>
						<option value="central_delhi">Central Delhi</option>
						<option value="east_delhi">East Delhi</option>
						<option value="new_delhi">New Delhi</option>
						<option value="north_delhi">North Delhi</option>
							
	        </select>
			 
	</div>
	
	<div class="form-group">
				<select name="occupation" id="occupation" class="input-field" required>
					<option value="">Select Occupation</option>
					<option value="Engineer">Engineer</option>
					<option value="Doctor">Doctor</option>
					<option value="Student">Student</option>
					<option value="Teacher">Teacher</option>
					<option value="Businessperson">Businessperson</option>
					<option value="Farmer">Farmer</option>
					<option value="Artist">Artist</option>
					<option value="Scientist">Scientist</option>
					<option value="Lawyer">Lawyer</option>
					<option value="Accountant">Accountant</option>
					<option value="Nurse">Nurse</option>
					<option value="Technician">Technician</option>
					<option value="Self-employed">Self-employed</option>
					<option value="Government Employee">Government Employee</option>
					<option value="Unemployed">Unemployed</option>
					<option value="Retired">Retired</option>
					<option value="Other">Other</option>
				</select>
				<select name="nationality" id="nationality" class="input-field" required>
					<option value="">Select Nationality</option>
					<option value="American">American</option>
					<option value="Indian">Indian</option>
				</select>
	</div>

			<input type="text" name="city" id="city" placeholder="City" class="input-field" required>
			<input type="text" name="remarks" id="remarks" placeholder="Remarks (optional)" class="input-field">

	<div class="button-container">
			<button type="submit" class="button" onclick="showAlert()">Submit</button>
            <button type="button" class="button next-btn" onclick="window.location.href='payment.php'">Next</button>
	</div>
		</form>

		<div id="error-message" class="error"></div>
	</div>

	<script>
		// Client-side form validation
// Client-side form validation
document.getElementById("userInfoForm").addEventListener("submit", function(event) {
	let errorMessage = "";
	let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	let phonePattern = /^[0-9]{10}$/;
	let citizenshipPattern = /^[0-9]{20}$/;

	let email = document.getElementById("email").value;
	let phone = document.getElementById("phone").value;
	let citizenship = document.getElementById("citizenship").value;

	if (!emailPattern.test(email)) {
		errorMessage += "Invalid email format.\n";
	}
	if (!phonePattern.test(phone)) {
		errorMessage += "Phone number must be 10 digits.\n";
	}
	if (!citizenshipPattern.test(citizenship)) {
		errorMessage += "Invalid citizenship number format (XXXX-XXXX-XXXX).\n";
	}

	if (errorMessage) {
		document.getElementById("error-message").innerText = errorMessage;
		event.preventDefault();  // Prevent form submission
	}
});
<script>
</body>
</html>