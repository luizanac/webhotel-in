<br>
<div class="card-panel">
	<div class="row">
		<div class="col s12">
			<a href="<?= base_url('novo-tipo'); ?>" class ="right marginright">Novo tipo</a>
		</div>
		<div class="col s12">
			<?php if(empty($kinds)) { ?>
				<p class='center'>Nenhum tipo de quarto cadastrado</p>
				<?php }else{ ?>
			<table class="table striped">
				<thead>
					<tr>
						<th>Tipo:</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($kinds as $kind) : ?>	
					<tr>
						<td><?= $kind['name_room_kind']; ?></td>
						<td class="right" style="margin-right:40px;"><a href="#">Ver mais</a></td>
					</tr>				
				<?php endforeach ?>
				</tbody>
			</table>
			<?php }?>
		</div>
	</div>
</div>
