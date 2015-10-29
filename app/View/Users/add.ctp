<div>
	<h1>Add New User</h1>
	<?php echo $this->Form->create('Users', array('action' => 'add')); ?>
		<div>
			<label>Username</label>
			<span>
				<?php echo $this->Form->input('username', array('div' => false, 'label' => false)) ?>
			</span>
		</div>
		<div>
			<label>Email</label>
			<span>
				<?php echo $this->Form->input('email', array('div' => false, 'label' => false)) ?>
			</span>
		</div>
		<div>
			<label>Password</label>
			<span>
				<?php echo $this->Form->input('password', array('div' => false, 'label' => false)) ?>
			</span>
		</div>
		<div>
			<label></label>
			<span>
				<?php echo $this->Form->submit('Register') ?>
			</span>
		</div>

	<?php echo $this->Form->end(); ?>
</div>