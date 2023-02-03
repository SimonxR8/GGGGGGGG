// $(document).ready(function() {
//     $(".sb-ul li").click(function() {
//         $(".sb-sub-ul").slideUp();

//         if($(this).children(".sb-sub-ul").is(":visible")) {
//             $(this).children(".sb-sub-ul").slideUp();
//             $(".chev-pos").removeClass("chev-rotate");
//         }
//         else {
//             $(this).children(".sb-sub-ul").slideDown();
//             $(".sb-ul li a").on("click", function() {
//                 $(".chev-pos").removeClass("chev-rotate");
//                 $(this).find(".chev-pos").toggleClass("chev-rotate");
//             });
//         }
//     });

//     // --------------

//     $(".sb-ul li a").click(function() {
//         $(".sb-ul li a").removeClass("sb-ul-active");
//         $(this).addClass("sb-ul-active");
//     });


//     // --------------
//     // Responsive
//     $(".btn-hamburger").click(function() {
//         $(".sidebar").toggleClass("sidebar-active");
//     });

//     $(window).resize(function() {
//         var width = $(window).width();
//         if( width > 500) {
//             $(".sidebar").show();
//         }
//     });
// });
// //

//   const body = document.querySelector('body'),
//       sidebar = body.querySelector('nav'),
//       toggle = body.querySelector(".toggle"),
//       searchBtn = body.querySelector(".search-box"),
//       modeSwitch = body.querySelector(".toggle-switch"),
//       modeText = body.querySelector(".mode-text");


// toggle.addEventListener("click" , () =>{
//     sidebar.classList.toggle("close");
// })

// searchBtn.addEventListener("click" , () =>{
//     sidebar.classList.remove("close");
// })

// modeSwitch.addEventListener("click" , () =>{
//     body.classList.toggle("dark");
    
//     if(body.classList.contains("dark")){
//         modeText.innerText = "Light mode";
//     }else{
//         modeText.innerText = "Dark mode";
        
//     }
// });


// $(document).ready(function () {
//     // sub menu
//     $('.sub-btn').click(function () {
//         $(this).next('.sub-menu').slideToggle();
//         $(this).find('.dropdown').toggleClass('rotate');
//     });
  
//     $('.sub-btn-sub').click(function () {
//         $(this).next('.sub-menu-sub').slideToggle();
//         $(this).find('.dropdown-sub').toggleClass('rotate');
//     });
  
//     // jq for repand and collapese the sidebar
//     $('.menu-btn').click(function () {
//         $('.side-bar').addClass('active');
//         $('.menu-btn').css("visibiliy", "hidden");
//     });
  
//     $('.close-btn').click(function () {
//         $('.side-bar').removeClass('active');
//         $('.menu-btn').css("visibiliy", "visible");
//     });
//   })

const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
