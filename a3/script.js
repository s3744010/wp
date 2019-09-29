function turnActive(element) {
    // document.body.style.backgroundColor = "red";
    var navbar = document.getElementById('navbar').getElementsByTagName('a');

    [].forEach.call(navbar, function(el) {
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
    for (var index = 0; index < movieTime.length ; index++) {
        var aTag = document.createElement('a');
        aTag.setAttribute('href',"#booking-form");
        var divTag = document.createElement('div');
        divTag.innerHTML = movieTime[index].innerHTML;
        aTag.appendChild(divTag);
        aTag.addEventListener("click", function(){
            openBookingForm(this);
        });
        synopsis.getElementsByClassName("time")[0].appendChild(aTag);
    }
}

function openBookingForm(element){
    var title = document.querySelector(".synopsis .movie h1").innerHTML;
    var day = element.querySelector("div").innerHTML.substring(0, 3);
    var hour = element.querySelector("div").innerHTML.substring(6, 10);

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

    document.querySelector(".booking-form").style.display = "block";
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
        if (hour == "12pm") {
            if (day != 'Sat' && day != 'Sun')
                ret = "discount";
        }
        return ret;
    }

    function calcResult() {
        var qtySeats = {
            FCA: document.getElementById('FCA').value,
            FCP: document.getElementById('FCP').value,
            FCC: document.getElementById('FCC').value,
            STA: document.getElementById('STA').value,
            STP: document.getElementById('STP').value,
            STC: document.getElementById('STC').value,
        };
        var fod = isFullOrDiscount(document.getElementById("day").innerHTML, document.getElementById("hour").innerHTML);
        var total = 0;
        for (seatCode in qtySeats) {
            total += qtySeats[seatCode] * seatPrices[fod][seatCode];
        }
        console.log(total);
        document.getElementById("totalPrice").innerHTML = total.toFixed(2);
    }
    calcResult();
}

function validateName(){
    var name= document.getElementById("name").value

    var nameRGEX = /^[a-zA-Z \-.']{1,100}$/;
    var nameResult = nameRGEX.test(name);

    if (nameResult == false){
        alert("please enter a valid name");
        return false;
    }
    return true;
}

function validateMobile(){
    var mobile = document.getElementById("mobile").value;

    var mobileRGEX = /^(\(04\)|04|\+614)( ?\d){8}$/;

    var mobileResult = mobileRGEX.test(mobile);

    if (mobileResult ==false){
        alert("please enter a valid mobile number");
        return false;
    }

    return true;
}
function validateCard(){
    var card = document.getElementById("credit-card").value;

    var cardRGEX = /^([0-9]{4}[\s-]?){3}([0-9]{4})$/;

    var cardResult = cardRGEX.test(card);

    if (cardResult ==false){
        alert("please enter a valid card number");
        return false;
    }
    return  true;
}

function validateExp(){

    var exMonth = document.getElementById("expiry").value.substring(5,8);
    var exYear = document.getElementById("expiry").value.substring(0,4);
    var month = new Date().getMonth();
    var year = new Date().getFullYear();

    if (exMonth < month && exYear <= year)
    {
        alert("Please enter a valid expiration date");
        return false;
    }
    return true;
}




