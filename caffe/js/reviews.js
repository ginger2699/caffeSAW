$(document).ready(function(){

    $(document).on('click','#reviewButton', function(){
        var offsetR = $('#reviewButton').val();
        $.post("utils/more_reviews.php",{offset : offsetR}, function(result){
            $("#newReviews").replaceWith(result);
        });
    });
    
});