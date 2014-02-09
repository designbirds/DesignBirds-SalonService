
<div id="container">

<?php echo form_open_multipart($form['redirect']); ?>

	<?php if ($this->session->flashdata('message')) : ?>
    	<p><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

	<fieldset class="form-fields">
		
		<?php if ($form['mode'] == 'update') : ?>
			<?php echo form_hidden('id', set_value('id', $service_price['id'])); ?>
		<?php endif; ?>
		
		<div id="field-name" class="control-group">	
			<div class="controls">
			<div>
				<input type="hidden" name="hidid" value="<?php echo $service_price['service_id']; ?>">
				<?php echo form_dropdown('service_id', $dropdown_service, set_value('service_id', $service_price['service_id']),'id="service_name"'); ?>
			</div>
			</div>
		</div>
		<!-- For replaced and displayed -->
		<div id="category_name"><select><option value=''>Select a category</option></select></div>	
		
		<div id="field-name" class="control-group">
			<div class="controls">
				<?php form_label('Price', 'Price'); ?>
				<input type="text" id="price-name" name="price" placeholder="Price" value="<?php echo set_value('price', $service_price['price']); ?>" />
				<?php echo form_error('price'); ?>
			</div>
		</div>
		
		
		 <div id="field-description" class="control-group">
			<div class="controls">
				<?php form_label('description', 'price-description'); ?>
				<textarea id="price-description" name="description" placeholder="Enter price description here."><?php echo set_value('description', $service_price['description']); ?></textarea>
				<?php echo form_error('biography'); ?>
			</div>
		</div>
		
		<div id="field-name" class="control-group">
			<div class="controls">
				<?php form_label('Discount', 'Discount'); ?>
				<input type="text" id="discount" name="discount" placeholder="Discount" value="<?php echo set_value('discount', $service_price['discount']); ?>" />
				<?php echo form_error('discount'); ?>
			</div>
		</div>

		</div>  
	</fieldset>

	<fieldset class="form-actions">
		<button type="submit" name="submit" value="upload" class="send btn btn-primary"><span>Submit</span></button>
		<?php echo anchor('admin/service_price/', 'Cancel'); ?>
	</fieldset>

<?php echo form_close(); ?>
</div>
