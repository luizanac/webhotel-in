<br>
<div class="card-panel">
	<?php if(isset($error)){ ?>
		<div class="card-panel red"><?= $error; ?></div>
	<?php } ?>
	<div class="row" >
		<div class="col right">
			<a href="<?= base_url('nova-caracteristica'); ?>">Nova caracteristica</a>
		</div>
		<div class="col s12">
			<?php if(empty($features)){ ?>
			<p class='center'>Nenhuma caracteristica cadastrada</p>
			<?php }else{ ?>
			<table>
				<thead>
					<th>Característica</th>
				</thead>
				<tbody>
					<?php foreach($features as $feature) : ?>
						<tr>
							<td><?= $feature['name_feature']; ?></td>
							<td class="right" style="margin-right:25px;">
								<a onclick="return confirm('Deseja mesmo deletar a característica?');" href="<?= base_url('deletar-caracteristica');?>/<?= $feature['id_feature']; ?>" class="red-text">Deletar</a>
							</td>
							<td class="right" style="margin-right:20px;">
								<a href="">Ver mais</a>
							</td>
							
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php } ?>
		</div>
	</div>
</div>