$(document).ready(() => {
    $('.notas .btn').click((e) => {
        let nota = $(e.target).html();

        console.log(nota);

        window.location.href = "/nps-create?nota=" + nota;
    })
})