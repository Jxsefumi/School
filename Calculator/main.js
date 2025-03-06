var result = document.getElementById("result");
var b1 = document.getElementById("B1");
var b2 = document.getElementById("B2");
var b3 = document.getElementById("B3");
var b4 = document.getElementById("B4");
var b5 = document.getElementById("B5");
var b6 = document.getElementById("B6");
var b7 = document.getElementById("B7");
var b8 = document.getElementById("B8");
var b9 = document.getElementById("B9");
var b0 = document.getElementById("B0");

var Plus = document.getElementById("BPlus");
var Minus = document.getElementById("BMinus");
var Multiply = document.getElementById("BMultiply");
var Divide = document.getElementById("BDivide");
var Dot = document.getElementById("Dot");

var Equal = document.getElementById("Equal");
var AllClear = document.getElementById("AC");
var Deleter = document.getElementById("Del");

var FirstNumber = "";
var SecondNumber = "";
var Operator = "";
var Reset = false;


//mga buttons na may value na from 0 - 9
//thanks kay google and sa mga napanood kong tutorials
//kasi nadalian ako sa part na 'to hehe
b1.addEventListener("click", function() {
    Buttons("1");
    hihihi();
});

b2.addEventListener("click", function() {
    Buttons("2");
    wow();
});

b3.addEventListener("click", function() {
    Buttons("3");
    wow();
});

b4.addEventListener("click", function() {
    Buttons("4");
    wow();
});

b5.addEventListener("click", function() {
    Buttons("5");
    wow();
});

b6.addEventListener("click", function() {
    Buttons("6");
    wow();
});

b7.addEventListener("click", function() {
    Buttons("7");
    wow();
});

b8.addEventListener("click", function() {
    Buttons("8");
    wow();
});

b9.addEventListener("click", function() {
    Buttons("9");
    wow();
});

b0.addEventListener("click", function() {
    Buttons("0");
    wow();
});

//Operators na pagpipilian
Plus.addEventListener("click", function() {
    Operations("+");
    wow();
});

Minus.addEventListener("click", function() {
    Operations("-");
    wow();
});

Multiply.addEventListener("click", function() {
    Operations("*");
    wow();
});

Divide.addEventListener("click", function() {
    Operations("/");
    wow();
});

//additional buttons for decimal, equal, all clear
//Sir 'wag niyo pong tadtarin nang pindot yung decimal point
//one decimal point lang po sa parehas na First and Second number
//mag e-error siya as NaN tinatamad na po akong ayusin huhuhu
//fixed the decimal point, you can now only put one decimal point in both
//First and Second Number, additionally if there's already an existing
//decimal point in either variable, it will prevent you from adding another
//decimal point that causes the error NaN
Dot.addEventListener("click", function() {
    Buttons(".");
    wow();
});

Equal.addEventListener("click", function() {
    Buttons("=");
    hih();
});

AllClear.addEventListener("click", function() {
    Buttons("AC");
    hihi();
});

//Idk if pwede ko ba siyang isama nalang sa Buttons pero hiniwalay ko nalang para less problem sa buhay
Deleter.addEventListener("click", function() {
    Delete();
    hihih();
});


//taga compute, yung result nilalagay as FirstNumber, nirereset ang SecondNumber at Operator,
//ginagawang True ang reset Just in case na pinindot yung equal tapos pumindot ng button na 
//may value na 0-9 marereset yung FirstNumber into blank
//Idk bakit pa'ko gumawa ng new var na num1 and num2
//e pwede ko naman na idiretso na 
//result.value = parseFloat(FirstNumber); + parseFloat(SecondNumber);
//wala lang siguro akong magawa sa buhay ko kaya ginanyan ko
//inalis ko na rin yung function na kapag isa sa First or Second number is decimal
//point lang tapos nitry gamitan ng operators is hindi siya gagana until both ay may
//numerical value
function compute() {
    if (FirstNumber === "." && SecondNumber === ".") {
        return;
    } else if (FirstNumber !== "" && SecondNumber === ".") {
        SecondNumberNumber = 0;
    } else if (FirstNumber === "." && SecondNumber !=+ "") {
        FirstNumber = 0;
     } //else if (FirstNumber === ".") {
    //     return;
    // } else if (SecondNumber === ".") {
    //     return;
    // } 
    if (FirstNumber !== "" && SecondNumber !== "") {
        var num1 = parseFloat(FirstNumber);
        var num2 = parseFloat(SecondNumber);
        if (Operator === "+") {
            result.value = num1 + num2;
        } else if (Operator === "-") {
            result.value = num1 - num2;
        } else if (Operator === "*") {
            result.value = num1 * num2;
        } else if (Operator === "/") {
            result.value = num1 / num2;
        }
        FirstNumber = result.value;
        SecondNumber = "";
        Operator = "";
        Operatorss(Operator);
        Reset = true;
    }
}

//Naglalagay ng value to either FirstNumber or SecondNumber
//C-check if yung Operator ba is blanko if blanko ilalagay sa FirstNumber yung value
//if may operator na sa second value niya ilalagay
//chinecheck din if yung Result is true para if pinindot ni user yung equal
//tapos naging FirstNumber yung result if pumindot ng button na may value na 0-9 or decimal
//magrereset yung value ng FirstNumber para another session ulit
//nagp-prevent din siya na maglagay ng more than 1 decimal point sa First or Second
//number na magc-cause ng NaN
function distribute(value) {
    if (Operator === "") {
        if (value === "." && FirstNumber.includes(".")) {
            return;
        }
        if (Reset === true) {
            FirstNumber = value;
            result.value = FirstNumber;
            Reset = false;
        } else {
        FirstNumber += value;
        result.value = FirstNumber;
        }
    } else {
        if (value === "." && SecondNumber.includes(".")) {
            return;
        }
        if (Reset === true) {
            SecondNumber = value;
            result.value = SecondNumber;
            Reset = false;
        } else {
        SecondNumber += value;
        result.value = SecondNumber;
        }
    }
}

//Taga bura ng isang input na nilagay ng user just incase na mamisclick
//Sir nag google pa'ko para sa .slice na 'yan hahahaha
//tinatamad na akong i-explain pano umaandar code, tanungin niyo nalang po ako
//on the spot huhuhu
function Delete() {
    if (Operator === "") {
        if (Reset === true) {
            FirstNumber = "";
            result.value = FirstNumber;
            Reset = false;
        } else {
        FirstNumber = FirstNumber.slice(0, -1);
        result.value = FirstNumber;
        }
    } else {
        SecondNumber = SecondNumber.slice(0, -1);
        result.value = SecondNumber;
    }
}

//Taga reset ng value literal na reset lahat back to blank
function clear() {
    FirstNumber = "";
    SecondNumber = "";
    Operator = "";
    Operatorss(Operator);
    result.value = "";
    Reset = false;
}

//tumatanggap ng clicks na may button na handler and chinecheck niya kung alin sa tatlo ang pinindot
function Buttons(value) {
    if (value === "=") {
        compute();
    } else if (value === "AC") {
        clear();
    } else {
        distribute(value);
    }
}

//nagc-check may FirstNumber naba before naglick ng operator, 
//pumipigil sa paglagay ng same operator nang paulit ulit, ang a-allow na palitan 
//yung operator na napili
function Operations(operator) {
    if (FirstNumber !== "") {
        if (Operator === operator) {
            operationspam();
        } else {
            if (Operator !== "") {
                compute();
            }
            Operator = operator;
            Operatorss(Operator);
            Reset = false;
        }
    } 
}

function operationspam() {
    if (FirstNumber !== "" && SecondNumber !== "") {
        var num1 = parseFloat(FirstNumber);
        var num2 = parseFloat(SecondNumber);
        if (Operator === "+") {
            result.value = num1 + num2;
        } else if (Operator === "-") {
            result.value = num1 - num2;
        } else if (Operator === "*") {
            result.value = num1 * num2;
        } else if (Operator === "/") {
            result.value = num1 / num2;
        }
        FirstNumber = result.value;
        SecondNumber = "";
        Operatorss(Operator);
        Reset = true;
    }
}

function Operatorss(Operator) {
    const Status = document.getElementById("status");
    if (Status) {
        Status.innerHTML = "Operator: " + Operator;
    }
}

function hihihi() {
    var surprise = document.getElementById('hi');
    surprise.currentTime = 0;
    surprise.play();
}

function hihih() {
    var surpris = document.getElementById('hii');
    surpris.currentTime = 0;
    surpris.play();
}

function hihi() {
    var urprise = document.getElementById('hiii');
    urprise.currentTime = 0;
    urprise.play();

    setTimeout(function() {
        urprise.pause();
    }, 3000); 
}

function hih() {
    var rprise = document.getElementById('hiiii');
    rprise.currentTime = 0;
    rprise.play();
}

function wow() {
    var wow = document.getElementById('wow');
    wow.currentTime = 0;
    wow.play();
}
