
<?php
        require '../../includes/app.php';//POO busca el archivo y lo enlaza 
        estaAutenticado(); // funcion de autenticacion en includes 
        //IMPORTAR CLASES
        use App\aprendiz;
        use App\Tipoidentificacion;
        use App\Programa;

        //IMPLEMENTAR METODO PARA OBTENER TODOS LOS APRENDICES UTILIZANDO ACTIVE RECORD
        $aprendiz = aprendiz::all();
        $tipoidentificacion = Tipoidentificacion::all();
        $tipoprogramas = Programa::all();

        //MOSTRANDO MENSAJE CONDICIONAL
        $resultado =$_GET['resultado'] ??null;

        if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
            //VALIDAR ID
            $id = $_POST ['id'];
            $id = filter_var ($id, FILTER_VALIDATE_INT);

            if($id){

                $tipo= $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    //COMPARAR LO QUE SE VA ELIMINAR
                    if($tipo === 'aprendiz'){
                        $aprendiz = aprendiz::find($id);
                        $aprendiz->eliminar();
                    }
                }  
            }
        }
    //INCLUIR UN TEMPLATE
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero

?>
    <main class="contenedor seccion">
        <div class="contenedor seccion">
            <div class="contabapren"> 
                <section id= "tablaAprendiz" class="seccion">
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
                            <?php foreach( $aprendiz as $aprendi ):?>
                            <tr>
                                <td> <?php echo $aprendi-> id; ?> </td>
                                <td> <?php echo $aprendi-> nombre; ?> </td>
                                <td> <?php echo $aprendi-> identificacion; ?></td>
                                <td> <?php echo $aprendi-> email; ?> </td>
                                <td> <?php echo $aprendi-> telefono; ?> </td>
                                <td>
                                <form method="POST" class="w-100" action="/admin/propiedades/consultar.php">
                                    <input type="hidden" name="id" value="<?php echo $aprendi->id; ?>">
                                    <!-- funcion para esconder el mensaje de eliminacion a usuarios -->
                                    <input type="hidden" name="tipo" value="aprendiz">    
                                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                                <!-- funcion para eliminacion usuarios -->
                                </form>
                                <a href="/admin/propiedades/actualizar.php?id=<?php echo $aprendi->id; ?>" class="boton-green-block" >Actualizar</a>
                                </td>                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        <!-- boton Volver -->
        <a href="/admin" class="boton-volver"> 
            <span class="texto-fondo">Volver</span>
        </a>
    </main> 
<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>

