let canvas = document.querySelector('#canvas');
let ctx = canvas.getContext("2d");

const drawTriangle = () => {
  
  let [ AB, BC, AC ] = [ 'a-side', 'b-side', 'c-side' ]
    .map(id => parseFloat(document.querySelector(`#${id}`).value));
  
  if (!AB || !BC || !AC) return;
  
  let [ max, min1, min2 ] = [ AB, BC, AC ].sort((a, b) => b - a);
  if (max > (min1 + min2)) return;
  
  let Cx = (AB * AB + AC * AC - BC * BC) / (2 * AB);
  let Cy = -Math.sqrt(AC * AC - Cx * Cx);
  
  let [ A, B, C ] = [
    [ 0, 0 ],
    [ AB, 0 ],
    [ Cx, Cy ]
  ];
  
  let { width: canvasWidth, height: canvasHeight } = canvas.getBoundingClientRect();
  let canvasMid = [ canvasWidth / 2, canvasHeight / 2 ];
  
  let mid = [
    (A[0] + B[0] + C[0]) / 3,
    (A[1] + B[1] + C[1]) / 3
  ];
  
  [ A, B, C ] = [ A, B, C ].map(([ x, y ]) => {
    
    [ x, y ] = [ x - mid[0], y - mid[1] ];
    
    return [ x + canvasMid[0], y + canvasMid[1] ];
    
  });

  
  
  let cosA, cosB, cosC;
  cosA = (BC*BC + AC*AC - AB*AB) / (2*BC*AC);
  cosB = (AB*AB + AC*AC - BC*BC) / (2*AB*AC);
  cosC = (AB*AB + BC*BC - AC*AC) / (2*AB*BC);

  angleA = Math.acos(cosA) * 180 / Math.PI;
  angleB = Math.acos(cosB) * 180 / Math.PI;
  angleC = Math.acos(cosC) * 180 / Math.PI;
   Math.round(angleB), Math.round(angleC);
  document.getElementById("AB").textContent=Math.round(angleA)+"°";
  document.getElementById("BC").textContent=Math.round(angleB)+"°";
  document.getElementById("AC").textContent=Math.round(angleC)+"°";
    if(AB === BC && BC === AC){
      document.getElementById("triangle_type").textContent="рівносторонній";
    } 
    else if(AB === BC || AB === AC || BC === AC){
      document.getElementById("triangle_type").textContent="рівнобедрений";
    }
    else{
      document.getElementById("triangle_type").textContent="нерівносторонній"
    }
  
  ctx.clearRect(0, 0, canvasWidth, canvasHeight);
  ctx.beginPath();
  ctx.fillStyle = '#000';
  ctx.moveTo(A[0], A[1]);
  ctx.lineTo(B[0], B[1]);
  ctx.lineTo(C[0], C[1]);
  ctx.fill();  
}

for (let id of [ 'a-side', 'b-side', 'c-side' ]) {
  document.querySelector(`#${id}`).addEventListener('input', drawTriangle);
}
drawTriangle();