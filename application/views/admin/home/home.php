

<?php $this->layout('master') ?>

		<?php $this->insert('nav',['session'=>$session,'opciones'=>$opciones]) ?>
		<?php $this->insert('home/default') ?>