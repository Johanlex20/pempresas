<?php
        require '../../includes/app.php';//POO busca el archivo y lo enlaza 
        estaAutenticado(); // funcion de autenticacion en includes 
        //IMPORTAR CLASES
        use App\Empresas;

        //IMPLEMENTAR METODO PARA OBTENER TODOS LOS APRENDICES UTILIZANDO ACTIVE RECORD
        $empresa = Empresas::all();
        
        //MOSTRANDO MENSAJE CONDICIONAL
        $resultado =$_GET['resultado'] ??null;

        if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
            //VALIDAR ID
            $id = $_POST ['id'];
            $id = filter_var ($id, FILTER_VALIDATE_INT);

            if($id){
                $empresa = Empresas::find($id);
                $empresa->eliminar();

                $tipo= $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    //COMPARAR LO QUE SE VA ELIMINAR
                    if($tipo === 'empresas'){
                        $empresa = Empresas::find($id);
                        $empresa->eliminar();
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
                    <h1 class="admi-text-home">Consultar Empresa</h1>
                <!-- TABLA DE CONSULTA INDEX ADMIN-->
                    <table class="aprendiz">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Razon Social</th>
                                <th>identificacion</th>
                                <th>Logo</th>
                                <th>email</th>
                                <th>telefono</th>
                                <th>Dirección</th>
                                <th>acciones</th>
                            </tr>
                        </thead>

                        <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                            <?php foreach( $empresa as $empre ):?>
                            <tr>
                                <td> <?php echo $empre-> id; ?> </td>
                                <td> <?php echo $empre-> razonsocial; ?> </td>
                                <td> <?php echo $empre-> identificacionemp; ?></td>
                                <td> <img src="/src/img/<?php echo $empre->imagen; ?>" class="imagen-tabla"> </td>
                                <td> <?php echo $empre-> emailemp; ?> </td>
                                <td> <?php echo $empre-> telefonoemp; ?> </td>
                                <td> <?php echo $empre-> direccionemp; ?> </td>
                                <td>

                                <form method="POST" class="w-100" action="/admin/empresas/consultarempre.php">
                                    <input type="hidden" name="id" value="<?php echo $empre->id; ?>">
                                    <!-- funcion para esconder el mensaje de eliminacion a usuarios -->
                                    <input type="hidden" name="tipo" value="empresas">    
                                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                                <!-- funcion para eliminacion usuarios -->
                                </form>
                                <a href="/admin/empresas/actualizarempre.php?id=<?php echo $empre->id; ?>" class="boton-green-block" >Actualizar</a>
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
