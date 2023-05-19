function togglePreference(){
    var checkBox= document.getElementById('customSwitch1');
    if(checkBox.checked==true){
        var nonVegItems = document.getElementsByClassName('non-veg');
        var i;
        for (i = 0; i < nonVegItems.length; i++) {
            nonVegItems[i].style.display = "table-row";
        }
    }else{
        var nonVegItems = document.getElementsByClassName('non-veg');
        var i;
        for (i = 0; i < nonVegItems.length; i++) {
            nonVegItems[i].style.display = "none";
        }
    }
}


togglePreference();