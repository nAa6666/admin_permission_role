document.addEventListener('DOMContentLoaded', function () {
   var pass_hide = document.querySelector('.pass-hide');
   var pass_show = document.querySelector('.pass-show');
   [pass_hide, pass_show].forEach(function (item) {
      item.addEventListener('click', function () {
          document.querySelector('.password-toggle').classList.toggle('show');
          if(document.querySelector('.password-toggle.show')){
              document.querySelector('[name=password]').setAttribute('type', 'text');
              if(document.querySelector('[name=password_confirmation]'))
                  document.querySelector('[name=password_confirmation]').setAttribute('type', 'text');
          }else{
              document.querySelector('[name=password]').setAttribute('type', 'password');
              if(document.querySelector('[name=password_confirmation]'))
                  document.querySelector('[name=password_confirmation]').setAttribute('type', 'password');
          }
      })
   });

   var select_toggle = document.querySelector('.select-toggle');
   if(select_toggle){
       ['focus', 'blur'].forEach(function (item) {
           select_toggle.addEventListener(item, function () {
               document.querySelector('.select-status').classList.toggle('open');
           });
       });
   }
});
