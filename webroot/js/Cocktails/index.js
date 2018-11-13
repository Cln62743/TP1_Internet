function getCocktails() {
    $.ajax({
        type: 'POST',
        url: 'cocktailAction.php',
        data: 'action_type=view&' + $("#cocktailForm").serialize(),
        success: function (html) {
            $('#cocktailData').html(html);
        }
    });
}

function CocktailAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var cocktailData = '';
    if (type == 'add') {
        cocktailData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
    } else if (type == 'edit') {
        cocktailData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        cocktailData = 'action_type=' + type + '&id=' + id;
    }
    $.ajax({
        type: 'POST',
        url: 'cocktailAction.php',
        data: cocktailData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Cocktail data has been ' + statusArr[type] + ' successfully.');
                getCocktails();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

function editCocktail(id) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'cocktailAction.php',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#idEdit').val(data.id);
            $('#nameEdit').val(data.name);
            $('#descriptionEdit').val(data.description);
            $('#editForm').slideDown();
        }
    });
}