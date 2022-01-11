function showAll() {
    $.ajax({
        url: "{{ route('sheet.showall') }}",
        type: "get",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                console.log(response.fichas);
                let infos = response.fichas,
                    content = "";

                for (i in infos) {
                    content += "<p>" + infos[i].nome + "</p>";
                }

                console.log(content);
                $("#showSheets").html(content);
            }
        },
        error: function (response) {
            console.log(response.responseJSON.message);
        },
    });
}

$("body").ready(showAll());

$(function () {
    $('form[id="personagemModalForm"]').submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route('sheet.store') }}",
            type: "post",
            data: $(this).serialize(),
            success: function (response) {
                showAll();
            },
        });
    });
});
