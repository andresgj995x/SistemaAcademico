
	<!-- Modal -->
	<div class="modal fade" id="edt_Persona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class='fa fa-pencil'></i> Actualizar Notas</h4>
				</div>
				<form class="form" method="post" action="controlers/editar_persona.php">

					<div class="modal-body">
                  <div class="container-fluid">
             
                  
					<!-- NOMBRE -->
                    <div class="col-lg-3">
						<div class="form-group">
							<label for="faltasNota" >Faltas</label>
							
								<input type ="number" class="form-control" placeholder="Ingrese nombre" id="faltasNota" name="faltasNota" required />
								 <input type="hidden" value="" id="idNota" name="idNota">
								 
							
						</div>
                    </div>

						<!-- APELLIDOS -->
					<div class="col-lg-3">
						<div class="form-group">
							<label for="tallerNota" >Taller</label>
							
								<input type ="number" step="0.1" min="0" max="5" class="form-control" placeholder="ingrese nombre" id="tallerNota" name="tallerNota"  required/>
							
						</div>
					</div>
						<!-- DNI -->
						<div class="col-lg-3">
						<div class="form-group">
							<label for="pEscritaNota" >Prueba Escrita</label>
							
								<input type ="number" step="0.1" min="0" max="5" class="form-control" placeholder="Ingrese Dni" id="pEscritaNota" name="pEscritaNota" required  />
							
						</div>
						</div>
						

						<!-- EMAIL -->
					
						<div class="col-lg-3">
						<div class="form-group">
							<label for="labsNota" >Laboratorios</label>
							
								<input type ="number" step="0.1" min="0" max="5" class="form-control" placeholder="Ingrese Email" id="labsNota" name="labsNota" required/>
							
						</div>
						</div>
						<!-- TELEFONO -->
						<div class="col-lg-3">
						<div class="form-group">
							<label for="eOralNota" >Evaluación Oral</label>
							
								<input type ="number" step="0.1" min="0" max="5" class="form-control" placeholder="Ingrese telefono" id="eOralNota" name="eOralNota"  />
							
						</div>
						</div>
						<!-- FALTAS -->
						<div class="col-lg-3">
                        <div class="form-group">
							<label for="eEscritaNota" >Evaluación Escrita</label>
							
								<input type ="number" step="0.1" min="0" max="5" class="form-control" placeholder="Ingrese las faltas" id="eEscritaNota" name="eEscritaNota"  />
							
						</div>
						</div>
						
						<!-- Taller-->
                    	
						<div class="col-lg-3">
                        <div class="form-group">
							<label for="punNota" >Puntualidad</label>
							
								<input type ="number" step="0.1" min="0" max="5" class="form-control" placeholder="Ingrese nota taller" id="punNota" name="punNota"  />
							
						</div>
						</div>
						<!-- Taller-->
						<div class="col-lg-3">
                        <div class="form-group">
							<label for="pPersonalNota" >Presentación Personal</label>
							
								<input type ="number" step="0.1" min="0" max="5" class="form-control" placeholder="Ingrese nota taller" id="pPersonalNota" name="pPersonalNota"  />
							
						</div>
						</div>
						<!-- Taller-->
						<div class="col-lg-3">
                        <div class="form-group">
							<label for="compNota" >Comportamiento</label>
							
								<input type ="number" step="0.1" min="0" max="5" class="form-control" placeholder="Ingrese nota taller" id="compNota" name="compNota"  />
							
						</div>
						</div>
						<!-- Taller-->
							
						<div class="col-lg-3">
                        <div class="form-group">
							<label for="ipNota" >Interés y Participacion</label>
							
								<input type ="number" step="0.1"  min="0" max="5" class="form-control" placeholder="Ingrese nota taller" id="ipNota" name="ipNota"  />
							
						</div>
						</div>
						

                      

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
					</div>
					
					 </div><!-- Fin Modal container fluid-->
				</form>
			</div>
		</div>
	</div>
