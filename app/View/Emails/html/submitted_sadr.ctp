<div align="center">
<br>
<table style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; width: 780px; border: 10px solid #488E48;" border="0" cellspacing="0" cellpadding="10" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 24px; color: #fff;" bgcolor="488E48">The Pharmacy and Poisons Board</td>
    </tr>
    <tr>
      <td><p><strong><a name="1"></a>Submission of a Suspected Adverse Drug Reaction (sADR) report</strong></p>
        <p>Your report has been received at the Pharmacy and Poisons Board and will be evaluated and entered into the Kenya Pharmacovigilance Database.</p>
        <p>Thank you for your interest and support toward enhancing patient safety in Kenya.</p>
        <p>The UNIQUE ID Number of the report is <strong><?php echo $ID; ?></strong></p>
		<p>To view the report online, the click on the link below</p>
		<p><a href="<?php echo $root;?>sadrs/view/<?php echo $ID;?>" target="_blank" > <?php echo $root;?>sadrs/view/<?php echo $ID;?> </a></p>
		<p>To download a pdf copy of the report, click on the link below or copy and paste it into your browser.</p>
		<p><a href="<?php echo $root;?>sadrs/download/<?php echo $ID;?>.pdf" target="_blank" > <?php echo $root;?>sadrs/download/<?php echo $ID;?>.pdf </a></p>
	  </td>
    </tr>
  </tbody>
</table>
</div>
