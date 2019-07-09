$('.delete_attr').on('click', function () {
    var url, id;
    url = $(this).attr('data-url');
    id = $(this).attr('data-id');
    $('.modal-unique').attr('id', id);
    $('#href').attr('href', url);
});