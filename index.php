<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<script>
    function confirmacion(){
        var respuesta = confirm("¿Confirma que desea borrar el registro?");
        if(respuesta == true){
        return true;
        }else {
        return false;
        }
    }
</script>
<body>
    <?php
    require 'conexion.php';

    $sql= "SELECT * FROM productos INNER JOIN categorias ON productos.categorias=categorias.id_categoria;";
    $resultado= $conn->query($sql);
    ?>
    <div>
        <h1 class="cabecera bg-black b-2 text-while text-center" >Mostrar Registros</h1>
    </div>
    <div calss="contenedor">
       

        <table class=" table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">producto</th>
                    <th scope="col">percio</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">categorias</th>
                    <th scope="col">editar</th>
                    <th scope="col">borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <tr>
                        <td scope="row"><?php echo $fila['producto']?></td>
                        <td scope="row"><?php echo $fila['precio']?></td>
                        <td scope="row"><?php echo $fila['descripcion']?></td>
                        <td scope="row"><?php echo $fila['categorias']?></td>
                        <td>
                            <a href="editar.php?id_productos=<?php echo $fila['id_productos']?>"><i class="fa-solid fa-file-pen fa-xl" style="color: #d29719;"></i></a>
                        </td>
                        <td>
                            <a href="eliminar.php?id_productos=<?php echo $fila['id_productos']?>"  onclick="return confirmacion()"><i class="fa-solid fa-trash fa-xl" style="color: #fa3200;"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button class="crear"><a href="index.php">Agregar Nuevo Registro</a></button>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>