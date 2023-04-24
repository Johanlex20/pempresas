
<?php
    
        // IMPORTAR LA CONEXION

        require '../../includes/config/database.php';
        $db = conectarDB();

        // ESCRIBIR EL QUERY

        $query = "SELECT * FROM aprendiz";

        // CONSULTAR LA BD

        $resultadoConsulta = mysqli_query($db, $query);



        //MOSTRANDO MENSAJE CONDICIONAL
        $resultado =$_GET['resultado'] ??null;




    //INCLUIR UN TEMPLATE
    require '../../includes/funciones.php';
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero

 


?>


    <main class="contenedor seccion">
        <h1 class="admi-text">Consultar aprendiz</h1>


        <!-- TABLA DE CONSULTA INDEX ADMIN-->

        <table class="aprendiz">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nombre</th>
                    <th>identificacion</th>
                    <th>email</th>
                    <th>telefono</th>
                    <th>acciones</th>
                </tr>
            </thead>

            <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                <?php while ( $aprendiz = mysqli_fetch_assoc($resultadoConsulta)):?>
                <tr>
                    <td> <?php echo $aprendiz ['id']; ?> </td>
                    <td> <?php echo $aprendiz ['nombre']; ?> </td>
                    <td> <?php echo $aprendiz ['identificacion']; ?></td>
                    <td> <?php echo $aprendiz ['email']; ?> </td>
                    <td> <?php echo $aprendiz ['telefono']; ?> </td>
                    <td>
                       <a href="#" class="boton-rojo-block" >Eliminar</a>
                       <a href="/admin/propiedades/actualizar.php?id=<?php echo $aprendiz ['id']; ?>" class="boton-green-block" >Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main> 


        <a href="/admin" class="boton-volver">  <!--necesita estilos-->
            <span class="texto-fondo">Volver</span>
        </a>
    </main> 

    


<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>

