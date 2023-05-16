                            
                           <fieldset>
                            <legend> Información General</legend>

                           <div class="input-box">
                                <input type="text" 
                                id="titulo" 
                                name="ofertas[titulo]" 
                                placeholder="*titulo de la oferta" 
                                value="<?php echo s ( $oferta->titulo ); ?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <select type="text" 
                                id="tipoPrograma" 
                                name="ofertas[tipoPrograma]" 
                                value="<?php echo s ( $aprendiz->tipoPrograma ); ?>"  
                                class="input-control">
                                     <option selected value="">-- Seleccione Programa --</option>
                                     <?php foreach($tipoprogramas as $pro) { ?>
                                    <option 
                                    <?php echo $aprendiz->tipoPrograma === $pro->id ? 'selected' : '' ; ?>
                                    value="<?php echo s($pro->id); ?>" ><?php echo s($pro->tipoPrograma) ; ?> </option>
                                <?php } ?>  
                                </select>
                            </div>
                            <div class="input-box">
                                <input type="file" 
                                accept="imagen/jpeg, image/png"
                                id="imagen" 
                                name="ofertas[imagen]" 
                                placeholder="*imagen para la oferta" 
                                value="<?php echo s ( $oferta->imagen ); ?>" 
                                class="input-control">
                            </div>


                            </fieldset>

                            <fieldset>
                                <legend>Información Especifica</legend>
                                <div class="input-box">
                                <input type="text" 
                                id="jornada" 
                                name="ofertas[jornada]" 
                                placeholder="*Jornada laboral" 
                                value="<?php echo s ( $oferta->jornada ); ?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="text" 
                                id="modatrabajo" 
                                name="ofertas[modatrabajo]" 
                                placeholder="*Modalidad de trabajo" 
                                value="<?php echo s ( $oferta->modatrabajo ); ?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="number" 
                                id="sueldo" 
                                name="ofertas[sueldo]" 
                                placeholder="*sueldo ofertado" 
                                value="<?php echo s ( $oferta->modatrabajo ); ?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="number" 
                                id="vacantes" 
                                name="ofertas[vacantes]" 
                                placeholder="*Vacantes para la oferta Ej:3" 
                                min="1"
                                max="200"
                                value="<?php echo s ( $oferta->vacantes ); ?>" 
                                class="input-control">
                            </div>
                            </fieldset>

                            <fieldset>
                                <legend>Información Adicional</legend>
                            <div class="input-box">
                                <textarea type="text" 
                                id="descriempleo" 
                                name="ofertas[descriempleo]" 
                                placeholder="*Descripción de la oferta" 
                                value="<?php echo s ( $oferta->descriempleo ); ?>" 
                                class="input-control"></textarea>

                            </div>

                            <div class="input-box">
                                <textarea type="text" 
                                id="respon" 
                                name="ofertas[respon]" 
                                placeholder="*Responsabilidades del trabajo" 
                                value="<?php echo s ( $oferta->respon ); ?>" 
                                class="input-control"></textarea>
                            </div>
                            <div class="input-box">
                                <textarea type="text" 
                                id="reque" 
                                name="ofertas[reque]" 
                                placeholder="*Requerimientos del postulante" 
                                value="<?php echo s ( $oferta->reque ); ?>" 
                                class="input-control"></textarea>
                            </div>
                            
                            </fieldset>

                            <fieldset>
                                <legend>Información Empresa </legend>
                            <div class="input-box">
                                <input type="text" 
                                id="razonsocial" 
                                name="ofertas[razonsocial]" 
                                placeholder="*Empresa que publica la oferta" 
                                value="<?php echo s ( $aprendiz->nombre ); ?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <select type="text" 
                                id="tipoId" 
                                name="ofertas[tipoId]" 
                                value="<?php echo s ( $aprendiz->tipoId ); ?>"  
                                class="input-control">
                                     <option selected value="">-- *Seleccione Identificación --</option>
                                     <?php foreach($tipoidentificacion as $tipo) { ?>
                                    <option 
                                    <?php echo $aprendiz->tipoId === $tipo->id ? 'selected' : '' ; ?>
                                    value="<?php echo s($tipo->id); ?>" ><?php echo s($tipo->tipoId) ; ?> </option>
                                <?php } ?>  
                                </select>
                            </div>
                            <div class="input-box">
                                <input type="number" 
                                id="identificacion" 
                                name="ofertas[identificacion]"  
                                placeholder="*Identificación" 
                                value="<?php echo s ( $aprendiz->identificacion );?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="text" 
                                id="direccionEmp" 
                                name="ofertas[direccionEmp]" 
                                placeholder="*Dirección de la Empresa" 
                                value="<?php echo s ( $aprendiz->nombre ); ?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="number" 
                                id="telefono" 
                                name="ofertas[telefono]" 
                                placeholder="*telefono" 
                                value="<?php echo s ( $aprendiz->telefono );?>"  
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input 
                                type="email" 
                                id="email" 
                                name="ofertas[email]" 
                                placeholder="*Email" 
                                value="<?php echo s ( $aprendiz->email );?>" 
                                class="input-control">
                            </div>
                            </fieldset>




                          