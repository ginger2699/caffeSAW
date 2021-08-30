$(document).ready(function(){

    $(document).on('click','#reviewButton', function(){
        var offsetR = $('#reviewButton').val();
        $.post("../utils/more_reviews.php",{offset : offsetR}, function(result){
            $("#newReviews").replaceWith(result);
        });
    });
    $(document).on('click','#reviewButtonProd', function(){
        var offsetR = $('#reviewButtonProd').val();
        var prodId = $('#productIdbButtonProd').val();
        $.post("../utils/more_reviews.php",{offset : offsetR, prodId : prodId}, function(result){
            $("#newReviews").replaceWith(result);
        });
    });
    
});