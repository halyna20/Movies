function message(data) {
    $('#success').html(`<h2>${data.message}</h2>`);
    $('#success').fadeIn("slow", function(){
        $("#success").fadeOut(4000);
    });
}

function displayError(data) {
    $('#error').html(`<h2>${data.message}</h2>`);
    $('#error').fadeIn("slow", function(){
        $("#error").fadeOut(4000);
    });
}