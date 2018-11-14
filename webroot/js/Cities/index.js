function getCities() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success: function (cities) {
                var cityTable = $('#cityData');
                cityTable.empty();
                var count = 1;
                $.each(cities.data, function (key, value)
                {
                    var editDeleteButtons = '</td><td>' +
                        '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCity(' + value.id + ')"></a>' +
                        '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? cityAction(\'delete\', ' + value.id + ') : false;"></a>' +
                        '</td></tr>';
                    cityTable.append('<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + editDeleteButtons);
                    count++;
                });

            }
    });
}

function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

function cityAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var cityData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        cityData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        id = document.getElementById("idEdit").value;
        ajaxUrl = ajaxUrl + "/" + $('#idEdit').val();
        cityData = convertFormToJSON($("#editForm").find('.form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(cityData),
        success: function (msg) {
            if (msg) {
                alert('City data has been ' + statusArr[type] + ' successfully.');
                getCities();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}


function editCity(id) {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: urlToRestApi + '/' + id,
        success: function (response) {
            $('#idEdit').val(response.data.id);
            $('#nameEdit').val(response.data.name);
            $('#editForm').slideDown();
        }
    });
}