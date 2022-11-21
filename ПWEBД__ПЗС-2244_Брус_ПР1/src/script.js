let range = (start, end) => [...Array(end - start).keys(), end - start].map(n => start + n);
let A = range(65, 90);   // A-Z
let a = range(97, 122);  // a-z
let dig = range(48, 57); // 0-9
let allLetters = A.concat(a); 


function generateString(length = 10){
  let str = '';
  let numbers = 0;
  let letters = 0;
  while(numbers < 6 || letters < 4){
    let rand = Math.random();
    if(rand > 0.5 && numbers < 6){
        numbers++;
        str += String.fromCharCode(dig[Math.floor(Math.random() * dig.length)]); 
    }
    if(rand < 0.5 && letters < 4){
        letters++;
        str += String.fromCharCode(allLetters[Math.floor(Math.random() * allLetters.length)]); 
    }
  }
  let str1 = '';
  str1 += String.fromCharCode(range(48, 50)[Math.floor(Math.random() * range(48, 50).length)]); 
  if(str1[0] == '2'){ 
    str1 += String.fromCharCode(range(49, 54)[Math.floor(Math.random() * range(49, 54).length)]);
  }
  else{
    str1 += String.fromCharCode(range(49, 57)[Math.floor(Math.random() * range(49, 57).length)]);
  }  
  let str2 = '';
  str2 += String.fromCharCode(range(48, 49)[Math.floor(Math.random() * range(48, 49).length)]);
  if(str2[0] == '0'){ 
  str2 += String.fromCharCode(range(49, 57)[Math.floor(Math.random() * range(49, 57).length)]);
  }
  else{
  str2 += String.fromCharCode(range(48, 50)[Math.floor(Math.random() * range(48, 50).length)]);
  } 
  str2 +='/';
  str2 += String.fromCharCode(range(48, 50)[Math.floor(Math.random() * range(48, 50).length)]); 
  str2 += String.fromCharCode(range(48, 57)[Math.floor(Math.random() * range(48, 57).length)]); 
  document.getElementById('date_of_manifacture_id').innerHTML = str2; 
  document.getElementById('region_of_manifacturer_id').innerHTML = str1; 
  document.getElementById('code').innerHTML = str;

  document.getElementById("qr_code_id").src = "https://api.qrserver.com/v1/create-qr-code/?data=Перевірити акцизу - https://cabinet.tax.gov.ua/registers/mark   Код виробника:" + str + " Регіон виробника: "+str1 + "Дата виготовлення:" +str2 + "&amp;size=100x100"; 
}