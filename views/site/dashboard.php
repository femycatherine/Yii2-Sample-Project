<script type="text/javascript">

function send_k() {	
  $.post( "/basic/web/vineyard/create", function( data ) {
	  $( "#list-of-post" ).html( data );
	});
}
 
</script>

<div id="forumForm">
	<div id="simple-div">
                <?php echo $this->render('_uploadStatus', array('model'=>$model)); ?>
        </div>
</div>
<div onclick="send_k()">click on me</div>

<div class="rows">
<div id="list-of-post" class="col-md-8" ></div>
<div class="col-md-4" >I ma here</div>
</div>