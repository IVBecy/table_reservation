<?
# Variables and functions
include("./vars.php");

# Connection script
include("./connect.php");

# Email script
include("./email-conf.php");

# Variables from POST request (reserving)
$name = mysqli_real_escape_string($connection, clear($_POST['uname']));
$email = mysqli_real_escape_string($connection, clear($_POST['email']));
$phone = mysqli_real_escape_string($connection, clear($_POST['phone']));;
$guests = mysqli_real_escape_string($connection, clear($_POST['guests']));;
$time = mysqli_real_escape_string($connection, clear($_POST['time']));;
$date = mysqli_real_escape_string($connection, clear($_POST['date']));;

# Process the date from the input
$date_obj = datetime::createfromformat('D M j Y',$date);
$month = date("M",strtotime($date));
$day = date("j", strtotime($date));

# Getting data from the table
$q = "SELECT `$month` FROM `Months`";
$dates = mysqli_query($connection,$q);
$dates = mysqli_fetch_row($dates);
$dates = $dates[0];
$dates = json_decode($dates,true);

# Editing the array 
if ($dates[$day] < $guests){
  # Error page on some error
  header("Location: ../../error.html");
  die();
} else{
  # Update array
  $dates[$day] = $dates[$day] - $guests;
  $dates = json_encode($dates);

  # Updating the row in the table (DB)
  $q = "UPDATE `Months` SET `$month` = '$dates'";
  $connection->query($q);
  mysqli_close($connection);

  # Send the confirmation email
  ## Load HTML and change hard code to data (CLIENT)
  $email_body = file_get_contents("../../mail/mail_to.html");
  $email_body = str_replace("{NAME}",$name,$email_body);
  $email_body = str_replace("{TIME}",$time,$email_body);
  $email_body = str_replace("{GUESTS}",$guests,$email_body);
  $email_body= str_replace("{DATE}",$date_obj->format('d-m-Y'),$email_body);
  ## Load HTML and change hard code to data (COMPANY)
  $email_body_duke = file_get_contents("../../mail/mail_from.html");
  $email_body_duke = str_replace("{NAME}",$name,$email_body_duke);
  $email_body_duke = str_replace("{PHONE}",$phone,$email_body_duke);
  $email_body_duke = str_replace("{EMAIL}",$email,$email_body_duke);
  $email_body_duke = str_replace("{TIME}",$time,$email_body_duke);
  $email_body_duke = str_replace("{GUESTS}",$guests,$email_body_duke);
  $email_body_duke = str_replace("{DATE}",$date_obj->format('d-m-Y'),$email_body_duke);

  # Writing and alternative body (If there is no HTML)
  $email_body_alt = ` 
    Your reservation has been confirmed!
    
    Hi {$name} your reservation has been confirmed for {$time} on {$date_obj->format('d-m-Y')} for {$guests} people.
    Please remember to let us know about any allergies on the day.
    Should you have any special requirements, requests or questions, don’t hesitate to call
    us.
    
    We look forward to seeing you soon
    
    Our team
  `;
  $email_body_alt_comp =  `
  New reservation!

    Name: {$name}
    Email: {$email}
    Phone number: {$phone}
    Date: {$date}
    Time: {$time}
    Number of people: {$guests}
  `;
  # Client email
  mailing($email,$name,$email_body,$email_body_alt);
  # Company email
  mailing("email","NAME",$email_body_comp,$email_body_alt_duke);
  # Redirect customer to success page
  header("Location: ../../success.html");
  die();
};
?>