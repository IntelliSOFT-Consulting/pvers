<div align="center">
<br>
<table style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; width: 780px; border: 10px solid #488E48;" border="0" cellspacing="0" cellpadding="10" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 24px; color: #fff;" bgcolor="488E48">The Pharmacy and Poisons Board</td>
    </tr>
    <tr>
      <td>
        <p>This email contains all the reports you sent to PPB using this (<?php echo $email; ?>) email address.</p> <br>
		<p><strong><a name="1"></a>Suspected Adverse Drug Reports (<?php echo count($sadrs); ?>)</strong></p>
        <table style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;" border="1" cellspacing="0" cellpadding="2" align="center" bgcolor="#FFFFFF">
		  <tbody>
			<tr>
				<td><p><strong>Report ID</strong></p></td>
				<td><p><strong>Report Title</strong></p></td>
				<td><p><strong>Date Created</strong></p></td>
				<td><p><strong>Actions</strong></p></td>
			</tr>
			<?php foreach ($sadrs as $sadr) : ?>
			<tr>
			<td><?php echo $sadr['Sadr']['id']?></td>
			<td><?php echo $sadr['Sadr']['report_title']?></td>
			<td><?php echo $sadr['Sadr']['created']?></td>
			<td>
				<p><a href="<?php echo $root;?>sadrs/view/<?php echo $sadr['Sadr']['id'];?>" target="_blank" > View </a></p>
			</td>
			</tr>
			<?php endforeach; ?>
		  </tbody>
		</table>
	  </td>
    </tr>
  </tbody>
</table>
</div>
