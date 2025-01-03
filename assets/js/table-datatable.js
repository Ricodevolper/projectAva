$(function() {
    "use strict";

    $(document).ready(function() {
        $('#example').DataTable();
    });

    $(document).ready(function() {
        var table2 = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table2.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });

    $(document).ready(function() {
        var table3 = $('#example3').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table3.buttons().container()
            .appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
});
