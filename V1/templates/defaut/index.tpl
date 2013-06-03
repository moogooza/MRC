{include file='templates/defaut/header.tpl'}
{include file='templates/defaut/fichiers/sous-header.tpl'}

    <div id="contenuhaut"></div>
    <div id="contenucentre">
        	<div id="slidershow">
            <center> <img src="{$index_logo}"/></center>
            </div>
            <div class="left">
           	  <div class="gauche">
            		<div class="titregauche">ACTUS DE LA RADIO</div>
                	<div class="contenugauche">
                		<table  {if $navigateur == 'Chrome'}cellspacing="20"{/if} border="0">
 {include file='templates/defaut/news.tpl'}
  
</table>

                	</div>
        		</div>
           		
               
          
          
          </div>
          <div class="right">
          	
          <div class="droite">
            	<div class="titredroite">CLIP A LA UNE</div>
                <div class="contenudroit" align="right" ><iframe width="350" height="197" src="{$index_vid}" frameborder="0" allowfullscreen></iframe> <br />
{$index_vid_desc}</div>
          </div>
            
            
        
    
    </div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	
	<br />
	<br />
	</div>
   <div id="contenubas"></div> 
   <div id="footer">
   		{include file='templates/defaut/footer.tpl'}
   