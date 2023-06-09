<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Website</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
    <h1><a href="/">Table</a></h1>
    <main>
        <h1>Currency conversion</h1>  
        <form method="post">
          <label for="currency1">Currency From:</label>
          <select id="currency1" name="currency1">
            <?php foreach ($currencyObjectsArray as $currency): ?>
              <option value="<?php echo $currency->code; ?>"><?php echo strtoupper($currency->currency); ?></option>
            <?php endforeach; ?>
          </select>

          <label for="currency2">Currency To:</label>
          <select id="currency2" name="currency2">
            <?php foreach ($currencyObjectsArray as $currency): ?>
              <option value="<?php echo $currency->code; ?>"><?php echo strtoupper($currency->currency); ?></option>
            <?php endforeach; ?>
          </select>

          <label for="amount">Amount:</label>
          <input type="number" id="amount" name="amount" placeholder="Enter amount" required>

          <button type="submit">Submit</button>
        </form>

        <h2>
          <?php
            if (!empty($error)) {
                echo $error[0];
            }
          ?>
        </h2>

        <h1>Last Exchanges:</h1>  
        <table>
          <thead>
            <tr>
              <th>From</th>
              <th>To</th>
              <th>Amount</th>
              <th>Result</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($exchangeObjectsArray as $exchange): ?>
              <tr>
                <td><?php echo strtoupper($exchange->currencyFromCurrency); ?></td>
                <td><?php echo strtoupper($exchange->currencyToCurrency); ?></td>
                <td><?php echo $exchange->amount; ?></td>
                <td><?php echo $exchange->result; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </main>
  </body>
</html>