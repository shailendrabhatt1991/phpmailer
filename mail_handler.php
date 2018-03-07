<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/Exception.php';
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 4;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = 'true';
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "xyz.com";
//Password to use for SMTP authentication
$mail->Password = "xyz@123";
//Set who the message is to be sent from
$mail->setFrom('xyz@123.com', 'Contact Us xyz');
//Set an alternative reply-to address
$mail->addReplyTo('xyz.com', 'Contact us');
//Set who the message is to be sent to
$mail->addAddress('xyz.com', 'Contact Us');
//Set the subject line
$mail->Subject = 'Contact Us Enquiry';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

   $mail->isHTML(true);
   $mail->CharSet="utf-8";

$mail->Body ="<table width=60% align=center cellpadding=2 cellspacing=1 >
    <tr bgcolor=#061f5c>
        <td colspan=2 align=center>
            <font face=arial size=2 color=#ffffff>
                <b>Contact Us Inquiry</b>
            </font>
        </td>
    </tr>
    <tr>
        <td>
            </br>
            Dear All,
            </br></br>
            Please find below Contact Us details
            </br></br>
        </td>
    </tr>
    </table>
<table width=60% align=center cellpadding=4 cellspacing=1 bgcolor=#427400>
    <tr bgcolor=#ffffff>
        <td width=20%>
            <font face=arial size=2>
                <b>Name</b>
            </font>
        </td>
        <td>
            <font face=arial size=2>{$_POST['username']}</font>
        </td>
    </tr>
    <tr bgcolor=#ffffff>
        <td width=20%>
            <font face=arial size=2>
                <b>SurName</b>
            </font>
        </td>
        <td>
            <font face=arial size=2>{$_POST['surname']}</font>
        </td>
    </tr>
    <tr bgcolor=#ffffff>
        <td width=20%>
            <font face=arial size=2>
                <b>City</b>
            </font>
        </td>
        <td>
            <font face=arial size=2>{$_POST['city']} </font>
        </td>
    </tr>

	  <tr bgcolor=#ffffff>
        <td>
            <font face=arial size=2>
                <b>Country</b>
            </font>
        </td>
        <td>
            <font face=arial size=2>{$_POST['country']}</font>
        </td>
    </tr>
    	  <tr bgcolor=#ffffff>
        <td>
            <font face=arial size=2>
                <b>Email</b>
            </font>
        </td>
        <td>
            <font face=arial size=2>{$_POST['email']}</font>
        </td>
    </tr>
    <tr bgcolor=#ffffff>
        <td>
            <font face=arial size=2>
                <b>Phone</b>
            </font>
        </td>
        <td>
            <font face=arial size=2>{$_POST['phone']} </font>
        </td>
    </tr>
        <tr bgcolor=#ffffff>
        <td>
            <font face=arial size=2>
                <b>Message</b>
            </font>
        </td>
        <td>
            <font face=arial size=2>{$_POST['Message']} </font>
        </td>
    </tr>
 
</table>";

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    
    header("Refresh: 2; url=index.php");
    echo "Thank you for filling out your information!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
