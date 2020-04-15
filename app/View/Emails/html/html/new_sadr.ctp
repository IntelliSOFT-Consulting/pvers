<div align="center">
<br>
<table style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; width: 780px; border: 10px solid #488E48;" border="0" cellspacing="0" cellpadding="10" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 24px; color: #fff;" bgcolor="488E48">The Pharmacy and Poisons Board</td>
    </tr>
    <tr>
      <td><p><strong><a name="1"></a>New suspected Adverse Drug Reaction (sADR) report</strong></p>
        <p>You are getting this email because you have created a new suspected Adverse Drug Reaction (sADR) report.</p>
        <p>Thank you for your interest and support toward enhancing patient safety in Kenya.</p>
        <p>The UNIQUE Identification Number of the Report is <strong><?php echo $ID; ?></strong></p>
             <p>You may edit the unsubmitted report by clicking on the following link:</p>
		<p><a href="<?php echo $root;?>sadrs/edit/<?php echo $ID;?>" target="_blank" > <?php echo $root;?>sadrs/edit/<?php echo $ID;?> </a></p>
		<p>Alternatively, you can visit the <a href="<?php echo $root;?>sadrs/add">sADR reporting page</a> and enter the ID and to search for the report</p>
		<p><strong>Note:</strong> that you can only edit a report that you have not yet submitted. Once you submit it, the report resides at the Pharmacy and Poisons Board and only they
			can grant you access to edit the report again</p>
	  </td>
    </tr>
  </tbody>
</table>
</div>
