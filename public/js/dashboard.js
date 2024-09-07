/* globals Chart:false, feather:false */
(() => {
    const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );

    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    // let sidebar = document.querySelector(".sidebar");
    // let sidebarBtn = document.querySelector(".bx-menu");
    // console.log(sidebarBtn);
    // sidebarBtn.addEventListener("click", () => {
    //     sidebar.classList.toggle("close");
    // });
})();

// function isExist() {
//     let list_pembobotan_id =
//         document.getElementById("list_pembobotan_id").value;
//     checkVariableExists(list_pembobotan_id)
//         .then((exists) => {
//             if (exists) {
//                 // Variable exists in the database, do something
//                 alert(
//                     `Variable '${list_pembobotan_id}' exists in the database.`
//                 );
//             } else {
//                 // Variable doesn't exist in the database, do something else
//                 alert(
//                     `Variable '${list_pembobotan_id}' doesn't exist in the database.`
//                 );
//             }
//         })
//         .catch((error) => {
//             console.error("Error checking variable exists:", error);
//             // Handle the error accordingly
//         });
// }
// function isExist() {
//     let list_pembobotan_id =
//         document.getElementById("list_pembobotan_id").value;
//     $.ajax({
//         url: "/prioritas/is-exist",
//         data: "id_list = " + list_pembobotan_id,
//         method: "post",
//         dataType: "array",
//         success: function (data) {
//             if (data.$old_data > 0) {
//                 alert("data sudah ada");
//             }
//         },
//     });
//     // console.log(list_pembobotan_id.value);
// }

// function checkVariableExists(variable) {
//     // Make an AJAX call to the server to check if the variable exists in the database
//     // Replace the URL with the actual server URL that checks if the variable exists
//     return fetch(`/prioritas/is-exist?id_list=${variable}`)
//         .then((response) => {
//             if (response.ok) {
//                 // Variable exists in the database
//                 return true;
//             } else {
//                 // Variable doesn't exist in the database
//                 return false;
//             }
//         })
//         .catch((error) => {
//             console.error("Error checking variable exists:", error);
//             // Handle the error accordingly
//         });
// }
