$(document).ready(function() {
    // Find the rows with the "Level" column and add a class based on its value
    // $('.table tbody tr').each(function() {
    //   var level = $(this).find('td:nth-child(5)').text().trim();
    //   $(this).addClass(level);
    // });


    var sortItems = $('.sort-button');
    sortItems.on('click', function() {
      var column = $(this).data('column');
      var url = 'index.php?category=' + column;
      window.location.href = url;
    });
  }
);
          

      

