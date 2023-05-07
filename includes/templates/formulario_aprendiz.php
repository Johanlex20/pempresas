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
                                     <option value="">*Seleccione identificación</option>
                                     <?php while ($tipoidentificacion = mysqli_fetch_assoc($resultado1)) : ?>
                                        <option <?php echo $tipoId === $tipoidentificacion ['idtipoId'] ? 'selected' : ''; ?>   value="<?php echo $tipoidentificacion ['idtipoId'] ?>"> <?php echo $tipoidentificacion ['tipoId'];?> </option>
                                     <?php endwhile; ?>
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
                                id="programa" 
                                name="aprendiz[programa]" 
                                value="<?php echo s ( $aprendiz->programa );?>" 
                                class="input-control">
                                        <option value="">Seleccione Programa</option>
                                        <?php while ($tipoPrograma = mysqli_fetch_assoc($resultado)) :?>
                                           <option <?php echo $programa === $tipoPrograma ['idprograma'] ? 'selected' : ''; ?> value="<?php echo $tipoPrograma ['idprograma'] ?>"> <?php echo $tipoPrograma ['tipoPrograma'] ;?> </option>
                                        <?php endwhile;?> 
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