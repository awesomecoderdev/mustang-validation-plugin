// const { default: axios } = require("axios");

// const mustang_featch = document.getElementById("mustang_featch");
// const mustang_animate = document.getElementById("mustang_animate");
// const icon = document.getElementById("mustang_app_icon");
// const downloads = document.getElementById("mustang_app_downloads");
// const stars = document.getElementById("mustang_app_stars");
// const ratings = document.getElementById("mustang_app_ratings");
// const devName = document.getElementById("mustang_app_devName");
// const devLink = document.getElementById("mustang_app_devLink");
// const title = document.getElementById("title");
// const mustang_app_url = document.getElementById("mustang_app_url");

// mustang_featch.addEventListener("click", function (e) {
//   mustang_animate.classList.add("animate-spin");
//   axios
//     .post(mustang.ajaxurl, {
//       app: mustang_app_url.value,
//       name: "Ibrahim",
//     })
//     .then(function (res) {
//       const response = res.data;
//       // console.log(response);

//       if (response.name !== "") {
//         title.value = response.name;
//       }
//       if (response.icon !== "") {
//         icon.value = response.icon;
//       }
//       if (response.downloads !== "") {
//         downloads.value = response.downloads;
//       }
//       if (response.stars !== "") {
//         stars.value = response.stars;
//       }
//       if (response.ratings !== "") {
//         ratings.value = response.ratings;
//       }
//       if (response.devName !== "") {
//         devName.value = response.devName;
//       }
//       if (response.devLink !== "") {
//         devLink.value = response.devLink;
//       }
//       mustang_animate.classList.remove("animate-spin");
//     })
//     .catch(function (err) {
//       mustang_animate.classList.remove("animate-spin");
//     });
// });
