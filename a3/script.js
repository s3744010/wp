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
    var time = element.querySelector("div").innerHTML.substring(6, 10);
    document.querySelector(".booking-form .form h1").innerHTML = title + "-" + day + "-" + time;
}

function validate(){
    var name= document.getElementById("name").value
    var mobile = document.getElementById("mobile").value;
    var card = document.getElementById("credit-card").value;
    var nameRGEX = /^[a-zA-Z \-.']{1,100}$/;
    var mobileRGEX = /^(\(04\)|04|\+614)( ?\d){8}$/;
    var cardRGEX = /^([0-9]{4}[\s-]?){3}([0-9]{4})$/;
    var nameResult = nameRGEX.test(name);
    var mobileResult = mobileRGEX.test(mobile);
    var cardResult = cardRGEX.test(card);
   

    if (nameResult ==false){
        alert("please enter correct name");
        return false;
    }
    
    if (mobileResult ==false){
        alert("please valid mobile number");
        return false;
    }
    if (cardResult ==false){
        alert("please valid card number");
        return false;
    }
    {
        return true;
    }

    }

function findYear(){

    
    var exMonth=document.getElementById("expiry-month");
    var exYear=document.getElementById("expiry-year");
    var year = new Date().setFullYear;
    var month = new Date().setFullYear;
  


if(exMonth.selectedIndex<month && exYear.selectedIndex<=year)
{
    alert("Please enter a valid expiration date");
    return false;
}
return true;
}
    


// function calc(){

//     var quantity = document.getElementById("quantity").value;
//     if(quantity>0){

//         var price = document.getElementById("ticket-price").innerHTML;
//         var total = price * quantity;
//     }

//     document.getElementById("Price").innerHTML = salePrice.toFixed(2)

// }

// $days = ['MON','TUE', 'WED', 'THURS', 'FRI', 'SAT', 'SUN'];
// $hours = [ 'T12', 'T15', 'T18', 'T21', 'T00' ]; 

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



// function isFullOrDiscount(day,hour){
//     if( day == 'MON'|| day == 'WED )
//         return discount;
//     else{

//         }
//     }

    
        
//     else{

//     }
    



  
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