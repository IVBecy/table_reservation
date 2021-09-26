<?
# This was going to be used with cron, to update DB every month

# Variables and functions
include("./vars.php");

# Connect to DB
$host_name = "your-host";
$database = "db-name";
$user_name = "user-name";
$password = "password";
$connection = new mysqli($host_name, $user_name, $password, $database);

# Get last month
$date = strtotime(date("Y-n-d"));
$month = date("n",$date);
$month = $month -1;
$month = date("M",strtotime(date("Y-{$month}-d")));

# File data from the json file
$filedata = file_get_contents($argv[1]);

# The SQl query to update the row
$sql_q = "UPDATE `Months` SET `$month` = '$filedata'";

# Run the sql query and exit
if ($connection->query($sql_q) === TRUE) {
  echo "Update has been successful.";
} else {
  echo "Error: " . $q . $connection->error;
}
mysqli_close($connection);
?>