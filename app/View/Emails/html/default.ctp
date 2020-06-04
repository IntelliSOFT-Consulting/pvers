<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>


<div align="center">
	<br />
	<table align="center" bgcolor="#FFFFFF" border="0" cellpadding="10" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; width: 100%; border: 10px solid #488E48;">
		<tbody>
			<tr>
				<td bgcolor="488E48">
					<h3 style="font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 24px; color: rgb(255, 255, 255);">
						The Pharmacy and Poisons Board</h3>
					<p style="color: #fff;">
						<strong>PvERS</strong>: Pharmacovigilance Electronic Reporting System</p>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						/*$content = explode("\n", $content);

						foreach ($content as $line):
							echo '<p> ' . $line . "</p>\n";
						endforeach;*/
						echo $message;
					?>
				</td>
			</tr>
		</tbody>
	</table>
</div>


