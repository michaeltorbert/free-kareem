<html>
<head>
<title>Free Kareem Recommendation form</title>
<script language="javascript">
<!--

function reset() {
document.tellafriend.name.value="";
document.tellafriend.email.value="";
document.tellafriend.comment.value="Check out this non-profit organization, the Free Kareem Coalition, at freekareem.org.  As advocates of free speech for everyone, they are trying to secure the freedom of imprisoned blogger, Kareem Amer.  Please talk a look at their site, and I am sure that you will want to support them in preventing any further injustice.  If you have WordPress, then you can get a free promotional widget for your blog here http://wordpress.org/extend/plugins/free-kareem/.";
document.tellafriend.fmail1.value="";
document.tellafriend.fmail2.value="";
document.tellafriend.fmail3.value="";
}

function validate() {


if (document.tellafriend.fmail1.value.length==0) {
alert("Oops! you'll need to enter a friend's email address");
return false;
}

if (document.tellafriend.email.value.length==0) {
alert("Oops! you forget to enter your email address");
return false;
}
if (document.tellafriend.name.value.length==0) {
alert("Oops! you forgot to enter your name");
return false;
}

document.tellafriend.submit()
return true;
}

//-->
</script>
</head>
<body onload="reset()" topmargin="0" leftmargin="0"> 
<p> 
<center>
</center>
<table width="450" cellpadding="0" cellspacing="0" align="center">
<tr valign="top">
<td valign="middle" align="center">&nbsp;
Complete the details below to send this information to your friends:
<? $refurl = $_SERVER['HTTP_REFERER']; ?>
<? print $refurl;?><br /><br />
<form name="tellafriend" action="tellafriend.php" method="post" onsubmit="return checkfields()">&nbsp;
<div align="center">
<center>
<table border="0" cellpadding="10" cellspacing="0">
<tr>
<td> *your name:</td>
<td>
<input size="30" name="name" maxlength="45">
</td>
</tr>
<tr>
<td>*your email:</td>
<td>
<input size="30" name="email" maxlength="45">
</td>
</tr>
<tr>
<td colspan="2">
<p align="center">Enter your friend's email addresses:</td>
</tr>
<tr>
<td>*email 1:</td>
<td>
<input size="30" name="fmail1" maxlength="50">
</td>
</tr>
<tr>
<td>email 2:</td>
<td>
<input size="30" name="fmail2" maxlength="50">
</td>
</tr>
<tr>
<td>email 3:</td>
<td>
<input size="30" name="fmail3" maxlength="50">
</td>
</tr>
<tr>
<td>Message</td>
<td><textarea cols="30" rows="3" name="comment" /></textarea></td>
</tr>
<tr>
<td colspan="2">
<p align="center">
The email that will be sent to will contain your name &amp; email address. <br />
<input onclick="validate();" type="button" value="click once to send">
<input type=hidden name=refurl value="<? print $refurl;?>"> 

</td>
</tr>
</table>
</center>
</div>
</form>
</td>
</tr>
<tr valign="top">
<td valign="middle" align="center"> 
&nbsp;
</td>
</tr>
</table>
</body>
</html>
