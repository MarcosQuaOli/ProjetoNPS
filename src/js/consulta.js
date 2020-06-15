$(document).ready(() => {
    $('.nps__selection a').click((e) => {
        let target = $(e.target).attr('href');
        e.preventDefault();

        if(target == '#npsDia') {
            $('#npsMes').fadeOut();
            $('#npsAno').fadeOut();
            $(target).fadeIn();
        } else if(target == '#npsMes') {
            $('#npsDia').fadeOut();
            $('#npsAno').fadeOut();
            $(target).fadeIn();
        } else {
            $('#npsDia').fadeOut();
            $('#npsMes').fadeOut();
            $(target).fadeIn();
        }
    })
})