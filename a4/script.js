function turnActive(element) {
    var navbar = document.getElementById('navbar').getElementsByTagName('a');

    [].forEach.call(navbar, function (el) {
        el.classList.remove("active");
    });
    element.classList.add("active");
}

function movieOption(element) {
    var synopsis = document.querySelector(".synopsis");
    document.getElementsByClassName('synopsis')[0].style.display = "flex";
    synopsis.querySelector("h1").innerHTML = element.querySelector(".title p").innerHTML;
    synopsis.querySelector(".plot p").innerHTML = element.querySelector(".plot_description").innerHTML;
    synopsis.querySelector(".trailer").innerHTML = element.querySelector(".trailer").innerHTML;

    var movieTime = element.getElementsByClassName("time")[0].getElementsByClassName("inner")[0].getElementsByTagName("div");
    synopsis.getElementsByClassName("time")[0].innerHTML = "";
    for (var index = 0; index < movieTime.length; index++) {
        var aTag = document.createElement('a');
        aTag.setAttribute('href', "#booking-form");
        var divTag = document.createElement('div');
        divTag.innerHTML = movieTime[index].innerHTML;
        aTag.appendChild(divTag);
        aTag.addEventListener("click", function () {
            openBookingForm(this);
        });
        synopsis.getElementsByClassName("time")[0].appendChild(aTag);
    }
}

function openBookingForm(element) {
    var title = document.querySelector(".synopsis .movie h1").innerHTML;
    var day = element.querySelector("div").innerHTML.substring(0, 3);
    var hour = element.querySelector("div").innerHTML.substring(6, 10);

    var inputTagMovie = document.createElement('input');
    inputTagMovie.setAttribute("type", "hidden");
    inputTagMovie.setAttribute("name", "movie[id]");
    inputTagMovie.setAttribute("id", "movie-id");
    var movieID = {
        ACT: "Avengers: End Game",
        RMC: "Top End Wedding",
        ANM: "Dumbo",
        AHF: "The Happy Prince"
    }
    for (movieCode in movieID) {
        if (movieID[movieCode] == title) {
            inputTagMovie.value = movieCode;
        }
    }

    var inputTagDay = document.createElement('input');
    inputTagDay.setAttribute("type", "hidden");
    inputTagDay.setAttribute("name", "movie[day]");
    inputTagDay.setAttribute("id", "movie-day");
    inputTagDay.value = day.toUpperCase();

    var inputTagHour = document.createElement('input');
    inputTagHour.setAttribute("type", "hidden");
    inputTagHour.setAttribute("name", "movie[hour]");
    inputTagHour.setAttribute("id", "movie-hour");
    if (hour.match(/[a-zA-Z]+/g) == "PM" && Number(hour.match(/\d+/)) != 12) {
        inputTagHour.value = "T" + (Number(hour.match(/\d+/)) + 12);
    } else {
        inputTagHour.value = "T" + hour.match(/\d+/);
    }

    var spanTagDay = document.createElement('span');
    spanTagDay.setAttribute("id", "day");
    spanTagDay.innerHTML = day;

    var spanTagHour = document.createElement('span');
    spanTagHour.setAttribute("id", "hour");
    spanTagHour.innerHTML = hour;

    document.querySelector(".booking-form .form h1").innerHTML = title + " - ";
    document.querySelector(".booking-form .form h1").appendChild(spanTagDay);
    document.querySelector(".booking-form .form h1").innerHTML += " - ";
    document.querySelector(".booking-form .form h1").appendChild(spanTagHour);
    document.querySelector(".booking-form .form h1").appendChild(inputTagMovie);
    document.querySelector(".booking-form .form h1").appendChild(inputTagDay);
    document.querySelector(".booking-form .form h1").appendChild(inputTagHour);

    document.querySelector(".booking-form").style.display = "block";

    document.getElementById("totalPrice").innerHTML = calculateTotal();
}

function calculateTotal() {
    var seatPrices = {
        full: {
            FCA: 30.00,
            FCP: 27.00,
            FCC: 24.00,
            STA: 19.80,
            STP: 17.50,
            STC: 15.30,
        },
        discount: {
            FCA: 24.00,
            FCP: 22.50,
            FCC: 21.00,
            STA: 14.00,
            STP: 12.50,
            STC: 11.00,
        }
    }

    function isFullOrDiscount(day, hour) {
        var ret = "full";
        if (day != "Sat" && day != "Sun")
            ret = "discount";

        if (hour != "12PM" && day != "Mon" && day != "Wed")
            ret = "full";
        return ret;
    }

    function calcResult() {
        var qtySeats = {
            FCA: document.getElementById('seats-FCA').value,
            FCP: document.getElementById('seats-FCP').value,
            FCC: document.getElementById('seats-FCC').value,
            STA: document.getElementById('seats-STA').value,
            STP: document.getElementById('seats-STP').value,
            STC: document.getElementById('seats-STC').value,
        };
        var fod = isFullOrDiscount(document.getElementById("day").innerHTML, document.getElementById("hour").innerHTML);

        var total = 0;
        for (seatCode in qtySeats) {
            total += qtySeats[seatCode] * seatPrices[fod][seatCode];
        }
        return total.toFixed(2);
    }
    document.getElementById("totalPrice_display").innerHTML = calcResult();
    document.getElementById("totalPrice").value = calcResult();
    return calcResult();
}

function glowBorder(element) {
    element.style.boxShadow = "0 0 5px #e6e6e6";
}

function dimBorder(element) {
    element.style.boxShadow = "0 0 0px black";
}

function setExpiryDateMinMax() {
    var today = new Date();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm;
    endDate = (yyyy + 3) + '-' + mm;
    document.getElementById("expiry").setAttribute("min", today);
    document.getElementById("expiry").setAttribute("max", endDate);
}
