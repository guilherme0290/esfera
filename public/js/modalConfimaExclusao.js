$(function() {
    console.log('tste js')
    var table = $('.table').DataTable();
    var href = $('.canc').attr('href')

    console.log(table)
    console.log(href)


    table.on('click', '.canc', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();

        console.log(data[0])

        $('.modalCanc').attr('action', href + data[0]);
        $('#modal').modal('show');

    })
});