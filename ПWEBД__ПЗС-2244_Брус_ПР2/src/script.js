(function Drone()
    {
        const speedMin = 150;
        const speedMax = 200;
        const speedSound = 1236;
        const hearDrone = 20;
        let a = [23,20.50,5,1,11.99,50,32,40];
        let b = [3.11,5.30,7,10,15,32.68,10,2,1];
        for (let i = 0; i < a.length; i++) {
            let outData = document.querySelector(".data");
            const timeMax = a[i] / speedMin;
            const timeMin = b[i] / speedMax;
            let element = document.createElement("div");
            element.classList.add("element");
            if(a[i] < hearDrone)
            {
                const hear = a[i] / speedSound;
                element.innerText = `Дистанція: ${a[i]}
                                    Мінімальний час польоту:  ${timeMin} годин.
                                    Максимальний час польоту: ${timeMax} годин.
                                    Час відстеження звуку дрона: ${hear} годин`;
            }
            else 
            {
                element.innerText = `Дистанція: ${b[i]}
                                    Мінімальний час польоту:  ${timeMin} годин. 
                                    Максимальний час польоту: ${timeMax} годин. 
                                    Дрон знаходиться дуже далеко`;
            }
            outData.appendChild(element);                     
        }
    }
)();