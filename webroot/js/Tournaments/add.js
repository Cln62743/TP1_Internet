$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#city-id').on('change', function () {
        var cityId = $(this).val();
        if (cityId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'city_id=' + cityId,
                success: function (schools) {
                    $select = $('#school-id');
                    $select.find('option').remove();
                    $.each(schools, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#school-id').html('<option value="">Select a city first</option>');
        }
    });
});


