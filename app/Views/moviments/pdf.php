<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="<?php echo base_url ()?>/public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Description</th>
                <th scope="col">Value</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($moviments AS $moviment) : ?>
                <!--?= var_dump($moviment->id); ?-->
            <tr>
                <td><?= $moviment->id ?></td>
                <td><?= $moviment->date ?></td>
                <td><?= $moviment->description ?></td>
                <td><?= $moviment->value ?></td>
                <td><?= $moviment->type ?></td>
            </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>