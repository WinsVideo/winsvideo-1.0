<html>
      <head>
        <title>reCAPTCHA V2 demo by softlivre.com.br</title>
         <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      </head>
      <body>
        <form action="index.php" method="POST">
          <!-- here you must input the site key, not the secret key -->
          <div class="g-recaptcha" data-sitekey="6Le94rQZAAAAAKObxHdX64jLphtSrXsY4YxPLCf8"></div>
          <br/>
          <input type="submit" value="Submit">
        </form>
      </body>

    <?php

    error_reporting(0); 
    // here you must input the secret key, not the site key
    // don´t worry, it is server side protected and won´t be
    // visible under the page source, it´s php code from now on...
    $secret = "6Le94rQZAAAAAMfdgGJGTP5KcskcooCZymar7UZK";

    // set post fields
    $post = [
        'secret' => $secret,
        'response' => $_POST['g-recaptcha-response'],
        'remoteip'   => $_SERVER['REMOTE_ADDR']
    ];

    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    // execute!
    $response = curl_exec($ch);

    // close the connection, release resources used
    curl_close($ch);

    // do anything you want with your response
    // var_dump(json_decode($response)); // uncomment this to get the json full response
    $array = json_decode($response,true);
    //echo "<pre/>";print_r($array); // uncomment this to get the json to array full response/results

    if($array['success'] == 1){
    // here we have confirmed the chalenge, do whatever you want here, as redirecting to another
    // page. i suggest using $_SESSION in order for really protecting the other page to be
    // redirected from here to be safe, else anyone may access the other page directly 
    // without passing by the recapctha challenge, so there won´t be any point in this effort!
        echo "success!" ;
    }
    else{
        echo "Challenge not accepted so far....";
    }
    ?>

    </html>