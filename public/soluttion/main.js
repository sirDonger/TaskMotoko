
let script =[];
script['western']=function western(string){


}

script['korean']=function korean(string){

}
function ready() {
    var anchor = document.getElementById('confirm_button');
    anchor.onclick = function() {
        var txtelem = document.getElementById('input_text');
        let text=txtelem.value
        console.log(text)
        process(text);
    }

}
document.addEventListener("DOMContentLoaded", ready);


function process(text){
    $.ajax({
        type: "POST",
        url: "/test-lang",
        success: pushData,
        data: {'text':text, '_token':window.token},
    });
}
function pushData(data){
    var m = Object.entries(data);
    let div = document.getElementById("name_holder");
    div.innerHTML="";
    for(let i=0;i<m[0].length;i++){
        var tag = document.createElement("div");
        tag.className += " col-4";
        tag.style += " border: 1px solid black;margin-top: 5px ";
        tag.innerHTML= '<h5>'+m[i][1]+'</h5> <p>'+m[i][0]+'</p>';
        div.appendChild(tag);
    }

    console.log(m);
}





