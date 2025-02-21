document.onreadystatechange = function () {
  if (document.readyState === "interactive") {
    const progressBar = document.getElementById("progress-bar-fill");
    const request = new XMLHttpRequest();

    request.onprogress = function (event) {
      const { loaded, total } = event;

      if (total !== 0) {
        const progress = (loaded / total) * 100;
        progressBar.style.width = progress + "%";
      }
    };

    request.onload = function () {
      progressBar.style.width = "100%";

      setTimeout(function () {
        progressBar.style.display = "none";
      }, 1000);
    };

    request.open("GET", window.location.href);
    request.send();
  }
};

function displayTime() {
  var date = new Date();
  var time = date.toLocaleTimeString();
  document.getElementById("time").innerHTML = time;
}