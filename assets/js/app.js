$(".show-sidebar-btn").click(function () {
  $(".sidebar").animate({ marginLeft: "0" });
});

$(".hide-sidebar-btn").click(function () {
  $(".sidebar").animate({
    marginLeft: "-100%",
  });
});

function go(url) {
  setTimeout(function () {
    location.href = `${url}`;
  }, 500);
}

var popoverTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="popover"]')
);

var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl);
});

$(".full-screen-btn").click(function () {
  let current = $(this).closest(".card");
  //  console.log("maximize");
  current.toggleClass("full-screen-card");
  // console.log(current.hasClass("full-screen-card"));
  if (current.hasClass("full-screen-card")) {
    $(this).html(`<i class ="feather-minimize-2")></i>`);
  } else {
    $(this).html(`<i class ="feather-maximize-2")></i>`);
  }
});

let screenHeight = $(window).height();
let currentMenuWeight = $(".nav-menu .active").offset().top;

if (currentMenuWeight > screenHeight * 0.8) {
  $(".sidebar").animate(
    {
      scrollTop: currentMenuWeight - 100,
    },
    1000
  );
}

let category = ["phone", "computer", "TV"];
let subCategory = [
  { name: "Samsung", category_id: 0 },
  { name: "Mi", category_id: 0 },
  { name: "Hp", category_id: 1 },
  { name: "Acer", category_id: 1 },
  { name: "Panasonic", category_id: 2 },
];
category.map(function (el, index) {
  $("#c").append(`<option value=${index}>${el}</option>`);
});

subCategory.map(function (el, index) {
  $("#sc").append(
    `<option value=${index} datacategory="${el.category_id}"">${el.name}</option>`
  );
});

$("#c").on("change", function () {
  let currentCategoryId = $(this).val();
  $("#sc option").hide();
  // jquery attrbute selector
  $(`[datacategory=${currentCategoryId}]`).show();
});
