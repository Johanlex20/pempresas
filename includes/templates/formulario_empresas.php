                            <fieldset>
                                <legend> Información General</legend>
                                <div class="input-box">
                                    <input type="text" 
                                    id="razonsocial" 
                                    name="empresas[razonsocial]" 
                                    placeholder="*Razon social Completa" 
                                    value="<?php echo s ( $empresa->razonsocial ); ?>" 
                                    class="input-control">
                                </div>
                                
                                <div class="input-box">
                                    <select type="text" 
                                    id="tipoId" 
                                    name="empresas[tipoId]" 
                                    value="<?php echo s ( $empresa->tipoId ); ?>"  
                                    class="input-control">
                                        <option selected value="">-- *Seleccione Identificación --</option>
                                        <?php foreach($tipoidentificacion as $tipo) { ?>
                                        <option 
                                        <?php echo $empresa->tipoId === $tipo->id ? 'selected' : '' ; ?>
                                        value="<?php echo s($tipo->id); ?>" ><?php echo s($tipo->tipoId) ; ?> </option>
                                    <?php } ?>  
                                    </select>
                                </div>
                                <div class="input-box">
                                    <input type="number" 
                                    id="identificacionemp" 
                                    name="empresas[identificacionemp]"  
                                    placeholder="*Identificación" 
                                    value="<?php echo s ( $empresa->identificacionemp );?>" 
                                    class="input-control">
                                </div>
                                <div class="input-box">
                                    <input type="text" 
                                    id="direccionemp" 
                                    name="empresas[direccionemp]"  
                                    placeholder="*Direccion de la Empresa" 
                                    value="<?php echo s ( $empresa->direccionemp );?>" 
                                    class="input-control">
                                </div>
                                <div class="input-box">
                                    <input type="number" 
                                    id="telefonoemp" 
                                    name="empresas[telefonoemp]" 
                                    placeholder="*telefono" 
                                    value="<?php echo s ( $empresa->telefonoemp );?>"  
                                    class="input-control">
                                </div>
                            </fieldset>
                            <fieldset> 
                                <legend>Información Especifica</legend>
                                <div class="input-box">
                                    <input 
                                    type="email" 
                                    id="emailemp" 
                                    name="empresas[emailemp]" 
                                    placeholder="*Email" 
                                    value="<?php echo s ( $empresa->emailemp );?>" 
                                    class="input-control">
                                </div>
                                <div class="input-box">
                                    <input type="password" 
                                    id="passwordemp" 
                                    name="empresas[passwordemp]" 
                                    placeholder="*Password" 
                                    value="<?php echo s ($empresa->passwordemp);?>"  
                                    class="input-control">
                                </div>
                            </fieldset>
                               
                            <fieldset>
                                <legend>Ingrese Imagen o Logo de la Empresa</legend>
                                <div class="input-box">
                                    <input type="file" 
                                    accept="image/jpeg, image/png"
                                    id="imagen" 
                                    name="empresas[imagen]" 
                                    placeholder="*imagen o logo para la Empresa" 
                                    value="<?php echo s ( $empresa->imagen ); ?>" 
                                    class="input-control">
                                            <?php if ($empresa->imagen) { ?>
                                                <img src="/src/img/<?php echo $empresa->imagen; ?>" class="imagen-small"> 
                                            <?php } ?>
                                </div>
                            </fieldset>