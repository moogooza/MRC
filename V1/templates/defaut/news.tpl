{foreach from=$list3 item=row3}
<tr>
	
	{if $row3.image != ''}<td><img width="100" alt="actu" src="{$row3.image}" /></td>
	{else}<td><img width="130" alt="actu" src="radio.ico" /></td>{/if}
	
	<td><b>{$row3.titre}</b><br />{$row3.message}<br /><br /></td>
	
</tr>
{/foreach}