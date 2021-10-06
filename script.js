$(document).ready(function() {
    $('.preloader').fadeOut();
    $('body').on('click', '.js-addTask', function() {
        $.post({
            'url': 'ajax.php',
            'dataType': 'html',
            'data': {
                'action': 'taskForm',
                'id': '0',
            },
            'success': function(result) {
                console.log(result);
                $('#interactive').hide().html(result).slideDown();
            },
            'error': function(error) {
                console.error(error);
            }
        });
    }).on('click', '.js-submitTask', function() {
        let button = $(this);
        $.post({
            'url': 'ajax.php',
            'dataType': 'json',
            'data': {
                'action': 'saveTask',
                'fields': {
                    'ID': button.attr('data-id'),
                    'NAME': $('#inputName').val(),
                    'EMAIL': $('#inputEmail').val(),
                    'TEXT': $('#inputText').val(),
                }
            },
            'success': function(result) {
                console.log(result);
                if (typeof result.success != 'undefined') {

                }
            },
            'error': function(error) {
                console.error(error);
            }
        });
    })
})