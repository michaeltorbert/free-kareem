<?php



if(count($_POST)) {
# This part strips out nasty code that a malicious
# person may try to inject into the form

foreach(array('fmail1','fmail2','fmail3','email','name','comment') as $key) $_POST[$key] = strip_tags($_POST[$key]);
if(!is_secure($_POST)) { die("Hackers begone");}

# This part submits a notification to you when 
# the form is submitted

// Email address for copies to be sent to - change to suit
$emailto = "free.kareem@gmail.com"; //email to esra if he wants

// Notification email subject text for copies
$esubject = "Promotion form submission"; 

// Email body text for notifications
$emailtext = "
$_POST[name] has used your promotion form using an email address of $_POST[email]

The people the recommendation has been submitted to are:

$_POST[fmail1]
$_POST[fmail2]
$_POST[fmail3]

The page recommended:

$_POST[refurl]

Comment:
$_POST[comment]

";

# This function sends the email to you

@mail("$emailto", $esubject, $emailtext, "From: $_POST[email]");

# This part is the function for sending to recipients

// Page to display after successful submission
// Change the thankyou.htm to suit

$thankyoupage = "thankyou.htm"; 

// Subject line for the recommendation - change to suit

$tsubject = "Urgent news from $_POST[name]";

// Change the text below for the email 
// Be careful not to change anyt "$_POST[value]" bits

$ttext = "
Hi,

$_POST[name], at $_POST[email] thought you may be interested in this information found at. 

$_POST[refurl]

Comments:
$_POST[comment]

$_POST[name] has used our Tell-a-Friend form to send you this note.

We look forward to your visit!

";

# This sends the note to the addresses submitted
@mail("$_POST[fmail1],$_POST[fmail2],$_POST[fmail3]", $tsubject, $ttext, "FROM: $_POST[email]");

# After submission, the thank you page
header("Location: $thankyoupage");
exit;

}

# Nothing further can be changed. Leave the below as is

function is_secure($ar) {
$reg = "/(Content-Type|Bcc|MIME-Version|Content-Transfer-Encoding)/i";
if(!is_array($ar)) { return preg_match($reg,$ar);}
$incoming = array_values_recursive($ar);
foreach($incoming as $k=>$v) if(preg_match($reg,$v)) return false;
return true;
}

function array_values_recursive($array) {
$arrayValues = array();
foreach ($array as $key=>$value) {
if (is_scalar($value) || is_resource($value)) {
$arrayValues[] = $value;
$arrayValues[] = $key;
}
elseif (is_array($value)) {
$arrayValues[] = $key;
$arrayValues = array_merge($arrayValues, array_values_recursive($value));
}
}
return $arrayValues;
}

?>
