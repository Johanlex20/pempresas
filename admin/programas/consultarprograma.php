<?php  
//     //VERIFICA SI LA SESSION ESTA INICIADA SI NO PUES ENVIA A VALIDACION
//     if(!isset($_SESSION)){
//         session_start();
//     }
//     $auth = $_SESSION['login'] ?? false;
// ?>

<?php
        require '../../includes/app.php';//POO busca el archivo y lo enlaza 
        estaAutenticado(); // funcion de autenticacion en includes 

        use App\Programa;

        //IMPLEMENTAR METODO PARA OBTENER TODOS LOS APRENDICES UTILIZANDO ACTIVE RECORD

        $tipoprogramas = Programa::all();

        //MOSTRANDO MENSAJE CONDICIONAL
        $resultado =$_GET['resultado'] ??null;

        if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
            
            $id = $_POST ['id'];
            $id = filter_var ($id, FILTER_VALIDATE_INT);

            if($id){

                $tipo= $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    //COMPARAR LO QUE SE VA ELIMINAR
                    if($tipo === 'tipoprograma'){
                        $tipoprogramas = Programa::find($id);
                        $tipoprogramas->eliminar();
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
                    <h1 class="admi-text-home">Consultar Tipos De Programas</h1>
                        <table class="aprendiz">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>tipo Programa</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>

                            <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                                <?php foreach( $tipoprogramas  as $tipop ):?>
                                <tr>
                                    <td> <?php echo $tipop-> id; ?> </td>
                                    <td> <?php echo $tipop-> tipoPrograma; ?> </td>
                                    <td>  
                                        <form method="POST" class="w-100" action="/admin/propiedades/consultar.php">
                                            <input type="hidden" name="id" value="<?php echo $tipop->id; ?>">
                                                <!-- funcion para esconder el mensaje de eliminacion a usuarios -->
                                            <input type="hidden" name="tipo" value="tipoprograma"> 
                                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                                                <!-- funcion para eliminacion usuarios -->
                                        </form>
                                        <a href="/admin/programas/actualizarprograma.php?id=<?php echo $tipop->id; ?>" class="boton-green-block" >Actualizar</a>
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

