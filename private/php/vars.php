<?
#  Connection Function
function connect(){
  $host_name = "your-host";
  $database = "db-name";
  $user_name = "user-name";
  $password = "password";
  $connection = new mysqli($host_name, $user_name, $password, $database);
  return $connection;
};

# Data sanitization
function clear($data){
  return(htmlspecialchars($data));
};
?>