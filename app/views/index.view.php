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
    <main>
        <h1>Table</h1>  
        <table>
          <thead>
            <tr>
              <th>Currency</th>
              <th>Code</th>
              <th>Mid</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($currencyObjectsArray as $currency): ?>
              <tr>
                <td><?php echo $currency->currency; ?></td>
                <td><?php echo $currency->code; ?></td>
                <td><?php echo $currency->mid; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </main>
  </body>
</html>