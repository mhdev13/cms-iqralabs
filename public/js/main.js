function myFunction() {
  document.getElementById("wizard").submit();
}

$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Previous',
            next : 'Next Step',
            finish : 'Submit',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            var fullname = $('#first_name').val() + ' ' + $('#last_name').val();
            var lastname = $('#last_name').val() + ' ' + $('#last_name').val();
            var email = $('#email').val();
            var address = $('#address').val();

            $('#fullname-val').text(fullname);
            $('#lastname-val').text(lastname);
            $('#email-val').text(email);
            $('#address-val').text(address);

            return true;
        }
    });
    $("#date").datepicker({
        dateFormat: "MM - DD - yy",
        showOn: "both",
        buttonText : '<i class="zmdi zmdi-chevron-down"></i>',
    });
});
