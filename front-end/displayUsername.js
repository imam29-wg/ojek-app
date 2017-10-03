// ambil data
var xmlhttp;
if (window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
} else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
var searchparam = new URLSearchParams(window.location.search);
var id = searchparam.get("id_active");
xmlhttp.open("GET","../back-end/getUsername.php?id_active="+id,true);
xmlhttp.send();
xmlhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200){
              var user = document.getElementById("username");
                    var nama = document.createTextNode("Hi, " + this.response);
                    user.appendChild(nama);
                }
            };