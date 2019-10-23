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
        aTag.setAttribute('id', movieTime[index].innerHTML.replace(/\s/g,''));
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

var movieID = {
    ACT: "Avengers: End Game",
    RMC: "Top End Wedding",
    ANM: "Dumbo",
    AHF: "The Happy Prince"
}

function openBookingForm(element) {
    var title = document.querySelector(".synopsis .movie h1").innerHTML;
    var day = element.querySelector("div").innerHTML.substring(0, 3);
    var hour = element.querySelector("div").innerHTML.substring(6, 10);

    var inputTagMovie = document.getElementById("movie-id");
    var inputTagDay = document.getElementById('movie-day');
    var inputTagHour = document.getElementById("movie-hour");

    for (movieCode in movieID) {
        if (movieID[movieCode] == title) {
            inputTagMovie.value = movieCode;
        }
    }

    inputTagDay.value = day;

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

    document.querySelector(".booking-form .inner h1").innerHTML = title + " - ";
    document.querySelector(".booking-form .inner h1").appendChild(spanTagDay);
    document.querySelector(".booking-form .inner h1").innerHTML += " - ";
    document.querySelector(".booking-form .inner h1").appendChild(spanTagHour);

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
    var dd = today.getDate();
    var mm = today.getMonth() + 2;
    var yyyy = today.getFullYear();

    if (dd > 15) {
        mm += 1;
    }

    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm;
    endDate = (yyyy + 3) + '-' + mm;
    document.getElementById("expiry").setAttribute("min", today);
    document.getElementById("expiry").setAttribute("max", endDate);
}


function cc_format(value) {
    var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
    var matches = v.match(/\d{4,16}/g);
    var match = matches && matches[0] || '';
    var parts = [];
    for (index = 0, len = match.length; index < len; index += 4) {
        parts.push(match.substring(index, index + 4))
    }
    if (parts.length) {
        return parts.join(' ');
    } else {
        return value;
    }
}

function loadInputs(originalData) {
    var textRegex = /^[^-\s][a-zA-Z\s-]+$/;
    var numberRegex = /^[^-\s][0-9\s-]+$/;
    var emailRegex = /^[^-\s][a-zA-Z0-9_@.\s-]+$/;
    if (originalData) {
        if (originalData['movie']['id']) {
            for (movieCode in movieID) {
                if (movieCode == originalData['movie']['id']) {
                    movieOption(document.getElementById(movieCode + "_Link"));
                }
            }
        }
        if (originalData['movie']['day']) {
            if (originalData['movie']['hour']) {
                openBookingForm(document.getElementById(originalData['movie']['day'] + "-" + getTime(originalData['movie']['hour'])));
            }
        }
        if (originalData['cust']['name']) {
            if (!textRegex.test(originalData['cust']['name'])) {
                document.getElementById("name").nextElementSibling.innerHTML = "Please insert only text";
                document.getElementById("name").nextElementSibling.style.display = "block";
            } else {
                document.getElementById("name").nextElementSibling.style.display = "none";
            }
            document.getElementById("name").value = originalData['cust']['name'];
        } else {
            console.log("zero");
            document.getElementById("name").nextElementSibling.innerHTML = "Please fill in this field";
            document.getElementById("name").nextElementSibling.style.display = "block";
        }
        if (originalData['cust']['email']) {
            if (!emailRegex.test(originalData['cust']['email'])) {
                document.getElementById("email").nextElementSibling.innerHTML = "Please a valid email address";
                document.getElementById("email").nextElementSibling.style.display = "block";
            } else {
                document.getElementById("email").nextElementSibling.style.display = "none";
            }
            document.getElementById("email").value = originalData['cust']['email'];
        } else {
            document.getElementById("email").nextElementSibling.innerHTML = "Please fill in this field";
            document.getElementById("email").nextElementSibling.style.display = "block";
        }
        if (originalData['cust']['mobile']) {
            if (!numberRegex.test(originalData['cust']['mobile'])) {
                document.getElementById("mobile").nextElementSibling.innerHTML = "Please a valid mobile number";
                document.getElementById("mobile").nextElementSibling.style.display = "block";
            } else {
                document.getElementById("mobile").nextElementSibling.style.display = "none";
            }
            document.getElementById("mobile").value = originalData['cust']['mobile'];
        } else {
            document.getElementById("mobile").nextElementSibling.innerHTML = "Please fill in this field";
            document.getElementById("mobile").nextElementSibling.style.display = "block";
        }

        if (originalData['cust']['card']) {
            if (!numberRegex.test(originalData['cust']['card'])) {
                document.getElementById("credit-card").nextElementSibling.innerHTML = "Please insert a valid credit-card number";
                document.getElementById("credit-card").nextElementSibling.style.display = "block";
            } else {
                document.getElementById("credit-card").nextElementSibling.style.display = "none";
            }
            document.getElementById("credit-card").value = originalData['cust']['card'];
        } else {
            document.getElementById("credit-card").nextElementSibling.innerHTML = "Please fill in this field";
            document.getElementById("credit-card").nextElementSibling.style.display = "block";
        }

        if (originalData['cust']['expiry']) {
            document.getElementById("expiry").value = originalData['cust']['expiry'];
        } else {
            document.getElementById("expiry").nextElementSibling.innerHTML = "Please fill in this field";
            document.getElementById("expiry").nextElementSibling.style.display = "block";
        }

        if (originalData['seats']['totalPrice'] <= 0) {
            for (const [key, value] of Object.entries(originalData['seats'])) {
                if (key != 'totalPrice') {
                    document.getElementById("seats-" + key).nextElementSibling.style.display = "block";
                    console.log(document.getElementById("seats-" + key).nextElementSibling.innerHTML);
                }
            }
        }

        for (const [key, value] of Object.entries(originalData['seats'])) {
            if (key != 'totalPrice') {
                document.getElementById("seats-" + key).selectedIndex = value;
            }
        }
        document.getElementById("totalPrice").innerHTML = calculateTotal();
    }
}

function getTime(timecode) {
    var time = timecode.replace(/^\D+/g, '');
    if (time > 12) {
        time = time - 12;
    }
    return time + "PM";
}