<fieldset style="width:300px;margin: auto;">
	<legend>Form</legend>
	<form method="post" action="<?php echo $action; ?>">
		<table cellpadding="5">
			<tr>
				<td>Tên phòng ban</td>
				<td><input type="text" value="<?php echo isset($record->tenphongban)?$record->tenphongban:''; ?>" name="tenphongban" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Thực hiện"></td>
			</tr>
		</table>
	</form>
</fieldset>