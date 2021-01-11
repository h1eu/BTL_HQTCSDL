var canvas = document.getElementById("game");
var context = canvas.getContext("2d");


// var o_x=Array(10,150,200);
// var x=Array(10,150,200);
var x=10,o_x=10;
// var y=Array(canvas.height-10,canvas.height-10,canvas.height-10);
var y=canvas.height-10;
// var f_x=Array(350,350,350);
// var f_y=Array(350,350,350);
var f_x=350,f_y=350;

var drawBall=function(p1,p2,size=10){
    context.beginPath();
    context.arc(p1,p2,size,0,Math.PI*2);
    context.fillStyle='red';
    context.fill();
    context.closePath();
}
    
    // var point_x=addPointx();
    // var point_y=addPointy();
function pushBall(){
    setInterval(function(){
        context.clearRect(0, 0, canvas.width, canvas.height);
        // for(key in x){
        //     x[key]++;
        //     y[key]=((f_y[key]-(canvas.height-10))*(x[key]-o_x[key]))/(f_x[key]-o_x[key])+canvas.height-10;
        //     if(y[key]<=f_y[key]) {
        //         x[key]=o_x[key];
        //         y[key]=canvas.height-10;
        //         f_x[key]=addPointx();
        //         f_y[key]=addPointy();
        //         console.log(FnPoints);
        //     }
        //     drawBall(x[key],y[key]);
        // }
        let x2=x,y2=y;
        x++;
        y=((f_y-(canvas.height-10))*(x-o_x))/(f_x-o_x)+canvas.height-10;
        drawBall(x,y);
        setTimeout(drawBall,1000,x2,y2);
        if(y<=f_y){
            drawBall(x,y,50);
            x=o_x;
            y=canvas.height-10;
            f_x=addPointx();
            f_y=addPointy();

        }
        
    },20);
}

pushBall();


//tao dich' random ko qua thap
//tao pt duong thang den dich random
//draw cac diem
//tranh lap lai


function addPointx(){
    return (Math.random() * (500-200)+200);
}
function addPointy(){
    return (Math.random() * (200-100)+100);
}
// y=2*x+1
