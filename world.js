
window.onload=function(){
    url ="./world.php"
    console.log("whats up chat?");
    this.document.getElementById("lookup").addEventListener("click",MakeRequest);




};

function afunction(){
    
    fetch('./world.php')
    .then(response => response.text())
    .then(data => {
    // Here's some data!
        document.getElementById("result").textContent= data;
    })
    .catch(error => {
        console.log(error);
    });
}

function MakeRequest(){
    console.log("we plan to list some country searched ngl");
    var countryName=document.getElementById("country").value.trim();
    if (countryName.length >35){
        document.getElementById("result").innerHTML="Name too long!";
        return;
    }
    const newXhttp = new XMLHttpRequest();
    newXhttp.open("GET", url+"?country="+countryName, true);
    newXhttp.onload = function checkStatus() {
        if (this.status === 200) {
           document.getElementById("result").textContent=this.responseText;
        }   
        else {
            window.alert("we got an Error: " + this.status);
        }
    };
    newXhttp.send();
}