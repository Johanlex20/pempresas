                            <div class="input-box">
                                <input type="text" 
                                id="nombre" 
                                name="aprendiz[nombre]" 
                                placeholder="*Nombre usuario Completo" 
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
                                id="identificacion" 
                                name="aprendiz[identificacion]"  
                                placeholder="*Identificación" 
                                value="<?php echo s ( $aprendiz->identificacion );?>" 
                                class="input-control">
                            </div>

                            <div class="input-box">
                                <select type="text" 
                                id="tipoPrograma" 
                                name="aprendiz[tipoPrograma]" 
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
                                <input 
                                type="email" 
                                id="email" 
                                name="aprendiz[email]" 
                                placeholder="*Email" 
                                value="<?php echo s ( $aprendiz->email );?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="password" 
                                id="password" 
                                name="aprendiz[password]" 
                                placeholder="*Password" 
                                value="<?php echo s ($aprendiz->password);?>"  
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="number" 
                                id="telefono" 
                                name="aprendiz[telefono]" 
                                placeholder="*telefono" 
                                value="<?php echo s ( $aprendiz->telefono );?>"  
                                class="input-control">
                            </div>

                          