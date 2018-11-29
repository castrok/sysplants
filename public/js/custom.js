$(".btnOut").on('click',function () {
    console.log($('base[id="base"]').attr('content') + '/logout');

    $.ajax({
        url:$('base[id="base"]').attr('content') + '/logout',

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        type:'POST',

        success:function (data) {
            let timerInterval;
            swal({
                title: 'Saindo...',
                timer: 1000,
                onOpen: () => {
                    swal.showLoading();
                    timerInterval = setInterval(() => {
                        swal.getContent().querySelector('strong')
                            .textContent = swal.getTimerLeft()
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.timer

                ) {
                    window.location.href = $('base[id="base"]').attr('content') + '/login';
                    console.log('Usuário Deslogado!!')
                }
            })
        },

        error: function (data) {
            console.log(data);
        }
    });
});