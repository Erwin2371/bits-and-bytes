$(document).ready(function () {
  $(".checking_email").keyup(function (e) {
    var email = $(".checking_email").val();
    //alert(email);
    $.ajax({
      type: "POST",
      url: "code.php",
      data: {
        check_submit_btn: 1,
        email_id: email,
      },
      success: function (response) {
        //alert(response);
        $(".error_email").text(response);
      },
    });
  });
});

function renderTime() {
  //Date
  var mydate = new Date();
  var year = mydate.getYear();
  if (year < 1000) {
    year += 1900;
  }
  var day = mydate.getDay();
  var month = mydate.getMonth();
  var daym = mydate.getDate();
  var dayarray = new Array(
    "Sunday,",
    "Monday,",
    "Tuesday,",
    "Wednesday,",
    "Thursday,",
    "Friday,",
    "Saturday"
  );
  var montharray = new Array(
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
  );
  //Date End

  //Time
  var currentTime = new Date();
  var h = currentTime.getHours();
  var m = currentTime.getMinutes();
  var s = currentTime.getSeconds();
  if (h == 24) {
    h = 0;
  } else if (h > 12) {
    h = h - 0;
  }

  if (h < 10) {
    h = "0" + h;
  }

  if (m < 10) {
    m = "0" + m;
  }

  if (s < 10) {
    s = "0" + s;
  }

  var myClock = document.getElementById("ClockDisplay");
  myClock.textContent =
    "" +
    dayarray[day] +
    " " +
    daym +
    " " +
    montharray[month] +
    " " +
    year +
    " | " +
    h +
    ":" +
    m +
    ":" +
    s;
  myClock.innerText =
    "" +
    dayarray[day] +
    " " +
    daym +
    " " +
    montharray[month] +
    " " +
    year +
    " | " +
    h +
    ":" +
    m +
    ":" +
    s;

  setTimeout("renderTime()", 1000);
}
renderTime();

function background() {
  var h = new Date().getHours();
  if (h >= 6 && h < 12) {
    document.body.style.backgroundImage = "url('image/morning.jpg')";
    document.getElementById("start").style.color = "#d4d450";
    document.getElementById("greet").style.color = "#241854";
    document.getElementById("greet").innerHTML =
      "Good Morning Admin! Blessings of grace and peace be with you today and everyday!";
  } else if (h >= 12 && h < 19) {
    document.body.style.backgroundImage = "url('image/afternoon.jpg')";
    document.getElementById("greet").style.color = "#241854";
    document.getElementById("greet").innerHTML =
      "Night has gone, Morning has gone. But I have goodnoon to say!";
  } else if (h >= 12 && h < 19) {
    document.body.style.backgroundImage = "url('image/evening.jpg')";
    document.getElementById("greet").style.color = "#241854";
    document.getElementById("greet").innerHTML =
      "Evenings are the beautifully sweet spot between the harsh light of the day and the dead darkness of night.";
  } else {
    document.body.style.backgroundImage = "url('image/night.jpg')";
    document.getElementById("start").style.color = "#d4d450";
    document.getElementById("greet").style.color = "yellow";
    document.getElementById("greet").innerHTML =
      "Dont loss hope. Your never know what tomorrow will bring! Take a good rest!";
  }
  var t = setTimeout(background, 500);
}
