var dropdown = document.getElementById("dropdown");

var trigger = document.getElementById("dropdowntrigger");

dropdown.style.display = "none";

var toggle = 0;

function toggledropdown(){
    
    if(toggle == 0){
        
        dropdown.style.display = "block";
        
        trigger.innerHTML = "Catégories <small>&#x25B2;</small>";
        
        toggle = 1;
        
    }else if(toggle == 1){
        
        dropdown.style.display = "none";
        
        trigger.innerHTML = "Catégories <small>&#x25BC;</small>";
        
        toggle = 0;
        
    }

}

// Parachute

function parachute(message){
    
    if(!confirm(message)) return false;
    
}
