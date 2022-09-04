

try {
    $(document).ready(function () {

        function viewToModal(id, number, source){
            $.ajax({
                url: __dirname + 'control/ViewDataToModal.php',
                method: 'get',
                data: {'id': id, 'source': source, 'number': number},
                datatype: 'text',
                success: function (data) {
                    console.log(data);
                    if(data == null){
                        data = 'Описание отсутствует';
                    }
                    $('.text-modal-window').text(' ');
                    $('.text-modal-window').text(`${data}`);
                }
            })
        }

        $('.button-view-newsapi').on('click', function (e){
            let number = e.currentTarget.value;
            let id = e.currentTarget.id;
            viewToModal(id, number, 'newsapi');
        })

        $('.button-view-newscatcherapi').on('click', function (e){
            let number = e.currentTarget.value;
            let id = e.currentTarget.id;
            viewToModal(id, number, 'newscatcherapi');
        })

        $('.uk-modal-close').on('click', function (e){
            $('.text-modal-window').text(' ');
        })
    })
}
catch (e) {
    console.log('Ошибка ' + e.name + ":" + e.message  + e.stack);
}
