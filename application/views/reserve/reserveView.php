<br>
<div class="card-panel">
	<div class="row">
		<p class="marginleft"><strong>Reservas Pendentes</strong></p>
		 <div class="col s1 offset-s2">
            <p>Filtrar:</p>
        </div>
        <div class="col s3">
            <input type="date" value="<?php echo date('Y-m-d');?>"/>
        </div>
        <div class="col s1">
            <p> até</p>
        </div>
        <div class="col s3">
            <input type="date"></input>
        </div>
		<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<div class="modal-content">
				<p class="center">Informe a senha para ter acesso completo aos dados.</p>
				<div class="input-field col s12 m6 l10">
				<input type="password" required name="passwordUser" id="inputPassword"></input>
				</div>
			</div>
			<div class="modal-footer">
			<a href="#!" class=" modal-action modal-close waves-effect waves-green blue darken-3 btn center">ENTRAR</a>
			</div>
		</div>
		<table class="bordered striped centered responsive-table">
			<thead>
				<tr>
					<th>Email</th>
					<th>Data</th>
					<th>Quarto</th>
					<th>Ver</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>leonardozb3@gmail.com</td>
					<td>26-Agosto-2016 ~ 28-Agosto-2016</td>
					<td>18</td>
					<td><a href="#modal1" class="waves-effect waves-light modal-trigger">Ver mais</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>