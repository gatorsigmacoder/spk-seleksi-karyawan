let moreIcon = document.querySelectorAll(".more-icon");
for (var i = 0; i < moreIcon.length; i++) {
    moreIcon[i].addEventListener("click", (e) => {
        let parent = e.target.parentElement;
        parent.classList.toggle("show-opt");
    });
}

// document.addEventListener("click", (event)=>{
//    let par = moreIcon.parentElement;

//    console.log(par);
// //    if(par.classList.contains("show-opt")){
// //     par.classList.remove("show-opt");
// //    }
// });
