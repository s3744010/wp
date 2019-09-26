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
    // document.querySelector(".booking .time").innerHTML = element.querySelector(".time .inner").innerHTML;
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
    var day = element.querySelector("div").innerHTML.substring(0, 4);
    var hour = element.querySelector("div").innerHTML.substring(6, 10);

    var spanTagDay = document.createElement('span');
    spanTagDay.setAttribute("id", "day");
    spanTagDay.innerHTML = day;
    var spanTagHour = document.createElement('span');
    spanTagHour.setAttribute("id", "hour");
    spanTagHour.innerHTML = hour;
    document.querySelector(".booking-form .form h1").innerHTML = title + "-";
    document.querySelector(".booking-form .form h1").appendChild(spanTagDay);
    document.querySelector(".booking-form .form h1").innerHTML += "-";
    document.querySelector(".booking-form .form h1").appendChild(spanTagHour);

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
            STP: document.getElementById('STP').value,
            STA: document.getElementById('STA').value,
            STC: document.getElementById('STC').value,
        };
        var fod = isFullOrDiscount(document.getElementById("day").innerHTML, document.getElementById("hour").innerHTML);
        var total = 0;
        for (seatCode in qtySeats) {
            total += qtySeats[seatCode] * seatPrices[fod][seatCode];
        }
        document.getElementById("totalPrice").innerHTML = total;
    }
    calcResult();
}

// $days = ['MON','TUE', 'WED', 'THURS', 'FRI', 'SAT', 'SUN'];
// $hours = [ 'T12', 'T15', 'T18', 'T21', 'T00' ]; 

// foreach ( $days as $day ) {
//   foreach ( $hours as $hour ) {
//     echo '<p>'.$day.' '.$hour.': '.isFullOrDiscount( $day, $hour ).'</p>';
//     // or this → echo "<p>$day $hour: ".isFullOrDiscount( $day, $hour )."</p>";
//   }
// }




  
// function plus(whichID) {
//   console.log('plus button click');
//   var whichQty = document.getElementById(whichID+"-qty");
//   var whichSubtotal = document.getElementById(whichID+"-subtotal");
//   console.log('whichQty+' quantity is: ' + '// your code here');
//   console.log('whichSubtotal+" is: $' + '// your code here');
// }

// function minus(whichID) {
//   console.log(minus button click');
//   var whichQty = document.getElementById(whichID+"-qty");
//   var whichSubtotal = document.getElementById(whichID+"-subtotal");
//   console.log(whichQty+' quantity is: ' + '// your code here');
//   console.log(whichSubtotal+' is: $' + '// your code here');
// }
// var prices = { 
//     p1: { o1:18.5, o2:15.5, o3:30 },
//     p2: { o1:28.5, o2:25.5, o3:40 },
//     p3: { o1:38.5, o2:35.5, o3:50 }
//   };
  
//   alert(prices.p2.o3); // should display 40
//   alert(prices['p3']['o1']); // should display 38.5

//   //^(\(04\)|04|\+614)( ?\d){8}$
//   //^[a-zA-Z \-.']{1,100}$ 