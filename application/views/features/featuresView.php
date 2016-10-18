<br>
<div class="card-panel">
	<div class="row" >
		<div class="col right">
			<a href="<?= base_url('nova-caracteristica'); ?>">Nova caracteristica</a>
		</div>
		<div class="col s12">
			<?php if(empty($features)){ ?>
			<p class='center'>Nenhuma caracteristica cadastrada</p>
			<?php }else{ ?>
			<table class="striped responsive-table">
				<thead>
					<th>Característica:</th>
				</thead>
				<tbody>
					<?php foreach($features as $feature) : ?>
						<tr>
							<td><?= $feature['name_feature']; ?></td>
							<td class="right"><a href="#modal_delete" style="margin-right:40px;" id="<?= $feature['id_feature']; ?>" class="getIdFeature modal-trigger orange-text text-accent-3">Excluir</a></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php } ?>
		</div>
	</div>
</div>

<div id="modal_delete" class="modal">
	<div class="modal-content">
		<form method="POST" action="<?php echo base_url('delete-feature'); ?> ">
		<div class="col s12 center">
			<h5>Deseja realmente excluir?</h5>
			<input type="hidden" name="idFeature" id="idFeature"></input>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">NÃO</a>    
		<a href="#" type="submit" class="orange-text text-accent-3 modal-action modal-close waves-effect waves-green btn-flat">SIM</a>
		</form>
	</div>
</div>
