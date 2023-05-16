                            <div class="input-box">
                                <input type="text" 
                                id="razonsocial" 
                                name="empresas[razonsocial]" 
                                placeholder="*Razon social Completa" 
                                value="<?php echo s ( $aprendiz->nombre ); ?>" 
                                class="input-control">
                            </div>
                            
                            <div class="input-box">
                                <select type="text" 
                                id="tipoId" 
                                name="aprendiz[tipoId]" 
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
                                id="identificacionemp" 
                                name="empresas[identificacionemp]"  
                                placeholder="*Identificación" 
                                value="<?php echo s ( $aprendiz->identificacion );?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="text" 
                                id="direccionemp" 
                                name="empresas[direccionemp]"  
                                placeholder="*Direccion de la Empresa" 
                                value="<?php echo s ( $aprendiz->identificacion );?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="number" 
                                id="telefonoemp" 
                                name="empresas[telefonoemp]" 
                                placeholder="*telefono" 
                                value="<?php echo s ( $aprendiz->telefono );?>"  
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input 
                                type="email" 
                                id="emailemp" 
                                name="empresas[emailemp]" 
                                placeholder="*Email" 
                                value="<?php echo s ( $aprendiz->email );?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="password" 
                                id="passwordemp" 
                                name="empresas[passwordemp]" 
                                placeholder="*Password" 
                                value="<?php echo s ($aprendiz->password);?>"  
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="file" 
                                accept="image/jpeg, image/png"
                                id="imagen" 
                                name="oferta[imagen]" 
                                placeholder="*imagen o logo de la empresa" 
                                value="<?php echo s ( $aprendiz->nombre ); ?>" 
                                class="input-control">
                            </div>
                          