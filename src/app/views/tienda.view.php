<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BOOTSTRAP 5-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tienda</title>
    <style>
        body {
            padding-top: 40px;
            background-color: lavender;
        }

        input {
            font-size: 0.8rem;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        img {
            width: 100%;
            height: 65%;
        }

        #maincol {
            border: 2px dashed black;
            padding: 40px;
        }

        #cart {
            border: 2px dashed black;
            padding: 40px;
        }

        .prod {
            border: 1px solid black;
            height: 350px;
        }

        .badge {
            border-color: #0d6efd;
        }

    </style>
</head>
<body>
    <form action="" method="post" class="container">
        <div class="row">
            <div class="d-none d-md-block col-md-3"></div>
            <div class="col-md-6" id="maincol">
                <h1>Compra!</h1>
                <div class="row g-2">
                <?php 

                    foreach ($products as $product) {
                        ?>
                            <div class="col-6">
                                <div class="p-3 prod bg-light">
                                    <img src="productos/<?php echo ''?>" alt="">
                                    <h5><?php echo $product->getNombre()?></h5>
                                    <h6><?php echo $product->getPrecio()?>€</h6>
                                    <button type="submit" name="add<?php echo $product->getNumProducto()?>" class="btn btn-primary d-block m-auto mt-3">Añadir al carro</button>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                </div>
            </div>
            <div class="d-none d-md-block col-md-3" >
                <div class="p-3" id="cart">
                    <h1>Tu cesta</h1>
                    <ul>
                        <?php
                            $total = 0;
                            
                            if (isset($_SESSION['cart'])) {
                                
                                foreach ($_SESSION['cart'] as $product) {
                                    $product = unserialize($product);
                                    echo "<li>" . $product[0]->getNombre() . "</li>";
                                }
                                
                            }
                        ?>
                    </ul>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h3>Total: </h3>
                        <h3><?php echo $total;?>€</h3>
                    </div>
                    <button type="submit" name="emptyCart" class="btn btn-primary d-block m-auto mt-3">Vaciar carro</button>
                    <button type="submit" name="logout" class="btn btn-primary d-block m-auto mt-3">Cerrar sesión</button>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>