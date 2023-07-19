document.addEventListener('DOMContentLoaded', function() {
    $('.modalBtn2').on('click', function() {
        var penaltyId = $(this).data('penalty');
        var modalTarget = $(this).data('bs-target');
        
        if (modalTarget === '#removeModalPenalty') {
            $('#removeModalPenalty input[name="penaltyId"]').val(penaltyId);
            console.log($('#removeModalPenalty input[name="penaltyId"]').val());
        } else if (modalTarget === '#editModalPenalty') {
            $('#editModalPenalty input[name="penaltyId"]').val(penaltyId);
            console.log($('#editModalPenalty input[name="penaltyId"]').val());
        }
        $(modalTarget).modal('show');
    });
});