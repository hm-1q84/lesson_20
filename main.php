<link rel="stylesheet" href="style.css">

<script type="text/javascript"> //script adding coloring class to selected row in a table
	function myFunction() {
		var row = document.getElementsByTagName("tr")["<?php echo $_GET['counter'] ?>"];
		row.classList.add("selected");
	}	
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

include 'print_table.php';

if (!isset($_GET['action'])) {//set action index during first load of page
	$_GET['action'] = '';
}

if (($_GET['action'] == 'delete') && isset($_GET['id'])) { //if user clicked the link 'delete' then delete the record
	$sql = "DELETE FROM prodavtsi WHERE Nprod_9 = '".($_GET["id"])."'";
	echo "<h3>".$sql."</h3>";
	$conn->query($sql);
}

if (isset($_POST['submit_insert'])) {  //if user clicked Insert button then insert record using form data
	$t = $_POST['town'];
	$r = $_POST['rating'];
	$n = $_POST['name'];

	$sql = "INSERT INTO prodavtsi (FIO_9, Adres_9, Reiting_9) VALUES ('$n', '$t', '$r')";
	echo "<h3>".$sql."</h3>";
	$conn->query($sql);
}

if (isset($_POST['submit_update'])) {  //if user clicked Update button then update record using form data
	$t = $_POST['upd_town'];
	$r = $_POST['upd_rating'];
	$n = $_POST['upd_name'];

	$sql = "UPDATE prodavtsi SET FIO_9 = '$n', Adres_9 = '$t', Reiting_9 = '$r' WHERE Nprod_9 ='".($_GET["id"])."'";
	echo "<h3>".$sql."</h3>";
	$conn->query($sql);
}

$sql = "SELECT * FROM prodavtsi"; //displaying the table
print_table($conn, $sql);

if (($_GET['action'] == 'edit') && isset($_GET['id']) && isset($_GET['c_n']) && isset($_GET['c_t']) && isset($_GET['c_r'])) { //if user clicked the link 'edit' then put data into updating form
	include 'updating_form.php';
	echo "<script type='text/javascript'>myFunction();</script>";
}

include 'inserting_form.php';

$conn->close();
?>



