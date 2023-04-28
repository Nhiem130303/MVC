<style type="text/css">
	a{text-decoration: none;}
</style>
<fieldset style="width:500px; margin:auto;">
	<legend>Danh sách phòng ban</legend>
	<div style="margin-bottom: 5px;"><a href="index.php?action=create">Create</a></div>
	<table cellpadding="5" border="1" style="border-collapse: collapse; width:100%;">
		<tr>
			<td style="font-weight: bold;">Tên phòng ban</td>
			<td style="width: 100px;"></td>
		</tr>
		<?php foreach($records as $row): ?>
		<tr>
			<td><?php echo $row->tenphongban; ?></td>
			<td style="text-align: center;">
				<a href="index.php?action=update&maphongban=<?php echo $row->maphongban; ?>">Update</a>&nbsp;&nbsp;
				<a href="index.php?action=delete&maphongban=<?php echo $row->maphongban; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<div class="pagination">
		<ul>
			<li>Trang</li>
			<?php for($i = 1; $i <= $numPage; $i++): ?>
			<li><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			<?php endfor; ?>
		</ul>
	</div>	
</fieldset>
<style type="text/css">
	.pagination ul{padding:0px; margin:0px; list-style: none; padding-top: 10px;}
	.pagination ul li{display: inline;}
	.pagination a{padding:5x;}
</style>