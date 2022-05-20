$.ajax({
    url: '{{ route('user_data') }}',
    method:"GET",
    dataType: "json",
    data: '',
    success: function(res) {
        // for (const key in res) {
        //     inputs.map((el) => {
        //         if (key === el.name) {
        //             if (key === 'gender' || key === 'product-name' || key ===
        //                 'Municipality') {
        //                 $parent.find(`select[name=${key}`).children().each(
        //                     function() {
        //                         $(this).removeAttr('selected')
        //                         if (res[key].toLowerCase() === $(this).val()
        //                             .toLowerCase()) {
        //                             $(this).attr('selected', 'true')
        //                         }
        //                     });
        //             } else if (key === 'profile-avatar') {
        //                 if (res[key] !== '') {
        //                     $('#profile-avatar').val(
        //                         `{{ asset('img/faces') }}/${res[key]}`
        //                     );
        //                     $('.profile-avatar-image').attr('src',
        //                         `{{ asset('img/faces') }}/${res[key]}`
        //                     );
        //                 }
        //             } else {
        //                 $parent.find(`input[name=${key}`).val(res[key]);
        //             }
        //         }
        //     })
        // }
        console.log(res)
    }
});


// if (res.code == 202) {
    //     Swal.fire(
    //         'Deleted!',
    //         'Your account has been deleted.',
    //         'success'
    //     ).then(function() {
    //         location.href = {{ route('client-login') }};
    //     })
    // }