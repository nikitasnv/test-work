$('.btn-subscribe').click(function () {
    let phone = localStorage.getItem('phone')
    let isValid = false

    while (!isValid) {
        phone = prompt('Write phone number:', phone)
        if (phone === null) {
            return
        }
        isValid = phonenumber(phone)
    }

    localStorage.setItem('phone', phone)
    $.get(urlSubscribe, {phone: phone})
        .done(function () {
            alert("You have subscribed!");
        });
})


function phonenumber(inputtxt) {
    var phoneno = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
    if (inputtxt.match(phoneno)) {
        return true;
    } else {
        return false;
    }
}