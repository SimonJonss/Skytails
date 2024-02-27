function submitFormWithId(elemId) {
    var elem = document.getElementById(elemId);
    elem.submit();
    // elem.reset();
    // alert("REEE");
    return false;
}

try {
    document.getElementById("currentYear").textContent = new Date().getFullYear();
} catch (error) {
    let miss = true;
}





function fixTextareaHeight(classname) {
    // console.log("weeell");
    var elems = document.getElementsByClassName(classname);
    for (var i = 0; i < elems.length; i += 1) {
        if (elems[i].scrollHeight > elems[i].style.height) {
            elems[i].style.height = elems[i].scrollHeight+20+'px';
        }
    }
}

// var height = Math.max( body.scrollHeight, body.offsetHeight, 
//     html.clientHeight, html.scrollHeight, html.offsetHeight, 
//     document.body.scrollHeight, document.body.clientHeight );
// // if (document.body.clientHeight < document.documentElement.scrollHeight) {
// //     topDistance = document.documentElement.scrollHeight;
// // }
// document.getElementById("sticky-footer").style.top = topDistance;

// setTimeout(function(){
//     var body = document.body,
//     html = document.documentElement;

// var heightMax = Math.max( body.scrollHeight, body.offsetHeight, 
//                        html.clientHeight, html.scrollHeight, html.offsetHeight, window.innerWidth );

// if (document.body.scrollHeight < heightMax) {
    // alert(heightMax + " --> " + (document.body.scrollHeight - heightMax));
    
    // document.getElementById("sticky-footer").style.bottom = (document.body.scrollHeight - heightMax)  
// }
// alert(heightMax + " --> " + document.body.scrollHeight);
// }, 0);


