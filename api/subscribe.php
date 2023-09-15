<?php
require("database.php");
$sql = "create table if not exists `subscribers` (
		`id` int(11) not null auto_increment,
		`name` varchar(255) not null,
		`email` varchar(255) not null,
		`timestamp` timestamp not null default current_timestamp,
		primary key (`id`)
	)";
$conn->query($sql);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"]) || empty($_POST["email"])) {
		$message = json_encode(array("message" => "Please fill out all fields."));
		echo $message;
		exit();
	}
	$name = $_POST["name"];
	$email = $_POST["email"];
	$check = "select * from `subscribers` where `email` = '$email'";
	$result = $conn->query($check);
	if ($result->num_rows > 0) {
		$message = json_encode(array("message" => "You are already subscribed to our newsletter."));
		echo $message;
		exit();
	} else {
		$sql = "insert into `subscribers` (`name`, `email`) values ('$name', '$email')";
		$conn->query($sql);
		if ($conn->affected_rows > 0) {
			$message = json_encode(array("message" => "You have been subscribed to our newsletter."));
			echo $message;
			exit();
		} else {
			$message = json_encode(array("message" => "There was an error subscribing you to our newsletter."));
			echo $message;
			exit();
		}
	}
}
?>
