<!DOCTYPE html>
<?php error_reporting(0); ?>
<html lang="en">
  <head>
    <title>Aaron's Portfolio | Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Kanit|Lobster|Nunito&display=swap" rel="stylesheet">
    <link href="css/form.css" type="text/css" rel="stylesheet">
    <link href="img/favicon.jpg" rel='icon' type="image/x-icon" />
  </head>
  <body>
    <script src="https://www.google.com/recaptcha/api.js?render=6LcSnN0UAAAAAJni7HTmBC1qIbrXqTNhflm7vuvl"></script>
	<script>
		grecaptcha.ready(function() {
    		grecaptcha.execute('6LcSnN0UAAAAAJni7HTmBC1qIbrXqTNhflm7vuvl', {action: 'homepage'}).then(function(token) {
       		...
    		});
		});
	</script>
    
    <?php
      if(isset($_POST['submit'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
        if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
          $name_error = 'Invalid name';
        }
        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
          $email_error = 'Invalid email';
        }
        if(strlen($message) === 0){
          $message_error = 'Your message should not be empty';
        }
      }
    ?>
    <div class="linegradient"></div>
    <a class="home" href="https://aarondguyett.com"><div>Go Back</div></a>
    <h1>Thanks for considering conversing with me. Get your thoughts out through this nifty form.</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="name content">
            <label for="name">Name</label><br>
            <input class="input" type="text" name="name">
            <p class="alert"><?php if(isset($name_error)) echo $name_error; ?></p>
        </div>
        <div class="email content">
            <label for="email">Email</label><br>
            <input class="input" type="text" name="email">
            <p class="alert"><?php if(isset($email_error)) echo $email_error; ?></p>
        </div>
        <div class="message content">
            <label for="message">Message</label><br>
            <textarea class="textarea" name="message" rows="5" cols="78"></textarea>
            <p class="alert"><?php if(isset($message_error)) echo $message_error; ?></p>
        </div>
        <div class="submit">
            <button type="submit" name="submit" value="Submit">Submit</button>
        </div>
        <?php 
            if(isset($_POST['submit']) && !isset($name_error) && !isset($email_error) && !isset($message_error)){
                $to = 'aaronguyett@yahoo.com';
                $body = " Name: $name\n E-mail: $email\n Message:\n $message";
                if(mail($to, "Form Response", " Name: $name\n E-mail: $email\n Message:\n $message")){
                    echo '<p style="color: green">Thank you! I\'ll contact you soon!</p>';
                }else{
                    echo '<p>Error occurred, please try again later</p>';
                }
            }
        ?>
    </form>
  
  </body>
</html>