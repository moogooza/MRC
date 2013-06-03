{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}
 <div id="contenuhaut"></div>
    <div id="contenucentre">

<div class="gauche">
            		<div class="titregauche">Staff {$nomsite}</div>
                	<div class="contenugauche">
                	<br>
           		   <table width="900" border="0">
                      <td align="center">
                      
  <center><font size="6"><span style="color: green; text-shadow: 5px 5px 15px green;"><b>Administrateurs</b></span></font></center><br>
{foreach from=$list4 item=row4}
  <div class="span4 well2" style="margin-left: 270px;">
	<div class="row">
		<div class="span1"><a href="#" class="thumbnail"><img src="{$row4.avatar}" alt=""></a></div>
		<div class="span3">
			<p>
			<font color="red"><b>Team Officielle</b></font>
			
			</p>
          	<p><strong>{$row4.pseudo}</strong></p>
			{$row4.description|stripslashes}
			 
		</div>
	</div>
</div>


{/foreach}
</td>
</table>
<table width="900" border="0">
                      <td align="center">
                      <br>
  <center><font size="6"><span style="color: orange; text-shadow: 5px 5px 15px orange;"><b>Animateurs</b></span></font></center><br>
{foreach from=$list5 item=row5}
  <div class="span4 well2" style="margin-left: 270px;">
	<div class="row">
		<div class="span1"><a href="#" class="thumbnail"><img src="{$row5.avatar}" alt=""></a></div>
		<div class="span3">
			<p>
			<font color="red"><b>Team Officielle</b></font>
			
			</p>
          	<p><strong>{$row5.pseudo}</strong></p>
			{$row5.description|stripslashes}
			 
		</div>
	</div>
</div>

{/foreach}

</td>
</table>

                   
                   
                    </div></div> 
                    
                      	
        	    </div>
   <div id="contenubas"></div> 
   <div id="footer">
{include file='templates/defaut/footer.tpl'}