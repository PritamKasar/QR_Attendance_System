const qrinput1 = document.querySelector(".d1");
const qrinput2 = document.querySelector(".d2");
const qrinput3 = document.querySelector(".d3");
const qrinput4 = document.querySelector(".d4");
const qrImage = document.querySelector("Img");
const generateBtn = document.querySelector(".btn");
const dwnldbtn = document.querySelector(".dbtn");

generateBtn.addEventListener('click', () => {
    const qrCode = 'https://api.qrserver.com/v1/create-qr-code/?size=170x170&data=${input.value}';
    qrImage.src = qrCode;
});

qr = document.querySelector(".qr"),
    qrInput1 = qr.querySelector(".d1"),
    qrInput2 = qr.querySelector(".d2"),
    qrInput3 = qr.querySelector(".d3"),
    qrInput4 = qr.querySelector(".d4"),
    create = qr.querySelector(".form button"),
    qrImg = qr.querySelector(".qr-code img");
let preValue;

create.addEventListener("click", () => {
    let qrValue1 = qrInput1.value.trim();
    let qrValue2 = qrInput2.value.trim();
    let qrValue3 = qrInput3.value.trim();
    let qrValue4 = qrInput4.value.trim();
    if (!qrValue1 || preValue === qrValue1) return;
    else if (!qrValue2 || preValue === qrValue2) return;
    else if (!qrValue3 || preValue === qrValue3) return;
    else if (!qrValue4 || preValue === qrValue4) return;
    preValue = qrValue1;
    preValue = qrValue2;
    preValue = qrValue3;
    preValue = qrValue4;
    create.innerText = "Generating QR Code...";
    qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue1}\n:${qrValue2}\n:${qrValue3}\n:${qrValue4}:`;
    qrImg.addEventListener("load", () => {
        qr.classList.add("active");
        create.innerText = "Generate QR Code";
    });
});

qrInput1.addEventListener("keyup", () => {
    if (!qrInput1.value.trim()) {
        qr.classList.remove("active");
        preValue = "";
    }
});

generateBtn.addEventListener('click', () => {
    dwnldbtn.removeAttribute('disabled')
});

dwnldbtn.addEventListener("click", async () =>{
    let qrValue1 = qrInput1.value.trim();
    const reesponse =await fetch(qrImage.src);
    const data =await reesponse.blob();
    const downloadLink=document.createElement("a");
    downloadLink.href=URL.createObjectURL(data);
    downloadLink.download=`${qrValue1}.jpg`;
    downloadLink.click();
});

