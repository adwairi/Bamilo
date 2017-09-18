$(function() {
    $('#datatables').dataTable();
    $('#datatables_wrapper .table-caption').text('Some header text');
    $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
});