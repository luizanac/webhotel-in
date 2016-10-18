<br>
<div class="card-panel">
	<div class="row">
		<a href="<?php echo base_url('novo-quarto'); ?>" class="right marginright">Novo Quarto</a>
		<br>

      <?php 
      if (count($rooms) == 0){
          echo "<p class='center'>Nenhum quarto cadastrado</p>";
        }  ?>
      <?php foreach ($rooms as $room) : ?>
        <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="<?= base_url(); ?><?= "assets/img/uploads/".$room['route_image']; ?>" class="responsive-img" style="min-height: 179px;">
              <span class="card-title"><?= $room['number_room'] ?></span>
            </div>
            <div class="card-action">
              <a href="#">Alterar</a>
              <a href="#">Excluir</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>

       

	</div>
</div>