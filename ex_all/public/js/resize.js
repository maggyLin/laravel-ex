var oHTML = document.querySelector('html');
var aWidth = oHTML.clientWidth;
var new_size = (aWidth / 1000) * 16;

// if(new_size>16) oHTML.style.fontSize = '16px';
// else if (new_size<14) oHTML.style.fontSize = '14px';
// else oHTML.style.fontSize = new_size + 'px';

oHTML.style.fontSize = '16px';

//resize 重新定義
window.onresize = function() {

    var inner_w = window.innerWidth;
    //console.log('inner_w :>> ', inner_w);

    if(inner_w>768){ 
        var oHTML = document.querySelector('html');
        var aWidth = oHTML.clientWidth;
        var new_size = (aWidth / 1000) * 16;
        
        // if(new_size>16) oHTML.style.fontSize = '16px';
        // else if (new_size<14) oHTML.style.fontSize = '14px';
        // else oHTML.style.fontSize = new_size + 'px';

        oHTML.style.fontSize = '16px';
    }

    
};


function numberFormat(num){
    var newNum = "";
    newNum =  num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    return newNum;
}
