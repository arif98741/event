<?php
// Multiple recipients
$to = 'arif98741@gmail.com'; // note the comma

// Subject
$subject = 'Test Mail';
$rand = rand(12,9999999).uniqid(12000).rand(9999,23567889);


// Message
$message = '
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<body>'.'<a style="font-size:20px;" href="http://localhost/powrosova?action=confirm&id='.$rand.'">Click To Confirm Your Registration</a>'.
  '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non nam ipsam earum exercitationem, quod corporis voluptatibus placeat! Deserunt enim, tenetur veritatis velit, possimus incidunt temporibus natus explicabo impedit voluptatum a ut nemo id expedita illo. Explicabo quisquam quidem vero aliquam culpa, harum ea nam inventore perspiciatis. Atque aliquid delectus, quae cum nemo magnam similique architecto et illum perferendis, in nobis quisquam harum exercitationem aliquam, necessitatibus non officia dolorum molestias velit impedit enim. Veritatis, vitae aspernatur facilis eum officia ad voluptate deleniti? Sapiente, laudantium! Temporibus repudiandae accusantium id quaerat, tenetur distinctio quis ducimus eos adipisci! Dolore maxime quod consequatur repellat, provident?</p>
  
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
$headers[] = 'From: Event Registration <no-reply@event.com>';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
?>