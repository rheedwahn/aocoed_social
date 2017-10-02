$(document).ready(function() {

//  function autoRefresh1()
//     {
//         window.location.reload();
//     }

//     setInterval('autoRefresh1()', 5000); // this will reload page after every 5 secounds; Method II


//error message
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $(".print-error-msg").fadeOut(5000);
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
	}

// liking status
    $("body").delegate("#like", "click", function(event) {
        event.preventDefault();
        var statusId = $(this).attr('likeId');
        
        $.post('/status/like', {'id':statusId, '_token':$('input[name=_token]').val()}, function() {
             $("#rep").load(location.href + ' #rep');
        });
    });

//disliking status
    $("body").delegate("#liked", "click", function(event) {
        event.preventDefault();
        var statusId = $(this).attr('dislikeId');
        
        $.post('/status/dislike', {'id':statusId, '_token':$('input[name=_token]').val()}, function() {
             $("#rep").load(location.href + ' #rep');
        });
    });

// liking reply
    $("body").delegate("#likereply", "click", function(event) {
        event.preventDefault();
        var statusId = $(this).attr('replyId');
        
        $.post('/status/like', {'id':statusId, '_token':$('input[name=_token]').val()}, function() {
             $("#rep").load(location.href + ' #rep');
        });
    });

//disliking reply
    $("body").delegate("#likedreply", "click", function(event) {
        event.preventDefault();
        var statusId = $(this).attr('replyId');
        
        $.post('/status/dislike', {'id':statusId, '_token':$('input[name=_token]').val()}, function() {
             $("#rep").load(location.href + ' #rep');
        });
    });

//replying with ajax
$("body").delegate("#submit_reply", "click", function(event) {
    event.preventDefault();
    var url = $("#reply_form").attr('action');
    var statusId = $(this).attr("statusId");
    var reply = $('#reply' + statusId).val();
    //console.log(reply);
    
    
    $.post(url, {'id':statusId, 'reply':reply,'_token':$('input[name=_token]').val()}, function(data) {
            if(data.success === "Success"){
                $('#reply_form')[0].reset();
                $("#rep").load(location.href + ' #rep');
                
            }else{
                //printErrorMsg(data.error);
                
            }            
        });
});

});