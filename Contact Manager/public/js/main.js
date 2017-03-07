/*
Daniel Cobb
SSL Week 4 Homework
Main JS file
11/16/2016
*/

$(document).ready(function(){
    // set up a var to get the current window height
    var modalHeight = $(window).height();
    // sets the modals height to the current window
    $('.modal').css('height', modalHeight);

    // fade in user actions on mouse enter
    $('.usercard').on('mouseenter',function(){
        $(this).find('.actions').fadeIn();
    });

    // when the mouse leaves hide the user actions
    $('.usercard').on('mouseleave',function(){
        $(this).find('.actions').css('display', 'none');
    });

    // close the modal when clicking the x icon
    $('.closeModal').on('click', function(){
        $('.modal').fadeOut();
    });

    // close modal when clicking outside of the form
    $('.modal').on('click', function(){
        $('.modal').fadeOut();
    });

    // stop clicks in modalform div from propagating to modal div and closing form
    $('.modalform').on('click', function(e){
        e.stopPropagation();
    })

    // fade in the modal when the add user button is clicked
    $('#createUser').on('click', function(){
        $('.modal').fadeIn();
    });

    // see if alert area is visible, if so fade out
    if($('.alerts').is(':visible')) {
        setTimeout(function(){$('.alerts').fadeOut(1000)}, 4000);
    }
    else {

    }


})
