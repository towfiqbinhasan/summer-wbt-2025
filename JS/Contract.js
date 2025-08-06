function checkContact(){
    var service = prompt("What service do you want");
    if (service === null) {
        alert("Please enter a valid service.");
    } else if(service === "Web Developer") {
        alert("You have selected: " + service);
    } else if(service === "Data Scientist") {
        alert("You have selected: " + service);
    } else if (service === "Frontend Developer") {
        alert("You have selected: " + service) ;
    }


    var service = prompt("What Project do you want");
    if (service === null) {
        alert("Please enter a valid Project.");
    } else if(service === "Full Stack Web Development") {
        alert("You have selected: " + service);
    } else if(service === "NLP") {
        alert("You have selected: " + service);
    } else if (service === "Data Science") {
        alert("You have selected: " + service) ;
    }

}