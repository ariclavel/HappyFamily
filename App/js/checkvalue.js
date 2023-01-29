function IsEmail() {
    var str=document.getElementById("email").value;
    var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
    var result = reg.test(str);
    if(!result){
        document.getElementById("emailSpan").innerHTML = "not a email address!";
        return false;
    }else{
        document.getElementById("emailSpan").innerHTML = "";
        return true;
    }
    
}

function IsPassword(){
    var text=document.getElementById("password").value;
    var re =/^(?=.*[a-z])(?=.*\d)[^]{8,16}$/;
    var result = re.test(text);
    if(!result){
        document.getElementById("pwdSpan").innerHTML = "The password must be at least eight digits long and must contain numbers and letters";
        return false;
    }else{
        document.getElementById("pwdSpan").innerHTML = "";
        return true;
    }
}

function isCompare(){
    var text1=document.getElementById("password").value;
    var text2=document.getElementById("cpassword").value;
    if(text2==text1){
        document.getElementById("cpwdSpan").innerHTML = "";
        return true;
    }else{
        document.getElementById("cpwdSpan").innerHTML = "The two entered passwords do not match! Please check!";
        return false;
    }
}

function IsfName(){
    var str=document.getElementById("fname").value;
    var reg= /^[a-zA-Z]+$/;
    var result = reg.test(str);
    if(!result){
        document.getElementById("fnameSpan").innerHTML = "not a correct first name!";
        return false;
    }else{
        document.getElementById("fnameSpan").innerHTML = "";
        return true;
    }
}

function IslName(){
    var str=document.getElementById("lname").value;
    var reg= /^[a-zA-Z]+$/;
    var result = reg.test(str);
    if(!result){
        document.getElementById("lnameSpan").innerHTML = "not a correct last name!";
        return false;
    }else{
        document.getElementById("lnameSpan").innerHTML = "";
        return true;
    }
}

function IsNum(){
    var str=document.getElementById("rnum").value;
    var reg= /^[0-9]*$/;
    var result = reg.test(str);
    if(!result){
        document.getElementById("rnumSpan").innerHTML = "please enter numbers!";
        return false;
    }else{
        document.getElementById("rnumSpan").innerHTML = "";
        return true;
    }
}

function IsPhone(){
    var str=document.getElementById("phone").value;
    var reg= /^(0|[0-9]*){10}$/;
    var result = reg.test(str);
    if(!result){
        document.getElementById("telSpan").innerHTML = "please enter correct phone number!";
        return false;
    }else{
        document.getElementById("telSpan").innerHTML = "";
        return true;
    }
}

function IsEmaillog() {
    var str=document.getElementById("nnn").value;
    var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
    var result = reg.test(str);
    if(!result){
        document.getElementById("nnnSpan").innerHTML = "not a email address!";
        return false;
    }else{
        document.getElementById("nnnSpan").innerHTML = "";
        return true;
    }
   
}

function IsPasswordlog(){
    var text=document.getElementById("mmm").value;
    var re =/^(?=.*[a-z])(?=.*\d)[^]{8,16}$/;
    var result = re.test(text);
    if(!result){
        document.getElementById("mmmSpan").innerHTML = "The password must be at least eight digits long and must contain numbers and letters";
        return false;
    }else{
        document.getElementById("mmmSpan").innerHTML = "";
        return true;
    }
}