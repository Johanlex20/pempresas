<?php  
    //VERIFICA SI LA SESSION ESTA INICIADA SI NO PUES ENVIA A VALIDACION
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<?php
        require '../../includes/app.php';//POO busca el archivo y lo enlaza 
        estaAutenticado(); // funcion de autenticacion en includes 

        // IMPORTAR LA CONEXION
        $db = conectarDB();

        // ESCRIBIR EL QUERY

        $query = "SELECT * FROM aprendiz";

        // CONSULTAR LA BD

        $resultadoConsulta = mysqli_query($db, $query);



        //MOSTRANDO MENSAJE CONDICIONAL
        $resultado =$_GET['resultado'] ??null;


        if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
            $id = $_POST ['id'];
            $id = filter_var ($id, FILTER_VALIDATE_INT);

            if($id){

                //ELIMINAR APRENDIZ 
                $query = "DELETE FROM aprendiz WHERE id = $id";

                $resultado4 = mysqli_query($db, $query);
                if ($resultado4){

                    echo "Eliminado Correctamente";
                    //REDIRECCION DE USUARIO PARA EVITAR DUPLICAR DATOS
                    header('location:/admin/?resultado4=4');
                }
            }

        }

    //INCLUIR UN TEMPLATE
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero

?>
    <main class="contenedor seccion">
        <h1 class="admi-text-home">Consultar aprendiz</h1>

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

                    <form method="POST" class="w-100" action="/admin/propiedades/consultar.php">

                        <input type="hidden" name="id" value="<?php echo $aprendiz ['id']; ?>">
                        <!-- funcion para esconder el mensaje de eliminacion a usuarios -->

                       <input type="submit" class="boton-rojo-block" value="Eliminar">
                       <!-- funcion para eliminacion usuarios -->
                    </form>

                       <a href="/admin/propiedades/actualizar.php?id=<?php echo $aprendiz ['id']; ?>" class="boton-green-block" >Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


        <a href="/admin" class="boton-volver">  <!--necesita estilos-->
            <span class="texto-fondo">Volver</span>
        </a>

    </main> 

<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>

