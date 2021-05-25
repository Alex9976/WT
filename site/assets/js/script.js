document.getElementById("modal-window").style.display = "none";
let btn = document.getElementsByClassName("basket");

        document.getElementsByClassName("close")[0].onclick = function() 
        {
            document.getElementById("modal-window").style.display = "none";
            document.getElementsByTagName("body")[0].style.overflow = "visible";
        }

        btn[0].onclick = function() 
        {       
            document.getElementById("modal-window").style.display = "block";
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
        }
 
        window.onclick = function(event) 
        {
            if (event.target == document.getElementById("modal-window")) 
            {
                document.getElementById("modal-window").style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "visible";
            }
        }