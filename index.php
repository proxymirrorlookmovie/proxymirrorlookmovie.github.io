<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Voting Page</title>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	//####### on page load, retrive votes for each content
	$.each( $('.voting_wrapper'), function(){
		
		//retrive unique id from this voting_wrapper element
		var unique_id = $(this).attr("id");
		
		//prepare post content
		post_data = {'unique_id':unique_id, 'vote':'fetch'};
		
		//send our data to "vote_process.php" using jQuery $.post()
		$.post('vote_process.php', post_data,  function(response) {
		
				//retrive votes from server, replace each vote count text
				$('#'+unique_id+' .up_votes').text(response.vote_up); 
				$('#'+unique_id+' .down_votes').text(response.vote_down);
			},'json');
	});

	
	
	//####### on button click, get user vote and send it to vote_process.php using jQuery $.post().
	$(".voting_wrapper .voting_btn").click(function (e) {
	 	
		//get class name (down_button / up_button) of clicked element
		var clicked_button = $(this).children().attr('class');
		
		//get unique ID from voted parent element
		var unique_id 	= $(this).parent().attr("id"); 
		
		if(clicked_button==='down_button') //user disliked the content
		{
			//prepare post content
			post_data = {'unique_id':unique_id, 'vote':'down'};
			
			//send our data to "vote_process.php" using jQuery $.post()
			$.post('vote_process.php', post_data, function(data) {
				
				//replace vote down count text with new values
				$('#'+unique_id+' .down_votes').text(data);
				
				//thank user for the dislike
				alert("Thanks! Each Vote Counts, Even Dislikes!");
				
			}).fail(function(err) { 
			
			//alert user about the HTTP server error
			alert(err.statusText); 
			});
		}
		else if(clicked_button==='up_button') //user liked the content
		{
			//prepare post content
			post_data = {'unique_id':unique_id, 'vote':'up'};
			
			//send our data to "vote_process.php" using jQuery $.post()
			$.post('vote_process.php', post_data, function(data) {
			
				//replace vote up count text with new values
				$('#'+unique_id+' .up_votes').text(data);
				
				//thank user for liking the content
				alert("Thanks! For Liking This Content.");
			}).fail(function(err) { 
			
			//alert user about the HTTP server error
			alert(err.statusText); 
			});
		}
		
	});
	//end 
	
	
	
});


</script>
<style type="text/css">
<!--
.content_wrapper{width:500px;margin-right:auto;margin-left:auto;}
h3{color: #979797;border-bottom: 1px dotted #DDD;font-family: "Trebuchet MS";}

/*voting style */
.voting_wrapper {display:inline-block;margin-left: 20px;}
.voting_wrapper .down_button {background: url(images/thumbs.png) no-repeat;float: left;height: 14px;width: 16px;cursor:pointer;margin-top: 3px;}
.voting_wrapper .down_button:hover {background: url(images/thumbs.png) no-repeat 0px -16px;}
.voting_wrapper .up_button {background: url(images/thumbs.png) no-repeat -16px 0px;float: left;height: 14px;width: 16px;cursor:pointer;}
.voting_wrapper .up_button:hover{background: url(images/thumbs.png) no-repeat -16px -16px;;}
.voting_btn{float:left;margin-right:5px;}
.voting_btn span{font-size: 11px;float: left;margin-left: 3px;}

-->
</style>
</head>

<body>
<div class="content_wrapper">
    <h3>My Content Topic
        <!-- voting markup -->
        <div class="voting_wrapper" id="1001">
            <div class="voting_btn">
                <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
            </div>
            <div class="voting_btn">
                <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
            </div>
        </div>
        <!-- voting markup end -->
    </h3>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel leo mauris, eget congue augue. Nulla luctus elit et ante blandit non eleifend massa auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis quam at nunc egestas consequat. Donec pretium enim magna, eget egestas enim. 
    
    
    <h3>My Content Topic 2
        <!-- voting markup -->
        <div class="voting_wrapper" id="1002">
            <div class="voting_btn">
                <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
            </div>
            <div class="voting_btn">
                <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
            </div>
        </div>
        <!-- voting markup end -->
    </h3>
    Praesent fermentum erat mauris, a rutrum eros. Curabitur pellentesque vulputate sapien. In tincidunt est vitae leo rutrum lacinia. Cras id lorem sem, non adipiscing leo. Duis lobortis egestas pellentesque. In blandit tortor at lectus sodales tempor.

    <h3>My Content Topic 2
        <!-- voting markup -->
        <div class="voting_wrapper" id="1003">
            <div class="voting_btn">
                <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
            </div>
            <div class="voting_btn">
                <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
            </div>
        </div>
        <!-- voting markup end -->
    </h3>
    Praesent fermentum erat mauris, a rutrum eros. Curabitur pellentesque vulputate sapien. In tincidunt est vitae leo rutrum lacinia. Cras id lorem sem, non adipiscing leo. Duis lobortis egestas pellentesque. In blandit tortor at lectus sodales tempor.

</div>

</body>
</html>
