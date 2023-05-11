$(document).ready(function() {
    // Find the rows with the "Level" column and add a class based on its value
    $('.table tbody tr').each(function() {
        var level = $(this).find('td:nth-child(5)').text().trim();
        $(this).addClass(level);
    });
});