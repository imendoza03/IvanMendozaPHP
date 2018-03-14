<?php

/* function to convert an amount in euros to an amount in US dollars */
function currencyConvertion($amount, $currency){
    if((is_int($amount) || is_float($amount)) && ($currency === 'USD' || 'EUR')){
        
        $euToUsRate = 1.085965;
        
        if($currency === 'USD') {
            
            $usExchange = $amount * $euToUsRate;
            return $amount . ' euro = ' . $usExchange . ' US dollars';
        }
        
        $euExchange = $amount * 0.808708;
        
        return $amount . ' dollar = ' . $euExchange . ' EU euros';
    }
    
    return 'Please enter the right currency, only USD and EUR allowed.';
}

/*Function execution for conversion from euros to dollas*/
$result = currencyConvertion(1, 'EUR');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exercise2</title>
</head>
<body>
  <h3>Exercise 2</h3>
  <!-- Diplaying of the result of the conversion -->
  <?php echo '<p>' . $result . '</p>';  ?>
</body>
</html>