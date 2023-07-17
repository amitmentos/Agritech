$(document).ready(function() {
    var sortItems = $('.sort-button');
    sortItems.on('click', function() {
      var column = $(this).data('column');
      var url = 'index.php?category=' + column;
      window.location.href = url;
    });
  


  });
          

      

