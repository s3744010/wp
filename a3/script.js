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

function validateName(){
    var name= document.getElementById("name").value

    var nameRGEX = /^[a-zA-Z \-.']{1,100}$/;
    var nameResult = nameRGEX.test(name);

    if (nameResult ==false){
        alert("please enter correct name");
        return false;
    }
    return true;
}

function validateMobile(){
    var mobile = document.getElementById("mobile").value;

    var mobileRGEX = /^(\(04\)|04|\+614)( ?\d){8}$/;

    var mobileResult = mobileRGEX.test(mobile);

    if (mobileResult ==false){
        alert("please valid mobile number");
        return false;
    }

    return true;
}
function validateCard(){
    var card = document.getElementById("credit-card").value;

    var cardRGEX = /^([0-9]{4}[\s-]?){3}([0-9]{4})$/;

    var cardResult = cardRGEX.test(card);

    if (cardResult ==false){
        alert("please valid card number");
        return false;
    }
    return  true;
}

function validateExp(){

    var exMonth = document.getElementById("expiry").value.substring(5,8);
    var exYear = document.getElementById("expiry").value.substring(0,4);
    var year = new Date().getFullYear;
    var month = new Date().getMonth;

    if (exMonth<month && exYear<=year)
    {
        alert("Please enter a valid expiration date");
        return false;
    }
    return true;

}




