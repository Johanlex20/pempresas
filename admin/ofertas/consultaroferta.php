<?php
        require '../../includes/app.php';//POO busca el archivo y lo enlaza 
        estaAutenticado(); // funcion de autenticacion en includes 
        use App\ofertas;

        //IMPLEMENTAR METODO PARA OBTENER TODOS LOS REGISTROS UTILIZANDO ACTIVE RECORD
        $oferta = ofertas::all();
        

        //MOSTRANDO MENSAJE CONDICIONAL
        $resultado = $_GET['resultado'] ??null;

        if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
            
            $id = $_POST ['id'];
            $id = filter_var ($id, FILTER_VALIDATE_INT);

            if($id){

                $tipo= $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    //COMPARAR LO QUE SE VA ELIMINAR
                    if($tipo === 'titulo'){
                        $titulo = ofertas::find($id);
                        $titulo->eliminar();
                    }
                }  
            }
        }

    //INCLUIR UN TEMPLATE
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero

?>
    <main class="contenedor seccion">
        <div class="contenedor seccion">
            <div class="contabprog"> 
                <section id= "tablaPrograma" class="seccion"> 
                    <h1 class="admi-text-home">Consultar Tipos De Ofertas</h1>
                        <table class="aprendiz">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo Ofertas</th>
                                    <th>Tipo Programa</th>
                                    <th>Imagen</th>
                                    <th>Jornada</th>
                                    <th>Modalida</th>
                                    <th>Sueldo</th>
                                    <th>vacantes</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>

                            <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                                <?php foreach( $oferta  as $ofer ):?>
                                <tr>
                                    <td> <?php echo $ofer-> id; ?> </td>
                                    <td> <?php echo $ofer-> titulo; ?> </td>
                                    <td> <?php echo $ofer-> tipoPrograma; ?> </td>
                                    <td> <img src="/imagenes/<?php echo $ofer->imagen; ?>" class="imagen-tabla"> </td>
                                    <td> <?php echo $ofer-> jornada; ?> </td>
                                    <td> <?php echo $ofer-> modatrabajo; ?> </td>
                                    <td> <?php echo $ofer-> sueldo; ?> </td>
                                    <td> <?php echo $ofer-> vacantes; ?> </td>
                                    <td>  
                                        <form method="POST" class="w-100" action="/admin/ofertas/consultarofertas.php">
                                            <input type="hidden" name="id" value="<?php echo $ofer->id; ?>">
                                                <!-- funcion para esconder el mensaje de eliminacion a usuarios -->
                                            <input type="hidden" name="id" value="<?php echo $ofer->id; ?>"> 
                                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                                                <!-- funcion para eliminacion usuarios -->
                                        </form>
                                        <a href="/admin/ofertas/actualizaroferta.php?id=<?php echo $ofer->id; ?>" class="boton-green-block" >Actualizar</a>
                                    </td>
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

