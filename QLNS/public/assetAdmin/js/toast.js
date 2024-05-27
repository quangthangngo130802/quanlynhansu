$(document).ready(function () {
    toastSuccessOnLoad();
    toastErrorOnLoad();

});
function toastSuccessOnLoad() {
    var inputToast = document.getElementById('inputToastSuccess');
    if (inputToast) { //Nếu tồn tại thì lấy value
        var inputValue = inputToast.value;
        $('#toast__hong').html(toastSuccess(inputValue));
    }// .html dùng thay đổi code trong thẻ #toast__hong' nó sẽ hiểu và cử lý các thẻ trong phần tử đó.
}

function toastErrorOnLoad() {
    var inputToast = document.getElementById('inputToastError');
    if (inputToast) {  //Nếu tồn tại thì lấy value
        var inputValue = inputToast.value;
        $('#toast__hong').html(toastError(inputValue));
    }
}
function toastSuccess(message) {
    var toast =
        `<div id="toast__l">
        <div class="toast__l toast__success">
            <div class="toast__icon">
                <i class="fas fa-circle-check"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title"> Success</h3>
                <p class="toast__msg">${message}</p>
            </div>
        </div>
    </div>`;
    return toast;
}

function toastError(error) {
    var toast =
        `<div id="toast__l">
        <div class="toast__l toast__error">
            <div class="toast__icon">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title"> Error</h3>
                <p class="toast__msg">${error}</p>
            </div>
        </div>
    </div>`;
    return toast;
}
