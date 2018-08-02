/**
 * Created by happy on 24.10.14.
 */
//для динамических выпадающих списков
function dropDown(object,url){

    $.ajax({
        type: "GET",
        url: url
    })
        .done(function( msg ) {
            object.html(msg);
            object.removeAttr('disabled');
        });
}