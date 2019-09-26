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
    document.querySelector(".booking .time").innerHTML = element.querySelector(".time .inner").innerHTML;
    synopsis.querySelector(".plot p").innerHTML = element.querySelector(".plot_description").innerHTML;
    synopsis.querySelector(".trailer").innerHTML = element.querySelector(".trailer").innerHTML;

    var time = synopsis.getElementsByClassName("time")[0].getElementsByTagName("div");
    for (var index = 0;index < time.length; index++) {
        time[index].addEventListener("click", openBookingForm);
    }
}

function openBookingForm(element){

    document.getdocument.querySelector(".synopsis .movie h1").innerHTML;
    document.getdocument.querySelector("").innerHTML;
    console.log(document.querySelector(".synopsis .movie h1").innerHTML);
}

// function calc(){

//     var quantity = document.getElementById("quantity").value;
//     if(quantity>0){

//         var price = document.getElementById("ticket-price").innerHTML;
//         var total = price * quantity;
//     }

//     document.getElementById("Price").innerHTML = salePrice.toFixed(2)

// }

$days = ['MON','TUE', 'WED', 'THURS', 'FRI', 'SAT', 'SUN'];
$hours = [ 'T12', 'T15', 'T18', 'T21', 'T00' ]; 

// foreach ( $days as $day ) {
//   foreach ( $hours as $hour ) {
//     echo '<p>'.$day.' '.$hour.': '.isFullOrDiscount( $day, $hour ).'</p>';
//     // or this → echo "<p>$day $hour: ".isFullOrDiscount( $day, $hour )."</p>";
//   }
// }


// function isFullOrDiscount( $day, $hour ) { 

    
//     if ( $day == 'MON' || $day == 'WED' ) 
//        return 'discount';
//     else {
//        return 'price';
//     }
//   }

var seatPrices = {
    full: { 
        STA:19.80,
        STP:17.50,
        STPC:15.30,
        FCA:30.00,
        FCP:27.00,
        FCC:24.00
    },
    discount: {
        STA:14.80,
        STP:12.50,
        STPC:11.00,
        FCA:24.00,
        FCP:22.50,
        FCC:21.00
    }
}

function isFullOrDiscount(day,hour){
    if( day == 'MON'|| day == 'WED )
        return discount;
    else{

        }
    }

    
        
    else{

    }
    

}

  
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