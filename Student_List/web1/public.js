$(document).ready(function () {
    // Function to filter the Person Table
    $('#person-filter').keyup(function () {
        var filterText = $(this).val().toLowerCase();
        $('.person-table tbody tr').each(function () {
            var rowText = $(this).text().toLowerCase();
            if (rowText.includes(filterText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Function to filter the Thesis Table
    $('#thesis-filter').keyup(function () {
        var filterText = $(this).val().toLowerCase();
        $('.thesis-table tbody tr').each(function () {
            var rowText = $(this).text().toLowerCase();
            if (rowText.includes(filterText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});

