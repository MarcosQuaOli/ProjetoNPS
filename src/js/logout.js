$(document).ready(() => {
    $('.btn__back--home').dblclick((e) => {
        e.preventDefault();

        window.location.href= '/logout';
    })
})