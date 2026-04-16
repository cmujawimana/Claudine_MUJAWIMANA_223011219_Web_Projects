function convertCurrency() {
    let amount = document.getElementById("amount").value;
    let rate = document.getElementById("rate").value;
    let currency = document.getElementById("currency").value;

    // Validation
    if (amount === "" || rate === "") {
        alert("Please enter both amount and rate!");
        return;
    }

    let result = amount / rate;

    document.getElementById("result").innerHTML =
        amount + " FRW = " + result + " " + currency;
}