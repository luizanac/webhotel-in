<br>
<div class="card-panel">
	<div class="row">
		<div class="col s12">
			<a href="<?= base_url('nova-tarifa'); ?>" class ="right marginright">Nova tarifa</a>
		</div>
		<div class="col s12">
			<?php if(empty($tariffs)){ ?>	
				<p class='center'>Nenhuma tarifa cadastrada</p>
			<?php }else{ ?>
				<table>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Preço Base</th>
							<th>Preço Adulto</th>
							<th>Preço Criança</th>
							<th>Data inicial</th>
							<th>Data final</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($tariffs as $tariff) : ?>
						<tr>
							<td><?= $tariff['name_tariff']; ?></td>
							<td><?= $tariff['base_price']; ?></td>
							<td><?= $tariff['adult_price']; ?></td>
							<td><?= $tariff['children_price']; ?></td>
							<td><?= $tariff['start_date']; ?></td>
							<td><?= $tariff['final_date']; ?></td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>
</div>
