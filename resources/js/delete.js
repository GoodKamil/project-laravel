$(function(){
    $('.delete_method').click(function(e){
        const id=$(this).data('id')

        Swal.fire({
            title: TITLE,
            icon:'warning',
            showCancelButton: true,
            confirmButtonText: 'Tak',
            cancelButtonText: `Nie`,
        }).then(result=>{
            if(result.value) {
                $.ajax({
                    method: 'DELETE',
                    url: `${URL}/${id}`,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
                    dataType: 'JSON',
                }).done(function (response) {
                    Swal.fire({
                        title: response.message,
                        icon: response.status,
                        cancelButtonText: 'OK',
                    }).then(result => {
                        console.log(result);
                        if (response.status === 'success') {
                            $(`#card-${id}`).addClass(CLASS);
                            setInterval(()=>{
                                $(`#card-${id}`).css('display','none')
                            },1800)
                        }
                    })
                })
            }
        })


    })
})
