<?php
// Multiple recipients
$to = 'zeke_191093@hotmail.com'; // note the comma

// Subject
$subject = 'Test';

// Message
$message = 'aaaa';


// Additional headers
$headers[] = 'To: Zeke <zeke_191093@hotmail.com>';
$headers[] = 'From: Mail <mail@tester.com>';

// Mail it
mail($to, $subject, $message);
?>