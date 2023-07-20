$(document).ready(function() {
    var sortItems = $('.sort-button');
    sortItems.on('click', function() {
      var column = $(this).data('column');
      var url = 'index.php?category=' + column;
      window.location.href = url;
    });
  

    $('#editProfilePic').on('click', function(event) {
      event.preventDefault(); // Prevent the link's default action
      $('#editModalProfile').modal('show'); // Show the modal with the specified ID
    });
  });
          

      

