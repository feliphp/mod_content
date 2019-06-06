
    $(document).ready(function(){   
        $( "div.category" ).click(function() {
            $(this).toggleClass('selected-category');
            $(this).nextAll("div.question").toggleClass("creased");
            
            if($(this).nextAll().hasClass('question creased')){
               $(this).nextAll("div.answer").addClass("creased");
            } else {
            }
        });

        $( "div.question" ).click(function() {
            $(this).toggleClass('selected-question');
            $(this).next().toggleClass("creased");
        });
    });
