<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BOOTSTRAP 5-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        .maincol {
            margin-top: 40px;
            border: 2px dashed black;
        }
    </style>
</head>

<body class="container" style="background-color:<?php echo $_COOKIE['bgColor']?>;">
    <form method="post" class="row">
        <div class="d-none d-md-block col-3"></div>
        <div class="col-md-6 maincol p-4">
            <h1 class="mx-2 p-2"><?php echo json_decode($_COOKIE['text'])[0]?></h1>
            <h4 class="text-danger mx-2"><?php echo isset($result)?$result:'';?></h4>
            <input type="text" name="mail" placeholder="<?php echo json_decode($_COOKIE['text'])[1]?>" class="form-control">
            <input type="password" name="pass" placeholder="<?php echo json_decode($_COOKIE['text'])[2]?>" class="form-control mt-1">
            <input type="submit" name="login" value="<?php echo json_decode($_COOKIE['text'])[3]?>" class="btn btn-primary mt-4">
            <input type="submit" name="enes" value="<?php echo $_COOKIE['langButton']?>" class="btn btn-primary mt-4">
        </div>
        <div class="d-none d-md-block col-3"></div>
    </form>
</body>

</html>