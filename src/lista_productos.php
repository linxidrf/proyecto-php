<?php

require '../config/conexion.php';

$db = conectarDB();

$sql = "SELECT * FROM producto";
$resultado = mysqli_query($db, $sql);

?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Productos</title>
</head>

<body>
    <main class="table">
        <section class="table__header">
            <h1>Inventario Productos</h1>
<div>
<a href=<?php echo '../src/producto.php' .  ' button class="boton">' ?> Agregar</a>
            <a href=<?php echo '../src/logout.php' .  ' button class="boton">' ?> Salir</a>
</div>
        </section>



        <section class='table__body'>
            <table>
                <thead>
                    <th> Codigo </th>
                    <th> Nombre</th>
                    <th> Precio</th>
                    <th> Unidad Media</th>
                    <th> Stock</th>
                    <th> Descripcion </th>
                    <th> Editar - Eliminar</th>
                </thead>
                <tbody>
                    <?php while ($producto = mysqli_fetch_assoc($resultado)) : ?>
                        <tr>
                            <td> <?php echo $producto['prod_codigo'] ?></td>
                            <td> <?php echo $producto['prod_nombre'] ?></td>
                            <td> <?php echo $producto['prod_precioVenta'] ?></td>
                            <td> <?php echo $producto['prod_unidaMedia'] ?></td>
                            <td> <?php echo $producto['prod_Stock'] ?></td>
                            <td> <?php echo $producto['prod_descripcion'] ?></td>
                            <td>
                                <a href=<?php echo '../src/producto.php?cod_producto=' . $producto['prod_codigo'] . ' boton class="boton">' ?><i class='fas fa-edit'></i></button></a> - 
                                <a href=<?php echo '../src/eliminar.php?cod_producto=' . $producto['prod_codigo'] . ' boton class="boton trash">' ?><i class='fas fa-trash-alt'></i></button></a>
                            </td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>