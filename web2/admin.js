$(document).ready(function () {
    // Handle the thesis form submission
    $('#thesis-form').submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Collect form data
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'insertThesis.php',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Thesis data inserted successfully');
                } else {
                    alert('Error inserting thesis data');
                }
            },
            error: function () {
                alert('Error communicating with the server');
            }
        });
    });

    // Handle the person form submission
    $('#person-form').submit(function (event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'insertPerson.php',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Person data inserted successfully');
                } else {
                    alert('Error inserting person data');
                }
            },
            error: function () {
                alert('Error communicating with the server');
            }
        });
    });
    $('#transfer-form').click(function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Collect form data
        var formData = $(this).serialize();
        
        // Log the formData before making the AJAX request
        console.log('formData:', formData);

        // Send an AJAX request to your PHP script
        $.ajax({
            type: 'POST',
            url: 'updatePerson.php', // Replace with the actual URL of your PHP script
            dataType: 'json',
            data: formData, 
        });
        $.ajax({
            type: 'POST',
            url: 'updateThesis.php', // Replace with the actual URL of your PHP script
            dataType: 'json',
            data: formData, // Include the form data in the request
            success: function (response) {
                // Handle the response from the server (e.g., show success message)
                if (response.success) {
                    alert('Data transferred successfully');
                } else {
                    alert('Error transferring data');
                }
            },
            error: function () {
                alert('Error communicating with the server');
            }
        });
    });
});
