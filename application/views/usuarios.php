
		<!-- main -->
		<main>			
			
			<div class="centrado">
			
			    <div class="row">
			        <div class="col s12 m10 offset-m1">
			            <div class="col s12 l4">
			                <div class="card white">
			                <?php 
			                if (isset($usuario)): ?>
			                	<form method="POST" action="<?php echo base_url().'usuarios/modificar' ?>">
			            	<?php else: ?>
			            		<form method="POST" action="<?php echo base_url().'usuarios/signin' ?>">
			            	<?php endif; ?>
			                        <div class="card-content">
			                            <span class="card-title"><?php if (isset($usuario)) echo 'Modificar'; else echo 'Crear' ?> Usuario</span>
			                            <div class="row">
			                                <div class="input-field col s12">
			                                    <input name="username" id="username" type="text" class="validate" pattern="[A-Za-z ]+" title="Solo se permiten letras" maxlength="250" value="<?php if (isset($usuario)) echo $usuario['username'] ?>" <?php if (isset($usuario)) echo 'readonly'; ?>>
			                                    <label>Nombre de Usuario</label>
			                                </div>
			                            </div>
			                            <div class="row">
			                                <div class="input-field col s12">
			                                    <input name="name" id="name" type="text" maxlength="250" class="validate" pattern="[A-Za-z ]+" title="Solo se permiten letras" <?php if (($usuario['tipo']=='1')&&($session['superadmin']!=true)) echo 'readonly'?> value="<?php if (isset($usuario)) echo $usuario['nombre'] ?>">
			                                    <label>Nombre</label>
			                                </div>
			                            </div>
			                            <div class="row">
			                                <div class="input-field col s12">
			                                    <input name="lastname" id="lastname" type="text" maxlength="250" class="validate" pattern="[A-Za-z ]+" title="Solo se permiten letras" <?php if (($usuario['tipo']=='1')&&($session['superadmin']!=true)) echo 'readonly'?> value="<?php if (isset($usuario)) echo $usuario['apellido'] ?>">
			                                    <label>Apellidos</label>
			                                </div>
			                            </div>	
			                            <div class="row">
			                                <div class="input-field col s12">
			                                    <input name="email" id="email" type="email" class="validate" <?php if (($usuario['tipo']=='1')&&($session['superadmin']!=true)) echo 'readonly'?> value="<?php if (isset($usuario)) echo $usuario['email'] ?>">
			                                    <label>Email</label>
			                                </div>
			                            </div>	
			                            <div class="row">
			                                <label>Tipo</label>
			                                <div class="col s12 input-field inline">
			                                    <p>
			                                        <input name="tipo" type="radio" <?php if (($usuario['tipo']=='1')&&($session['superadmin']!=true)) echo 'disabled'?> value="0" <?php if (isset($usuario) and ($usuario['tipo']==0)) echo "checked='checked'"; if (!isset($usuario)) echo "checked='checked'"; ?> id="bann" />
			                                        <label for="bann">Invitado</label>
			                                    </p>
			                                    <?php if ( ($session['superadmin']==true)): ?>
			                                    <p>
			                                        <input name="tipo" type="radio" <?php if (($usuario['tipo']=='1')&&($session['superadmin']!=true)) echo 'disabled'?> value="1" <?php if (isset($usuario) and ($usuario['tipo']==1)) echo "checked='checked'"; ?> id="act"/>
			                                        <label for="act">Administrador</label>
			                                    </p>
			                                    <?php endif; ?>
			                                </div>			                                
			                            </div>
			                        </div>	
			                        <div>
			                        </div>		
			                        <?php if ( ($usuario['tipo']!='1')||($session['superadmin']==true)): ?>                     
			                        <div class="card-action center-align">
			                            <input type="submit" id="usuarioadd" class="btn itami" value="<?php if (isset($usuario)) echo 'Modificar'; else echo 'Crear' ?>">
			                            <?php if (isset($usuario)): ?>
			                            <a href="#" id="reiniciar_contrasena" class="btn akai">Reiniciar Contraseña</a>
			                            <a href="#" id="eliminar_usuario" class="btn akai">Eliminar</a>
			                            <?php endif; ?>
			                        </div>
			                        <?php endif; ?>
			                    </form>
			                </div>
			            </div>
			            <div class="col s12 l8">
			                <div class="card white">
			                    <div class="card-content">
			                        <table id="admin-table">
			                            <thead>
			                            <tr>
			                                <th data-field="id">Nombre de Usuario</th>
			                                <th data-field="name">Tipo</th>
			                            </tr>
			                            </thead>
			                            <tbody>
			                            <?php 
			                            if (($usuarios)):
			                            foreach ($usuarios as $user):
			                            	
			                            	if ($user['username']!=$session['user']):
			                            ?>
			                            <tr class="usuario" id=<?php echo $user['username'] ?>>
			                                <td><?php echo $user['username'] ?></td>
			                                <td><?php if ($user['tipo']=='0') echo 'Invitado'; else echo 'Administrador'; ?></td>
			                            </tr>
			                            
			                        <?php endif; endforeach; endif;?>
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>

									
			</div>	
			<form id="cargar_usuario" method="POST" action="<?php echo base_url().'usuarios' ?>">
				<input id="cargar_usuario_username" type="hidden" name="username" value="<?php if (isset($usuario)) echo $usuario['username'] ?>" >
			</form>
			
		</main>

		<!-- /main -->


