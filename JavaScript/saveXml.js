

try {
    $(document).ready(function () {
        $('.header__button-save-in-xml').on('click', function (e) {
            let value = e.currentTarget.value;
            $.ajax({
                url: __dirname + 'control/SaveXml.php',
                method: 'get',
                data: {'value': value},
                datatype: 'text',
                success: function () {
                    var link = document.createElement('a');
                    link.setAttribute('href', '/control/newsList.xml');
                    link.setAttribute('download', 'newsList.xml');
                    link.click();
                    return false;
                }
            })

            $.ajax({
                url: __dirname + 'control/SaveXml.php',
                method: 'get',
                data: {'value': 'delete'},
                datatype: 'text',
                success: function () {}
            })
        })
    })
}
catch (e) {
    console.log('Ошибка ' + e.name + ":" + e.message  + e.stack);
}


