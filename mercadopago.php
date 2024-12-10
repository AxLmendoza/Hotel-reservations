<!-- PHP -->
<?php
require __DIR__ . '/vendor/autoload.php';

// Configurar el token de acceso
MercadoPago\SDK::setAccessToken('TEST----');

// Crear la preferencia
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "https://tusitio.com/pagoExitoso.html",
    "failure" => "https://tusitio.com/pagoFallido.html",
    "pending" => "https://tusitio.com/pagoPendiente.html"
);
$preference->auto_return = "approved";

// Definir el ítem
$item = new MercadoPago\Item();
$item->title = "Producto 1";
$item->quantity = 1;
$item->unit_price = 800;
$preference->items = array($item);

// Guardar la preferencia
$preference->save();
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercadoPago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }


        .btnPagar {
            width: 100%;
            padding: 10px 20px;
            background-color: #2dce89;
            color: #fff;
            border: none;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btnPagar:hover {
            background-color: #28a865;
            transform: scale(1.05);
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .product {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 220px;
            margin: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .product img {
            max-width: 100%;
            border-radius: 8px;
        }

        .product h3 {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }

        .product p {
            font-size: 14px;
            color: #666;
            margin: 5px 0;
        }

        .product span {
            font-size: 16px;
            color: #2dce89;
            font-weight: bold;
        }

        .product form {
            margin-top: 10px;
        }

        .product button {
            background-color: #2dce89;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .product button:hover {
            background-color: #28a865;
        }
    </style>
</head>
<body>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('TEST', {
            locale: 'es-AR'
        });

        const checkout = mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>'
            },
            render: {
                container: '.btnPagar',
                label: 'Pagar'
            }
        });
    </script>

    <!-- Contenedor para el botón -->
    <div class="btnPagar"></div>

    <!-- Enlace directo al pago -->


    
    <h1>Tambien te puede interesar </h1>

<!--Compra de productos -->
<div class="product-container">
   <!-- Producto 1 -->
   <div class="product">
       <img src="img/50 Funda Protectores De Hojas Carta A4 Documentos Carpeta Sobre.jpg" alt="Producto 1">
       <h3>Producto 1</h3>
       <p>Descripción del producto 1</p>
       <span>Precio: $200.00</span>
       <form action="mandaralcarrito.php" method="POST">
           <input type="hidden" name="product_name" value="Producto 1">
           <input type="hidden" name="product_price" value="200.00">
           <input type="hidden" name="product_description" value="Descripción del producto 1">
           <button type="submit">Añadir al carrito</button>
       </form>
   </div>

   <!-- Producto 2 -->
   <div class="product">
       <img src="img/51ZPPNZo5IL._AC_SX522_.jpg" alt="Producto 2">
       <br>
   <br>
   <br>
   <br><br>
       <h3>Producto 2</h3>
       <p>Descripción del producto 2</p>
       <span>Precio: $250.00</span>
       <form action="mandaralcarrito.php" method="POST">
           <input type="hidden" name="product_name" value="Producto 2">
           <input type="hidden" name="product_price" value="250.00">
           <input type="hidden" name="product_description" value="Descripción del producto 2">
           <button type="submit">Añadir al carrito</button>
       </form>
   </div>

   
<!-- Producto 2 -->
<div class="product">
   <img src="img/6 piezas Pluma de gel portátil.jpg" alt="Producto 2">
   <h3>Producto 2</h3>
   <p>Descripción del producto 2</p>
   <span>Precio: $250.00</span>
   <form action="mandaralcarrito.php" method="POST">
       <input type="hidden" name="product_name" value="Producto 2">
       <input type="hidden" name="product_price" value="250.00">
       <input type="hidden" name="product_description" value="Descripción del producto 2">
       <button type="submit">Añadir al carrito</button>
   </form>
</div>

<!-- Repite los demas productos... -->

<div class="product">
   <div data-aos="fade-up"></div>
   <br>
   <img src="img/Carpeta con pespunte tamaño carta hecha en piel.jpg" alt="Producto 2">
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <h3>Producto 2</h3>
   <p>Descripción del producto 2</p>
   <span>Precio: $250.00</span>
   <form action="mandaralcarrito.php" method="POST">
       <input type="hidden" name="product_name" value="Producto 2">
       <input type="hidden" name="product_price" value="250.00">
       <input type="hidden" name="product_description" value="Descripción del producto 2">
       <button type="submit">Añadir al carrito</button>
   </form>
</div>



</body>
</html>
