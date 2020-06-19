<?php
	if(isset($_POST['submit'])) {
        $image = $_FILES['receiptimage']['name'];
        $target = "receipts/".basename($image);
        $stmt = $link->prepare("INSERT INTO expenses (expense_date, vendor_id, amount, category, other, receiptimage) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siisss", $date, $vendorID, $amount, $category, $other, $receiptname);
        $date =($_POST['date']);
		$vendorID = trim($_POST['vendor']);
		$amount = trim($_POST['amount']);
		$category = trim($_POST['category']);
        $other = trim($_POST['other']);
        $receiptname = "https://buttercream.io/business/receipts/" . $_FILES['receiptimage']['name'];    

    
        // insert a row
        if($stmt->execute()) {        
        echo "<p style='background-color: #5cb85c; color: white; text-align: center; padding-top: 20px; vertical-align: middle;'>Recipe successfully added!</p>";
        } else  {
        echo "<p style='background-color: #d9534f; color: white; text-align: center; padding-top: 20px; vertical-align: middle;'>Fuck it didn't work!!</p>";
        }
        if (move_uploaded_file($_FILES['receiptimage']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
	}
	?>