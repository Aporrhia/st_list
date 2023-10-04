$(document).ready(function (){
    // Bind a function to the submit event of both filter forms
    $(".form-filter-person, .form-search-box").on("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the form data as a URL-encoded string
        var formData = $(this).serialize();

        $.ajax({
            type: "GET",
            url: "personData.php",
            data: formData, // Send form data to the PHP script
            dataType: "html",
            success: function(data){
                $('#person-data').html(data);
            }
        });
    });

    // Initial load of the data
    $.ajax({
        type: "GET",
        url: "personData.php",
        dataType: "html",
        success: function(data){
            $('#person-data').html(data);
        }
    });
});


$(document).ready(function (){
    // Bind a function to the submit event of both filter forms
    $(".form-filter-thesis").on("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the form data as a URL-encoded string
        var formData = $(this).serialize();

        $.ajax({
            type: "GET",
            url: "thesisData.php",
            data: formData, // Send form data to the PHP script
            dataType: "html",
            success: function(data){
                $('#thesis-data').html(data);
            }
        });
    });

    // Initial load of the data
    $.ajax({
        type: "GET",
        url: "thesisData.php",
        dataType: "html",
        success: function(data){
            $('#thesis-data').html(data);
        }
    });
});
