function bmi() {
    var height = parseFloat(document.getElementById("h").value)
    var weight = parseFloat(document.getElementById("w").value)
    var bmi = weight / (height * height) * 10000;
    if (bmi < 18.5) {
        document.querySelector("p").innerHTML = "Twoje BMI wynosi: " + (Math.round(bmi * 100) / 100).toFixed(2) + "<br>" + " Niedowaga";
    } else if ((bmi >= 18.5) && (bmi <= 24.9)) {
        document.querySelector("p").innerHTML = "Twoje BMI wynosi: " + (Math.round(bmi * 100) / 100).toFixed(2) + "<br>" + " Pożądana masa ciała"
    } else if (bmi > 25) {
        document.querySelector("p").innerHTML = "Twoje BMI wynosi: " + (Math.round(bmi * 100) / 100).toFixed(2) + "<br>" + " Otyłość"
    } else if (bmi == 0) {
        document.querySelector("p").innerHTML = "Podaj właściwe wartości!"
    }
}
document.querySelector(".btn").addEventListener("click", bmi);