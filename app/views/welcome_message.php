
<?php echo $this->layout->container(); ?>
	<?php echo $this->layout->row(); ?>
		<?php echo $this->layout->form_open(); ?>
	    	<?php echo $this->layout->column_open([['large'=>3]])?>
				<a href="#" class="<?php echo $this->layout->left(); ?>">Hello</a>
				<a href="#" class="<?php echo $this->layout->right(); ?>">Good Morning</a>
	        <?php echo $this->layout->close(); ?>
	    <?php echo $this->layout->form_close(); ?>
    <?php echo $this->layout->close(); ?>

<?php echo $this->layout->close(); ?>

<?php // $this->layout->deferredLoadingJS(base_url('public/assets/js/app.js')); ?>