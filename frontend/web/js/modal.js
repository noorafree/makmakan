/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
   // event on click sign in
   $('#loginLink').click(function(e){
       e.preventDefault();
       //close all dialog
       $('.modal').modal('hide');
       // select login lodel to show
       $('#loginModal').css('top','40px').modal('show')
               .find('#loginModalContent')
               .load($(this).attr('value'));
   });
   
   $('.cartLink').click(function(e){
       e.preventDefault();
       //close all dialog
       $('.modal').modal('hide');
       // select login lodel to show
       $('#cartModal').css('top','40px').modal('show')
               .find('#cartModalContent')
               .load($(this).attr('value'));
   });  
   
   $('#signupLink').click(function(e){
       e.preventDefault();
       //close all dialog
       $('.modal').modal('hide');
       // select login lodel to show
       $('#signupModal').css('top','40px').modal('show')
               .find('#signupModalContent')
               .load($(this).attr('value'));
   });   
    
   
   $('.modal').on('show.bs.modal', function (e) {
       $('.header').css('z-index',1);
    });
    
    $('.modal').on('hidden.bs.modal', function (e) {
       $('.header').css('z-index',9999);
    });
});