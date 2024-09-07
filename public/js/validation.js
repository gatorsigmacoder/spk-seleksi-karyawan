$(document).ready(function () {
    $(".delete").click(function (e) {
        const form = $(this).closest("form");
        const text = $(this).attr("data-text");
        e.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger me-3",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, " + text + " it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                }
            });
    });
});

// $(document).ready(function () {
//     const token = $('meta[name="csrf-token"]').attr("content");
//     $.ajaxSetup({
//         headers: {
//             "X-CSRF-TOKEN": token,
//         },
//     });

//     var id_list = $("#list_pembobotan_id").val();

//     $("#input-form").submit(function (e) {
//         e.preventDefault();
//         console.log(checkData(id_list));
//     });
// });

// $(document).ready(function () {
//     const token = $('meta[name="csrf-token"]').attr("content");
//     $.ajaxSetup({
//         headers: {
//             "X-CSRF-TOKEN": token,
//         },
//     });

//     const form = document.querySelector("#input-form");

//     form.addEventListener("submit", (e) => {
//         // var id_list = $("#list_pembobotan_id").val();
//         // const formData = new FormData(form);
//         // const swalWithBootstrapButtons = Swal.mixin({
//         //     customClass: {
//         //         confirmButton: "btn btn-success",
//         //         cancelButton: "btn btn-danger me-3",
//         //     },
//         //     buttonsStyling: false,
//         // });
//         // $.ajax({
//         //     type: "POST",
//         //     url: "/prioritas/is-exist", // Replace this URL with the actual URL that handles the AJAX request in your Laravel application
//         //     data: { id_list: id_list },
//         //     success: function (data) {
//         //         // console.log(data.exists); confirm(" ");
//         //         if (data.exists.length > 0) {
//         //             // Email exists in the database, do something
//         //             // alert("Email exists in the database.");
//         //             swalWithBootstrapButtons
//         //                 .fire({
//         //                     title: "Apakah anda yakin?",
//         //                     text: "Rekrutmen yang sama sudah dianalisa sebelumnya!",
//         //                     icon: "warning",
//         //                     showCancelButton: true,
//         //                     confirmButtonText: "Analisa",
//         //                     cancelButtonText: "Kembali",
//         //                     reverseButtons: true,
//         //                 })
//         //                 .then((result) => {
//         //                     if (result.isConfirmed) {
//         //                         $.ajax({
//         //                             type: "POST",
//         //                             url: "/prioritas/terminate", // Replace this URL with the actual URL that handles the AJAX request in your Laravel application
//         //                             data: { id_list: id_list },
//         //                             success: function (data) {
//         //                                 swalWithBootstrapButtons.fire(
//         //                                     "Deleted!",
//         //                                     "Data sudah terhapus.",
//         //                                     "success"
//         //                                 );
//         //                                 $.ajax({
//         //                                     type: "POST",
//         //                                     url: "/prioritas", // Replace this URL with the actual URL that handles the AJAX request in your Laravel application
//         //                                     data: formData,
//         //                                     success: function (data) {
//         //                                         window.location =
//         //                                             "/hitung-kriteria";
//         //                                         swalWithBootstrapButtons.fire(
//         //                                             "Added!",
//         //                                             "Data sudah tersimpan.",
//         //                                             "success"
//         //                                         );
//         //                                     },
//         //                                     error: function (
//         //                                         xhr,
//         //                                         status,
//         //                                         error
//         //                                     ) {
//         //                                         swalWithBootstrapButtons.fire({
//         //                                             icon: "error",
//         //                                             title: "Oops...",
//         //                                             text: "Something went wrong!",
//         //                                             footer: '<a href="">Why do I have this issue?</a>',
//         //                                         });
//         //                                         console.error(
//         //                                             "Error checking email:",
//         //                                             error
//         //                                         );
//         //                                         // Handle the error accordingly
//         //                                     },
//         //                                 });
//         //                             },
//         //                             error: function (xhr, status, error) {
//         //                                 swalWithBootstrapButtons.fire({
//         //                                     icon: "error",
//         //                                     title: "Oops...",
//         //                                     text: "Something went wrong!",
//         //                                     footer: '<a href="">Why do I have this issue?</a>',
//         //                                 });
//         //                                 console.error(
//         //                                     "Error checking email:",
//         //                                     error
//         //                                 );
//         //                                 // Handle the error accordingly
//         //                             },
//         //                         });
//         //                     } else if (
//         //                         /* Read more about handling dismissals below */
//         //                         result.dismiss === Swal.DismissReason.cancel
//         //                     ) {
//         //                         swalWithBootstrapButtons.fire(
//         //                             "Cancelled",
//         //                             "Your imaginary file is safe :)",
//         //                             "error"
//         //                         );
//         //                     }
//         //                 });
//         //         } else {
//         //             window.location.href =
//         //                 "/prioritas/store?request=" + formData;
//         //             // Email doesn't exist in the database, do something else
//         //             // alert("Email doesn't exist in the database.");
//         //             // fetch("/prioritas", {
//         //             //     method: "POST",
//         //             //     redirect: "follow",
//         //             //     body: formData,
//         //             //     headers: {
//         //             //         "X-CSRF-TOKEN": token,
//         //             //     },
//         //             // })
//         //             //     .then((response) => {
//         //             //         if (response.ok) {
//         //             //             window.location.href =
//         //             //                 "{{ route('hitung-kriteria') }}";
//         //             //             swalWithBootstrapButtons.fire(
//         //             //                 "Added!",
//         //             //                 "Data sudah tersimpan.",
//         //             //                 "success"
//         //             //             );
//         //             //         } else {
//         //             //             swalWithBootstrapButtons.fire({
//         //             //                 icon: "error",
//         //             //                 title: "Oops...",
//         //             //                 text: "Something went wrong!",
//         //             //                 footer: '<a href="">Why do I have this issue?</a>',
//         //             //             });
//         //             //         }
//         //             //     })
//         //             //     .catch((error) => {
//         //             //         swalWithBootstrapButtons.fire({
//         //             //             icon: "error",
//         //             //             title: "Koneksi terhambat",
//         //             //             text: "Something went wrong!",
//         //             //             footer: '<a href="">Why do I have this issue?</a>',
//         //             //         });
//         //             //     });
//         //         }
//         //     },
//         //     error: function (xhr, status, error) {
//         //         confirm("error");
//         //         console.error("Error checking email:", error);
//         //         // Handle the error accordingly
//         //     },
//         // });
//     });
// });
