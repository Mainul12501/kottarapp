function getSubCategoryByCategory() {
    var categoryId = $('#jobCategory').val();
    $.ajax({
        url: baseUrl+'get-skill-sub-categories/'+categoryId,
        method: "GET",
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            var option = '';
            $.each(data, function (key, item) {
                option += '<option value="'+item.id+'">'+item.sub_category_name+'</option>';
            })
            $('#jobSubCategory').empty().append(option);
        },
        error: function (error)
        {
            toastr.error('Someting went wrong. please try again.');
        }
    })
}
