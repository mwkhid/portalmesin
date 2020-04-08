$(document).ready(function() {
    $('.js-dataTable-edited').DataTable({
        pageLength: 20,
        lengthMenu: [
            [5, 10, 20],
            [5, 10, 20]
        ],
        autoWidth: !1
    });
} );